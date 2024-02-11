=== External Links Finder ===
Contributors: h3llas
Tags: external links, posts, links
Requires at least: 4.0
Tested up to: 5.9
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Wordpress plugin that allows displaying a table of posts containing external links.

== Description ==
External Links Finder is a Wordpress plugin that enables website administrators to generate a table of posts containing external links. This plugin is useful for identifying and managing posts that contain external URLs.

== Installation ==
1. Upload the `external-links-finder` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Access the plugin settings under 'External Links Finder' in the WordPress admin menu.

== Usage ==
1. After activating the plugin, navigate to the 'External Links Finder' menu in the WordPress admin area.
2. The plugin will automatically generate a table displaying posts that contain external links.
3. Each row in the table represents a post, showing the post number, post title, and truncated external link.
4. Click on the post title to view the post in WordPress.
5. Truncated external links are shown for easy reference.

== Changelog ==
= 1.0 =
* Initial release.

== Frequently Asked Questions ==
= How does the plugin identify external links? =
The plugin uses a regular expression pattern to match `<a>` HTML tags with `href` attributes. Links that do not start with the home URL of the WordPress site are considered external.

== Screenshots ==
1. External Links Finder Admin Page - The table displays posts with external links.

== Upgrade Notice ==
= 1.0 =
Initial release of External Links Finder plugin.

== Credits ==
This plugin was developed by Zeljko Ascic.

== License ==
External Links Finder is licensed under the GPLv2 or later: http://www.gnu.org/licenses/gpl-2.0.html

== More Information ==
For more information, visit the [plugin homepage](https://www.ascic.net/).

