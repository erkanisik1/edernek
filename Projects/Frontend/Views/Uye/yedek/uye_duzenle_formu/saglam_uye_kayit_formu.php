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


 ?>
 <input type="hidden" name="save" value="2">
<button class=" btn btn-primary btn-block" type="submit">ÜYE KAYDINI TAMAMLA</button>

</form>
<?php import::view('footer'); ?>