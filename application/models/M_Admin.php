<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {

	public function login($data)
	{
	 return $this->db->where($data)->get("akun");
	}
	
	public function visi(){
	 return $this->db->get("beranda");
	}
	
	public function actVisi($data){
     $this->db->empty_table("beranda");
	 $this->db->insert("beranda",$data);
	}
	
	public function kendaraan(){
	 return $this->db->get("kendaraan");
	}
	
	public function actKendaraan($data){
	 $this->db->insert("kendaraan",$data);
	}
	
	public function transaksi(){
	 return $this->db->get("transaksi");
	}
	
	public function blnTransaksi($date){
	 return $this->db->query("SELECT * FROM transaksi WHERE MONTH(create_at)=MONTH('".$date."') AND YEAR(create_at)=YEAR('".$date."') AND status='1'");
	}
	
	
	public function getKendaraan($data){
	return $this->db->where($data)->get("kendaraan")->row();
	}
	
	
	public function akun(){
	return $this->db->where("role!=","admin")->get("akun");
	}
	
}