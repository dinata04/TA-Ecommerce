<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Kategori extends CI_Controller{

 function __construct(){
 parent::__construct();
 $this->load->model("M_Kategori","kategori");
 }
 
 public function index(){
  $this->set->halaman("kategori/kategori");
 }
 public function getKategori(){
  echo $this->kategori->getKategori();
 }
 
 public function actKategori(){
 $type=$this->input->post("type");
 $nama=$this->input->post("nama");
 $poin=$this->input->post("poin");
 
 $config=array("upload_path"=>"./img_kategori/",
 "allowed_types"=>"png|jpg|jpeg",
 "remove_space"=>TRUE);
 $this->load->library("upload",$config);
 
 if($type=="tambah"){
 
 if($this->upload->do_upload("gambar")){
 $this->kategori->actKategori($type,["nama"=>$nama,
 "img"=>$this->upload->data("file_name"),"poin"=>$poin]);
 $this->session->set_flashdata("sukses","Tambah Data Berhasil");
 }else{
 $this->session->set_flashdata("gagal","Tambah Data Gagal");
 }
 
 }else{
 $this->kategori->actKategori($type,["nama"=>$nama,"poin"=>$poin]);
 $this->session->set_flashdata("sukses","Edit Data Berhasil");
 }
 
 redirect("Kategori");
 }
 
public function hpsKategori($id){
$this->kategori->hpsKategori(["id_kategori"=>$id]);
$this->session->set_flashdata("sukses","Hapus Data Berhasil");
redirect ("Kategori");
}
 
}