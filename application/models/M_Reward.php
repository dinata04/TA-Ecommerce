<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Reward extends CI_Model{

function getReward(){
$this->datatables
->select("id_reward,nama,stok,poin,img")
->from("reward")
->add_column('gambar','<img src="img_reward/$1" width="50px">','img')
->add_column('aksi','<div class="btn-group"><button type="button" onclick="reward(`$1`,`$2`,`$3`,`$4`)" class="btn btn-info" data-toggle="modal" data-target="#reward"><i class="fa fa-edit"></i></button> <a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Reward/hpsReward/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>','id_reward,nama,stok,poin');
return $this->datatables->generate();
} 

function actReward($type,$data){
if($type=="tambah"){
$this->db->insert("reward",$data);
}else{
$this->db->where(["id_reward"=>$type])->update("reward",$data);
}
}

function hpsReward($data){
if(unlink("img_reward/".$this->db->where($data)->get("reward")->row()->img)){
$this->db->where($data)->delete("reward");
}
}

}