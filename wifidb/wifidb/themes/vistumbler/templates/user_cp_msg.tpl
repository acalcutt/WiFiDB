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
{include file="user_cp_header.tpl"}
<table  BORDER=0 CELLPADDING=0 CELLSPACING=0 style="width: 100%">
	<tr>
		<td colspan="6" class="light">
			{$user_cp_profile.message}
		</td>
	</tr>
</table>
{include file="user_cp_footer.tpl"}
{include file="footer.tpl"}