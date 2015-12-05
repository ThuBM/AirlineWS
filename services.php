<?php
ini_set('display_errors',1);
require_once "config/database.php";
require_once "lib/nusoap/nusoap.php";
require_once "function.php";

// config server's services
$server = new soap_server;
$server->configureWSDL("airlines", "urn:airlines");

// regist function
// addNewAirlineAgency
$server->register("addNewAirlineAgency",
  array("code" => "xsd:string", "name" => "xsd:string", "website" => "xsd:string"), //input params
  array("return" => "xsd:integer"), // output
  "urn:airlines", // namespace
  "urn:airlines#addNewAirlineAgency",
  "rpc",
  "encoded",
  "Add new airlines agency"
  );

// deploy services
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : "";
$server->service($HTTP_RAW_POST_DATA);
?>