var path=$(location).attr("pathname");
var split=path.split("/");
var base_url=$(location).attr("origin");

switch(split[split.length-1]){
case "Akun":
$(".akun").addClass("active");
data(base_url+path+"/getAkun",
[
{"data" : "id_akun"},
{"data" : "nama"},
{"data" : "email"},
{"data" : "img"},
{"data" : "username"},
{"data" : "password"},
{"data" : "kelamin"},
{"data" : "tlp"},
{"data" : "kota"},
{"data" : "poin"},
{"data" : "role"},
{"data" : "aksi"}
]);
break;
case "Iklan":
$(".iklan").addClass("active");
data(base_url+path+"/getIklan",
[
{"data" : "id_iklan"},
{"data" : "gambar"},
{"data" : "aksi"}
]);
break;
case "Kategori":
$(".kategori").addClass("active");
data(base_url+path+"/getKategori",
[
{"data" : "id_kategori"},
{"data" : "nama"},
{"data" : "gambar"},
{"data" : "poin"},
{"data" : "aksi"}
]);
break;
case "Produk":
$(".produk").addClass("active");
data(base_url+path+"/getProduk",
[
{"data" : "id_produk"},
{"data" : "kategori"},
{"data" : "nama"},
{"data" : "gambar"},
{"data" : "deskripsi"},
{"data" : "stok"},
{"data" : "harga"},
{"data" : "diskon"},
{"data" : "bobot"},
{"data" : "aksi"}
]);
break;
case "Reward":
$(".reward").addClass("active");
data(base_url+path+"/getReward",
[
{"data" : "id_reward"},
{"data" : "nama"},
{"data" : "gambar"},
{"data" : "stok"},
{"data" : "poin"},
{"data" : "aksi"}
]);
break;
case "Give_Reward":
$(".give").addClass("active");
data(base_url+path+"/getGive",
[
{"data" : "id_give"},
{"data" : "nama"},
{"data" : "username"},
{"data" : "reward"},
{"data" : "sts"},
{"data" : "aksi"}
]);
break;
case "Transaksi":
$(".transaksi").addClass("active");
data(base_url+path+"/getTransaksi",
[
{"data" : "id_transaksi"},
{"data" : "nota"},
{"data" : "nama"},
{"data" : "username"},
{"data" : "kota"},
{"data" : "total"},
{"data" : "bukti"},
{"data" : "resi"},
{"data" : "alamat"},
{"data" : "create_at"},
{"data" : "sts"},
{"data" : "aksi"}
]);
break;
}

function data(url,kolom){
 $(".datatable").DataTable({
 processing : true,
 serverSide : true,
 ajax : {
 "type" : "POST",
 "url" : url
 },
 columns : kolom,
 "fnCreatedRow" : function(row,data,index){
 $("td",row).eq(0).html(index+1);
 }
 });
}



function kategori(type,nama,poin){
$("input[name='type']").val(type);
$("input[name='nama']").val(nama);
$("input[name='poin']").val(poin);
if(type=="tambah"){
$(".form-group:eq(1)").show();
$(".mybtn").removeClass("btn btn-info").addClass("btn btn-primary").val("Tambah");
}else{
$(".form-group:eq(1)").hide();
$(".mybtn").removeClass("btn btn-primary").addClass("btn btn-info").val("Edit");
}
}

function produk(type,kategori,nama,deskripsi,stok,harga,diskon,bobot){
$("input[name='type']").val(type);
$("select[name='kategori']").val(kategori);
$("input[name='nama']").val(nama);
$("textarea[name='deskripsi']").val(deskripsi);
$("input[name='stok']").val(stok);
$("input[name='harga']").val(harga);
$("input[name='diskon']").val(diskon);
$("input[name='bobot']").val(bobot);
if(type=="tambah"){
$(".form-group:eq(2)").show();
$(".mybtn").removeClass("btn btn-info").addClass("btn btn-primary").val("Tambah");
}else{
$(".form-group:eq(2)").hide();
$(".mybtn").removeClass("btn btn-primary").addClass("btn btn-info").val("Edit");
}
}

function reward(type,nama,stok,poin){
$("input[name='type']").val(type);
$("input[name='nama']").val(nama);
$("input[name='stok']").val(stok);
$("input[name='poin']").val(poin);
if(type=="tambah"){
$(".form-group:eq(1)").show();
$(".mybtn").removeClass("btn btn-info").addClass("btn btn-primary").val("Tambah");
}else{
$(".form-group:eq(1)").hide();
$(".mybtn").removeClass("btn btn-primary").addClass("btn btn-info").val("Edit");
}
}

function give(id,data){
window.location=base_url+path+"/upGive/"+id+"/"+data.value;
}

function transaksi(id,data){
window.location=base_url+path+"/upTransaksi/"+id+"/"+data.value;
}

function bukti(id,bukti,resi){
 $("input[name='id_transaksi']").val(id);
 $("input[name='resi']").val(resi);
 $("#bukti").html('<img src="'+base_url+"/"+split[split.length-2]+"/"+bukti+'" width="300px">');
}