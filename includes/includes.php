<?php
include(__DIR__.'/../config/config.php');
include(__DIR__.'/../SF-PHP/classes/clsErrorHandler.php');		    // Error Handler Class
$objErrorHandler = new clsErrorHandler(cErrorHandlerProjectName,cErrorHandlerSenderEmail,cErrorHandlerSubject,cErrorHandlerLogFile,cErrorDebug);

include(__DIR__.'/../SF-PHP/classes/clsDatabase.php');			    // The Database Class



include(__DIR__."/".cVSFFolder.'/classes/clsDatabase.php');			// The Database Class
include(__DIR__."/".cVSFFolder.'/classes/clsGeneral.php');			// Common PHP Functions
include(__DIR__."/".cVSFFolder.'/classes/clsEncryption.php');		// Encryption Class
include(__DIR__."/".cVSFFolder.'/classes/clsS3AWS.php');            // AWS SDK For File Upload
include(__DIR__."/".cVSFFolder.'/classes/clsEmail.php');		    // E-Mail SMTP Class
include(__DIR__."/".cVSFFolder.'/components/Predis/redis.php');



$objDatabase = new clsDatabase(cDatabaseType, "c",cDatabaseHost,cDatabaseUser,cDatabasePassword,cDatabaseDatabase,cErrorHandlerDatabaseErrorLogFile);
//$objDatabaseReplica = new clsDatabase(cReplicaDatabaseType, "c",cReplicaDatabaseHost,cReplicaDatabaseUser,cReplicaDatabasePassword,cReplicaDatabaseDatabase,cErrorHandlerDatabaseErrorLogFile);
$objGeneral = new clsGeneral();					// All Common Functions
$objEncryption = new clsBlowfish();				// An Encryption Object
$objS3AWS = new clsS3AWS();
$objEmail = new clsEmail();