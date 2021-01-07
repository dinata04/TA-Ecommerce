<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Give_Reward extends CI_Model{

function getGive(){
$this->load->helper("status");
$this->datatables
->select("give_reward.id_give_reward as id_give,akun.nama as nama,akun.username as username,reward.nama as reward,give_reward.status as status")
->from("give_reward")
->join("akun","akun.id_akun=give_reward.id_akun","inner")
->join("reward","reward.id_reward=give_reward.id_reward","inner")
->add_column('sts','$1','status_give(id_give,status)')
->add_column('aksi','<div class="btn-group"><a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Produk/hpsProduk/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a></div>','id_give');
return $this->datatables->generate();
} 

function upGive($id,$data){
$this->db->where("id_give_reward",$id)->update("give_reward",$data);
}

}