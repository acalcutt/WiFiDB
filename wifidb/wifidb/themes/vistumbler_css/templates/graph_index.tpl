<!--

Copyright (C) 2011 Phil Ferland,2018 Andrew Calcutt

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
				<div class="center">
					<h2>Graph Signal History</h2>
					<form action="genline.php" method="post" enctype="multipart/form-data">
						<input name="ssid" type="hidden" value="{$AP_data.ssid}">
						<input name="mac" type="hidden" value="{$AP_data.mac}">
						<input name="man" type="hidden" value="{$AP_data.man}">
						<input name="auth" type="hidden" value="{$AP_data.auth}">
						<input name="encry" type="hidden" value="{$AP_data.encry}">
						<input name="radio" type="hidden" value="{$AP_data.radio}">
						<input name="chan" type="hidden" value="{$AP_data.chan}">
						<input name="lat" type="hidden" value="{$AP_data.lat}">
						<input name="long" type="hidden" value="{$AP_data.long}">
						<input name="btx" type="hidden" value="{$AP_data.btx}">
						<input name="otx" type="hidden" value="{$AP_data.otx}">
						<input name="fa" type="hidden" value="{$AP_data.fa}">
						<input name="lu" type="hidden" value="{$AP_data.lu}">
						<input name="nt" type="hidden" value="{$AP_data.nt}">
						<input name="user" type="hidden" value="{$AP_data.user}">
						<input name="sig" type="hidden" value="{$AP_data.sig}">
						<input name="name" type="hidden" value="{$AP_data.name}">							
						<table class="content_table-centered">
							<tr>
								<th class="header">Graph Type</th>
								<td class="light">
									<select name="line" style="height: 22px; width: 139px">
										<option value="bar">Bar (Vertical)</option>
										<option value="line">Line (Horizontal)</option>
									</select>
								</td>
							</tr>
							<tr>
								<th class="header">Text Color:</th>
								<td class="light">
									<select name="text" style="height: 22px; width: 147px">
										<option value="255:000:000">Red</option>
										<option value="000:255:000">Green</option>
										<option value="000:000:255">Blue</option>
										<option value="000:000:000">Black</option>
										<option value="255:255:000">Yellow</option>
										<option value="255:128:000">Orange</option>
										<option value="128:064:000">Brown</option>
										<option value="000:255:255">Sky Blue</option>
										<option value="064:000:128">Purple</option>
										<option value="128:128:128">Grey</option>
										<option value="226:012:243">Pink</option>
										<option value="rand">Random</option>
									</select>

								</td>
							</tr>
							<tr>
								<th class="header">Background Color</th>
								<td class="light">
									<select name="bgc" style="height: 22px; width: 147px">
										<option value="000:000:000">Black</option>
										<option value="255:255:255">White</option>
									</select>

								</td>
							</tr>
							<tr>
								<th class="header">Graph Color:</th>
								<td class="light">
									<select name="linec" style="width: 153px">
										<option value="255:000:000">Red</option>
										<option value="000:255:000">Green</option>
										<option value="000:000:255">Blue</option>
										<option value="000:000:000">Black</option>
										<option value="255:255:000">Yellow</option>
										<option value="255:128:000">Orange</option>
										<option value="128:064:000">Brown</option>
										<option value="000:255:255">Sky Blue</option>
										<option value="064:000:128">Purple</option>
										<option value="128:128:128">Grey</option>
										<option value="226:012:243">Pink</option>
										<option value="rand">Random</option>
									</select>

								</td>
							</tr>
							<tr>
								<td class="light-centered" colspan="2">
									<input name="Submit1" type="submit" value="Generate Graph" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
{include file="footer.tpl"}