<?php
###############################
# DEVELOPED BY : SHAKIR ALI
##############################

class clsGeneral
{

    function __CONSTRUCT()
    {}

   
    # ############################################################################
    # Function to Validate Email
    # Usage: $objClass->fnValidateEmail('shakir.ali@salesflo.com');
    # ############################################################################
    function fnValidateEmail($varEmail)
    {
        $sREGREX = '/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])' . '(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i';
        return (preg_match($sREGREX, $varEmail));
    }

    # ############################################################################
    # Function to Day Difference Between Two Dates 
    # Usage: $objClass->fnDaysDiffOfTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDaysDiffOfTwoDate($dStartDateTime, $dEndDateTime)
    {
        if ($dStartDateTime == "") $dStartDateTime = $this->fnNow();
        if ($dEndDateTime == "") $dEndDateTime = $this->fnNow();

        $objStart = new DateTime($dStartDateTime);
        $objEnd = new DateTime($dEndDateTime);
        $objDiff = $objStart->diff($objEnd);
        return ($objDiff->format('%d'));
    }

    # ############################################################################
    # Function to Day Difference Between Two Dates Without Defined Day
    # Usage: $objClass->fnDaysDiffOfTwoDateWithOutSunday('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDaysDiffOfTwoDateWithOutSunday($dStartDate, $dEndDate,$sDayMinus = "Sun")
    {
        if ($dStartDate == "") $dEndDate = $this->fnDateFromDateTime();
        if ($dEndDate == "") $dEndDate = $this->fnDateFromDateTime();
        $objStartDate = new DateTime($dStartDate);
        $objEndDate = new DateTime($dEndDate);
        $objEndDate->modify('+1 day');
        $objInterval = $objEndDate->diff($objStartDate);
        $iDays = $objInterval->days;

        $aPeriod = new DatePeriod($objStartDate, new DateInterval('P1D'), $objEndDate);

        foreach ($aPeriod as $objPeriod) 
        {
            $sDays = $objPeriod->format('D');
            if ($sDays == $sDayMinus) $iDays--;
        }

        return ($iDays);
    }


    # ############################################################################
    # Function to Difference Between Two Dates
    # Usage: $objClass->fnDiffBetweenTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDiffBetweenTwoDate($dStartDateTime, $dEndDateTime)
    {
        if ($dStartDateTime == "") $dStartDateTime = $this->fnNow();
        if ($dEndDateTime == "") $dEndDateTime = $this->fnNow();

        $objStart = new DateTime($dStartDateTime);
        $objEnd = new DateTime($dEndDateTime);
        $objDiff = $objStart->diff($objEnd);
        return ($objDiff->format('%h Hours %i Min %s Sec'));
    }
    
    # ############################################################################
    # Function to Difference Between Two Dates
    # Usage: $objClass->fnDiffBetweenTwoDate('2019-07-01','2019-07-31');
    # ############################################################################
    function fnDiffBetweenTwoDateFormated($sStartDate = "", $sEndDate = "", $sInWhich = "S")
    {
        
        if ($sStartDate == "") 
            $sStartDate = time(); 
        else
            $sStartDate = strtotime($sStartDate);

        if ($sEndDate == "") 
            $sEndDate = time(); 
        else
            $sEndDate = strtotime($sEndDate);

        $sDiff = $sEndDate - $sStartDate;
        if ($sInWhich === "S") 
            $iReturn = $sDiff; 
        else if ($sInWhich === "M") 
            $iReturn = ($sDiff / 60); 
        else if ($sInWhich === "H") 
            $iReturn = (($sDiff / 60) / 60); 
        else if ($sInWhich === "D") 
            $iReturn = (($sDiff / 60) / 60 / 24);
        else 
            $iReturn = 0;
            
            
        return ($iReturn);
    }
    

    # ########################################################################
    # Function to Date From Date Time
    # Usage: $objClass->fnDateFromDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnDateFromDateTime($dDateTime = "")
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $objDate = new DateTime($dDateTime);
        $sReturn = $objDate->format("Y-m-d");
        return ($sReturn);
    }

    # ########################################################################
    # Function to Time From Date Time
    # Usage: $objClass->fnTimeFromDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnTimeFromDateTime($dDateTime = "")
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $objDate = new DateTime($dDateTime);
        $sReturn = $objDate->format("H:i:s");
        return ($sReturn);
    }

    # ########################################################################
    # Function to Convert Date Time into Format
    # Usage: $objClass->fnFormatDateTime('2019-07-31 12:01:10');
    # #########################################################################
    function fnFormatDateTime($dDateTime)
    {
        if ($dDateTime == "") $dDateTime = $this->fnNow();
        $sReturn = date("F j, Y", strtotime($dDateTime)) . " at " . date("g:i a", strtotime($dDateTime));
        return ($sReturn);
    }


    # ########################################################################
    # Function to Browser Name
    # Usage: $objClass->fnBrowserName();
    # #########################################################################
    function fnBrowserName()
    {
        $sUserAgent = $_SERVER['HTTP_USER_AGENT'];
        $sBrowserName = "Unknown Browser";
        $aBrowserName = array('/msie/i' => 'Internet Explorer', '/firefox/i' => 'Firefox', '/safari/i' => 'Safari', '/chrome/i' => 'Chrome', '/opera/i' => 'Opera', '/netscape/i' => 'Netscape', '/maxthon/i' => 'Maxthon', '/konqueror/i' => 'Konqueror', '/mobile/i' => 'Handheld Browser');

        foreach ($aBrowserName as $iKey => $sValue) {
            if (preg_match($iKey, $sUserAgent)) $sBrowserName = $sValue;
        }

        return ($sBrowserName);
    }

   
    # ############################################################################
    # Function to Current Date & Time in the format of MySQL DateTime Field
    # Usage: $objClass->fnNow();
    # ############################################################################
    function fnNow()
    {
        return (date("Y-m-d H:i:s"));
    }
    

    # ##################################################################################
    # Function User to get Distance Difference btw to lat long..
    # ##################################################################################
    function fnDiffBetweenTwoLocation($dLat1, $dLon1, $dLat2, $dLon2)
    {
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($dLat2 - $dLat1);
        $dLon = deg2rad($dLon2 - $dLon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($dLat1)) * cos(deg2rad($dLat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c; // Distance in km
        return ($d);
    }

    # ############################################################################
    # Function to Get QueryString and Form Post value, Default = AutoDetect
    # Usage: $objClass->fnGet("search"); same as $objClass->fnGet("search", "GET");
    #        -or- $objClass->fnGet("search", "POST");
    # ############################################################################
    function fnGet($varQuery, $varType = "AUTO")
    {
        $varType = trim($varType);
        $varQuery = trim($varQuery);
        if ($varType === "POST") {
            if (isset($_POST[$varQuery])) return ($_POST[$varQuery]);
        } else if ($varType === "GET") {
            if (isset($_GET[$varQuery])) return ($_GET[$varQuery]);
        } else if ($varType === "AUTO") {
            if (isset($_REQUEST[$varQuery])) return ($_REQUEST[$varQuery]);
        }

        return ("");

    }

    
    function fnEncryption($sString, $sEncryptionKey = "", $sEncryptionIV = "")
    {
        global $objEncryption;
        if ($sString == "") return ("");
        $sEncrypted = $objEncryption->Encryption($sString, $sEncryptionKey = "", $sEncryptionIV = "");
        return ($sEncrypted);
    }

    function fnDecryption($sString, $sEncryptionKey = "", $sEncryptionIV = "")
    {
        global $objEncryption;
        if ($sString == '') return ('');
        if (!ctype_xdigit($sString)) return ('');
        $sDecrypted = $objEncryption->Decryption($sString, $sEncryptionKey, $sEncryptionIV);
        return ($sDecrypted);
    }

    ########################################################################
    # Password Encryption with Bcrypt Alogrithm (One way Encryption)
    function fnPasswordEncrypt($sPassword,$fAlgo = PASSWORD_BCRYPT)
    {
        $sPasswordEncrypt = password_hash($sPassword,$fAlgo);
        return($sPasswordEncrypt);
    }

    ########################################################################
    # Bcrytion hash verify function
    function fnVerifyPassword($sPassword,$sHash)
    {
        $fResult = password_verify($sPassword,$sHash);
        if($fResult) return(true);
        return(false);
    }

    ########################################################################
    # FUNCTION use to Ecode String
    function fnEncode($sString, $fCSVInjection = true)
    {
        global $objDatabase;
        $sEncodeString = "";
        if ($sString === "") return ($sEncodeString);
        if ($sString === null) return ($sEncodeString);
        if ($sString === "null") return ($sEncodeString);
        if ($sString === "NULL") return ($sEncodeString);
        if ($sString === "0") return (0);
        if ($fCSVInjection) {
            $aMatchArray = array();
            $sFirstChar = substr($sString, 0, 1);
            preg_match('/[\^£$%*()}{@#~?><>,!|=_+¬-]/', $sFirstChar, $aMatchArray);
            if (!empty($aMatchArray)) $sString = "'" . $sString;
        }

        $sString = trim($sString);
        $sString = str_replace("'", "&#39;", $sString);
        $sString = str_replace('"', "&#34;", $sString);
        $sString = str_replace("<", "&#60;", $sString);
        $sString = str_replace(">", "&#62;", $sString);
        $sEncodeString = $objDatabase->RealEscapeString($sString);
        return ($sEncodeString);
    }

    ########################################################################
    # FUNCTION use to Decode String
    function fnDecode($sString)
    {
        global $objDatabase;
        $sEncodeString = urldecode($sString);
        $sEncodeString = $objDatabase->RealEscapeString($sEncodeString);
        return ($sEncodeString);
    }

    function fnRedirectWithPost($varLocation, $sParameters = "")
    {
        $sReturn = '<form id="idMyForm" action="' . $varLocation . '" method="POST">';
        $aParameter = $this->ParametersStringToArray($sParameters);
        foreach ($aParameter AS $iKey => $sValue) {
            $sFieldName = $sValue["Name"];
            $sFieldValue = $sValue["Value"];
            $sReturn .= '<input type = "hidden" name = "' . $sFieldName . '" value = "' . $sFieldValue . '" />';
        }
        $sReturn .= '</form>';
        $sReturn .= '<script> document.getElementById("idMyForm").submit();</script>';
        print($sReturn);
    }

    function fnParametersStringToArray($sParameters)
    {
        $aParameter = array();
        $aArray = explode("&", $sParameters);
        $iPNo = 0;
        foreach ($aArray AS $iKey => $sValue) {
            $aValue = explode("=", $sValue);
            if ($aValue[0] !== "") {
                $aParameter[$iPNo]["Name"] = $aValue[0];
                $aParameter[$iPNo]["Value"] = $aValue[1];
                $iPNo++;
            }

        }

        return ($aParameter);
    }

    function fnTopURLRefresh($sURL)
    {
        $sScript = '<script>top.location.href = "'.$sURL.'";</script>';
        print($sScript);
    }

    function fnGetIPAddress()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $sIPAddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $sIPAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $sIPAddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $sIPAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $sIPAddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $sIPAddress = $_SERVER['REMOTE_ADDR'];
        else
            $sIPAddress = "UNKNOWN";
        return($sIPAddress);

    }

    ######################################################################
    # Read CSV File
    function fnReadCSV($sFileName,$fSetHeader = false)
    {
        $iNumber = 0;
        $aCSVArray = array();
        //$fHandle = @fopen($sFileName, "r");
        $fHandle = fopen($sFileName, "r");
        if ($fHandle)
        {
            while (!feof($fHandle))
            {
                $buffer = fgets($fHandle, 4096);
                $aCSVArray[$iNumber++] = $buffer;
                if ($buffer == "") continue;
            }

            fclose($fHandle);
            ###########################################
            # Remove CSV Header from array
            if(!$fSetHeader) array_shift($aCSVArray);

            ###########################################
            # Remove CSV Last Empty row..
            array_pop($aCSVArray);
        }

        return($aCSVArray);
    }


    ######################################################################
    # Function use to convert string parameters into array
    function fnFiltersStringToArray($sFilters = "")
    {
        $aArrayFilters = array();
        $aFilters = explode("&",$sFilters);
        for($i=0;$i<sizeof($aFilters);$i++)
        {
            $aArrayTemp = explode("=",$aFilters[$i]);
            $iKey = $this->Decode($aArrayTemp[0]);
            $sValue = $this->Decode($aArrayTemp[1]);
            $aArrayFilters[$iKey] = $sValue;
        }

        return($aArrayFilters);

    }





}