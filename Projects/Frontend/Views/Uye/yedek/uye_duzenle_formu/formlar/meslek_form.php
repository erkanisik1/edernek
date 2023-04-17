<div class="widget-box" >
		<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
			<h5>ÜYE MESLEK BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">
			<div class="control-group" id="clsyrm">
				<label class="control-label">*ÜYE ÇALIŞIYORMU: </label>
				<div class="controls">
					<select name="calisiyormu" id="calisiyormu" >
						<option value="">Seçiniz...</option>
						<option value="EVET">EVET</option>
						<option value="HAYIR">HAYIR</option>
						<option value="EMEKLİ">EMEKLİ</option>
					</select>
				</div>
			</div>
			<!-- eğer üstteki şıkta evet yada emekli seçilirse mesleği varmı sorulacak -->
			<div ">
				<div class="control-group">
					<label class="control-label">ÜYENİN MESLEĞİ VARMI: </label>
					<div class="controls">
						<select id="mslk">
							<option value="">SEÇİNİZ...</option>
							<option value="EVET">EVET</option>
							<option value="HAYIR">HAYIR</option>
							
						</select>
					</div>
				</div>
			</div>

			<div id="mslkinput" style="display:none;">
				<div class="control-group">
					<label class="control-label">MESLEĞİ: </label>
					<div class="controls">
						<input type="text" name="meslegi" id="" value="" onkeypress="return BuyukHarf(event);" class="span11">
					</div>
				</div>
			</div>

			<!-- üyenin çalışıyormu sorusuna evet seçilirse gösterilecek -->

			<!-- ÜYENİN ÇALIŞTIĞI YER VE MESLEK BİLGİLERİ -->
			<div id="cal">		

				<div class="control-group">
					<label class="control-label">ÇALIŞTIĞI FİRMA ADI: </label>
					<div class="controls">
						<input type="text" name="firmaadi" value="" id="" onkeypress="return BuyukHarf(event);"  class="span11">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">*İL : </label>
					<div class="controls">

						<select name="is_il" id="isil" class="span5" >
							<option>Seçiniz...</option>
							<?php foreach (il_select_list() as $key): ?>
								<option value="<?php echo $key->CityID ?>"><?php echo $key->CityName ?></option>
							<?php endforeach ?>
						</select> İLÇE: <select name="is_ilce" id="isilce" class="span6">
							<option>Önce İli Seçiniz...</option>
							
						</select>

					</div>
				</div>

				

				<div class="control-group">
					<label class="control-label">MAHALLE: </label>
					<div class="controls">
						<input type="text" name="is_mah" value="" id="" onkeypress="return BuyukHarf(event);" class="span11">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">CADDE: </label>
					<div class="controls">
						<input type="text" name="is_cd" value="" id="" onkeypress="return BuyukHarf(event);" class="span11">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">SOKAK: </label>
					<div class="controls">
						<input type="text" name="is_sk" value="" id="" onkeypress="return BuyukHarf(event);" class="span11">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">SİTE ADI: </label>
					<div class="controls">
						<input type="text" name="is_site" value="" id="" onkeypress="return BuyukHarf(event);" class="span11">
					</div>
				</div>


				<div class="control-group">
					<label class="control-label">BİNA NO: </label>
					<div class="controls">
						<input type="text" class="span5" name="is_kapino"  > KAPI NO: 
						<input type="text" class="span6" name="is_daireno"  >
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">TELEFON 1: </label>
					<div class="controls">
						<input type="text" name="is_telefon1" class="span5" id="tel5"  > FAX: 
						<input type="text" name="is_fax" class="span6" id="tel6"  >
					</div>
				</div>
			</div>

			<!-- /ÜYENİN ÇALIŞTIĞI YER VE MESLEK BİLGİLERİ -->
		</div>
	</div>
