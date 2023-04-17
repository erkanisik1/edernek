	<div class="widget-box" id="ikamet" style="display: none;">
		<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
			<h5>ÜYE İKAMET BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">
			<div class="control-group">
				<label class="control-label">*İL : </label>
				<div class="controls">
					<select name="i_il" id="il" class="span11" required>
						<option>Seçiniz...</option>
						<?php foreach (il_select_list() as $key): ?>
							<option value="<?php echo $key->CityID ?>"><?php echo $key->CityName ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*İLÇE : </label>
				<div class="controls">
					<select name="i_ilce" id="ilce" class="span11" required >
						<option>Önce İli Seçiniz...</option>

					</select>
					
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">SEMT / KÖY: </label>
				<div class="controls">
					<input type="text" name="i_semt_koy" value="" class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA SEMT ADI YADA KÖY ADI">
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">*MAHALLE : </label>
				<div class="controls">
					<input type="text" name="i_mh" value="" class="span11" onkeypress="return BuyukHarf(event);" required placeholder="MAHALLE ADI ">
				</div>
				
			</div>
			

			<div class="control-group">
				<label class="control-label">CADDE: </label>
				<div class="controls">
					<input type="text" name="i_cd" id="" value=""  class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA CADDE ADI">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">* SOKAK: </label>
				<div class="controls">
					<input type="text" name="i_sk" id="" value="" required onkeypress="return BuyukHarf(event);" class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SİTE ADI: </label>
				<div class="controls">
					<input type="text" name="i_site" value="" id="" onkeypress="return BuyukHarf(event);" class="span11">
				</div>
			</div>

			
			<div class="control-group">
				<label class="control-label">BİNA NO: </label>
				<div class="controls">
					<input type="text" name="i_kapino" id="" value="" required > DAİRE NO: <input type="text" value="" name="i_daireno" id="" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON 1: </label>
				<div class="controls">
					<input type="text" name="telefon1" value="" id="tel1"  > TELEFON 2:  <input type="text" name="telefon2" value="" id="tel2"  >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">CEP TELEFON: </label>
				<div class="controls">
					<input type="text" name="cep1" value="" id="tel3"  > CEP TELEFON 2:  <input type="text" name="cep2" value="" id="tel4"  >
				</div>
			</div>

		</div>
	</div>