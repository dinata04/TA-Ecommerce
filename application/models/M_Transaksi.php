<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class M_Transaksi extends CI_Model{

function getTransaksi(){
$this->load->helper("status");
$this->datatables
->select("transaksi.id_transaksi as id_transaksi,
transaksi.nota as nota,
akun.nama as nama,
akun.username as username,
akun.kota as kota,
transaksi.total as total,
transaksi.bukti as bukti,
transaksi.resi as resi,
transaksi.alamat as alamat,
transaksi.status as status,
transaksi.create_at as create_at")
->from("transaksi")
->join("akun","akun.id_akun=transaksi.id_akun","inner")
->edit_column('bukti','<img src="$2" width="70px" onclick="bukti(`$1`,`$2`,`$3`)" data-toggle="modal" data-target="#transaksi">','id_transaksi,bukti,resi')
->add_column('sts','$1','status_transaksi(id_transaksi,status)')
->add_column('aksi','<div class="btn-group"><a href="Transaksi/detail/$1" class="btn btn-info"><i class="fa fa-print"></i></button> <a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Data Ini?`)" href="Transaksi/hpsTransaksi/$1" class="btn btn-danger"><i class="fa fa-trash"></i></a> <a onclick="return confirm(`Apakah Anda Yakin Ingin Menghapus Bukti Transfer?`)" href="Transaksi/resetBukti/$1" class="btn btn-success"><i class="fa fa-credit-card"><i></a></div>','id_transaksi');
return $this->datatables->generate();
} 

function detail($type,$data){
if($type=="transaksi"){
return $this->db
->select("transaksi.nota,akun.nama,kota.kota as kota,transaksi.total,transaksi.create_at")
->from("transaksi")
->join("akun","akun.id_akun=transaksi.id_akun","inner")
->join("kota","transaksi.tujuan=kota.id_kota")
->where($data)
->get();
}elseif($type=="detail"){
return $this->db
->select("item_transaksi.id_item_transaksi, produk.nama, item_transaksi.qty, item_transaksi.total")
->from("item_transaksi")
->join("produk","produk.id_produk=item_transaksi.id_produk","inner")
->where($data)
->get();
}
}

function upTransaksi($id,$status){
 $tran=$this->db->where(["id_transaksi"=>$id])->get("transaksi")->row();
 $pUser=$this->db->where(["id_akun"=>$tran->id_akun])->get("akun")->row()->poin;
 $this->db->where(["id_transaksi"=>$id])->update("transaksi",["status"=>$status]);
 
 if($status=="2"){
   $poinTran=$this->db->query("SELECT SUM(item_transaksi.qty*kategori.poin) as poinTran FROM item_transaksi INNER JOIN produk ON item_transaksi.id_produk=produk.id_produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE item_transaksi.id_transaksi='".$id."'")->row()->poinTran;
   $this->db->where(["id_akun"=>$tran->id_akun])->update("akun",["poin"=>$pUser+$poinTran]);
   if($tran->status_event=="1"){
    $pUser2=$this->db->where(["id_akun"=>$tran->id_akun])->get("akun")->row()->poin;
   $poin=$this->db->query("SELECT poin FROM event ORDER BY id_event DESC LIMIT 1")->row()->poin;
   $this->db->where(["id_akun"=>$tran->id_akun])->update("akun",["poin"=>$pUser2+$poin]);
  }
  }
  
}

function resetBukti($id){
 if(unlink($this->db->where($id)->get("transaksi")->row()->bukti)){
  $this->db->where($id)->update("transaksi",["bukti"=>"","resi"=>"","status"=>"0"]);
 }
}

function upResi($id,$data){
 $this->db->where($id)->update("transaksi",$data);
}

function laporan($bln,$thn){
 return $this->db->query("SELECT produk.nama, item_transaksi.qty, item_transaksi.total FROM item_transaksi INNER JOIN transaksi ON item_transaksi.id_transaksi=transaksi.id_transaksi INNER JOIN produk ON item_transaksi.id_produk=produk.id_produk WHERE MONTH(transaksi.create_at)='".$bln."' AND YEAR(transaksi.create_at)='".$thn."'");
}

}