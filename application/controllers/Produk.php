<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Produk extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model("M_Produk","produk");
}

public function index(){
$data["kategori"]=$this->produk->getKategori()->result();
$this->set->halaman("produk/produk",$data);
}

public function getProduk(){
echo $this->produk->getProduk();
}

public function actProduk(){
$type=$this->input->post("type");
$kategori=$this->input->post("kategori");
$nama=$this->input->post("nama");
$desk=$this->input->post("deskripsi");
$stok=$this->input->post("stok");
$harga=$this->input->post("harga");
$diskon=$this->input->post("diskon");
$bobot=$this->input->post("bobot");

$config=array("upload_path"=>"./img_produk/",
"allowed_types"=>"png|jpg|jpeg",
"remove_space"=>TRUE);
$this->load->library("upload",$config);

if($type=="tambah"){

if($this->upload->do_upload("gambar")){
$this->produk->actProduk($type,["nama"=>$nama,
"id_kategori"=>$kategori,
"img"=>$this->upload->data("file_name"),
"deskripsi"=>$desk,
"stok"=>$stok,
"harga"=>$harga,
"diskon"=>$diskon==""? "0" : $diskon,
"bobot"=>$bobot]);
$this->session->set_flashdata("sukses","Tambah Data Berhasil");
}else{
$this->session->set_flashdata("gagal","Tambah Data Gagal");
}

}else{

$this->produk->actProduk($type,["nama"=>$nama,
"id_kategori"=>$kategori,
"deskripsi"=>$desk,
"stok"=>$stok,
"harga"=>$harga,
"diskon"=>$diskon==""? "0" : $diskon,
"bobot"=>$bobot]);
$this->session->set_flashdata("sukses","Edit Data Berhasil");

}

redirect ("Produk");
}


public function hpsProduk($id){
$this->produk->hpsProduk(["id_produk"=>$id]);
$this->session->set_flashdata("sukses","Hapus Data Berhasil");
redirect ("Produk");
}

}