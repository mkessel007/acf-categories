<p>Categories/Taxonomies addon for the AFC Wordpress plugin http://www.advancedcustomfields.com/</p>

<ul>
	<li>Contributors: <a href="http://www.cubeweb.gr" target="_blank">Cubeweb</a></li>
	<li>Requires at least: 3.5</li>
	<li>Tested up to: 3.6.1</li>
	<li>License: GPLv2 or later</li>
	<li>License URI: http://www.gnu.org/licenses/gpl-2.0.html</li>
</ul>

<br><br><br><img src="http://www.cubeweb.gr/wp-projects/previews/screenshot-1.png" alt=""/>
<br><br><br><img src="http://www.cubeweb.gr/wp-projects/previews/screenshot-2.png" alt=""/>
<br><br><br><img src="http://www.cubeweb.gr/wp-projects/previews/screenshot-3.png" alt=""/>

<br><br>
<h1>Compatibility</h1>

<p>This add-on will work with:</p>

<cite><strong>* version 4 and up only</strong></cite>
<br><br>
<h1>Installation</h1>

<p>This add-on can be treated as a WP plugin.</p>

<ol>
	<li>Copy the 'categories' folder into your plugins folder</li>
	<li>Activate the plugin via the Plugins admin page</li>
</ol>
<br>

<h1>Usage</h1>
It returns taxonomy object. So use 'get_field' function or 'get_sub_field' if inside a repeater'.
<br><br><br>

<h1>Changelog</h1>

<h2>2.0.0.6</h2>
<ul>
	<li><h3>Fixed</h3></li>
	<li>Warning thrown on categories-v4 - in_array on line 152, thanks to americandriversafety</li>
	<li><h3>Added</h3></li>
	<li>Category link in post count indicator</li>
</ul>

<h2>2.0.0.5</h2>
<ul>
	<li><h3>Updated</h3></li>
	<li>Compatibility for WP 3.7.1</li>
</ul>

<h2>2.0.0.4</h2>
<ul>
	<li><h3>Updated</h3></li>
	<li>Compatibility for WP 3.6.1</li>
</ul>

<h2>2.0.0.3 Beta</h2>
<ul>
	<li><h3>Added</h3></li>
	<li>Display Post Count option</li>
</ul>

<br>

<h2>2.0.0.2 Beta</h2>
<ul>
	<li><h3>Removed</h3></li>
	<li>Chosen plug-in. After a talk with the chosen team I understood that chosen will not work correctly inside the repeater field.</li>
	<li>Mp6 admin theme option. Since there is no chosen anym ore there is no reason for that option.</li>
	<li><h3>Added</h3></li>
	<li>Multiple checkboxes</li>
	<li>Multiple: Select All button</li>
	<li>Multiple: Clear All button</li>
	<li>Multiple: Select Select Main Categories button</li>
	<li>Multiple: Show/Hide categories button</li>
</ul>

<br>

<h2>2.0.0.1 Beta</h2>
<ul>
	<li><h3>Added</h3></li>
	<li>mp6 admin theme option</li>
</ul>

<br>

<h2>2.0.0.0 Beta</h2>
<ul>
	<li>Added compatibility with ACF 4.0</li>
	<li>Added chosen support</li>
	<li>For now it only returns taxonomy object. So use only 'get_field' function.</li>
</ul>

<br>
<i><cite><strong>Please report any bugs or requests on https://github.com/cubeweb/acf-categories/issues?state=open</strong></cite></i>
