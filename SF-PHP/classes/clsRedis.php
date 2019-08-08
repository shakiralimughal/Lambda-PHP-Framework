<?php
###############################
# DEVELOPED BY : SHAKIR ALI
##############################

class clsRedis
{
    private $objConnection;
    private $sHostName;
    private $iPortNumber;
    private $sPassword;

    function __construct($sHostName = "localhost",$iPortNumber = 6379,$sPassword = "")
    {
        $this->sHostName = $sHostName;
        $this->iPortNumber = $iPortNumber;
        $this->sPassword = $sPassword;
    }

    private function fnRedisConnectivity()
    {
        include_once __DIR__."/../components/Redis/autoload.php";
        try
        {
            $aConfiguration = array();
            $aConfiguration["scheme"] = "tcp";
            $aConfiguration["host"] = $this->sHostName;
            $aConfiguration["port"] = $this->iPortNumber;
            if($this->sPassword !== "") $aConfiguration["password"] = $this->sPassword;
            $this->objConnection = new Predis\Client($aConfiguration) or die("Failed to connect to Redis");
        }
        catch (Exception $objMessage)
        {
            die("Failed to connect to Redis <br/> Error Message :".$objMessage->getMessage());
        }

    }

    public function SetNode($sKeyName,$sValue)
    {
        $this->fnRedisConnectivity();
        $this->objConnection->set($sKeyName,$sValue);
        return(true);
    }

    public function SetNodeArray($sKeyName,$aValue)
    {
        $this->fnRedisConnectivity();
        $sValue = json_encode($aValue);
        $this->objConnection->set($sKeyName,$sValue);
        return(true);
    }

    public function GetNode($sKeyName)
    {
        $this->fnRedisConnectivity();
        $sValue = $this->objConnection->get($sKeyName);
        return($sValue);
    }

    public function GetNodeArray($sKeyName)
    {
        $this->fnRedisConnectivity();
        $sValue = $this->objConnection->get($sKeyName);
        return(json_decode($sValue,true));
    }

    public function ExistNode($sKeyName)
    {
        $this->fnRedisConnectivity();
        $fVar = $this->objConnection->exists($sKeyName);
        return($fVar);
    }

    public function DeleteNode($sKeyName)
    {
        $this->fnRedisConnectivity();
        $objKeyName = $this->objConnection->keys($sKeyName);
        $fVar = $this->objConnection->del($objKeyName);
        return($fVar);
    }

}

