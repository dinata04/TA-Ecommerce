<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Api extends CI_Model {
    
    //Auth Model
 function login($data){
  return $this->db->where($data)->get("akun");
    }
    
	function daftar($data){
	 $this->db->insert("akun",$data);
	 return $this->db->insert_id();
	}
	
	function iklan(){
	 return $this->db->get("iklan");
	}
	
	function kategori(){
	 return $this->db->get("kategori");
	}
	
	function event(){
	 return $this->db->query("SELECT * FROM event ORDER BY id_event LIMIT 1");
	}
	
	function produkTop(){
	 return $this->db->query("SELECT AVG(rate) as rate, item_transaksi.id_produk, id_kategori, nama, img, deskripsi, stok, harga, diskon, bobot FROM item_transaksi INNER JOIN produk ON item_transaksi.id_produk=produk.id_produk WHERE rate!='0' GROUP BY item_transaksi.id_produk ORDER BY rate DESC LIMIT 5 ");
	}
	
	function produk(){
	 return $this->db->limit("5")->get("produk"); 
	}
	
	function displayProduk($query){
	 if($query=="all"){
	  return $this->db->get("produk");
	 }else{
	  return $this->db->where(["id_kategori"=>$query])->get("produk");
	 }
	}
	
	function produkId($id){
	 return $this->db->select("id_produk,stok")->get_where("produk",$id);
	}
 
 function nota(){
  return $this->db->query("SELECT nota FROM transaksi WHERE DATE(create_at)=DATE(NOW()) ORDER BY id_transaksi DESC LIMIT 1");
 }
 
 function transaksi($type,$data){
  switch($type){
   case "transaksi":
    $this->db->insert("transaksi",$data);
    return $this->db->insert_id();
    break;
   case "item":
    $this->db->insert("item_transaksi",$data);
    break;
  }
 }
 
 function validEvent($total){
  $sql=$this->db->get("event");
  if($sql->num_rows()>0){
   if($total>=$sql->row()->minimal){
    return "1";
   }else{
    return "0";
   }
  }else{
   return "0";
  }
 }
 
 function admin(){
  return $this->db->where(["role"=>"admin"])->get("akun");
 }
 
 function rek(){
  return $this->db->get("rek");
 }
 
 function riwayat($id){
  return $this->db->where(["id_akun"=>$id])->get("transaksi");
 }
 
 function bayar($id,$data){
  $this->db->where($id)->update("transaksi",$data);
 }
 
 function leader(){
  return $this->db->where(["role!="=>"admin"])->order_by("poin","DESC")->get("akun");
 }
 
 function upFoto($id,$data){
  $this->db->where($id)->update("akun",$data);
 }
 
 function dltFoto($id,$data){
  $this->db->where($id)->update("akun",$data);
 }
 
 function upProfile($id,$data){
  $this->db->where($id)->update("akun",$data);
 }
 
 function reward(){
  return $this->db->get("reward");
 }
 
 function addReward($data){
  $this->db->insert("give_reward",$data);
 }
 
 function idReward($id){
  return $this->db
  ->select("reward.nama as reward,give_reward.status as status")
  ->from("reward")
  ->join("give_reward","reward.id_reward=give_reward.id_reward","inner")
  ->where(["give_reward.id_akun"=>$id])
  ->get();
 } 
 
 function review($data){
  return $this->db
  ->select("item_transaksi.id_item_transaksi, produk.nama")
  ->join("produk","produk.id_produk=item_transaksi.id_produk","inner")
  ->where($data)
  ->get("item_transaksi");
 }
 
 function actReview($id,$data){
  $this->db->where($id)->update("item_transaksi",$data);
 }
    
}