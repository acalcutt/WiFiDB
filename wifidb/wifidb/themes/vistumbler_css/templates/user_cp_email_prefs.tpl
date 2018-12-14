<!--
Database.inc.php, holds the database interactive functions.
Copyright (C) 2014 Andrew Calcutt

This program is free software; you can redistribute it and/or modify it under the terms
of the GNU General Public License as published by the Free Software Foundation; either
version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program;
if not, write to the

   Free Software Foundation, Inc.,
   59 Temple Place, Suite 330,
   Boston, MA 02111-1307 USA
-->
{include file="header.tpl"}
			<div class="main">
{include file="user_cp_header.tpl"}
				<form method="post" action="?func=update_user_pref">
					<table class="content_table">
						<tr>
							<th width="30%" class="header">Email me about updates</th>
							<td align="center" class="dark"><input name="mail_updates" type="checkbox" {$user_cp_profile.mail_updates}></td>
						</tr>
						<tr>
							<th width="30%" class="header">Announcements</th>
							<td align="center" class="light"><input name="announcements" type="checkbox" {$user_cp_profile.announcements}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">Announcement Comments</th>
							<td align="center" class="dark"><input name="announce_comment" type="checkbox" {$user_cp_profile.announce_comment}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">New Public Geocaches</th>
							<td align="center" class="light"><input name="pub_geocache" type="checkbox" {$user_cp_profile.pub_geocache}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">New Users</th>
							<td align="center" class="dark"><input name="new_users" type="checkbox" {$user_cp_profile.new_users}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">Scheduled Import</th>
							<td align="center" class="light"><input name="schedule" type="checkbox" {$user_cp_profile.schedule}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">Import Finished</th>
							<td align="center" class="dark"><input name="imports" type="checkbox" {$user_cp_profile.imports}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">New Full DB KML</th>
							<td align="center" class="light"><input name="kmz" type="checkbox" {$user_cp_profile.kmz}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">GeoNames Daemon</th>
							<td align="center" class="dark"><input name="geonamed" type="checkbox" {$user_cp_profile.geonamed}></td></td>
						</tr>
						<tr>
							<th width="30%" class="header">Database Statistics Daemon</th>
							<td align="center" class="light"><input name="statistics" type="checkbox" {$user_cp_profile.statistics}></td></td>
						</tr>
						<tr class="light-centered">
							<td colspan="2">
									<input type="hidden" name="username" value="{$user_cp_profile.username}">
									<input type="hidden" name="user_id" value="{$user_cp_profile.id}">
									<input type="submit" value="Update Me!">
							</td>
						</tr>
					</table>
				</form>
			</div>
{include file="footer.tpl"}