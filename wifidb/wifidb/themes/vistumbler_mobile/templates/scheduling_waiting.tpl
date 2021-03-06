<!--

Copyright (C) 2018 Andrew Calcutt

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
				{include file="topmenu.tpl"}
				<meta http-equiv="refresh" content="15">
				<div class="center">
					<span class="nowrap"><a class="links" style="text-decoration: none;" href="{$wifidb_host_url}opt/scheduling.php"><img src="{$themeurl}img/file-importing.png" style="vertical-align: middle;"/> Files Importing ({$importing_count})</a></span> | <span class="nowrap"><b><a class="links" style="text-decoration: none;" href="{$wifidb_host_url}opt/scheduling.php?func=waiting"><img src="{$themeurl}img/file-waiting.png" style="vertical-align: middle;"/> Files Waiting ({$waiting_count})</a></b></span> | <span class="nowrap"><a class="links" style="text-decoration: none;" href="{$wifidb_host_url}opt/scheduling.php?func=done"><img src="{$themeurl}img/file-complete.png" style="vertical-align: middle;"/> Files Completed ({$complete_count})</a></span>
					<table class="content_table"> 
						<tr class="header-centered">
							<th colspan="6" align="center">Files waiting for import</th>
						</tr>
						{foreach item=wifidb_wait from=$wifidb_waiting name=waiting}
						<tr class="header-centered">
							<th class="yellow"></th>
							<th class="header-centered">ID</th>
							<th class="header-centered">Title</th>
							<th class="header-centered">Filename</th>
							<th class="header-centered">Notes</th>
							<th class="header-centered">Date</th>
						</tr>
						<tr style="background-color: {$wifidb_wait.color}">
							<td class="yellow"></td>
							<td class="yellow">{$wifidb_wait.id|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.title|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.file|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.notes|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.date|escape:'htmlall'}</td>
						</tr>
						<tr class="header-centered">
							<th class="yellow"></th>
							<th class="header-centered">Size</th>
							<th class="header-centered">User</th>
							<th class="header-centered">Hash Sum</th>
							<th class="header-centered" colspan="2">Status</th>
						</tr>
						<tr style="background-color: {$wifidb_wait.color}">
							<td class="yellow"></td>
							<td class="yellow">{$wifidb_wait.size|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.user|escape:'htmlall'}</td>
							<td class="yellow">{$wifidb_wait.hash|escape:'htmlall'}</td>
							<td class="yellow" colspan="2">{$wifidb_wait.status|escape:'htmlall'}</td>
						</tr>
						{if not $smarty.foreach.waiting.last}
						<tr class="content-centered">
							<th colspan="6"><br/></th>
						</tr>
						{/if}
						{foreachelse}
						<tr align="center">
							<td class="light-centered colspan="5">
								 Sorry there are no Imports waiting...
							</td>
						</tr>
						{/foreach}
						<tr class="sub_head">
							<td colspan="12" align="center">
							 {$pages_together}
							</td>
						</tr>
					</table>
				</div>
			</div>
{include file="footer.tpl"}