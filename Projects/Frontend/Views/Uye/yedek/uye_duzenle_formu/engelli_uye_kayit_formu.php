<?php import::view('header'); ?>
<style>
.check label{
	float:left;
	margin-right: 15px;		
}
</style>
<form class="form-horizontal" method="post" action="#" >
<?php 
	include('formlar/kimlik_form.php'); 
	include('formlar/ikamet_form.php'); 
	include('formlar/meslek_form.php');
	include('formlar/saglik_form.php'); 	
 	include('formlar/egitim_form.php');
 	include('formlar/diger_form.php');
 	include('formlar/evrak_form.php'); 
 	include('formlar/talep_form.php');  


 ?>
 <input type="hidden" name="save" value="3">
<button class=" btn btn-primary btn-block" type="submit">ÜYE KAYDINI TAMAMLA</button>

</form>
<?php import::view('footer'); ?>