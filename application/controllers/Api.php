<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct(){
     parent::__construct();
     $this->load->model("M_Api","api"); 
    }
    
	public function index()
	{
	 echo "Selamat Datang Di API NabillahStore v1"; 
	}
	
	private function respon($respon){
	 $this->output
	 ->set_status_header(200)
	 ->set_content_type("application/json","utf-8")
	 ->set_output(json_encode($respon),JSON_PRETTY_PRINT)
	 ->_display();
	 exit;
	}
	
	public function login(){
	$respon=array();
	$data=(array)json_decode(file_get_contents("php://input"));
	$sql=$this->api->login($data);
	if($sql->num_rows() > 0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]="Akun Belum Terdaftar";
	}
	$this->respon($respon);
	}
	
	public function daftar(){
	 $respon=array();
	 $data=(array)json_decode(file_get_contents("php://input"));
	 if($this->api->login(["username"=>$data["username"]])->num_rows()==0){
	 $sql=$this->api->daftar($data);
	 if($sql){
	  $respon["status"]=200;
	  $respon["data"]=$this->api->login(["id_akun"=>$sql])->result();
	 }else{
	  $respon["status"]=404;
	  $respon["data"]="Daftar Gagal";
	 }
	 }else{
	  $respon["status"]=404;
	  $respon["data"]="Username Sudah Terpakai";
	 }
	 $this->respon($respon);
	}
	
	public function iklan(){
	$respon=array();
	$sql=$this->api->iklan();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]="Iklan Kosong";
	}
	$this->respon($respon);
	}
	
	public function kategori(){
	$respon=array();
	$sql=$this->api->kategori();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function event(){
	 $respon=array();
	 $sql=$this->api->event();
 	if($sql->num_rows()>0){
	  $respon["status"]=200;
  	$respon["data"]=$sql->result();
 	}else{
  	$respon["status"]=404;
  	$respon["data"]=null;
 	}
 	$this->respon($respon);
	}
	
	public function produkTop(){
	 $respon=array();
	$sql=$this->api->produkTop();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["event"]=$this->db->get("event")->num_rows();
	//$respon["data"]=$sql->result();
	$r=array();
	foreach($sql->result() as $rr){
	 array_push($r,array("id_produk"=>$rr->id_produk,
	 "id_kategori"=>$rr->id_kategori,
	 "nama"=>$rr->nama,
	 "img"=>$rr->img,
	 "deskripsi"=>$rr->deskripsi,
	 "stok"=>$rr->stok,
	 "harga"=>$rr->harga,
	 "diskon"=>$rr->diskon,
	 "bobot"=>$rr->bobot,
	 "rate"=>round($rr->rate)));
	}
	
	$respon["data"]=$r;
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function produk(){
	$respon=array();
	$sql=$this->api->produk();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["event"]=$this->db->get("event")->num_rows();
	//$respon["data"]=$sql->result();
	$r=array();
	foreach($sql->result() as $rr){
	 array_push($r,array("id_produk"=>$rr->id_produk,
	 "id_kategori"=>$rr->id_kategori,
	 "nama"=>$rr->nama,
	 "img"=>$rr->img,
	 "deskripsi"=>$rr->deskripsi,
	 "stok"=>$rr->stok,
	 "harga"=>$rr->harga,
	 "diskon"=>$rr->diskon,
	 "bobot"=>$rr->bobot,
	 "rate"=>round($this->rate($rr->id_produk))));
	}
	
	$respon["data"]=$r;
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function rate($id){
	 return $this->db
	 ->select("AVG(rate) as rate")
  ->where(["id_produk"=>$id,"rate!="=>"0"])
  ->get("item_transaksi")
  ->row()->rate;
	}
	
	public function produkId($id){
 $respon=array();
	$sql=$this->api->produkId(["id_produk"=>$id]);
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function displayProduk($query){
	 $respon=array();
	 $sql=$this->api->displayProduk($query);
	 if($sql->num_rows()>0){
	  $respon["status"]=200;
	  $respon["event"]=$this->db->get("event")->num_rows();
	  //$respon["data"]=$sql->result();
	  $r=array();
	  foreach($sql->result() as $rr){
	 array_push($r,array("id_produk"=>$rr->id_produk,
	 "id_kategori"=>$rr->id_kategori,
	 "nama"=>$rr->nama,
	 "img"=>$rr->img,
	 "deskripsi"=>$rr->deskripsi,
	 "stok"=>$rr->stok,
	 "harga"=>$rr->harga,
	 "diskon"=>$rr->diskon,
	 "bobot"=>$rr->bobot,
	 "rate"=>round($this->rate($rr->id_produk))));
	}
	$respon["data"]=$r;
	 }else{
   $respon["status"]=404;
	  $respon["data"]=null;
	 }
	 $this->respon($respon);
	}

 public function nota(){
  $sql=$this->api->nota();
  if($sql->num_rows()>0){
   $nota=(int)substr($sql->row()->nota,9,4);
   return "INV".substr(date("Y"),2).date("md").sprintf("%04s",$nota+1);
  }else{
   return "INV".substr(date("Y"),2).date("md")."0001";
  }
 }
 
 public function admin(){
	$respon=array();
	$sql=$this->api->admin();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["kota"]=$sql->row()->kota;
	$respon["data"]=$this->api->rek()->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
 /*public function transaksi(){
  $respon=array();
  $data=(array)json_decode(file_get_contents("php://input"));
  $item=$data["data"];
  $data["bukti"]=$data["bukti"]!=""?$this->uploadimage("img_bukti/",$data["bukti"]) : "";
  $data["nota"]=$this->nota();
  $data["create_at"]=date("Y-m-d");
  unset($data["data"]);
  $id=$this->api->transaksi("transaksi",$data);
  if($id){
   foreach($item as $r){
    $r=(array)$r;
    $r["id_transaksi"]=$id;
    $this->api->transaksi("item",$r);
   }
   $respon["status"]=200;
  }else{
   $respon["status"]=404;
  }
  $this->respon($respon);
 }*/
 
  public function transaksi(){
  $respon=array();
  $data=(array)json_decode(file_get_contents("php://input"));
  $item=$data["data"];
  $data["bukti"]=$data["bukti"]!=""?$this->uploadimage("img_bukti/",$data["bukti"]) : "";
  $data["nota"]=$this->nota();
  $data["create_at"]=date("Y-m-d");
  $data["status_event"]=$this->api->validEvent(count($item));
  unset($data["data"]);
  $id=$this->api->transaksi("transaksi",$data);
  if($id){
   foreach($item as $r){
    $r=(array)$r;
    $r["id_transaksi"]=$id;
    $this->api->transaksi("item",$r);
   }
   $respon["status"]=200;
  }else{
   $respon["status"]=404;
  }
  $this->respon($respon);
 }
 
 	private function uploadimage($path,$dataimage){
	 //Untuk Upload
	 $dataimage=str_replace("data:image/png;base64,","",$dataimage);
	 $dataimage=str_replace("data:image/jpg;base64,","",$dataimage);
	 $dataimage=str_replace("data:image/jpeg;base64,","",$dataimage);
	 $dataimage=str_replace(" ","+",$dataimage);
  $dataimage=base64_decode($dataimage);
  $name=$path.uniqid(rand(),true).".jpg";
  if(file_put_contents("./".$name,$dataimage)){
   return $name;
  }
	}
	
	
	public function riwayat($id){
	$respon=array();
	$sql=$this->api->riwayat($id);
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function bayar($id){
	 $respon=array();
	 $data=(array)json_decode(file_get_contents("php://input"));
	 $data["bukti"]=$this->uploadimage("img_bukti/",$data["bukti"]);
	 $this->api->bayar(["id_transaksi"=>$id],$data);
	 $respon["status"]=200;
	 $respon["data"]="Pembayaran Berhasil";
	 $this->respon($respon);
	}
 
 public function leader(){
	$respon=array();
	$sql=$this->api->leader();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function akun($id){
	$respon=array();
	$sql=$this->api->login(["id_akun"=>$id]);
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function upFoto($id){
	 $respon=array();
	 $data=(array)json_decode(file_get_contents("php://input"));
	 $data["img"]=$this->uploadimage("img_profile/",$data["img"]);
	 $this->api->upFoto(["id_akun"=>$id],$data);
	  $respon["status"]=200;
	  $respon["data"]="Update Foto Profile Berhasil";
	 $this->respon($respon);
	}
	
	public function dltFoto($id){
	 if(unlink("./".$this->api->login(["id_akun"=>$id])->row()->img)){
	 $respon=array();
	 $this->api->dltFoto(["id_akun"=>$id],["img"=>""]);
	  $respon["status"]=200;
	  $respon["data"]="Hapus Foto Profile Berhasil";
	 $this->respon($respon);
	 }
	}
	
	public function upProfile($id){
	 $respon=array();
	 $data=(array)json_decode(file_get_contents("php://input"));
	 $this->api->upProfile(["id_akun"=>$id],$data);
	 $respon["status"]=200;
	 $respon["data"]=$this->api->login(["id_akun"=>$id])->result();
	 $this->respon($respon);
	}
	
	public function reward(){
 $respon=array();
	$sql=$this->api->reward();
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	public function addReward(){
 $respon=array();
 $data=(array)json_decode(file_get_contents("php://input"));
	$sql=$this->api->addReward($data);
	$respon["status"]=200;
	$respon["data"]="Tukar Hadiah Berhasil";
	$this->respon($respon);
	}
	
	public function idReward($id){
 $respon=array();
	$sql=$this->api->idReward($id);
	if($sql->num_rows()>0){
	$respon["status"]=200;
	$respon["data"]=$sql->result();
	}else{
	$respon["status"]=404;
	$respon["data"]=null;
	}
	$this->respon($respon);
	}
	
	/*public function addKota(){
	 $data=(array)json_decode(file_get_contents("php://input"));
	 foreach($data as $dt){
	  $d=(array)$dt;
	  $this->db->insert("kota",$d);
	 }
	 }*/
	 
	 public function review($id){
	  $sql=$this->api->review(["id_transaksi"=>$id,"rate"=>"0"]);
	  if($sql->num_rows()>0){
	  $respon["status"]=200;
	  $respon["data"]=$sql->result();
	  }else{
  	$respon["status"]=404;
  	$respon["data"]=null;
  	}
  	$this->respon($respon);
	 }
	 
	 public function actReview($id){
	  $data=(array)json_decode(file_get_contents("php://input"));
	  $this->api->actReview(["id_item_transaksi"=>$id],$data);
	  $respon["status"]=200;
	  $this->respon($respon);
	 }
	
} 