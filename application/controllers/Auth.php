<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Auth extends CI_Controller{

 function __construct(){
 parent::__construct();
  $this->load->model("M_Auth","auth");
 }
 
 public function index(){
  redirect(base_url()."Auth/login");
 }
 
 public function login(){
  $this->load->view("login");
 }
 
 public function actLogin(){
  $data["username"]=$this->input->post("username");
  $data["password"]=$this->input->post("password");
  $data["role"]="admin";
  $sql=$this->auth->actLogin($data);
  if($sql->num_rows()>0){
   $this->session->set_userdata("id",$sql->row()->id_akun);
   redirect(base_url()."Akun");
  }else{
   redirect(base_url()."Auth/login");
  }
 }
 
 public function actLogout(){
  $this->session->unset_userdata("id");
  redirect (base_url()."Auth/login");
 }
  
}