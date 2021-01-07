<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Akun extends CI_Model{
 
 function getAkun(){
  $this->datatables
  ->select("id_akun,nama,email,img,username,password,kelamin,tlp,kota,poin,role")
  ->from("akun")
  ->where(["role!="=>"admin"])
  ->edit_column('img','<img src="$1" width="60px">','img')
  ->add_column('aksi','<a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Akun Ini?`)" href="Akun/hpsAkun" class="btn btn-danger"><i class="fa fa-trash"></i></a>');
  return $this->datatables->generate();
 }
 
 function hpsAkun($data){
  $this->db->where($data)->delete("akun");
 }
 
}