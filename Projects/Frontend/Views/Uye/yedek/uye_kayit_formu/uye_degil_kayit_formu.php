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
			<h5>ÜYE OLMADAN HİZMET ALAN KİŞİLERİN KAYIT FORMU</h5>
		</div>
		<div class="widget-content nopadding">

			<div class="control-group">
				<label class="control-label">MÜRACAAT TARİHİ</label>
				<div class="controls">
					<input type="date" class="span11" name="mtarih" id="mtarih" value="" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*TC NO: </label>
				<div class="controls">
					<input type="text" name="tcno" value="" id="tcno" maxlength="11"  class="span11" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >

				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*ADI SOYADI: </label>
				<div class="controls">
					<input type="text" name="adi" id=""  class="span5" value="" onkeypress="return BuyukHarf(event);"  required placeholder="Kişinin adını yazın....">
					<input type="text" name="soyadi" id=""  class="span6" value="" onkeypress="return BuyukHarf(event);"  required placeholder="Kişinin soyadını yazın....">
				</div>
			</div>

			

			<div class="control-group">
				<label class="control-label">*ADRESİ: </label>
				<div class="controls">
					<input type="text" name="uyedegiladres" id="" value=""  class="span11" onkeypress="return BuyukHarf(event);" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON: </label>
				<div class="controls">
					<input type="text" name="gsm" value="" id="tel1"  class="span11">
				</div>
			</div>

		
		</div>
	</div>
	<input type="hidden" name="save" value="1">
	
<button class=" btn btn-primary btn-block" type="submit">KİŞİ KAYDINI TAMAMLA</button>

</form>
<?php import::view('footer'); ?>