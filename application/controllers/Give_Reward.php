<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Give_Reward extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model("M_Give_Reward","give");
}

public function index(){
$this->set->halaman("give_reward/give_reward");
}

public function getGive(){
echo $this->give->getGive();
}

public function upGive($id,$data){
$sql=$this->give->upGive($id,["status"=>$data]);
$this->session->set_flashdata("sukses","Edit Status Berhasil");
redirect ("Give_Reward");
}

}