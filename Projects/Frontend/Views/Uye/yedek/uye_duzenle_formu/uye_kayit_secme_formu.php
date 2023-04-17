<?php import::view('header'); ?>
<style>
.check label{
	float:left;
	margin-right: 15px;		
}
</style>
<form class="form-horizontal" method="post" action="#" >	
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="icon icon-info-sign"></i> </span>
			<h5>FORM BİLGİLER</h5>
		</div>
		<div class="widget-content nopadding">
			<div class="control-group">
				<label class="control-label">ÜYELİK TÜRÜ</label>
				<div class="controls">
					<select name="uyelik_turu" id="uyetur" class="span11" required autofocus onchange="submit();">
						<option value="">Seçiniz...</option> 
						<option value="ENGELLİ ÜYE">ENGELLİ ÜYE</option>
						<option value="SAĞLAM ÜYE">SAĞLAM ÜYE</option>
						<option value="ENGELLİ VASİSİ">ENGELLİ VASİSİ</option>
						<option value="ÜYE DEĞİL">ÜYE DEĞİL</option>

					</select>
				</div>
			</div>
		</div>
	</div>
</form>
<?php import::view('footer'); ?>