=== Dashboard Navigator ===
Contributors: OllieJones
//Donate link: https://example.com/
Tags: administration, dashboard, search, navigation
Requires at least: 4.3
Tested up to: 6.8-beta2
Requires PHP: 5.6
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Quickly mavigate your WordPress dashboard by searching with a few keystrokes.

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

Yes. The dropdown list already includes the top-level menus and submenus your plugin defines.

[TODO Filter for adding some other dropdown mennu entries'. ]

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* A change since the previous version.
* Another change.

= 0.5 =
* List versions from most recent at top to oldest at bottom.

== Upgrade Notice ==

= 1.0 =
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

= 0.5 =
This version fixes a security related bug.  Upgrade immediately.

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

== A brief Markdown Example ==

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](https://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: https://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
