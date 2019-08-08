<?php
###############################
# DEVELOPED BY : SHAKIR ALI
##############################

Class clsDatabase
{
    private $objConnection;
    private $objResult;


    function __construct($sHostName,$sUserName = "", $sPassword = "", $sDatabaseName = "")
    {
        $this->Connection($sHostName,$sUserName,$sPassword,$sDatabaseName);
    }


    function Connection($sHostName,$sUserName,$sPassword,$sDatabaseName)
    {
        $this->objConnection = mysqli_connect($sHostName, $sUserName, $sPassword, $sDatabaseName);
        if (mysqli_connect_errno()) die("Failed to connect to Database: <br/> Error No : ".mysqli_connect_errno()."<br/>Error Message : ".mysqli_connect_error());
        return(true);
    }

    function Close()
    {
        mysqli_close($this->objConnection);
        return(true);
    }

    function Query($sQuery)
    {
        $this->objResult = mysqli_query($this->objConnection,$sQuery) or $this->WriteErrorLog($this->objConnection->error);
        return($this->objResult);
    }

    function RowsNumber($objResult)
    {
        return(mysqli_num_rows($objResult));
    }

    function Result($objResult,$iRowNumber,$sFieldName,$sFieldAlias = "")
    {
        if($objResult->num_rows == 0) return("");
        if($sFieldAlias !== "") $sFieldName = $sFieldAlias.".".$sFieldName;
        if(!mysqli_data_seek($objResult,$iRowNumber)) return("");
        $aFetchAssoc = mysqli_fetch_assoc($objResult);
        if(!is_array($aFetchAssoc)) return("");
        $sReturn = isset($aFetchAssoc[$sFieldName])?$aFetchAssoc[$sFieldName]:"";
        return($sReturn);
    }

    function FetchArray($objResult)
    {
        return(mysqli_fetch_assoc($objResult));
    }

    function FetchRows($objResult)
    {
        return(mysqli_fetch_row($objResult));
    }

    function RealEscapeString($sString)
    {
        if($sString === "") return("");
        return(mysqli_real_escape_string());
    }

    function AffectedRows()
    {
        return(mysqli_affected_rows($this->objConnection));
    }

    function RowsCount($sTableName, $sCondition = "1=1")
    {
        $varResult = $this->Query("SELECT Count(0) AS count FROM $sTableName WHERE $sCondition");
        if ($this->RowsNumber($varResult) > 0)
            return($this->Result($varResult, 0, "count"));
        else
            return(0);
    }

    function QueryWithSingle($sQuery, $sFieldName)
    {
        $varResult = $this->Query($sQuery);
        if ($this->RowsNumber($varResult) > 0)
            return($this->Result($varResult, 0, $sFieldName));
        else
            return("");
    }

    function LastInsertedId()
    {
        return($this->objConnection->insert_id);
    }

    function ErrorNo()
    {
        return($this->objConnection->errno);
    }

    function QueryTransaction($sType = "AUTOCOMMIT",$fEnable = FALSE)
    {
        $sType = strtoupper($sType);
        if($sType === "AUTOCOMMIT") mysqli_autocommit($this->objConnection,$fEnable);
        else if($sType === "ROLLBACK") mysqli_rollback($this->objConnection);
        else if($sType === "COMMIT") mysqli_commit($this->objConnection);

        return(true);
    }


    function WriteErrorLog()
    {
        return(true);
    }



}
