<?php
error_reporting(0);
@ini_set('display_errors', 0);
/*
Copyright (C) 2015 Andrew Calcutt

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; Version 2 of the License.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
*/
define("SWITCH_SCREEN", "HTML");
define("SWITCH_EXTRAS", "api");

include('../lib/init.inc.php');

if((int)@$_REQUEST['all'] === 1){$all = 1;}else{$all = 0;}#Show both old and new access points. by default only new APs are shown.
if((int)@$_REQUEST['new_icons'] === 1){$new_icons = 1;}else{$new_icons = 0;}#use new AP icons instead of old AP icons in kml file. by default old icons are shown.
if((int)@$_REQUEST['labeled'] === 1){$labeled = 1;}else{$labeled = 0;}#Show AP labels in kml file. by default labels are not shown.
if((int)@$_REQUEST['xml'] === 1){$xml = 1;}else{$xml = 0;}#output xml/kml insteand of creating a kmz. by default a kmz is created.
if((int)@$_REQUEST['debug'] === 1){$debug = 1;}else{$debug = 0;}#output extra debug stuff
$func=$_REQUEST['func'];
switch($func)
{
		case "exp_history_netlink":
			$date = (empty($_REQUEST['date'])) ? date($dbcore->export->date_format) : $_REQUEST['date'];
			$date_url = $dbcore->URL_PATH.'out/daemon/'.$date.'/';

			$daily_link = $dbcore->createKML->createNetworkLink($date_url.'daily_db.kmz', "Daily DB Export (No Label)", 1, 0, "onInterval", 3600).
				$dbcore->createKML->createNetworkLink($date_url.'daily_db_label.kmz', "Daily DB Export (Label)", 0, 0, "onInterval", 3600);
			$daily_folder = $dbcore->createKML->createFolder("WifiDB Daily DB Export", $daily_link, 1, 1);
			
			$full_link = $dbcore->createKML->createNetworkLink($date_url.'full_db.kmz', "Full DB Export (No Label)", 1, 0, "onInterval", 86400).
				$dbcore->createKML->createNetworkLink($date_url.'full_db_label.kmz', "Full DB Export (Label)", 0, 0, "onInterval", 86400);
			$full_folder = $dbcore->createKML->createFolder("WifiDB Full DB Export", $full_link, 1, 1);

			$results = $daily_folder.$full_folder;#.$archive_folder;
			$results = $dbcore->createKML->createKMLstructure($date." Network Link", $results);
			$file_name = "Combined_NetworkLink_".$date.".kmz";
			break;

		case "exp_combined_netlink":
			$results = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_latest_netlink&#x26;debug='.$debug, "Newest AP", 1, 0, "onChange", 86400, 1);
			$results .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_daily_netlink&#x26;debug='.$debug, "Daily APs", 1, 0, "onChange", 86400, 1);
			$results .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_all_netlink&#x26;debug='.$debug, "All APs", 0, 0, "onChange", 86400, 1);
			$results = $dbcore->createKML->createKMLstructure("Combined Network Link", $results);
			$file_name = "Combined_NetworkLink_Latest.kmz";
			break;
			
		case "exp_all_netlink":
			$Full = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_all&#x26;labeled=0&#x26;all=0&#x26;new_icons=0&#x26;debug='.$debug, "All Exports (No Label)", 1, 0, "onInterval", 86400, 1);
			$Full_Labeled = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_all&#x26;labeled=1&#x26;all=0&#x26;new_icons=0&#x26;debug='.$debug, "All Exports (Label)", 0, 0, "onInterval", 86400, 1);
			$results = $dbcore->createKML->createKMLstructure("All Exports Network Link", $Full.$Full_Labeled);
			if($labeled){$file_name = "All_Export_Labeled_NetworkLink.kmz";}else{$file_name = "All_Export_NetworkLink.kmz";}
			break;

		case "exp_daily_netlink":
			$Daily = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_daily&#x26;labeled=0&#x26;all=1&#x26;new_icons=1&#x26;debug='.$debug, "Daily AP (No Label)", 1, 0, "onInterval", 3600, 1);
			$Daily_Labeled = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_daily&#x26;labeled=1&#x26;all=1&#x26;new_icons=1&#x26;debug='.$debug, "Daily AP (Label)", 0, 0, "onInterval", 3600, 1);
			$results = $dbcore->createKML->createKMLstructure("Daily Exports Network Link", $Daily.$Daily_Labeled);
			if($labeled){$file_name = "Daily_Export_Labeled_NetworkLink.kmz";}else{$file_name = "Daily_Export_NetworkLink.kmz";}
			break;

		case "exp_latest_netlink":
			$Newest_FT = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_latest&#x26;labeled=0&#x26;new_icons=1&#x26;debug='.$debug, "Newest AP w/ Fly To (No Label)", 0, 1, "onInterval", 60, 1);
			$Newest_Labeled_FT = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_latest&#x26;labeled=1&#x26;new_icons=1&#x26;debug='.$debug, "Newest AP w/ Fly To (Label)", 1, 1, "onInterval", 60, 1);
			$Newest = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_latest&#x26;labeled=0&#x26;new_icons=1&#x26;debug='.$debug, "Newest AP (No Label)", 0, 0, "onInterval", 60, 1);
			$Newest_Labeled = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_latest&#x26;labeled=1&#x26;new_icons=1&#x26;debug='.$debug, "Newest AP (Label)", 0, 0, "onInterval", 60, 1);
			$results = $dbcore->createKML->createKMLstructure("Latest AP Network Link", $Newest_FT.$Newest_Labeled_FT.$Newest.$Newest_Labeled);
			if($labeled){$file_name = "Latest_Labeled_NetworkLink.kmz";}else{$file_name = "Latest_NetworkLink.kmz";}
			break;
			
		case "exp_user_netlink":
			$user = ($_REQUEST['user'] ? $_REQUEST['user'] : die("User value is empty"));
			$results = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_user_all&#x26;user='.$user.'&#x26;labeled='.$labeled.'&#x26;all='.$all.'&#x26;new_icons='.$new_icons.'&#x26;debug='.$debug, $user, 1, 0, "onInterval", 86400);
			$user_fn = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $user);
			$title = $user."'s Network Link";
			$results = $dbcore->createKML->createKMLstructure($title , $results);
			$user_fn = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $user);
			if($labeled){$file_name = $user_fn."NetworkLink_Labeled.kmz";}else{$file_name = $user_fn."_NetworkLink.kmz";}
			break;
			
		case "exp_ap_netlink":
			$id = (int)($_REQUEST['id'] ? $_REQUEST['id']: 0);
			#Get SSID
			$sql = "SELECT ssid FROM `wifi_pointers` WHERE `id` = '$id' And `lat` != '0.0000'";
			$prep = $dbcore->sql->conn->prepare($sql);
			$prep->bindParam(1, $row, PDO::PARAM_INT);
			$prep->execute();
			$dbcore->sql->checkError(__LINE__, __FILE__);
			$fetch = $prep->fetch();
			$title = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $fetch['ssid'].'-'.$id);
			#Create Network Link
			$results = $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_ap&#x26;id='.$id.'&#x26;labeled='.$labeled.'&#x26;all='.$all.'&#x26;new_icons='.$new_icons.'&#x26;debug='.$debug, $title, 1, 0, "onInterval", 86400);
			$results = $dbcore->createKML->createKMLstructure($title , $results);
			if($labeled){$file_name = $title."NetworkLink_Labeled.kmz";}else{$file_name = $title."_NetworkLink.kmz";}
			break;
			
		case "exp_all":
			$sql = "SELECT DISTINCT(username) FROM `user_imports` WHERE `points` != '' ORDER BY `username` ASC";
			$prep = $dbcore->sql->conn->prepare($sql);
			$prep->execute();
			$fetch_user = $prep->fetchAll();
			$results="";
			foreach($fetch_user as $user)
			{
				$username = $user['username'];
				$sql = "SELECT `id` FROM `wifi_pointers` WHERE `username` LIKE '$username' And `lat` != '0.0000' AND `mac` != '00:00:00:00:00:00' LIMIT 1";
				$result = $dbcore->sql->conn->query($sql);
				if($result->rowCount() > 0)
				{
					#valid results found, add network link for this user
					$results .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_user_all&#x26;user='.$username.'&#x26;labeled='.$labeled.'&#x26;all='.$all.'&#x26;new_icons='.$new_icons.'&#x26;debug='.$debug, $username, 1, 0, "onChange", 86400);
				}
			}
			
			if($results == ""){$results = $dbcore->createKML->createFolder("No Exports with GPS", $results, 0);}else{$results = $dbcore->createKML->createFolder("All Exports", $results, 0);}
			$results = $dbcore->createKML->createKMLstructure("All Exports", $results);
			if($labeled){$file_name = "All_Exports_Labeled.kmz";}else{$file_name = "All_Exports.kmz";}
			break;

		case "exp_daily":
			if(!empty($_REQUEST['date']))
			{
				$date = $_REQUEST['date'];
			}
			else
			{	
				#Get the date of the newest import
				$sql = "SELECT `date` FROM `user_imports` ORDER BY `date` DESC LIMIT 1";
				$date_query = $dbcore->sql->conn->query($sql);
				$date_fetch = $date_query->fetch(2);
				$datestamp = $date_fetch['date'];
				$datestamp_split = explode(" ", $datestamp);
				$date = $datestamp_split[0];
			}
			$date = (empty($date)) ? date($dbcore->export->date_format) : $date;
			
			#Get lists from the date specified
			$date_search = $date."%";
			$sql = "SELECT `id` , `points`, `username`, `title`, `date` FROM `user_imports` WHERE `date` LIKE '$date_search' AND `points` != ''";
			$prep = $dbcore->sql->conn->prepare($sql);
			$prep->execute();
			$fetch_imports = $prep->fetchAll();
			$results="";
			foreach($fetch_imports as $import)
			{
				$Export_List = 0;
				$box_latlon = array();
				#Check is list has access points with gps and non blank mac
				$stage_pts = explode("-", $import['points']);
				foreach($stage_pts as $point)
				{
					list($id, $new_old) = explode(":", $point);
					if($new_old == 1){continue;}
					$sql = "SELECT `lat`, `long` FROM `wifi_pointers` WHERE `id` = '$id' And `lat` != '0.0000' AND `mac` != '00:00:00:00:00:00'";
					$result = $dbcore->sql->conn->query($sql);
					while($latlon_fetch = $result->fetch(2))
					{
						#Add gps to region array
						$latlon_info = array(
						"lat" => $latlon_fetch['lat'],
						"long" => $latlon_fetch['long'],
						);
						$box_latlon[] = $latlon_info;

						#Set List to be exported
						$Export_List = 1;
					}
				}
				if($Export_List)
				{
					#Create Region Box
					$final_box = $dbcore->export->FindBox($box_latlon);
					list($distance_calc, $minLodPix, $distance) = $dbcore->export->distance($final_box[0], $final_box[2], $final_box[1], $final_box[3], "K"); # North, East, South, West
					$KML_region = $dbcore->createKML->PlotRegionBox($final_box, $distance_calc, $minLodPix, uniqid());
					
					#valid results found, add network link and exit check
					$results .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_list&#x26;row='.$import['id'].'&#x26;labeled='.$labeled.'&#x26;all='.$all.'&#x26;new_icons='.$new_icons.'&#x26;debug='.$debug, $import['id'].'_'.$import['title'], 1, 0, "onChange", 86400, 0, $KML_region);
				}
			}
			
			if($results == ""){$results = $dbcore->createKML->createFolder("No Daily Exports with GPS", $results, 0);}else{$results = $dbcore->createKML->createFolder("Daily Exports", $results, 0);}
			$results = $dbcore->createKML->createKMLstructure("Daily Exports", $results);
			if($labeled){$file_name = "Daily_Exports_Labeled.kmz";}else{$file_name = "Daily_Exports.kmz";}
			break;
			
		case "exp_latest":
			$results = $dbcore->export->ExportCurrentAP($labeled, $new_icons);
			#if($results==""){$results = $dbcore->createKML->createFolder("No Access Points Found", "", 0, 0);}
			if($labeled){$results = $dbcore->createKML->createKMLstructure("Newest AP Labeled", $results);}else{$results = $dbcore->createKML->createKMLstructure("Newest AP", $results);}
			if($labeled){$file_name = "Latest_Labeled.kmz";}else{$file_name = "Latest.kmz";}
			break;

		case "exp_user_all":
			$user = ($_REQUEST['user'] ? $_REQUEST['user'] : die("User value is empty"));
			$sql = "SELECT `id`, `points`, `username`, `title`, `date` FROM `user_imports` WHERE `username` LIKE ? AND `points` != ''";
			$prep = $dbcore->sql->conn->prepare($sql);
			$prep->bindParam(1, $user, PDO::PARAM_STR);
			$prep->execute();
			$fetch_imports = $prep->fetchAll();
			$results="";
			$list_count = 0;
			foreach($fetch_imports as $import)
			{
				$Export_List = 0;
				$box_latlon = array();
				#Check is list has access points with gps and non blank mac
				$stage_pts = explode("-", $import['points']);
				foreach($stage_pts as $point)
				{
					list($id, $new_old) = explode(":", $point);
					if($new_old == 1){continue;}
					$sql = "SELECT `lat`, `long` FROM `wifi_pointers` WHERE `id` = '$id' And `lat` != '0.0000' AND `mac` != '00:00:00:00:00:00'";
					$result = $dbcore->sql->conn->query($sql);
					while($latlon_fetch = $result->fetch(2))
					{
						#Add gps to region array
						$latlon_info = array(
						"lat" => $latlon_fetch['lat'],
						"long" => $latlon_fetch['long'],
						);
						$box_latlon[] = $latlon_info;

						#Set List to be exported
						$Export_List = 1;
					}
				}
				if($Export_List)
				{
					#Create Region Box
					$final_box = $dbcore->export->FindBox($box_latlon);
					$KML_region = $dbcore->createKML->PlotRegionBox($final_box, uniqid());					
					
					#valid results found, add network link and exit check
					$results .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_list&#x26;row='.$import['id'].'&#x26;labeled='.$labeled.'&#x26;all='.$all.'&#x26;new_icons='.$new_icons.'&#x26;debug='.$debug, $import['id'].'_'.$import['title'], 1, 0, "onChange", 86400, 0, $KML_region);
					
			
					
					#Increment number of lists
					++$list_count;
				}
			}
			
			if($results == ""){$results .= $dbcore->createKML->createFolder("No User Exports with GPS", $results, 0);}
			
			$user_fn = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $import['username']);
			$results = $dbcore->createKML->createKMLstructure("$user_fn AP's ( $list_count Files)", $results);
			if($labeled){$file_name = $user_fn."_Labeled.kmz";}else{$file_name = $user_fn.".kmz";}
			break;
			
		case "exp_list":
			$row = (int)($_REQUEST['row'] ? $_REQUEST['row']: 0);
			$sql = "SELECT * FROM `user_imports` WHERE `id` = ?";
			$prep = $dbcore->sql->conn->prepare($sql);
			$prep->bindParam(1, $row, PDO::PARAM_INT);
			$prep->execute();
			$dbcore->sql->checkError(__LINE__, __FILE__);
			$fetch = $prep->fetch();
			$title = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $fetch['title']);
			
			if($all){$only_new = 0;}else{$only_new = 1;}
			$results = "";
			$KML_Box = "";
			$ListKML = $dbcore->export->UserList($fetch['points'], $labeled, $only_new, $new_icons);
			if($ListKML['data'] !== "")
			{
				$final_box = $dbcore->export->FindBox($ListKML['box']);
				$KML_Region = $dbcore->createKML->PlotRegionBox($final_box, uniqid());
				$results = $dbcore->createKML->createFolder($title, $KML_Region.$ListKML['data'], 0);
				If($debug)
				{
					$KML_Box = $dbcore->createKML->minLodPixels($final_box, 0);
					$results .= $dbcore->createKML->createFolder("minLodPixels Box", $KML_Box, 0, 0, 0);
				}
			}
			else
			{
				$results = $dbcore->createKML->createFolder("No APs with GPS", $results, 0);
				$results .= $dbcore->createKML->createFolder($title, $results, 0);
			}
			$results = $dbcore->createKML->createKMLstructure($title, $results);
			if($labeled){$file_name = $title."_Labeled.kmz";}else{$file_name = $title.".kmz";}
			break;

		case "exp_ap":
			$id = (int)($_REQUEST['id'] ? $_REQUEST['id']: 0);
			
			#Get the AP Center point
			list($results, $export_ssid) = $dbcore->export->ExportSingleAp($id, $labeled, $new_icons);
			
			#Get the AP Signal History
			$KML_Signal_data = "";
			# -Get the AP hash-
			$sql = "SELECT `ap_hash` FROM `wifi`.`wifi_pointers` WHERE `id` = ?";
			$prep_hash = $dbcore->sql->conn->prepare($sql);
			$prep_hash->bindParam(1, $id, PDO::PARAM_INT);
			$prep_hash->execute();
			$fetch_hash = $prep_hash->fetch(2);
			$ap_hash = $fetch_hash['ap_hash'];
			
			# -Get Unique Lists-
			$sql = "SELECT DISTINCT(file_id) FROM `wifi_signals` WHERE `ap_hash` = ? ORDER BY `file_id`";
			$prep_file_id = $dbcore->sql->conn->prepare($sql);
			$prep_file_id->bindParam(1, $ap_hash, PDO::PARAM_STR);
			$prep_file_id->execute();
			$fetch_file_id = $prep_file_id->fetchAll();
			foreach($fetch_file_id as $file_id)
			{
				$file_id = $file_id['file_id'];
				$Export_List = 0;
				$box_latlon = array();
				# -Get Import Name-
				$sql = "SELECT `title`, `date` FROM `user_imports` WHERE `file_id` = ?";
				$prep_title = $dbcore->sql->conn->prepare($sql);
				$prep_title->bindParam(1, $file_id, PDO::PARAM_INT);
				$prep_title->execute();
				$fetch_title = $prep_title->fetch(2);
				$ap_list_title = $fetch_title['title'];
				$ap_list_date = $fetch_title['date'];
				# -Get latitudes and longitudes to draw region box-
				$sql = "SELECT
						  `wifi_gps`.`lat` AS `lat`, `wifi_gps`.`long` AS `long`
						FROM `wifi`.`wifi_signals`
						  LEFT JOIN `wifi`.`wifi_gps` ON `wifi_signals`.`gps_id` = `wifi_gps`.`id`
						WHERE `wifi_signals`.`ap_hash` = '$ap_hash' AND `wifi_signals`.`file_id` = '$file_id' AND `wifi_gps`.`lat` != '0.0000'";
						
				$result = $dbcore->sql->conn->query($sql);
				while($latlon_fetch = $result->fetch(2))
				{
					# -Add gps to region array-
					$latlon_info = array(
					"lat" => $latlon_fetch['lat'],
					"long" => $latlon_fetch['long'],
					);
					$box_latlon[] = $latlon_info;

					# -Set List to be exported-
					$Export_List = 1;
				}
				
				if($Export_List)
				{
					# -Create Region Box-
					$final_box = $dbcore->export->FindBox($box_latlon);
					$KML_region = $dbcore->createKML->PlotRegionBox($final_box, uniqid());
					
					# -Create Network Link to Signal History-
					$KML_Signal_data .= $dbcore->createKML->createNetworkLink($dbcore->URL_PATH.'api/export.php?func=exp_list_ap_signal&#x26;row='.$file_id.'&#x26;id='.$id, $file_id.' - '.$ap_list_title.' - '.$ap_list_date, 1, 0, "onChange", 86400, 0, $KML_region);
				}
			}			
			if($KML_Signal_data == ""){$KML_Signal_data .= $dbcore->createKML->createFolder("No Signal History", $KML_Signal_data, 0);}
			$results .= $dbcore->createKML->createFolder("Signal History", $KML_Signal_data, 1);
			$title = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $id."-".$export_ssid);
			$results = $dbcore->createKML->createKMLstructure($title, $results);
			if($labeled){$file_name = $title."_Labeled.kmz";}else{$file_name = $title.".kmz";}
			break;
			
		case "exp_list_ap_signal":
			$row = (int)($_REQUEST['row'] ? $_REQUEST['row']: 0);
			$id = (int)($_REQUEST['id'] ? $_REQUEST['id']: 0);
			
			#Get AP Name
			$sql = "SELECT `ssid` FROM `wifi`.`wifi_pointers` WHERE `id` = ?";
			$prep_name = $dbcore->sql->conn->prepare($sql);
			$prep_name->bindParam(1, $id, PDO::PARAM_INT);
			$prep_name->execute();
			$ap_array = $prep_name->fetch(2);
			$ap_name = $ap_array['ssid'];
			
			#Get List Title 
			$sql = "SELECT `title`, `date` FROM `user_imports` WHERE `file_id` = ?";
			$prep_title = $dbcore->sql->conn->prepare($sql);
			$prep_title->bindParam(1, $row, PDO::PARAM_INT);
			$prep_title->execute();
			$fetch_title = $prep_title->fetch(2);
			$ap_list_title = $fetch_title['title'];
			
			#Get List AP Signal History
			$KML_Signal_data = $dbcore->export->ExportSignal3dSingleListAp($row, $id, 0);
			$results = $dbcore->createKML->createFolder("Signal History", $KML_Signal_data, 1);
			$title = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $row."-".$ap_list_title."-".$id."-".$ap_name);
			$results = $dbcore->createKML->createKMLstructure($title, $results);
			if($labeled){$file_name = $title."_Labeled.kmz";}else{$file_name = $title.".kmz";}
			break;

		default:
			echo 'No function or incorrect function has been given...what am I supposed to do with this request?';
			die();
}

if($xml)
{
	header("Content-type: text/xml");
}
else
{
	$dbcore->Zip->addFile($results, 'doc.kml');
	$results = $dbcore->Zip->getZipData();
	$download = (empty($_REQUEST['download'])) ? $file_name : $_REQUEST['download'];#Override export filename if set
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.$download.'"');
}
echo $results;