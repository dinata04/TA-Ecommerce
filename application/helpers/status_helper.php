<?php
defined("BASEPATH")OR exit("No direct script access allowed");

function status_give($id,$status){
if($status=="0"){
return '<select onchange="give('.$id.',this)" class="pilih bg-danger">
<option value="0" selected>Pending</option>
<option value="1">Proses</option>
<option value="2">Sukses</option>
</select>';
}elseif($status=="1"){
return '<select onchange="give('.$id.',this)" class="pilih bg-warning">
<option value="0">Pending</option>
<option value="1" selected>Proses</option>
<option value="2">Sukses</option>
</select>';
}elseif($status=="2"){
return '<select onchange="give('.$id.',this)" class="pilih bg-success">
<option value="0">Pending</option>
<option value="1">Proses</option>
<option value="2" selected>Sukses</option>
</select>';
}

}
  

function status_transaksi($id,$status){
if($status=="0"){
return '<select onchange="transaksi('.$id.',this)" class="pilih bg-danger">
<option value="0" selected>Pending</option>
<option value="1">Proses</option>
<option value="2">Sukses</option>
</select>';
}elseif($status=="1"){
return '<select onchange="transaksi('.$id.',this)" class="pilih bg-warning">
<option value="0">Pending</option>
<option value="1" selected>Proses</option>
<option value="2">Sukses</option>
</select>';
}elseif($status=="2"){
return '<select onchange="transaksi('.$id.',this)" class="pilih bg-success">
<option value="0">Pending</option>
<option value="1">Proses</option>
<option value="2" selected>Sukses</option>
</select>';
}

}