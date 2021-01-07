<?php
defined("BASEPATH")OR exit("No direct script access allowed");

class Transaksi extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model("M_Transaksi","transaksi");
}

public function index(){
$this->set->halaman("transaksi/transaksi");
}

public function getTransaksi(){
echo $this->transaksi->getTransaksi();
}

public function detail($id){
$data["transaksi"]=$this->transaksi->detail("transaksi",["id_transaksi"=>$id])->row();
$data["detail"]=$this->transaksi->detail("detail",["id_transaksi"=>$id])->result();
$this->set->halaman("transaksi/detail",$data);
}

public function upTransaksi($id,$status){
 $this->transaksi->upTransaksi($id,$status);
 redirect("Transaksi");
}

public function resetBukti($id){
 $this->transaksi->resetBukti(["id_transaksi"=>$id]);
 redirect ("Transaksi");
}

public function upResi(){
 $id=$this->input->post("id_transaksi");
 $resi=$this->input->post("resi");
 $this->transaksi->upResi(["id_transaksi"=>$id],["resi"=>$resi,"status"=>"1"]);
 redirect("Transaksi");
}


public function cetak($id){
 $transaksi=$this->transaksi->detail("transaksi",["id_transaksi"=>$id])->row();
 $detail=$this->transaksi->detail("detail",["id_transaksi"=>$id])->result();
 $this->load->library("pdf");
 $pdf=new FPDF("L","mm","A4");
 $pdf->AddPage();
 //Judul
 $pdf->SetFont("Arial","B",20);
 $pdf->Cell(277,10,"Nabillah Store",0,1,"C");
 $pdf->Cell(277,5,"",0,1,"C");
 //Header
 $pdf->SetFont("Arial","",15);
 $pdf->Cell(138.5,7,"NOTA : ".$transaksi->nota,0,0,"L");
 $pdf->Cell(138.5,7,"TUJUAN : ".ucwords($transaksi->kota),0,1,"R");
 $pdf->Cell(138.5,7,"NAMA : ".ucwords($transaksi->nama),0,0,"L");
 $pdf->Cell(138.5,7,"TGL.PEMBELIAN : ".$transaksi->create_at,0,1,"R");
 //Detail Transaksi
 $pdf->Cell(277,10,"Detail Transaksi :",0,1,"L");
 
 $pdf->SetFillColor(230,230,230);
 $pdf->Cell(20,15,"NO",1,0,"C",TRUE);
 $pdf->Cell(160,15,"NAMA BARANG",1,0,"C",TRUE);
 $pdf->Cell(30,15,"JUMLAH",1,0,"C",TRUE);
 $pdf->Cell(67,15,"TOTAL",1,1,"C",TRUE);
 
 //konten Transaksi
 $nmr=1;
 foreach($detail as $data){
  $pdf->Cell(20,15,$nmr++,1,0,"C");
  $pdf->Cell(160,15,$data->nama,1,0,"C");
  $pdf->Cell(30,15,$data->qty,1,0,"C");
  $pdf->Cell(67,15,number_format($data->total,0,",","."),1,1,"C");
 }
 
 //footer Transaksi
 $pdf->Cell(210,15,"TOTAL PEMBAYARAN : ",1,0,"R");
 $pdf->Cell(67,15,number_format($transaksi->total,0,",","."),1,1,"C");
 
 $pdf->Output();
}



public function laporan(){
 $waktu=$this->input->post("waktu");
 $waktu=explode("-",$waktu);
 $sql=$this->transaksi->laporan($waktu[1],$waktu[0]);
 $this->load->library("pdf");
 $pdf=new FPDF("P","mm","Letter");
 $pdf->AddPage();
 $pdf->SetFont("Arial","B",20);
 $pdf->Cell(195,10,"Nabillah Store",0,1,"C");
 $pdf->Cell(195,10,"",0,1);
 //Header
 $pdf->SetFillColor(230,230,230);
 $pdf->SetFont("Arial","B",11);
 $pdf->Cell(15,10,"NO",1,0,"C",TRUE);
 $pdf->Cell(100,10,"NAMA BARANG",1,0,"C",TRUE);
 $pdf->Cell(25,10,"JUMLAH",1,0,"C",TRUE);
 $pdf->Cell(55,10,"TOTAL HARGA",1,1,"C",TRUE);
 
 //Body
 $nmr=1;
 $total=0;
 foreach($sql->result() as $data){
  $pdf->SetFont("Arial","",11);
  $pdf->Cell(15,10,$nmr++,1,0,"C");
  $pdf->Cell(100,10,$data->nama,1,0,"C");
  $pdf->Cell(25,10,$data->qty,1,0,"C");
  $pdf->Cell(55,10,"Rp.".number_format($data->total,2,",","."),1,1,"C");
  $total+=$data->total;
 }
 
 //Footer
 $pdf->SetFont("Arial","B",11);
 $pdf->Cell(140,10,"TOTAL : ",1,0,"R");
 $pdf->Cell(55,10,"Rp.".number_format($total,2,",","."),1,1,"C");
 
 $pdf->Output("I","Transaksi_".$waktu[0].$waktu[1].".pdf");
}

}