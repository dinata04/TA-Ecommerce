<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Iklan extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model("M_iklan","iklan");
}
 
public function index(){
$this->set->halaman("iklan/iklan");
}

public function getIklan(){
echo $this->iklan->getIklan();
}

public function actIklan(){
$config=array("upload_path"=>"./img_iklan",
"allowed_types"=>"png|jpg|jpeg",
"remove_space"=>TRUE);
$this->load->library("upload",$config);
if($this->upload->do_upload("gambar")){
$this->iklan->actIklan(["img"=>$this->upload->data("file_name")]);
$this->session->set_flashdata("sukses","Tambah Data Berhasil");
}else{
$this->session->set_flashdata("gagal","Tambah Data Gagal");
}
redirect("Iklan");
}

public function hpsIklan($id){
$this->iklan->hpsIklan(["id_iklan"=>$id]);
$this->session->set_flashdata("sukses","Hapus Data Berhasil");
redirect ("Iklan");
}

}