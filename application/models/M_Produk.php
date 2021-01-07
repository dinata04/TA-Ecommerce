<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Produk extends CI_Model{

function getKategori(){
 return $this->db->get("kategori");
}

function getProduk(){
$this->datatables
->select("produk.id_produk,kategori.nama as kategori,kategori.id_kategori,produk.nama,produk.img,produk.deskripsi,produk.stok,produk.harga,produk.diskon,produk.bobot")
->from("produk")
->join("kategori","kategori.id_kategori=produk.id_kategori","inner")
->add_column('gambar','<img src="img_produk/$1" width="50px">','img')
->add_column('aksi','<div class="btn-group"><button type="button" onclick="produk(`$1`,`$2`,`$3`,`$4`,`$5`,`$6`,`$7`)" class="btn btn-info" data-toggle="modal" data-target="#produk"><i class="fa fa-edit"></i></button> <a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Produk/hpsProduk/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>','id_produk,id_kategori,nama,deskripsi,stok,harga,diskon','bobot');
return $this->datatables->generate();
} 

function actProduk($type,$data){
if($type=="tambah"){
$this->db->insert("produk",$data);
}else{
$this->db->where(["id_produk"=>$type])->update("produk",$data);
}
}

function hpsProduk($data){
if(unlink("img_produk/".$this->db->where($data)->get("produk")->row()->img)){
$this->db->where($data)->delete("produk");
}
}

}