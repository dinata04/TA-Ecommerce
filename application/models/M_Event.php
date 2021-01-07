<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Event extends CI_Model{
 
 function event(){
  return $this->db->get("event");
 }
 
 function addEvent($data){
  $this->db->insert("event",$data);
 }
 
 function dltEvent(){
  $this->db->empty_table("event");
 }
 
}