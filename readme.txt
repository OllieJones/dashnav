=== Dashboard Navigator ===
Contributors: OllieJones
//Donate link: https://example.com/
Tags: administration, dashboard, search, navigation
Requires at least: 4.3
Tested up to: 6.8-beta2
Requires PHP: 5.6
Stable tag: 0.9.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Donate: https://github.com/sponsors/OllieJones

Navigate your WordPress dashboard by searching with a few keystrokes.

== Description ==

In modern operating systems you can press a Start or Spotlight key, type a few letters of the operation you need, and choose it. There's no need to waste time clicking around in the menus looking for your command. This plugin gives you the same capability for WordPress's dashboard and its features.

The plugin places a search box at the top of the menu at the top left of WordPress's dashboard. (That menu is at the top right if you use a right-to-left language such as Rohingya or Arabic.) Click in that menu and type a few letters. You'll see a drop-down list of matching commands. Use arrow keys to select the command you want, and press Enter or Tab.

You can press Shift twice rapidly instead of clicking in the search box. So, for example, to see your orders in your WooCommerce store, type this.

`Shift` `Shift` `O` `r` `d` `e` `r` `s` `Enter`

Tnat's it.

How does this plugin work? It is lightweight.  It sends its small JavaScript file to your browser for every dashoard page. That JavaScript analyzes the WordPress menus and preparse the dropdown list.

== Installation ==

The usual way.

== Frequently Asked Questions ==

= Will this plugin slow down my site for my users? =

**No.** It does nothing on your site's front-end pages. And, for your dashboard users it adds one small Javascript file.

= What if some of my registered users don't want it? =

Each user can enable or disable it in their user profile.

= Does it present any security problems? =

**No.** At least it is designed to be secure. It works entirely in each user's browser with the menus WordPress sends to the browser.

= I publish my own plugin. Can I put my plugin's commands into the dropdown list ? =

Yes. The dropdown list already includes the top-level menus and submenus created by your plugin and other plugins.

== Screenshots ==


== Changelog ==

= 0.9.0 =
* First release.

== Upgrade Notice ==

= 0.9.0 =
* First release.
