<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Reward extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model("M_Reward","reward");
}

public function index(){
$this->set->halaman("reward/reward");
}

public function getReward(){
echo $this->reward->getReward();
}

public function actReward(){
$type=$this->input->post("type");
$nama=$this->input->post("nama");
$stok=$this->input->post("stok");
$poin=$this->input->post("poin");

$config=array("upload_path"=>"./img_reward/",
"allowed_types"=>"png|jpg|jpeg",
"remove_space"=>TRUE);
$this->load->library("upload",$config);

if($type=="tambah"){

if($this->upload->do_upload("gambar")){
$this->reward->actReward($type,["nama"=>$nama,
"img"=>$this->upload->data("file_name"),
"stok"=>$stok,
"poin"=>$poin]);
$this->session->set_flashdata("sukses","Tambah Data Berhasil");
}else{
$this->session->set_flashdata("gagal","Tambah Data Gagal");
}

}else{
$this->reward->actReward($type,["nama"=>$nama,
"stok"=>$stok,
"poin"=>$poin]);
$this->session->set_flashdata("sukses","Edit Data Berhasil");
}

redirect("Reward");
}


public function hpsReward($id){
$this->reward->hpsReward(["id_reward"=>$id]);
$this->session->set_flashdata("sukses","Hapus Data Berhasil");
redirect("Reward");
}

}