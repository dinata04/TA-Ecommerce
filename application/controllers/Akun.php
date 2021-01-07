<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Akun extends CI_Controller{
 
 function __construct(){
 parent::__construct();
 $this->load->model("M_Akun","akun");
 }
 
 
 public function index(){
  $this->set->halaman("akun/akun");
 }
 
 public function getAkun(){
  echo $this->akun->getAkun();
 }
 
 public function hpsAkun($id){
  $this->akun->hpsAkun(["id_akun"=>$id]);
  redirect ("Akun");
 }
 
}