#!/usr/bin/php
<?php
/*
daemon_prep.php
Copyright (C) 2015 Andrew Calcutt, based on imp_expd.php by Phil Ferland.
Used to prepare for a recovery import. Will take filenames.txt that is a | seperated file that was generated with filenames_create.php as a psudo-backup, as long as you have the import files still.

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; Version 2 of the License.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
*/
define("SWITCH_SCREEN", "CLI");
define("SWITCH_EXTRAS", "daemon");

if(!(require('/etc/wifidb/daemon.config.inc.php'))){die("You need to create and configure your config.inc.php file in the [tools dir]/daemon/config.inc.php");}
if($daemon_config['wifidb_install'] == ""){die("You need to edit your daemon config file first in: [tools dir]/daemon/config.inc.php");}
require $daemon_config['wifidb_install']."/lib/init.inc.php";

$arguments = $dbcore->parseArgs($argv);

if(@$arguments['v'])
{
	$dbcore->verbose = 1;
}
else
{
	$dbcore->verbose = 0;
}

$lastedit="2013.04.28";
$start="2008.05.23";
$ver="2.0";
$i=0;

$TOTAL_START = date("Y-m-d H:i:s");

echo "\n==-=-=-=-=-=- WiFiDB VS1 Daemon Prep Script -=-=-=-=-=-==
Version: ".$ver."
Last Edit: ".$lastedit."\n";
$vs1dir = $dbcore->PATH."import/up/";

if (!file_exists($vs1dir))
{
    echo "You need to put some files in a folder named 'vs1' first.
Please do this first then run this again.
    Dir:".$vs1dir;
    die();
}
// self aware of Script location and where to search for Txt files

echo "Directory: ".$vs1dir."\r\n";
#Lets parse out the filenames file.
echo "Parsing Filenames.txt\r\n";
$filenames = @file("filenames.txt");
if(!is_null(@$filenames[0]))
{
    foreach(@$filenames as $filen)
    {
        if($filen[0] == "#"){continue;}
        $filen_e = explode("|", $filen);
        if(count($filen_e)==1){continue;}
        $file_names[$filen_e[0]] = array("hash" => $filen_e[0], "file"=>$filen_e[1],"user"=>$filen_e[2],"title"=>$filen_e[3],"date"=>$filen_e[4],"notes"=>$filen_e[5]);
    }
}else
{
    $file_names = array();
}
var_dump("Files in filenames.txt: ".count($file_names));
#die();
// Go through the VS1 folder and grab all the VS1 and tmp files
// I included tmp because if you dont tell PHP to rename a file on upload to a website, it will give it a random name with a .tmp extension
echo "Going through the import/up folder for the source files...\r\n";
$file_a = array();
$dh = opendir($vs1dir) or die("couldn't open directory");
#$ii = 0;
$i = 0;
$bad_ext = 0;
while (!(($file = readdir($dh)) == false))
{
    #$ii++;
    if($file == '.'){continue;}
	if($file == '..'){continue;}

    if ((is_file("$vs1dir/$file")))
    {
        $file_e = explode('.',$file);
        $file_max = count($file_e);
        $fileext = strtolower($file_e[$file_max-1]);
        if ($fileext=='vs1' or $fileext=="db3" or $fileext=="csv" or $fileext=="db" or $fileext=="vsz")
        {
        	$ret = $dbcore->insert_file($file, @$file_names);
            if($ret)
            {
                echo $i." +++ ".$file."\r\n";
                $file_a[] = $file; //if Filename is valid, throw it into an array for later use
                $i++;
            }else
            {
                #echo $i." --- ".$file."\r\n";
                #$dbcore->verbosed("No good... Blehk.\r\n");
            }
        }else
        {
        	$bad_ext++;
            $dbcore->verbosed("EXT: ".$fileext."\r\n");
            $dbcore->verbosed("File not supported -->$file\r\n");
            $dbcore->logd("( ".$file." ) is not a supported file extention of ".$file_e[$file_max-1]."\r\n If the file is a txt file run it through the converter first.\r\n\r\n");
            continue;
        }
    }else
    {
        #echo $file."\r\n";
        continue;
    }
    #$i++;
}
closedir($dh);

var_dump("Imported Files: ".count($file_a));
var_dump("Bad Files: ".$bad_ext);
$TOTAL_END = date("Y-m-d H:i:s");
$dbcore->verbosed("TOTAL Running time::\n\nStart: ".$TOTAL_START."\nStop : ".$TOTAL_END."\n");