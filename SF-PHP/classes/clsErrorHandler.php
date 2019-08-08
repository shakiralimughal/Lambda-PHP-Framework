<?php

# ######################################
# PHP General Functions Class
# by Shakir Ali : shakiraliswe@gmail.com
# ######################################


# REQUIRED PHP HEADERS FOR DEBUG SET ALL TO 1
/*ini_set("assert.warning", "1");
ini_set("display_errors", cErrorDisplay);
ini_set("display_startup_errors", "1");
ini_set("html_errors", "1");*/

# ERROR Handler Definitions
define('E_USER_ALL',    E_USER_NOTICE | E_USER_WARNING | E_USER_ERROR);
define('E_NOTICE_ALL',  E_NOTICE | E_USER_NOTICE);
define('E_WARNING_ALL', E_WARNING | E_USER_WARNING | E_CORE_WARNING | E_COMPILE_WARNING);
define('E_ERROR_ALL',   E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR);
define('E_NOTICE_NONE', E_ALL & ~E_NOTICE_ALL);
define('E_DEBUG',       0x10000000);
define('E_VERY_ALL',    E_ERROR_ALL | E_WARNING_ALL | E_NOTICE_ALL | E_DEBUG);

class clsErrorHandler
{
    public $varProjectName;
	public $varErrorEmailAddress;
	public $varErrorSubject;
	public $sErrorHandlerLogFile;
	public $varDebug;
    public $sRedirect;
    public $varErrorEmailAddress1;

	#############################
    # Function : Constructor
	function __CONSTRUCT($sProjectName = "UnKnowProject",$varEmail = "",$varEmailSubject = "",$sErrorHandlerLogFile = "php://output",$sVarDebug = FALSE,$sRedirect = "")
	{
	    $this->varProjectName = $sProjectName;
		$this->varErrorEmailAddress = $varEmail;
		$this->varErrorSubject = $varEmailSubject;
        $this->sErrorHandlerLogFile = $sErrorHandlerLogFile;
		$this->varDebug = $sVarDebug;
        $this->sRedirect = $sRedirect;

	}

    #############################
    # Function : Trigger Error
	function fnTriggerError($varErrorMessage)
	{
		trigger_error($varErrorMessage);
	}

    #############################
    # Function : Trap Error
	function fnTrapError($sErrorNo, $sErrorString, $sErrorFile, $sErrorLine)
	{
		switch ($sErrorNo)
		{
		    case E_ERROR:
				$varErrorMessage = "<b>ERROR</b> [$sErrorNo] $sErrorString<br />\n";
				break;

			case E_WARNING:
				$varErrorMessage = "<b>WARNING</b> [$sErrorNo] $sErrorString<br />\n";
				break;

			default:
				$varErrorMessage = "<b>DEFAULT</b> [$sErrorNo] $sErrorString<br />\n";
				break;
		}

        $sQueryString = $_SERVER["QUERY_STRING"];
        $sPostData = file_get_contents('php://input');


        $sLogContents = "";
        $sLogContents .= "#Error Generated in ".$this->varProjectName;
        $sLogContents .= "\r\nServer Name : ".$_SERVER["SERVER_NAME"];
        $sLogContents .= "\r\nDate & Time : ".date("F j, Y, g:i a");
        $sLogContents .= "\r\nError : ".trim($varErrorMessage);
        $sLogContents .= "\r\nLine : ".$sErrorLine;
        $sLogContents .= "\r\nFileName : ".$sErrorFile;
        $sLogContents .= "\r\nScript : ".$_SERVER["SCRIPT_NAME"];
        $sLogContents .= "\r\nRemote Host : ".$_SERVER["REMOTE_ADDR"];
        $sLogContents .= "\r\nQuery String : Query String => ".$sQueryString." | Post Data => ".$sPostData;
        $sLogContents .= "\r\n###################################################\r\n\r\n";

        $sPrintContents = "";
        $sPrintContents .= "<b>#Error Generated in ".$this->varProjectName."</b><hr>";
        $sPrintContents .= "<br/><b>Server Name : </b>".$_SERVER["SERVER_NAME"];
        $sPrintContents .= "<br/><b>Date & Time : </b>".date("F j, Y, g:i a");
        $sPrintContents .= "<br/><b>Error : </b>".trim($varErrorMessage);
        $sPrintContents .= "<br/><b>Line : </b>".$sErrorLine;
        $sPrintContents .= "<br/><b>FileName : </b>".$sErrorFile;
        $sPrintContents .= "<br/><b>Script : </b>".$_SERVER["SCRIPT_NAME"];
        $sPrintContents .= "<br/><b>Remote Host : </b>".$_SERVER["REMOTE_ADDR"];
        $sPrintContents .= "<br/><b>Query String : </b><b> Query String => </b>".$sQueryString."<b> | Post Data => </b>".$sPostData;
        $sPrintContents .= "<br/>";

        if($this->varDebug) echo $sPrintContents;
        else
        {
            //global $objEmail;
            $fHandle = @fopen($this->sErrorHandlerLogFile,'a+');
            fwrite($fHandle,$sLogContents);
            fclose($fHandle);
            //if($this->varErrorEmailAddress !== "")
            //$objEmail->SendEmail("",$this->varErrorEmailAddress,$this->varErrorSubject,$sPrintContents);
        }


        if ($this->sRedirect == "")
        {
            $sPrintRedirect = "";
            $sPrintRedirect .= "<br />We're Sorry, this site has generated an error.";
            $sPrintRedirect .= "<br />The error message has been logged and emailed to the Webmaster.";
            $sPrintRedirect .= "<br />This problem will be fixed within 24 hours...";
            echo($sPrintRedirect);
        }
        else
        {
            header("Location: " . $this->sRedirect);

        }

        exit(0);
	}
}



$objSetErrorHandler = set_error_handler("fnErrorHandler");
###################################
# Error Handler Function
function fnErrorHandler($sErrorNo,$sErrorString,$sErrorFile,$sErrorLine)
{
    global $objErrorHandler;
    if ($sErrorNo != 8) $objErrorHandler->fnTrapError($sErrorNo, $sErrorString, $sErrorFile, $sErrorLine);
}