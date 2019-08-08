<?php
include(__DIR__.'/../config/config.php');
include(__DIR__.'/../SF-PHP/classes/clsErrorHandler.php');
include(__DIR__.'/../SF-PHP/classes/clsDatabase.php');
include(__DIR__.'/../SF-PHP/classes/clsGeneral.php');
include(__DIR__.'/../SF-PHP/classes/clsS3AWS.php');
include(__DIR__.'/../SF-PHP/classes/clsRedis.php');


$objErrorHandler = new clsErrorHandler(cErrorHandlerProjectName,cErrorHandlerSenderEmail,cErrorHandlerSubject,cErrorHandlerLogFile,cErrorDebug);
$objDatabase = new clsDatabase(cDatabaseHost,cDatabaseUser,cDatabasePassword,cDatabaseDatabase);
$objGeneral = new clsGeneral();
$objS3AWS = new clsS3AWS();
$objRedis = new clsRedis();