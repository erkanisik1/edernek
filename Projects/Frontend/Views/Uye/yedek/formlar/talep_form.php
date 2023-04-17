	<!-- ÜYE TALEPLERİ -->
	<div class="widget-box" id="talep" style="display: none;">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-signal"></i> </span>
			<h5>ÜYE TALEBİ</h5>
		</div>
		<div class="widget-content">
			<?php foreach ($talep as $key) {?>
			<label><input type="checkbox" name="talep[]" value="<?php echo $key->adi ?>"> <?php echo $key->adi ?></label>
			<?php } ?>
		</div>
	</div>
	<!-- /ÜYE TALEPLERİ -->