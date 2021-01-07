<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Event extends CI_Controller{
 
 function __construct(){
  parent::__construct();
  $this->load->model("M_Event","event");
 }
 
 public function index(){
  $data["event"]=$this->event->event();
  $this->set->halaman("event/event",$data);
 }
 
 public function addEvent(){
  $tgl=$this->input->post("tgl");
  $sk=$this->input->post("sk");
  $minimal=$this->input->post("minim");
  $poin=$this->input->post("poin");
  
  $img=$this->event->event();
  
  $config=array("upload_path"=>"./img_event/",
 "allowed_types"=>"png|jpg|jpeg",
 "remove_space"=>TRUE);
 $this->load->library("upload",$config);
 
 if($this->upload->do_upload("gambar")){
  if($img->num_rows()>0){
   unlink("img_event/".$img->row()->img);
   $this->event->dltEvent();
  }
  $data=array("img"=>$this->upload->data("file_name"),
  "tgl"=>$tgl,
  "sk"=>$sk,
  "minimal"=>$minimal,
  "poin"=>$poin);
  $this->event->addEvent($data);
  $this->session->set_flashdata("sukses","Tambah Data Berhasil");
 }else{
  $this->session->set_flashdata("gagal","Tambah Data Gagal");
 }
 redirect("Event");
 }
 
 
 public function dltEvent(){
  foreach(glob("img_event/*") as $un){
   unlink($un);
  }
  $this->event->dltEvent();
  redirect("Event");
 }
 
}