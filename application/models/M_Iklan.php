<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Iklan extends CI_Model{

 function getIklan(){
  $this->datatables
  ->select("id_iklan,img")
  ->from("iklan")
  ->add_column('gambar','<img src="img_iklan/$1" width="200px">','img')
  ->add_column('aksi','<a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Iklan/hpsIklan/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a>','id_iklan');
  return $this->datatables->generate();
 }
 
 function actIklan($data){
  $this->db->insert("iklan",$data);
 }
 
 function hpsIklan($data){
 if(unlink("img_iklan/".$this->db->where($data)->get("iklan")->row()->img)){
 $this->db->where($data)->delete("iklan");
 }
 }
 
}