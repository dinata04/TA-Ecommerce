<?php 
defined("BASEPATH") OR exit("No direct script access allowed");

class Set{

 function halaman($view,$data=null){
  $CI=& get_instance();
  $CI->load->view("navbar");
  $CI->load->view($view,$data);
  $CI->load->view("footer");
 }
 
 function curl($url,$req,$header){ 
  $curl=curl_init();
  curl_setopt_array($curl,array(
   CURLOPT_URL=>$url,
   CURLOPT_RETURNTRANSFER=>TRUE,
   CURLOPT_ENCODING=>"",
   CURLOPT_MAXREDIRS=>10,
   CURLOPT_TIMEOUT=>30,
   CURLOPT_HTTP_VERSION=>CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST=>$req,
   CURLOPT_HTTPHEADER=>$header
   ));
   $respon=curl_exec($curl);
   $err=curl_error($curl);
   
   curl_close($curl);
   if($err){
    return "Error : ".$err;
   }else{
    return $respon;
   }
 } 
}