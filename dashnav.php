<?php
/**
 * Plugin Name:     Dashboard Navigator
 * Plugin URI:      https://github.com/OllieJones/dashnav
 * Description:     Navigate your WordPress dashboard by searching with a few keystrokes.  Press shift shift, then a few letters of the menu item you want, then enter.
 * Author:          Ollie Jones
 * Author URI:      https://github.com/OllieJones/
 * Text Domain:     dashnav
 * Domain Path:     /languages
 * Tested up to:    7.0
 * Version:         1.1.0
 * Requires PHP:    5.6
 * License:         GPLv2 or later
 *
 * @package         Dashnav
 */

// Your code starts here.

namespace Dashnav;

use WP_Admin_Bar;
use function add_action;

add_action( 'admin_init', function () {
  load_plugin_textdomain( 'dashnav', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  add_action( 'current_screen', '\Dashnav\screen_init' );
  add_action( 'personal_options', '\Dashnav\personal_options', 10, 1 );
  add_action( 'personal_options_update', '\Dashnav\save_personal_options' );
  add_action( 'edit_user_profile_update', '\Dashnav\save_personal_options' );
});


function screen_init(  ) {
  $version = '1.1.1';

  if ( wp_should_load_block_editor_scripts_and_styles() ) {
    return;
  }

  if ( get_dashnav_pref() ) {
    /* Suppress ctrl-k palette. */
    remove_action( 'admin_enqueue_scripts', 'wp_enqueue_command_palette_assets' );
    add_action( 'admin_bar_menu', function ( WP_Admin_Bar $wp_admin_bar ) {
      $wp_admin_bar->remove_node( 'command-palette' );
    } );
    wp_enqueue_style( 'jquery-ui-autocomplete' );
    wp_enqueue_style( 'dashnav', plugin_dir_url( __FILE__ ) . 'assets/dashnav.css', array(), $version, 'all' );
    wp_enqueue_script( 'dashnav', plugin_dir_url( __FILE__ ) . 'assets/dashnav.js', array( 'jquery-ui-autocomplete' ), $version, true );

    $i18n = array(
      /* translators: name of plugin to appear as the placeholder in the search box. */
      'placeholder'        => __( 'Navigator', 'dashnav' ),
      // Intentional use of core localization strings.
      // phpcs:ignore WordPress.WP.I18n.MissingArgDomain
      'placeholder_active' => implode( ' ', array( __( 'Search' ), __( 'Dashboard' ), __( 'Menus' ) ) ),
      /* translators: this is the delimiter between menu and submenu. For example Settings > General. Change for RTL languages  to  ⮜*/
      'submenu_delimiter'  => __( ' ⮞ ', 'dashnav' ),
      'tooltip'            => __( 'Ctrl+K or Shift Shift to activate the Dashboard Navigator', 'dashnav' ),
      'locale'             => get_user_locale(),
    );
    wp_localize_script( 'dashnav', 'dashnav', $i18n );
  }
}

function get_dashnav_pref( $user = 0 ) {
  $pref = get_user_option( 'dashnav', $user );

  return false === $pref || 'true' === $pref;
}

function personal_options( $profile_user ) {
  ?>
  <tr class="show-admin-bar user-admin-bar-front-wrap">
    <th scope="row"><?php esc_html_e( 'Dashboard Navigator', 'dashnav' ); ?></th>
    <td>
      <label for="dashnav">
        <input name="dashnav" type="checkbox" id="dashnav"
               value="1"<?php checked( get_dashnav_pref( $profile_user->ID ) ); ?> />
        <?php esc_html_e( 'Show the dashboard navigator', 'dashnav' ); ?>
      </label><br/>
    </td>
  </tr>
  <?php
}


function save_personal_options( $user_id ) {
  if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ), 'update-user_' . $user_id ) ) {
    return;
  }

  if ( ! current_user_can( 'edit_user', $user_id ) ) {
    return;
  }
  $menu = isset( $_POST['dashnav'] ) ? sanitize_text_field( wp_unslash( $_POST['dashnav'] ) ) : '0';
  $menu = '1' === $menu || 'on' === $menu ? 'true' : 'false';

  update_user_meta( $user_id, 'dashnav', $menu );
}
