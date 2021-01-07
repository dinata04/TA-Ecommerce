<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Kategori extends CI_Model{

function getKategori(){
$this->datatables
->select("id_kategori,nama,img,poin")
->from("kategori")
->add_column('gambar','<img src="img_kategori/$1" width="50px">','img')
->add_column('aksi','<div class="btn-group"><button type="button" onclick="kategori(`$1`,`$2`,`$3`)" class="btn btn-info" data-toggle="modal" data-target="#kategori"><i class="fa fa-edit"></i></button> <a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Kategori/hpsKategori/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>','id_kategori,nama,poin');
return $this->datatables->generate();
}

function actKategori($type,$data){
if($type=="tambah"){
$this->db->insert("kategori",$data);
}else{
$this->db->where(["id_kategori"=>$type])->update("kategori",$data);
}
}

function hpsKategori($data){
if(unlink("img_kategori/".$this->db->where($data)->get("kategori")->row()->img)){
$this->db->where($data)->delete("kategori");
}
}

}