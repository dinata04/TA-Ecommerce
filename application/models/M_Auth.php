<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Auth extends CI_Model{

 function actLogin($data){
  return $this->db->where($data)->get("akun");
 }
 
}