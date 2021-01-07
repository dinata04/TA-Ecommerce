<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Profile extends CI_Controller{
 
 function __construct(){
  parent::__construct();
  $this->load->model("M_Profile","profile");
 }
 
 public function index(){
  $data["akun"]=$this->profile->akun();
  $data["rek"]=$this->profile->rek();
  $data["kota"]=$this->profile->kota();
  $this->set->halaman("profile/profile",$data);
 }
 
 public function actAkun(){
  $user=$this->input->post("username");
  $pw=$this->input->post("password");
  $kota=$this->input->post("kota");
  
  $data=array("username"=>$user,
  "password"=>$pw,
  "kota"=>$kota);
  
  $this->profile->actAkun($data);
  redirect ("Profile");
 }
 
 
 public function actRek(){
  $nama=$this->input->post("nama");
  $type=$this->input->post("type");
  $rek=$this->input->post("rek");
  $data=array("nama"=>$nama,
  "type"=>$type,
  "rek"=>$rek);
  $this->profile->actRek($data);
  redirect ("Profile");
 }
 
}