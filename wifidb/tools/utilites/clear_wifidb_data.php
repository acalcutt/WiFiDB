<?php
define("SWITCH_SCREEN", "CLI");
define("SWITCH_EXTRAS", "cli");

require('/etc/wifidb/daemon.config.inc.php');
require( $daemon_config['wifidb_install']."/lib/init.inc.php" );
echo "#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#\r\n";
echo "#~#~#~#~#~#~#~#~#  Clear WiFiDB of all Data?! #~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#\r\n";
echo "#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#~#\r\n";
echo "y/n? : ";
$rep = trim(fgets(STDIN));
if($rep == "y")
{
    echo "clearing files\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`files`");
    #var_dump($dbcore->sql->conn->errorInfo());

	echo "clearing files_tmp\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`files_tmp`");

    echo "clearing files_importing\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`files_importing`");
    #var_dump($dbcore->sql->conn->errorInfo());

    echo "clearing files_bad\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`files_bad`");

    echo "clearing user_imports\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`user_imports`");
    #var_dump($dbcore->sql->conn->errorInfo());

    echo "clearing wifi_gps\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`wifi_gps`");
    #var_dump($dbcore->sql->conn->errorInfo());

    echo "clearing wifi_pointers\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`wifi_pointers`");
    #var_dump($dbcore->sql->conn->errorInfo());

    echo "clearing wifi_signals\r\n";
    $dbcore->sql->conn->query("TRUNCATE `wifi`.`wifi_signals`;");
}else
{
    echo "you chose not to empty the database...\r\n";
}