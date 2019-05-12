<!--
user_import_aps.tpl, user ap list smarty template.
Copyright (C) 2019 Andrew Calcutt

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; Version 2 of the License.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
-->
{include file="header.tpl"}
			<div class="main">
				<button type="button" id="sidebarCollapse" class="navbar-btn">
					<span></span>
					<span></span>
					<span></span>
				</button>
				<div class="center">
					<table class="content_table">
						<tr class="header">
							<th class="header">ID</th>
							<th class="header">Title</th>
							<th class="header">Filename</th>
							<th class="header">Notes</th>
							<th class="header">Hash</th>
						</tr>
						<tr class="dark">
							<td class="dark">{$wifidb_all_user_aps.id}</td>
							<td class="dark">{$wifidb_all_user_aps.title}</td>
							<td class="dark">{$wifidb_all_user_aps.file}</td>
							<td class="dark">{$wifidb_all_user_aps.notes}</td>
							<td class="dark">{$wifidb_all_user_aps.hash}</td>
						</tr>
					</table>
					<table class="content_table">
						<tr class="header">
							<th class="header">Date</th>
							<th class="header">Size</th>
							<th class="header">APs/GPS Count</th>
							<th class="header">Efficiency</th>
							<th class="header">User(s)</th>

						</tr>
						<tr class="dark">
							<td class="dark">{$wifidb_all_user_aps.date}</td>	
							<td class="dark">{$wifidb_all_user_aps.size}</td>
							<td class="dark">{$wifidb_all_user_aps.aps} - {$wifidb_all_user_aps.gps}</td>
							<td class="dark">{$wifidb_all_user_aps.NewAPPercent}%</td>
							<td class="dark">
								{foreach name=users_all item=user from=$wifidb_all_user_aps.user}
								<a href ="{$wifidb_host_url}opt/userstats.php?func=alluserlists&user={$wifidb_all_user_aps.user}">{$wifidb_all_user_aps.user}</a><br>
								{/foreach}
							</td>
						</tr>
					</table>
					<table class="content_table">
						<tbody>
							<tr class="header">
								<td width="40px"><b>GPS:</b></td>
								<td>
								{if $wifidb_all_user_aps.validgps eq 1}
									<a href="{$wifidb_host_url}opt/map.php?func=user_list&labeled=0&id={$wifidb_all_user_aps.id}" title="Show on Map"><img width="20px" src="{$themeurl}img/globe_on.png"></a>
									<a href="{$wifidb_host_url}api/geojson.php?json=1&func=exp_list&id={$wifidb_all_user_aps.id}" title="Export to JSON"><img width="20px" src="{$themeurl}img/json_on.png"></a>					
									<a href="{$wifidb_host_url}api/export.php?func=exp_list&id={$wifidb_all_user_aps.id}" title="Export to KMZ"><img width="20px" src="{$themeurl}img/kmz_on.png"></a>
								{else}
									<img width="20px" src="{$themeurl}img/globe_off.png">
									<img width="20px" src="{$themeurl}img/json_off.png">
									<img width="20px" src="{$themeurl}img/kmz_off.png">
								{/if}
								</td>
							</tr>
						</tbody>
					</table>
					<br/>
					<table class="content_table">
						<tbody>
							<tr class="header">
								<th class="header" width="75px">
									<div>GPS</div>
									<div><img height="15" width="15" border="0" src="{$themeurl}img/1x1_transparent.gif"></div>
								</th>
								<th class="header">
									<div>New</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=New&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'New' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=New&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'New' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>ID</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=AP_ID&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'AP_ID' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=AP_ID&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'AP_ID' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>SSID</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=SSID&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'SSID' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=SSID&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'SSID' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Mac Address</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=BSSID&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'BSSID' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=BSSID&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'BSSID' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Authentication</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=AUTH&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'AUTH' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=AUTH&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'AUTH' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Encryption</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=ENCR&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'ENCR' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=ENCR&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'ENCR' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Radio Type</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=RADTYPE&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'RADTYPE' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=RADTYPE&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'RADTYPE' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Channel</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=CHAN&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'CHAN' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=CHAN&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'CHAN' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>First Active</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=fa&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'fa' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=fa&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'fa' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Last Active</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=la&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'la' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=la&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'la' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
								<th class="header">
									<div>Points (List / Total)</div>
									<div>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=list_points&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'list_points' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=list_points&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'list_points' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a> / <a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=points&ord=ASC"><img title="Ascending" height="15" width="15" border="0" src="{if $sort == 'points' && $ord == 'ASC'}{$themeurl}img/list_up_sel.png{else}{$themeurl}img/list_up.png{/if}"></a>
										<a href="?func=useraplist&row={$wifidb_all_user_aps.id}&sort=points&ord=DESC"><img title="Descending" height="15" width="15" border="0" src="{if $sort == 'points' && $ord == 'DESC'}{$themeurl}img/list_down_sel.png{else}{$themeurl}img/list_down.png{/if}"></a>
									</div>
								</th>
							</tr>
							{foreach name=outer item=wifidb_users_aps from=$wifidb_all_user_aps.allaps}
							<tr class="{$wifidb_users_aps.class}">
								<td class="{$wifidb_users_aps.class}">
								{if $wifidb_users_aps.validgps eq 1}
									<a href="{$wifidb_host_url}opt/map.php?func=exp_ap&labeled=0&id={$wifidb_users_aps.id}" title="Show on Map"><img width="20px" src="{$themeurl}img/globe_on.png"></a>
									<a href="{$wifidb_host_url}api/geojson.php?json=1&func=exp_ap&id={$wifidb_users_aps.id}" title="Export to JSON"><img width="20px" src="{$themeurl}img/json_on.png"></a>					
									<a href="{$wifidb_host_url}api/export.php?func=exp_ap_netlink&id={$wifidb_users_aps.id}" title="Export to KMZ"><img width="20px" src="{$themeurl}img/kmz_on.png"></a>
								{else}
									<img width="20px" src="{$themeurl}img/globe_off.png">
									<img width="20px" src="{$themeurl}img/json_off.png">
									<img width="20px" src="{$themeurl}img/kmz_off.png">
								{/if}
								</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.un}</td>
								<td class="{$wifidb_users_aps.class}"><a href="{$wifidb_host_url}opt/fetch.php?id={$wifidb_users_aps.id}" title="View AP Details">{$wifidb_users_aps.id}</a></td>
								<td class="{$wifidb_users_aps.class}"><a href="{$wifidb_host_url}opt/fetch.php?id={$wifidb_users_aps.id}" title="View AP Details">{$wifidb_users_aps.ssid}</a></td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.mac}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.auth}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.encry}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.radio}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.chan}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.fa}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.la}</td>
								<td class="{$wifidb_users_aps.class}">{$wifidb_users_aps.list_points|number_format:0} / {$wifidb_users_aps.points|number_format:0}</td>
							</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
{include file="footer.tpl"}