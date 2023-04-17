<?php 
	$data['header_title'] = 'ÜYE ARAMA';
	IMPORT::view('header',$data); 
?>

<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>ÜYE SORGULAMA FORMU</h5>
			<span class="btp"><a href="<?php echo P::link('uye/yeni') ?>"><button>ÜYE EKLE</button></a></span>
		</div>
		<div class="widget-content nopadding">
		<form action="" method="post">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th >ÜYE NO</th>
						<th width="400">ÜYE ADI SOYADI</th>
						<th>ENGEL GRUBU</th>
						<th>İL</th>
						<th>İLÇE</th>
						<th>ÜYE DURUMU</th>
						<th>ÜYELİK TÜRÜ</th>
						<th>TALEPLER</th>
						</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td><input type="text" name="uyeno"></td>
						<td>
						<select name="uyeadi" id="select2" class="span12">
						<option value="">Seçiniz...</option>
							<?php foreach (Myfnc::uye() as $key): ?>
								<option value="<?php echo $key->uyeno ?>"><?php echo $key->adi.' '.$key->soyadi.' - '.$key->i_mh.' MAH.' ?></option> 
							<?php endforeach ?>
							</select>
						</td>
						<td>
							<select name="engelgrubu" id="" class="span12">
								<option value="">Seçiniz...</option>
								<option value="BEDENSEL">BEDENSEL</option>
								<option value="ZİHİNSEL">ZİHİNSEL</option>
								<option value="İŞİTME">İŞİTME / DUYMA</option>
								<option value="GÖRME">GÖRME</option> 
								<option value="HASTALIK">HASTALIK</option>
								<option value="SÜREĞEN HASTALIK">SÜREĞEN HASTALIK</option>
							</select>
						</td>
						<td>
							<select name="il" class="span12">
								<option value="">Seçiniz...</option>
								<?php foreach (il_select() as $key ): ?>
									<option value="<?php echo $key->i_il; ?>"><?php echo $key->i_il; ?></option>
								<?php endforeach ?>
							</select>
						</td>
						<td>
							<select name="ilce" class="span12">
								<option value="">Seçiniz...</option>
								<?php foreach (ilce_select() as $key ): ?>
									<option value="<?php echo $key->i_ilce; ?>"><?php echo $key->i_ilce; ?></option>
								<?php endforeach ?>
							</select>
						</td>

						<td>
							<select name="uyedurumu" id="" class="span12">
								<option value="">SEÇİNİZ</option>
								<option value="AKTİF" >AKTİF</option>
								<option value="ONAY BEKLİYOR">ONAY BEKLİYOR</option>
								<option value="VEFAT">VEFAT</option>
								<option value="AYRILDI">AYRILDI</option>
								<option value="ÇIKARILDI">ÇIKARILDI</option>
							</select>
						</td>

						<td>
							<select name="uyetur"  class="span11" >
								<option value="">Seçiniz...</option> 
								<option value="ENGELLİ ÜYE">ENGELLİ ÜYE</option>
								<option value="SAĞLAM ÜYE">SAĞLAM ÜYE</option>
								<option value="ENGELLİ VASİSİ">ENGELLİ VASİSİ</option>
								<option value="ÜYE DEĞİL">ÜYE DEĞİL</option>					
							</select>
						</td>

						<td>
							<select name="talep" id="select3" class="span12"> 
								<option value="0">Seçiniz</option>
								<?php foreach (Myfnc::talep() as $key): ?>
									<option value="<?php echo $key->adi ?>"><?php echo $key->adi ?></option>
								<?php endforeach ?>
							</select>
						</td>
						
					</tr>
					<tr>
						<td colspan="8"><button class="btn btn-primary span12">ÜYELERDE ARA</button></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>
	</div>
	<hr>
	
	<hr>

	<!-- start arama sonuçlarını listeleme bölümü -->
<form action="" method="post">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>ÜYE BİLGİ</h5>
			<span class="btp">
				<button type="submit" name="islem" value="uyelikformu">ÜYELİK FORMU</button>
				<button type="submit" name="islem" value="detay">DETAY</button> 
				<button type="submit" name="islem" value="duzenle">DÜZENLE</button>
			</span>
			
		</div>
		<div class="widget-content nopadding">
		<form action="" method="post">
			<table class="table table-bordered table-striped" id="uyetable">
				<thead>
					<tr>
						<th width="20">SEÇ</th>
						<th width="39">ÜYE NO</th>
						<th width="70">KAYIT TARİHİ</th>
						<th width="70">ÜYELİK TİPİ</th>
						<th width="60">TC NO</th>
						<th>ÜYE ADI SOYADI</th>
						<th>ADRESİ</th>
						<th>TELEFONLARI</th>
						
						</tr>
				</thead>
				
					<tbody>
						<?php if ($uyebilgi) {foreach ($uyebilgi as $key ){ ?>
					<tr class="odd gradeX">
						<td class="center"><input type="radio" name="id" value="<?php echo $key->uyeno; ?>"></td>
						
						<td class="center"><?php echo $key->uyeno ?></td>
						<td class="center"><?php echo tcevir($key->mtarih); ?></td>
						<td class="center"><?php echo $key->uyetur ?></td>
						<td class="center"><?php echo $key->tcno ?></td>
						<td><?php echo $key->adi.' '.$key->soyadi.' ( '.Myfnc::yas($key->dtarih).' )'; ?></td>
						<td><?php echo $key->evadres ?></td>
						<td class="center"><?php echo $key->ev_tel.' '.$key->gsm ?></td>
						
						
					</tr>
					<?php } } ?> 
				</tbody>
				
				
			</table>
			</form>
		</div>
	</div>

</form>
<!-- stop arama sonuçlarını listeleme bölümü -->
<?php Import::view('footer'); ?>