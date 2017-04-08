<?php
/*
Database.inc.php, holds the database interactive functions.
Copyright (C) 2011 Phil Ferland

This program is free software; you can redistribute it and/or modify it under the terms
of the GNU General Public License as published by the Free Software Foundation; either
version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

ou should have received a copy of the GNU General Public License along with this program;
if not, write to the

   Free Software Foundation, Inc.,
   59 Temple Place, Suite 330,
   Boston, MA 02111-1307 USA
*/

define("SWITCH_SCREEN", "HTML");
define("SWITCH_EXTRAS", "");

include('lib/init.inc.php');
$dbcore->smarty->assign('wifidb_page_label', 'Version Page');
$dbcore->smarty->smarty->display('header.tpl');
?>
<font face="Courier New">
		<div align="left">
		<p align="center"><font size="7"><b>WiFiDB Version History</b></font></p>
		<table border="0" cellpadding="4" width="100%" border="2" id="details">
			<tr class="dark">
				<td>Project Name...</td><td><b>WiFiDB 0.30v</b></td>
			<tr class="light">
				<td>Project State...</td><td><b>Alpha (planning and early dev)</b></td>
			</tr>
			<tr class="dark">
				<td>Project Dev(s)...</td><td><b><a class="links" href="https://forum.techidiots.net/forum/memberlist.php?mode=viewprofile&u=6">PFerland</a>, <a class="links" href="https://forum.techidiots.net/forum/memberlist.php?mode=viewprofile&u=43">ACalcutt</b></td>
			</tr>
			<tr class="light">
				<td align="center" colspan="2"><b><a class="links" title="You know you want to. ;)" href="https://github.com/acalcutt/WiFiDB">WiFiDB GitHub</a></b></td>
			</tr>
		</table>
		</ br>
                <h2>Change Log</h2>
				<table class="light" width="100%" border="2" id="21b1">
					<tr>
						<td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland, Andrew Calcutt</td><td style="border-style: solid; border-width: 1px" height="26">Version: 0.30 Build 2</td>
					</tr>
					<tr>
						<td style="border-style: solid; border-width: 1px" height="26">Date: 09-23-2015</td><td style="border-style: solid; border-width: 1px" height="26">Codename: Peabody</td>
					</tr>
					<tr>
						<td style="border-style: solid; border-width: 1px" height="26">Changes :</td><td style="border-style: solid; border-width: 1px" height="26"><a class="links" title="View updates for this branch ;)" href="https://github.com/pferland/WiFiDB/tree/ac-wifidb-dev">WiFiDB GitHub : Branch 'ac-wifidb-dev'</a></td>
					</tr>
					<tr>
						<td style="border-style: solid; border-width: 1px" height="26" colspan="3">
							<ol>
								<li>Added WebSocket support to the Scheduling Waiting page.</li>
								<li>Fixed some login security issues, one was the permissions were not being set correctly, and apikeys were not being checked correctly.</li>
								<li>Updated and fixed indexes for the table structures.</li>
								<li>Re-wrote the backend for the LiveAPs. Now supports submitting the title of the import first to get a session ID to have all APs imported to that Title. Many Sessions can be run at once to support multiple titles. Titles marked Completed will then be exported with the LiveAPExportd Daemon to be inserted for import.</li>

							</ol>
						</td>
					</tr>
				</table>
				<br>
                <table class="light" width="100%" border="2" id="21b1">
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland, Andrew Calcutt</td><td style="border-style: solid; border-width: 1px" height="26">Version: 0.30v Build 1</td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Date: 08-27-2014</td><td style="border-style: solid; border-width: 1px" height="26">Codename: Peabody</td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Changes :</td><td style="border-style: solid; border-width: 1px" height="26"><a class="links" title="View updates for this branch ;)" href="https://github.com/acalcutt/WiFiDB/tree/ac-wifidb-prod">WiFiDB GitHub : Branch 'ac-wifidb-prod'</a></td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26" colspan="3">
                            <ol>
                                <li>Minor modifications of WifiDB Alpha 0.30 to get a working release for the Vistumbler WiFiDB. The point of this release was to get the basics working.</li>
								<li>Fixes to imports</li>
								<li>Fixes to KML exports</li>
								<li>Fixes to GPS conversions</li>
								<li>Fixes to user login (though this needs a lot of work)</li>
								<li>Removed Mysicache from menu since it still needs a lot of work</li>
                            </ol>
						</td>
                    </tr>
				</table>
				<br>
                <table class="dark" width="100%" border="2" id="21b1">
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td><td style="border-style: solid; border-width: 1px" height="26">Version: 0.30 Build 1</td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Date: 09-13-2015</td><td style="border-style: solid; border-width: 1px" height="26">Codename: Peabody</td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26">Changes :</td><td style="border-style: solid; border-width: 1px" height="26"><a class="links" title="View updates for this branch ;)" href="https://github.com/pferland/WiFiDB/tree/0.30b1_PF_Branch">WiFiDB GitHub : Branch '0.30b1_PF_Branch'</a></td>
                    </tr>
                    <tr>
                        <td style="border-style: solid; border-width: 1px" height="26" colspan="3">
                            <ol>
                                <li>Re-wrote the back end storage, there is no longer 2 tables per Access Point in a seperate database called wifi_st. 
                                        There are now three tables in the wifi database called; wifi_pointers (Holds the general Information for each AP), 
                                        wifi_signals (holds all the signal history data with an ID pointer for GPS), wifi_gps (holds all the GPS Coord data).</li>
                                    
                                <li>Re-wrote the core of WiFiDB. All pages start off by calling <i>/lib/init.inc.php</i>, this sets up the environment,
                                        checks to see if the database is in the correct state, and then starts doing what the user asked.</li>
                                <ol>
                                    <li><i>$dbcore</i> The main Object that everything gets attached to.</li>
                                    <ol>
                                        <li>Core object variables include file system paths to library's, URL paths, and the current theme for the user, and any other system wide items like the manufactures list.</li>
                                        <li>SQL Object ($dbcore->sql)</li>
                                            <ol>
                                                <li>SQL Connection object.</li>
                                                <li>SQL Host name/IP string.</li>
                                                <li>WiFiDB DB Name.</li>
                                            </ol>
                                        <li>Frontend Class (lib/frontend.inc.php) </li>
                                            <ol>
                                                <li>Contains all the functions for interacting with the database and collecting data for output.</li>
                                                <li>Extends DBCore, Not to be used with the Daemon Class</li>
                                            </ol>
                                        <li>Daemon Class (lib/daemon.inc.php) </li>
                                            <ol>
                                                <li>Contains all the functions for interacting with the database and collecting data for output.</li>
                                                <li>Extends DBCore, Not to be used with Frontend Class.</li>
                                            </ol>
                                        <li>Export Class (lib/export.inc.php)</li>
                                            <ol>
                                                <li>Contains all the functions for interacting with the database and collecting data for output.</li>
                                                <li>Can be used with either the Daemon or Frontend Classes.</li>
                                            </ol>
                                        <li>Security Class (lib/security.inc.php)</li>
                                            <ol>
                                                <li>All the functions that involve security and users permissions within WiFiDB.</li>
                                                <li>Can be used with either the Daemon or Frontend Classes.</li>
                                            </ol>
                                    </ol>
                                </ol>
                                <li>Fixed lots of WTF moments in the code, which includes increasing the speed of the imports by, well... a whole lot. I can not import all 240k AP's in just over 8hrs, versus the 5 days it was taking on the old code.
                                    By no longer checking for duplicate GPS points on import.</li>
                                <li>Added a globe icon for APs that have GPS, APs that do not have GPS have a grayed out globe.</li>
                                <li>Fixed errors with handling UTF8 characters.</li>
                                <li>Fixed errors with exporting data for APs with some special characters.</li>
                                <li>*BROKEN* Added the ability for the search page to show the first 15 results on the same page as you type. <a href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=" target="_blank"></a></li>
                                <li>Added Temp File and output cleanup for unneeded Daemon KML files.</li>
                                <li>Implemented Smarty Templeting across all web pages.</li>
                                <li>Moved Exporting functions out of the database.inc.php file and into their own export.inc.php and class.</li>
                                <li>Renamed database.inc.php to frontend.inc.php
                                <li>Depreciated <i>login_bar()</i>, <i>my_caches()</i>, and <i>user_panel_bar()</i></li>
                                <li>Moved the <i>header()</i> and <i>footer()</i> functions back from the themes folder and into the mainline code. Themes will just have a header and footer `.tpl` file now.</li>
                                <li>Implemented PDO prepared statements in all interactions with the SQL Servers.</li>
                                <li>Removed all HTML elements from the import/export functions.</li>
                            </ol>
						</td>
					</tr>
				</table>
				<br>
                <table class="light" width="100%" border="2" id="20b1">
			<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td><td style="border-style: solid; border-width: 1px" height="26">Version: 0.20 Build 1</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2010-July-31</td><td style="border-style: solid; border-width: 1px" height="26">Codename: Hyannis</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
				<OL>
					<LI>Added Auto detect of Time zone and DST to the core. Now when it is the first time you visit the site, it will load a JavaScript to detect it and write a cookie. (wifidb_client_timezone, wifidb_client_dst, and wifidb_client_check)</LI>
					<LI>Fixed a bug in the graphing index page where it was not using the new SSID make function to generate the proper SSIDs for SQL tables, File names, and General usage. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=48&t=409">KB409</a></LI>
					<LI>Fixed a bug in the scheduling page where it would not calculate the correct Time zone stamp, but the time was correct. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=48&t=411">KB411</a></LI>
					<LI>Fixed a bug in the default theme where the page name was not being called correctly and was outputting an error or no text. </LI>
					<LI>Changed the All APs page to only show a few pages before and after the current page number. </LI>
					<LI>Added a User based login system. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=444">KB444</a></LI>
					<LI>Added User Control Panel. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=444">KB444</a></LI>
					<LI>Added Mysticache support (GPX / LOC / CSV). <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=444">KB444</a></LI>
					<LI>Added XML Support. </LI>
					<LI>Fixed a bug with GPS conversions. If one of the Cords has only 2 digits before the decimal the geo-cord was converted wrong. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=48&t=478">KB478</a></LI>
					<LI>Fixed in Index and Import page. (This is only ever seen on my domains) Apparently I didn't know how to spell "Environment". </LI>
					<LI>Changed the name of the User Imports lists table from `users` to `users_imports`. (I was getting confused with the other new user's tables.)</LI>
					<LI>Added Administrator Panel. More info: <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=475">KB475</a></LI>
						<UL>
							<LI>Overview</LI>
							<UL>
								<LI>Access Points</LI>
								<LI>Geocache's</LI>
								<LI>Users</LI>
								<LI>Daemon Stats</LI>
								<LI>Graphs </LI>
							</UL>
							<LI>Users and Groups</LI>
							<UL>
								<LI>Manage Users</LI>
								<LI>Manage Groups </LI>
								<LI>Manage Titles </LI>
							</UL>
							<LI>Maintenance</LI>
							<UL>
								<LI>Empty Temp folder</LI>
								<LI>Archive Upload folders</LI>
								<LI>Empty AP Graphing folder</LI>
								<LI>Check For bad Dates in APs</LI>
								<LI>Check for bad Geo-cords in APs</LI>
							</UL>
							<LI>System</LI>
							<UL>
								<LI>Edit Daemon configuration</LI>
								<LI>Edit Front end configuration</LI>
							</UL>
						</UL>
					<LI>Fixed, Forgot to add the '@' before $lat_exp[1] on line 5583 in database.inc.php. This was causing an unknown variable warning. </LI>
					<LI>Fixed, There was a problem with importing SSID's that have backslashes (\). This would then parse to read from MySQL and wouldn't find the table. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=11&t=511">KB511</a></LI>
					<LI>Changed the Install and Upgrade scripts, cleaned up and improved the code layout a little more. </LI>
					<LI>Added alternating colors to the rows in most if not all tables. This is based per-theme with the .dark, .light, .sub_head, .style4[ha,td] in themes/[theme]/sytles.css</LI>
					<LI>Changed <i>mail_admin()</i> function to <i>mail_users()</i>, So Administrators and other users can be updated with new imports and other updates. Based off of <a class="links" href="http://www.XpertMailer.com" target="_blank">XpertMailer</a></LI>
					<LI>Added another Daemon called 'geonamed.php'</LI>
						<UL><LI>Geonaming of Country and Administrative Names of Access Points with GPS. </LI>
						<LI>Data gathered from this page: http://ws.geonames.org/countrySubdivision?lat=43.5762033&#38;lng=7.02199666</LI>
						<LI><a class="links" href="http://www.geonames.org/" target="_blank" >GeoNames.org</a></LI></UL>
					</UL>
					<LI>Support for <a class="links" href="http://code.google.com/p/wardrive-android/">Wardrive</a> on android.
						<UL>
							<LI>
								The wardriving application stores the database as "Wardrive.db3" on the root of your phones sd card.
							</LI>
							<LI>
								Contact me and I'll add your app in.
							</LI>
						</UL>
					</LI>
					<LI><B>Build 1.1 Fixes</B><OL>
						<LI>Fixed an error in the converter function, was not telling it the location to write the file, resulted in a file being imported, but not saved to the disc.</LI>
						<LI>Fixed a bug in the import page, when there was an unsupported file being uploaded an Email was sent out. This is no longer done.</li>
						<LI>The Last import date on the main page was changing even when the import had finished.</LI>
						<LI>The console viewer had an error with some modifications that I made, and didn't fix before the release.</LI>
						<LI>Some small HTML tag issues are fixed.</LI>
					</OL>
					</LI>
					<LI><B>Build 1.2 Fixes</B><OL>
						<LI>Fixed an issue some may have with installing from scratch.</LI>
					</OL>
					</LI>
				</OL>
			</td></tr>
		</table>
		<br>
		<table class="dark" width="100%" border="2" id="16b4">
			<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
			<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 4</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-Sept-28</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
				<OL>
					<LI>Added Daemon Generated KML exports. Details <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=49&t=388">here.</a></LI>
					<LI>Fixed some HTML mode issues. <a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=47&t=385">KB385</a></LI>
					<LI>Fixed some issues that relate to WiFiDB running on a shared server host.<a class="links" href="http://forum.techidiots.net/forum/viewtopic.php?f=47&t=385">KB385</a></LI>
					<LI>Forgot to remove a <i>mysql_error()</i> function from a verbose statement, in the update portion of the <i>import_vs1()</i> function</LI>
					<LI>Added Daemon Console Viewer.</LI>
					<LI>Fixed the issue with some tables in the 'Vistumbler' theme where not centered. </LI>
					<LI>Fixed an issue with the user stat page, where the second AP import list was not showing up. </LI>
					<LI>Fixed an issue with the daemon where it would not start to import a file if said file was uploaded when the daemon was in the middle of an import. You would have to wait till the next import. </LI>
					<LI>Added Daemon Generated KML History page, along with a link to it in the main menu. </LI>
					<LI>Made the output log and PID file for the daemon vars in the config file for the daemon. </LI>
					<LI>Disabled fields in the daemon section of the install page, via checkbox, if the daemon is not going to be used. </LI>
					<LI>Disabled the submit buttons on the Exports page if there is no imports/APs in the database. </LI>
					<LI>Extended `title` and `user` fields to 255 chars. </LI>
					<LI>Fixed a bug where the time was severely off in some cases, in Andrews instance, UTC said it was 01:11 (real UTC was 00:56), also local [-5] was reported as 21:11 (real time 20:40) </LI>
					<LI>Removed the "This is just a test" line on the import page after an import with the daemon enabled. </LI>
					<LI>Daemon now checks if the log file is longer than 500 lines, if so the file is moved to [tools_dir]/backups/logs/console_wifidbd_[date-time].log</LI>
					<LI>Added a bash script written by Andrew, was adapted from the Plone startup bash script. Use either wifidbd or wifidbd.sh</LI>
					<LI>Fixed some bugs with the KMZ exports being generated in the opt folder, and not the out/kmz folder.</LI>\
					<LI>Some others that I can�t remember, but were done.</LI>
				</OL>
			</td></tr>
		</table>
		<br>


		<table class="light" width="100%" border="2" id="16b3.1">
			<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
			<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 3.1</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-Aug-12</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
				<OL>
					<LI>Changed the Scheduling page, so that there are now three parts to it:</LI>
					<OL>
						<LI>Default, shows the same as the old page, just the first 10 imports waiting now.</LI>
						<LI>Waiting, shows the remaining waiting lists </LI>
						<LI>Done, shows all the imports that have finished. </LI>
					</OL>
					<LI>Changed the install index page to give a more explicit navigation and what is available for patches. </LI>
					<LI>Added in locate.php for returning GPS points to Vistumbler based on Mac addresses that are around you. If none are found, it will ask if you want to upload a file. </LI>
					<LI>Changed the search.php, export.php, usersats.php pages' and <i>apfetch()</i> HTML so that when you customize your theme it keeps the page centered.</LI>
					<LI>Fixed some errors in the way the daemon compares the files that are being prepared to import. </LI>
					<LI>Re-generated manufatures.inc.php to get new manufactures. </LI>
					<LI>Removed Export Single AP to KML from the exports page, since there is more detailed exports on the APs fetch page, where you can choose what signal history row, or all the history rows, was also causing the page to take forever to load with lots of APs.</LI>
					<LI>Added $header variable for &#62; Meta &#60; tags and the such</LI>
					<LI>Added the Random Intervals Logo to the header</LI>
					<LI>Added support for Themes, please read this thread on how to use it / make your own. </LI>
					<LI>Changed scheduling.php so it has cookies support, now it is per-browser not per-server. </LI>
					<LI>Import upload script now only accepts .VS1 files, which it is how it should have been since I dropped .txt support.</LI>
					<LI>Fixed a Time zone issue conversion in the daemon and general core of WiFiDB. </LI>
					<LI>Added cookie based Time zone settings on the scheduling page. </LI>
					<LI>Fixed a bug in the individual User stats page, where it was not showing the first import for any user. </LI>
					<LI>Fixed an error where I didn�t have the 'exp_single_ap' on the exports page. </LI>
					<LI>Fixed an error in the Export all DB to KML, where if the last AP had no valid GPS cords, the link for the final file would not be shown. </LI>
					<LI>Changed the Full DB KML so that it is now a KMZ file not a KML, to save on bandwidth. </LI>
				</OL>

			</td></tr>
		</table>
		<br>

		<table class="dark" width="100%" border="2" id="16b3">
			<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
			<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 3</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-Jul-09</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
				<OL>
					<LI>Added Token support on almost every page that takes user input, or input from the URL. </LI>
					<LI>Fixed an issue where if you had sent a file from Vistumbler the token would not be able to be compared. </LI>
					<LI>Added signal strength to Access Point Signal Plot KML export. </LI>
					<LI>Changed Individual User Stat Page to new layout. </LI>
					<LI>Standardized SSID usage, there are three types :</LI>
					<OL>
						<LI>&#60;ny-paq&#62;&#124;sayz oh-my this is fun (Is the non-sanitized, but still safe SSID, used to name APs, 32 char limit, no special chars.)</LI>
						<LI>&#60;ny-paq&#62;_sayz oh-my this is fun (Safe for file names, no special chars, 32 char limit.)</LI>
						<LI>_ny-paq__sayz oh-my this (Safe for table names, max 25 char, no special chars.)</LI>
					</OL>
					<LI>Changed the way WiFiDB looks for the install folder. </LI>
					<LI>Daemon now has all SQL based errors being echoed out to the screen, even if Verbose is off. </LI>
					<LI>Changed the table hide for GPS history, so it is now hidden by default. Has a +/- symbol to either expand or contract the table next to the GPS History Title. </LI>
					<LI>For some reason the Save Search link was missing after 0.16 Build 1, is now back, with a few enhancements.</LI>
					<LI>Fixed the No Token error with imports directly from Vistumbler. </LI>
					<LI>Fixed the formatting of the file location that is in the URL from the import directly from Vistumbler that gets printed on the page. </LI>
					<LI>Also made the drop down for selecting the refresh time on the scheduled imports page, so it has a default of the current selection instead of going back to 5 sec.</LI>
					<LI>Fixed the Upgrade script in /install/upgrade/patch.php. (Was broken in Build 2 and 2.1.)</LI>
					<LI>Fixed the Install script in /install/install.php. (Was broken in Build 2 and 2.1.)</LI>
					<LI>Added Daemon Status to the scheduling.php page. </LI>
					<LI>Fixed an issue where the Signal history was being corrupted by being sanitized. The 'special' characters '-' and ',' were being encoded. </LI>
					<LI>Fixed Some Issues with the daemon, details are in the Tools Read-me. </LI>
					<LI>The WiFiDB Web log vars $log_level and $log_interval where interfering with the Daemon vars, they are now changed to $log_level_W and $log_interval_W. </LI>
					<LI>The User-name in the 'Files already imported' table was pointing to the All APs for that user page, when it is supposed to point to the Users stat page. </LI>
					<LI>Fixed an issue where if some AP Pointers are removed from the `wifi0` table, some APs will fail to import or have the same ID as another AP and not be linkable to their data.</LI>
					<LI><b>[ Issues reported by ACalcutt ]</b>
						<OL>
							<LI>"Access" is spelled incorrectly multiple times on Export page. </LI>
							<LI> (Export an Access Point to KML) "User-name" should be "SSID". </LI>
							<LI>Fix the links for Access Points on the All AP page. (Add tokens to the SSID URLs in the "View all APs" page.)</LI>
							<LI>Refresh time on the scheduling page went to 15 seconds when I set it to 5 seconds. On the next refresh it went back to 30 seconds. </LI>
						</OL>
					</LI>
					<LI>Unified the <i>import_vs1()</i> and <i>importvs1d()</i> functions, added an $out var to <i>import_vs1()</i> and <i>verbose()</i>, valid values are "CLI" and "HTML". </LI>
					<LI>Moved the Install folder warning code to the database.inc.php file from config.inc.php.</LI>
					<LI>All Messages in import_vs1 are in a group of variables in the beginning of the function, for easy editing. </LI>
					<LI>Added in some code to handle obscure APs that get tagged as new when they are not new. </LI>
					<LI>There was missing Token links on the Associated Lists section of the AP Fetch page. </LI>
					<LI>Numerous other small fixes that I have forgotten about. </LI>
					<LI>Spell-checked the Ver.php page. </LI>
					<LI>Added sorting and pages to the Search results page. </LI>
					<LI>Rearranged the exports page. </LI>
					<LI>Added MAC, sectype, chan, and radio to Single AP export. </LI>
					<LI>Added Date and number of APs for User list export. </LI>
					<LI>All AP page could not go to other pages to see more APs then that are on the first page. </LI>
					<LI>GPS array creation for import had wrong matching so duplicate data was being entered. </LI>
				</OL>
			</td></tr>
		</table>
		<br>
		<table class="light" width="100%" border="2" id="16b21">
			<TR><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
			<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 2.1</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-May-05</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
			<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
				<OL>
					<LI>Daemon was unable to remove files from `files_tmp` table and put them into the uploaded `files` table. </LI>
					<LI>The importvs1 function for the daemon was not returning the AP and GPS totals, and 0 was being entered into the users table. </LI>
					<LI>Added a link to the side for "Files Waiting to be imported" (/opt/scheduling.php).</LI>
					<LI>Fixed the issue where the Import page would not switch to 'non-daemon' mode when $daemon var was set to 0. </LI>
					<LI>Rearranged the table for scheduling.php, and added in Current AP, Importing? (Yes/No), Current AP/Total APs. </LI>
					<LI>Added color for Files waiting to be imported, Green = Currently Importing, Yellow = Waiting. </LI>
					<LI>Had to alter SQL statement for Total APs in the Main Stats Page. This is because I have added the next Import run as an element in the `settings` table. </LI>
					<LI>Main Stats Page Last Import list link didn't have a row id in the URL. </LI>
					<LI>The Corrupted dates on GPS cords was, I stupidly moved the Date conversion check outside the GPS array creation, which is dependent on the number of segments returned for the GPS in the VS1 file, so for the newer VS1 file that has 12 segments it was grabbing the wrong data.</LI>
					<LI>Fixed an issue where on windows based systems the file size wouldn't be correct. </LI>
				</OL>
			</td></tr>
		</table>
		<br>
<table class="dark" width="100%" border="2" id="16b2">
	<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 2</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-Apr-29</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
		<OL>
			<LI>Changed the Import Page Layout so that it now summarizes the GPS import into, </LI>
				<OL>
					<LI>New: Good, Bad</LI>
					<LI>Update: Good, Bad</LI>
					<LI>Already in Database: </LI>
				</OL>
			<LI>Finished AP Fetch Page so that GPS can be hidden. </LI>
			<LI>Most, if not all pages now have the <i>footer()</i> and <i>pageheader()</i> function to standardize page layout. </LI>
			<LI>Fixed an issue where if there is no MAC/Sectype/Chan/Radio it would just be blank, and cause errors on fetch. </LI>
				<OL>New Defaults:
					<LI>Mac (00:00:00:00:00:00) </LI>
					<LI>Sectype (0) </LI>
					<LI>Chan (0) </LI>
					<LI>Radio (u) </LI>
				</OL>
			<LI>Added support for Exporting to GPX files, for Garmin Devices. </LI>
			<LI>Moved the code from insertnew.php into the index.php file; this is for the token that has been added for validation. </LI>
			<LI>Added a comment tag to <i>`line 2`</i>of the KML exports to tell if it was a Full DB/Users list/Single AP/All Users APs/All Signal for AP.</LI>
			<LI>Made the tables that hold the page one table so when there is a skew in the page doesn't get deformed like it did before. (I'm not a GUI person). </LI>
			<LI>Fixed some formatting issues with the install/upgrade/patching paths. </LI>
			<LI>For Security reasons temporally will be using hard links for the side menu, until further notice. </LI>
			<LI>Added a 'daemon' of sorts. This is optional upon install and changeable afterwards in the configuration file. <br>Notes are in the Readme.txt of the tools folder.</LI>
		</OL>
	</td></tr>
</table>

<br>
<table class="light" width="100%" border="2" id="16b1">
	<tr><td style="border-style: solid; border-width: 1px" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px" height="26">Version: 0.16 Build 1</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26">Date: 2009-Mar-20</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px" height="26" colspan="3">
		<OL>
			<LI>Started moving all HTML code outside PHP code. </LI>
			<LI>Fixed an error in the GPS conversion. </LI>
			<LI>Added a footer function to take over the "*THIS PAGE* has been last edited on..." at the end of all forms, to standardize it, seeing how it was on all forms anyway. </LI>
			<LI>Moved the "*THIS PAGE* was last modified on: YYYY-MMM-DD @ HH:MM:SS" to the bottom of the page in the bottom cell. </LI>
			<LI>Working on changing the layout of the AP fetch page. Soon it will be :</LI>
				<OL type="A">
					<LI><b><i><br>---------------------------------------<br>
					&nbsp;&nbsp; Associated list <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|_&gt; Signal history for that list <br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|_&gt; GPS points for that Signal<br>
					---------------------------------------<br></i></b></LI>
					<LI>Would like to have it so the GPS history is hide able via Java-script or something. </LI>
					<LI>So far the changes are, all the previous separate functions (fetch GPS, fetch associate list, and fetch signal) are all now one function (fetch AP). </LI>
					<LI>Unfortunately this is going to require a change in the back end. Previous databases will not be compatible with this update. </LI>
					<LI>Reason being, in the previous versions (0.14 &amp; 0.15[all builds]) did not store the signal history row in the Users table. </LI>
						<OL>
							<LI>Old way ex <font color="red">1</font>,<font color="Yellow">1</font>-<font color="red">0</font>,<font color="Yellow">2</font>-<font color="red">0</font>,<font color="Yellow">6</font>-<font color="red">1</font>,<font color="Yellow">10</font>-... / <font color="red">0</font>,<font color="Yellow">6</font> : <font color="red">0</font> is the update or new flag <font color="red">1</font> = Updated AP  <font color="red">0</font> = New AP, the <font color="Yellow">6</font> is the AP ID number in the Database</LI>
							<LI>New way ex <font color="red">1</font>,<font color="Yellow">6</font>:<font color="Green">1</font>-<font color="red">0</font>,<font color="Yellow">2</font>:<font color="Green">2</font>-<font color="red">0</font>,<font color="Yellow">6</font>:<font color="Green">3</font>-<font color="red">1</font>,<font color="Yellow">10</font>:<font color="Green">1</font>-... /<br> <font color="red">0</font>,<font color="Yellow">6</font>:<font color="Green">2</font> ; <font color="red">0</font> is the update or new flag 1 = Updated AP / 0 = New AP, the <font color="Yellow">6</font> is the Unique Access Point ID (UAPID) in the Database, and the <font color="Green">2</font> is the Signal History row number for the access point.)</LI>
						</OL>
				</OL>
			<LI>The users table holds all the list imports for each user. </LI>
			<LI>Fixed a bug when a search has no results, the page would output a PHP error, now it says "There were no results, please try again". </LI>
			<LI>Fixed an issue, where on install there would be an SQL error and fail to install. </LI>
			<LI>Added link to Last User on Index page. </LI>
			<LI>Cleaned up the tables on the new version page. </LI>
			<LI>Dates are now standardized as YYYY-MM-DD, to coincide with Vistumblers' save file. </LI>
			<LI>Fixed up the List KML export, there is a link to the KML file now. </LI>
			<LI>Finished KML export for entire database. </LI>
			<LI>Added option for a black background on the Signal Graphs. </LI>
			<LI>Empty Imports are no longer allowed (should have been like that since the beginning). Also if there were any empty imports, they will not be printed out on the All Users page. </LI>
			<LI>Added some friendly informational links. </LI>
			<LI>Set the default values for function variables, in case one value is left out. </LI>
			<LI>Initial code for Export Newest AP to KML is written, not tested yet. </LI>
			<LI>Added Export Page at /opt/export.php, also a link on the left hand side. </LI>
				<OL type="A">
					<LI>Have Export users list to KML, all APs for a user to KML, export all APs in the DB to KML, and export a single AP to KML. </LI>
					<LI>Going to add the same for export to VS1. </LI>
				</OL>
			<LI>The warning for the install folder still being available was not added into the installer. It now is, and also in the upgrade too. </LI>
			<LI>Made the Default App internal time zone, GMT+0(Zulu). </LI>
				<OL>
					<LI>Soon you will be able to make the viewing time as your local time zone. </LI>
					<LI><a class="links" href="http://wwp.greenwichmeantime.com/">greenwichmeantime.com</a></LI>
					<LI><a class="links" href="http://en.wikipedia.org/wiki/Greenwich_Mean_Time">wikipedia -&#60; Greenwich_Mean_Time</a></LI>
				</OL>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="15b80" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%;" height="26">Version: 0.15 Build 80</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Date: 2009-Jan-29</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26" colspan="3">
		<OL>
			<LI>Small Code fixes that needed to be fixed. Most only showed up if verbose errors were on in PHP. </LI>
			<LI>Fixed Export to KML files from the Users List and Individual Access Points. </LI>
			<LI>Dates are now standardized as YYYY-MM-DD. </LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="15b79" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%;" height="26">Version: 0.15 Build 79</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Date: 2009-Jan-24</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26" colspan="3">
		<OL>
			<LI>Made a repair script to check the Storage tables for erroneous data, to replace or remove.</LI>
			<LI>Some other small typos and coding fixes. </LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="15b78" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%;" height="26">Version: 0.15 Build 78</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Date: 2009-Jan-22</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26" colspan="3">
		<OL>
			<LI>Extra include_once_onces for database.inc.php slipped back in. </LI>
			<LI>Install script had a bug with the Links table. </LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="15b77" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%;" height="26">Version: 0.15 Build 77</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Date: 2009-Jan-11</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%;" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Some headers had duplicate include_once_onces for database.inc.php.</LI>
			<LI>Fixed import of GPS points. </LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="15b76" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.15 Build 76	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Dec-20</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>There were a few major bugs in the install script that are now fixed. </LI>
			<LI>There was no Upgrade script in the install folder to do a safe upgrade from v0.14 to v0.15. Go to /install/upgrade.php.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="15b75" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.15 Build 75	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Dec-19</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Added in a very basic (to start) search page, to search for Access Points.</LI>
			<LI>(Work in progress) Changing the GPS check so that it checks the DB for the GPS point and from there, if there is a return, point to that GPS, if not add it to the table.</LI>
			<LI>Added associated Import list for Access Points.</LI>
			<LI>Added in Security warning in case the /install folder is not removed. </LI>
			<LI>Added some more user input sanitation. </LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="15b73" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.15 Build 73	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Nov-28</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Changed the import report page to have tables for the output, so that it is more organized and is easier to tell whether the access point is a new or updated.</LI>
			<LI>(Work in progress) Changed the GPS check so that it checks the DB for the GPS point and from there, if there is a return, point to that GPS, if not add it to the table.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="15b67" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.15 Build 67	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Nov-19</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Added GPS history to Access Point Fetch page.</LI>
			<LI>Added View all APs for a given user.</LI>
			<LI>Fixed bug in the import_vs1 function where the page was not rendering right, even though it was importing correctly.</LI>
			<LI>Fixed a bug where the AP fetch page wasn't showing more than one row of signal history even though there was more than one.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="14" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.14	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Nov-14</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Changed the All users list, so that it displays only the first ID for a user (which is considered the users Unique ID).</LI>
			<LI>Fixed an issue where randomly an AP would have more signal history points then GPS history points.</LI>
			<LI>Added installer for easy setup. Just go to /[WiFiDB path]/install/.</LI>
			<LI>Fixed a few more bugs/PEBKAC errors.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="13" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.13	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Oct-30</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Rearranged functions.php into database.inc.php(all database related functions) and graph.inc.php (all graphing and image related functions).</LI>
			<LI>Fixed a few more bugs/PEBKAC errors.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="12" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.12</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Aug-19</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Added in graphing for APs signal history, one row of history at a time for the moment.</LI>
			<LI>Added in Users Stats page to view what users have imported / updated what APs.</LI>
			<LI>Added in KML exports, right now it is just a Full DB export, soon to be added is Individual APs and groups of selected APs.</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="light" width="100%" border="2" id="11" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td>
	<td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.11</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Aug-12</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>Fixed the issue where the signal history was getting corrupted and adding in way more signal points then there actually where for the AP. [functions.php-&#60;import_vs1()].</LI>
			<LI>Added in a `Users` table to keep track of what users imported/updated APs.</LI>
			<LI>Added in `notes` for the group of APs to be added into the `Users` table, by the user upon import.</LI>
			<LI>Fixed most if not all CSS issues.</LI>
			<LI>Added `VS1` and `VSZ` folders to the `out` dir (exports soon to be added).</LI>
		</OL>
	</td></tr>
</table>
<br>
<table class="dark" width="100%" border="2" id="1" cellpadding="1">
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Author: Phillip Ferland</td><td style="border-style: solid; border-width: 1px;width:50%" height="26">Version: 0.1	</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Date: 2008-Jun-10</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26">Changes :</td></tr>
	<tr><td style="border-style: solid; border-width: 1px;width:50%" height="26" colspan="3">
		<OL>
			<LI>This is a work in progress. Most if not all the features are in their infancy and need much work.</LI>
		</OL>
	</td></tr>
</table>
<br>

	<h2>&#62;---LINKS---&#60;</h2>
	<a class="links" href="http://forum.techidiots.net/forum/viewforum.php?f=22">RanInt Forum</a><br>
	<a class="links" href="http://forum.techidiots.net/forum/viewforum.php?f=38">WiFiDB Forum</a><br>
<br>
<?php

$dbcore->smarty->smarty->display('footer.tpl');
#############
#   _____   #
#  |_____|  #
# /      #\ #
#(         )#
# \_______/ #
#  =======  #
#  |  _  |  #
#  | /_\ |  #
#  | |_| |  #
#  )     (  #
# ========= #
#############
//  Gypsy : Tom...I dont get you.
//  Tom   : Nobody does! I'm the wind, baby!
?>
