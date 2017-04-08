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

include('../lib/init.inc.php');

$dbcore->smarty->assign('wifidb_page_label', 'Import Page');
$func = (empty($_GET['func'])) ? "" : $_GET['func'];

$type = "schedule";
$subject = "New WiFiDB Import waiting...";
$mesg = "";

if($dbcore->login_check)
{
    $import_username_field = '<INPUT TYPE=Text DISABLED NAME="user_display" value="'.$GLOBALS['username'].'"/>
    <INPUT TYPE=hidden NAME="user" value="'.$GLOBALS['username'].'">';
}else
{
    $import_username_field = '<INPUT TYPE=TEXT NAME="user" SIZE=28 STYLE="width: 2.42in; height: 0.25in">';
}
if($dbcore->rebuild === 0)
{
    $import_button = '<INPUT TYPE=SUBMIT NAME="submit" VALUE="Submit" STYLE="width: 0.71in; height: 0.36in"></P>';
}else
{
    $import_button = "The database is in rebuild mode, please wait...";
}
if(@$dbcore->username == 'admin')
{
    $mesg = "<h2>The Built-in Administrator user is not allowed to import, please create a user to do that.</h2>";
}else
{
    $mesg = '';
}
$dbcore->smarty->assign('import_button', $import_button);
$dbcore->smarty->assign('import_username_field', $import_username_field);

//Switchboard for import file or index form to upload file
switch($func)
{
    case 'import': //Import file that has been uploaded
        if($_FILES['file']['tmp_name'] === "")
        {
            $mesg .= "Failure... File not supplied. Try one of the <a href=\"https://github.com/RIEI/Vistumbler/wiki\" >supported file types.</a>";
            break;
        }
        $title = (empty($_POST['title'])) ? "Untitled" : $_POST['title'];
        $notes = (empty($_POST['notes'])) ? "No Notes" : $_POST['notes'];
        $user = (empty($_POST['user'])) ? "Unknown" : $_POST['user'];
        $otherusers = (empty($_POST['otherusers'])) ? "" : $_POST['otherusers'];
        $sql = "SELECT `username` FROM `user_info` WHERE `username` LIKE ?";
        $stmt = $dbcore->sql->conn->prepare($sql);
        $stmt->bindParam(1, $user, PDO::PARAM_STR);
        if($dbcore->sql->checkError( $stmt->execute(), __LINE__, __FILE__) !== 0)
        {
            $mesg = "Failure to select users from table.";
            break;
        }
        $array = $stmt->fetch(2);
        if($array['username'] == $dbcore->sec->username and $dbcore->login_check)
        {
            $mesg .= "<h2>You need to be logged in to import to a user that has a login.<br> Go <a class='links' href='".$GLOBALS['hosturl']."login.php?return=/import/'>login</a> and then import again.</h2>";
        }else
        {
            $tmp            =   $_FILES['file']['tmp_name'];
            $upfilename     =   $_FILES['file']['name'];
            $prefilename    =   str_replace( " ", "_", $upfilename);
            $file_ext       =   explode('.', $prefilename);
            $ext            =   strtolower($file_ext[1]);
            $rand           =   rand(00000000, 99999999);
            $filename       =   $rand.'_'.$prefilename;
            $uploadfolder   =   getcwd().'/up/';
            $uploadfile     =   $uploadfolder.$filename;

            switch(strtolower($ext))
            {
                case "vs1":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "txt":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "vsz":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "vscz":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "csv":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "db3":
                    $ext_fail = 0;
                    $task = "import";
                break;
                case "db":
                    $ext_fail = 0;
                    $task = "import";
                    break;
                default:
                    $ext_fail = 1;
                    $task = "";
                break;
            }

            switch($task)
            {
                case "import":
                    if (!copy($tmp, $uploadfile))
                    {
                        $mesg .= 'Failure to Move file to Upload Dir ('.$uploadfolder.'), check the folder permisions if you are using Linux.<BR>';
                        $message = "Failure to Move file to Upload Dir ('.$uploadfolder.'), check the folder permisions if you are using Linux.\r\nUser: $user\r\nTitle: $title\r\nFile: /import/up/$rand.'_'.$filename\r\n\r\n-WiFiDB Daemon.\r\n There was an error inserting file for schedualing.\r\n\r\n";
                        #$dbcore->mail->mail_admins($message, $subject, $type);
                    }
                    else
                    {
                        chmod($uploadfile, 0600);
                        $hash = hash_file('md5', $uploadfile);
                        $filesize = filesize($uploadfile);

                        $size = $dbcore->format_size($filesize);
                        $mesg .= "<h1>Title: ".$title."</h1>";
                        $mesg .= "<h1>Imported By: ".$user."<BR></h1>";
                        if($otherusers)
                        {
                            $mesg .= "<h3>With help from: ".$otherusers."<BR></h3>";
                        }
                        //lets try a scheduled import table that has a cron job
                        //that runs and imports all of them at once into the DB
                        //in order that they where uploaded
                        $date = date("y-m-d H:i:s");
                        if($user[-1] == "|")
                        {
                            $user = str_replace("|", "", $user);
                        }else
                        {
                            $user = explode("|", $user)[0];
                        }
                        $sql = "INSERT INTO `files_tmp`
                                        ( `id`, `file`, `date`, `user`, `notes`, `title`, `size`, `hash`  )
                                 VALUES ( '',     ?,      ?,      ?,      ?,        ?,      ?,      ?)";
                        $result = $dbcore->sql->conn->prepare( $sql );
                        $all_users = $user."|".$otherusers;
                        $result->bindValue(1, $filename, PDO::PARAM_STR);
                        $result->bindValue(2, $date, PDO::PARAM_STR);
                        $result->bindValue(3, $all_users, PDO::PARAM_STR);
                        $result->bindValue(4, $notes, PDO::PARAM_STR);
                        $result->bindValue(5, $title, PDO::PARAM_STR);
                        $result->bindValue(6, $size, PDO::PARAM_STR);
                        $result->bindValue(7, $hash, PDO::PARAM_STR);
                        if($dbcore->sql->checkError( $result->execute(), __LINE__, __FILE__) === 0 && $dbcore->sql->conn->lastInsertId() != 0)
                        {
                            $mesg .= "<h2>File has been inserted for importing at a scheduled time. Import Number: {$dbcore->sql->conn->lastInsertId()}</h2>";
                            $message = "File has been inserted for importing at a later time at a scheduled time.\r\nUser: $user\r\nTitle: $title\r\nFile: ".$dbcore->URL_PATH."/import/up/".$rand."_".$filename."\r\n".$dbcore->URL_PATH."/opt/scheduling.php\r\n\r\n-WiFiDB Daemon.";
                            #if($dbcore->mail_users($message, $subject, $type))
                            #{
                                #echo "mailed";
                            #}else
                            #{
                                #echo "Failed to Mail";
                            #}
                        }elseif($dbcore->sql->checkError() === 0 && $dbcore->sql->conn->lastInsertId() == 0)
                        {
                            $mesg .= "<h2>File has already been inserted</h2>";
                        }else
                        {
                            $mesg .= "<h2>There was an error inserting file for scheduled import.</h2>".var_export($dbcore->sql->conn->errorInfo());
                            $message = "New Import Failed!\r\nUser: $user\r\nTitle: $title\r\nFile: ".$dbcore->PATH."/import/up/$rand.'_'.$filename\r\n\r\n-WiFiDB Daemon.\r\n There was an error inserting file for schedualing.\r\n\r\n";
                            #$dbcore->mail_admins($message, $subject, $type);
                        }
                    }
                break;

                default:
                    $mesg .= "Failure.... File is not supported. Try one of the <a href=\"https://github.com/RIEI/Vistumbler/wiki\" >supported file types.</a>";
                    $message = "Unsupported file type was attempted to be uploaded... $upfilename\r\n\r\n";
                    #$dbcore->mail_admins($message, $subject, $type);
                break;
            }
        }
        break;
    #----------------------
    default: //index page that has form to upload file
        if (isset($_GET['file']))
        {
            $file_imp = str_replace('\\\\', '\\', $_GET['file']);
            echo "<h2>Due to security restrictions in current browsers, file fields cannot have dynamic content, <br> The file that you are trying to import via Vistumbler Is <br>Here: <b><u>".$file_imp."</u></b><br>Copy and Paste the underlined text into the file location field to import it.<br></h2>";
        }
        break;
}
$dbcore->smarty->assign('mesg', $mesg);
$dbcore->smarty->display('import_index.tpl');