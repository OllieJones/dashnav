<?php
/**
 * Plugin Name:     Dashboard Navigator
 * Plugin URI:      https://github.com/OllieJones/dashnav
 * Description:     Navigate your WordPress dashboard by searching with a few keystrokes.  Press shift shift, then a few letters of the menu item you want, then enter.
 * Author:          Ollie Jones
 * Author URI:      https://github.com/OllieJones/
 * Text Domain:     dashnav
 * Domain Path:     /languages
 * Version:         0.9.0
 * License:         GPLv2 or later
 *
 * @package         Dashnav
 */

// Your code starts here.

namespace Dashnav;

use function add_action;

add_action( 'admin_init', '\Dashnav\admin_init', 10, 0 );
add_action( 'personal_options', '\Dashnav\personal_options', 10, 1 );
add_action( 'personal_options_update', '\Dashnav\save_personal_options' );
add_action( 'edit_user_profile_update', '\Dashnav\save_personal_options' );


function admin_init() {
  $version = '0.9.1';

  load_plugin_textdomain( 'dashnav', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

  if ( get_dashnav_pref() ) {
    wp_enqueue_style( 'jquery-ui-autocomplete' );
    wp_enqueue_style( 'dashnav', plugin_dir_url( __FILE__ ) . 'assets/dashnav.css', array(), $version, 'all' );
    wp_enqueue_script( 'dashnav', plugin_dir_url( __FILE__ ) . '/assets/dashnav.js', array( 'jquery-ui-autocomplete' ), $version, true );

    $i18n = array(
      /* translators: name of plugin to appear as the placeholder in the search box. */
      'placeholder'        => __( 'Navigator', 'dashnav' ),
      // Intentional use of core localization strings.
      // phpcs:ignore WordPress.WP.I18n.MissingArgDomain
      'placeholder_active' => implode( ' ', array( __( 'Search' ), __( 'Dashboard' ), __( 'Menus' ) ) ),
      /* translators: this is the delimiter between menu and submenu. For example Settings > General. Change for RTL languages  to  ⮜*/
      'submenu_delimiter'  => __( ' ⮞ ', 'dashnav' ),
      'tooltip' => __( '<shift><shift> activates the Dashboard Navigator', 'dashnav' ),
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
