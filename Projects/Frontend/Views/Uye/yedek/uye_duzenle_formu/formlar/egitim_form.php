	<!-- ÜYE EĞİTİM BİLGİLERİ -->
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
			<h5>ÜYE EĞİTİM BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">

			<div class="control-group">
				<label class="control-label">ÖĞRENİM DURUMU: </label>
				<div class="controls">
					<select name="ogrenimdurumu" >
						<option value="">SEÇİNİZ...</option>
						<option value="OKUMA YAZMA  BİLMİYOR">OKUMA YAZMA BİLMİYOR</option>
						<option value="OKUR YAZAR">OKUR YAZAR</option>
						<option value="ÖZEL EĞİTİM">ÖZEL EĞİTİM</option>
						<option value="İLKOKUL">İLKOKUL</option>
						<option value="ORTAOKUL">ORTAOKUL</option>
						<option value="İLKÖĞRETİM">İLKÖĞRETİM</option>
						<option value="LİSE">LİSE</option>
						<option value="ÜNİVERSİTE">ÜNİVERSİTE</option>
					</select> HALEN OKUYORMU? 
					<select name="okuyormu" class="textarea" id="okuyormu">
						<option value="">BİLİNMİYOR</option>
						<option value="EVET">EVET</option>
						<option value="HAYIR">HAYIR</option>
						<option value="TERK">TERK</option>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">OKUL ADI: </label>
				<div class="controls">

					<input type="text" name="okul_adi" id="" value="" onkeypress="return BuyukHarf(event);" class="span5"> SINIFI YADA BÖLÜMÜ: <input type="text" name="sinif" value="" id="" onkeypress="return BuyukHarf(event);"  class="span5">
				</div>
			</div>
		</div>
	</div>
	<!-- /ÜYE EĞİTİM BİLGİLERİ -->