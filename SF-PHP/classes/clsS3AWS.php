<?php
class clsS3AWS
{
    private $objS3Client;
    private $sS3AWSAccessKey;
    private $sS3AWSSecretKey;
    private $sS3AWSRegion;
    private $sBucketName;
    private $sCloudFrontDomain;


    ####################################################################
    # Constructor of clsAWS Class
    function __construct($sS3AWSAccessKey = "",$sS3AWSSecretKey = "",$sS3AWSRegion = "",$sBucketName = "",$sCloudFrontDomain = "")
    {
        $this->sS3AWSAccessKey = $sS3AWSAccessKey;
        $this->sS3AWSSecretKey = $sS3AWSSecretKey;
        $this->sBucketName = $sBucketName;
        $this->sS3AWSRegion = $sS3AWSRegion;
        $this->sCloudFrontDomain = $sCloudFrontDomain;
    }

    ####################################################################
    # Connection Class
    function fnAWSConnectivity()
    {
        require __DIR__.'/../components/AWS/aws-autoloader.php';
        $this->objS3Client = new Aws\S3\S3Client(['version' => 'latest', 'region'=> $this->sS3AWSRegion]);
    }

    ####################################################################
    # Creating an object
    function fnS3Upload($sFileURL,$sFileNameWithFolderName,$sACL = "private")
    {
        $this->fnAWSConnectivity();
        $sFileContent = file_get_contents($sFileURL);
        try
        {
            $varReturn = $this->objS3Client->putObject([
                    'Bucket'     => $this->sBucketName,
                    'Key'        => $sFileNameWithFolderName,
                    'Body'       => $sFileContent,
                    'ACL'        => $sACL
                ]);


            if(!$varReturn) return(false);
            $KeyName = $this->fnKeyNameFromURL($sFileURL);
            if(!$this->fnS3Delete($KeyName)) return(false);
        }

        catch (Exception $e) { print_r($e->getMessage()); return(false); }

        return(true);

    }

    ####################################################################
    # Creating an object
    function fnS3UploadObject($sFileObjectName,$sFileNameWithFolderName,$sACL = "private")
    {
        $this->fnAWSConnectivity();
        if(!isset($_FILES[$sFileObjectName])) return(false);
        $sFileLocation = $_FILES[$sFileObjectName]["tmp_name"];
        try
        {
            $varReturn = $this->objS3Client->putObject(
                [
                    'Bucket'     => $this->sBucketName,
                    'Key'        => $sFileNameWithFolderName,
                    'SourceFile' => $sFileLocation,
                    'ACL'        => $sACL,
                ]);


            if(!$varReturn) return(false);

        }

        catch (Exception $e) { /*print_r($e->getMessage());*/ return(false); }

        return(true);

    }

    ####################################################################
    # Deleting an object
    function fnS3Delete($sFileNameWithFolderName)
    {
        $this->fnAWSConnectivity();
        if($this->objS3Client->doesObjectExist($this->sBucketName,$sFileNameWithFolderName))
        {
            $varReturn = $this->objS3Client->deleteObject(["Bucket" => $this->sBucketName , "Key" => $sFileNameWithFolderName]);
            if(!$varReturn) return(false);
        }

        return(true);
    }

    #####################################################################
    # Generating object download or View URLs
    function fnS3URL($sFileNameWithFolderName,$sExpireTime = "+2 minutes",$fCloudFront = true)
    {
        $this->fnAWSConnectivity();
        $aFileNameWithFolderName = explode("?",$sFileNameWithFolderName);
        if(!$this->objS3Client->doesObjectExist($this->sBucketName,$aFileNameWithFolderName[0])) return("");
        if($fCloudFront) return($this->sCloudFrontDomain."/".$sFileNameWithFolderName);
        $sCMD = $this->objS3Client->getCommand("GetObject",['Bucket' => $this->sBucketName, 'Key' => $aFileNameWithFolderName[0]]);
        $objRequest = $this->objS3Client->createPresignedRequest($sCMD,$sExpireTime);
        $sURL = (string) $objRequest->getUri();
        return($sURL);
    }

    #####################################################################
    # Generating object download or View URLs
    function fnS3Read($sFileNameWithFolderName)
    {
        $this->fnAWSConnectivity();
        try
        {
            $varResult = $this->objS3Client->getObject(
                [
                    'Bucket' => $this->sBucketName,
                    'Key'    => $sFileNameWithFolderName
                ]);


            // Display in Browser
            header("Content-Type: {$varResult['ContentType']}");
            header('Content-Disposition: filename="'.basename($sFileNameWithFolderName).'"');
            echo ($varResult['Body']);
        }
        catch (Exception $e) { return("Error: " . $e->getMessage()); }
    }

    #####################################################################
    # Generating keyName With Folder By URL
    function fnKeyNameFromURL($sURL)
    {
        $aURL = explode("?",$sURL);
        $aURL = explode("/",$aURL[0]);
        $iLength = sizeof($aURL);
        $sKey = $aURL[$iLength-2]."/".$aURL[$iLength-1];
        return($sKey);

    }

    ####################################################################
    function fnS3FileExist($sFileNameWithFolderName)
    {
        $this->fnAWSConnectivity();
        if($this->objS3Client->doesObjectExist($this->sBucketName,$sFileNameWithFolderName)) return(true);
        return(false);
    }





}