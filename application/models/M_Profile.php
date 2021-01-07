<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Profile extends CI_Model{
 
 function akun(){
  return $this->db->where(["id_akun"=>$this->session->userdata("id")])->get("akun")->row();
 }
 
 function actAkun($data){
  $this->db->where(["id_akun"=>$this->session->userdata("id")])->update("akun",$data);
 }
 
 function rek(){
  return $this->db->get("rek");
 }
 
 function actRek($data){
  $this->db->empty_table("rek");
  $this->db->insert("rek",$data);
 }
 
 function kota(){
  return $this->db->get("kota");
 }
 
}