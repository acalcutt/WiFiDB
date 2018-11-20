<?php
class SQL
{
	function __construct($config)
	{
		$this->host			  = $config['host'];
		$this->service		   = $config['srvc'];
		$this->database       = $config['db'];
		$dsn					 = $this->service.':host='.$this->host;
		if($this->service === "mysql")
		{
			$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_PERSISTENT => TRUE,
			);
		}
		else
		{
			$options = array(
				PDO::ATTR_PERSISTENT => TRUE,
			);
		}
		$this->conn = new PDO($dsn, $config['db_user'], $config['db_pwd'], $options);
		$this->conn->query("USE `$this->database`");
		$this->conn->query("SET NAMES 'utf8'");
	}

	function checkError($line=0, $file="")
	{
		$err = $this->conn->errorCode();
		if($err === "00000")
		{
			return 0;
		}else
		{
			throw new ErrorException("There was an error running the SQL statement: ".var_export($this->conn->errorInfo() ,1)."\r\nLine: $line\r\nFile: $file");
			return 1;
		}
	}
}
