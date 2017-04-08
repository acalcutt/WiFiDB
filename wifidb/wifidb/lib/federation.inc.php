<?php

/**
 * Created by PhpStorm.
 * User: pferland
 * Date: 3/20/2016
 * Time: 5:35 PM
 */
class federation
{
    public function __construct(&$dbcore)
    {
        $this->sql                = &$dbcore->sql;
        $this->cli                = &$dbcore->cli;
        $this->mesg               = array();
        $this->DataTypes          = array("users", "userlists", "aps");
        $this->This_is_me         = $dbcore->This_is_me;
        $this->datetime_format    = $dbcore->datetime_format;
        $this->shared_key         = "";
        $this->FedServerID        = 0;
        $this->FedHostURL         = "";
        $this->FedHostSharedKey   = "";
        $this->FedHostApiVer      = "";
    }

    public function GetFedServersList()
    {
        $sql0 = "SELECT `id`, `FriendlyName`, `ServerAddress`, `APIVersion` FROM `federation_servers`";
        $result = $this->sql->conn->query($sql0);
        $this->sql->checkError($result, __LINE__, __FILE__);
        $newArray = $result->fetchAll(2);
        return $newArray;
    }

    public function GetFedUsers()
    {
        $url = $this->FedHostURL."/api/v2/GetData.php?user=fedserver&apikey={$this->FedHostSharedKey}&func=users";

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);

        $result = curl_exec($ch);
        var_dump($result);
        curl_close($ch);
    }

    public function SelectFedServer($id = NULL)
    {
        if($id === NULL)
        {
            return -1;
        }
        $sql = "SELECT * FROM `federation_servers` WHERE `id` = ?";
        $prep = $this->sql->conn->prepare($sql);
        $prep->bindParam(1, $this->FedServerID, PDO::PARAM_INT);
        $result = $prep->execute();
        $return = $result->fetch(2);
        $this->FedHostSharedKey = $return['SharedKeyRemote'];
        $this->FedHostURL = $return['ServerAddress'];
        $this->FedHostApiVer = $return['APIVersion'];
        return 0;
    }

    public function GetFedAPLists()
    {
        $url = 'http://domain.com/get-post.php';
        $fields = array(
            'lname' => urlencode($_POST['last_name']),
            'fname' => urlencode($_POST['first_name']),
            'title' => urlencode($_POST['title']),
            'company' => urlencode($_POST['institution']),
            'age' => urlencode($_POST['age']),
            'email' => urlencode($_POST['email']),
            'phone' => urlencode($_POST['phone'])
        );
        $fields_string = "";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        $result = curl_exec($ch);
        curl_close($ch);
    }

    public function GetUserData($UserID = NULL)
    {
        if($UserID === NULL)
        {
            throw new Exception("UserID is not set.");
        }
        $url = $this->FedHostURL."/api/v2/GetData.php?user=fedserver&apikey={$this->FedHostSharedKey}&func=userdata&userid={$UserID}";

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);

        $result = curl_exec($ch);
        var_dump($result);
        curl_close($ch);
    }

    public function SearchUsers($User = NULL)
    {
        if($User === NULL)
        {
            throw new Exception("UserID is not set.");
        }
        $url = $this->FedHostURL."/api/v2/GetData.php?user=fedserver&apikey={$this->FedHostSharedKey}&func=user&SearchValue={$User}";

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);

        $result = curl_exec($ch);
        var_dump($result);
        curl_close($ch);
    }

    public function GetFedImports()
    {
        $url = $this->FedHostURL."/api/v2/GetData.php?user=fedserver&apikey={$this->FedHostSharedKey}&func=listimports";

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);

        $result = curl_exec($ch);
        var_dump($result);
        curl_close($ch);
    }

    public function GetFedImportData($ImportID = NULL)
    {
        if($ImportID === NULL)
        {
            throw new Exception("UserID is not set.");
        }

        $url = $this->FedHostURL."/api/v2/GetData.php?user=fedserver&apikey={$this->FedHostSharedKey}&func=userimport";

        $ch = curl_init();

        curl_setopt($ch,CURLOPT_URL, $url);

        $result = curl_exec($ch);
        var_dump($result);
        curl_close($ch);
    }


}