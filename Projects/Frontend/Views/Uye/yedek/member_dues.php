<?php IMPORT::view('header');?>

<div class="widget-box">
	<div class="widget-title"><span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span> 
		<h5>ÜYE AİDAT SORGULAMA FORMU</h5>
	</div>
	<div class="widget-content nopadding">
	
		<form action="" method="POST" class="form-vertical">
			<table class="table table-bordered table-striped"> 
				<thead>
					<tr>
						<th width="100">ÜYE NO</th>
						<th >ÜYE ADI SOYADI</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
					<td><input type="text" name="id" class="span11"></td>
						<td>
							<select name="id" id="select2" class="span12" >
								<option value="0">Seçiniz...</option> 
								<?php foreach (Myfnc::uye() as $key ): ?> 
									<option value="<?php echo $key->uyeno ?>">
										<?php 
										if($key->i_mh){$f = ': '.$key->i_mh.' MAH.';}
										echo $key->adi.' '.$key->soyadi.$f;   ?>
									</option> 
								<?php endforeach ?>
							</select> 
						</td>
					</tr>    
				
					<tr>
						<td colspan="5">
							
						 <button class="btn btn-block btn-primary">ARA</button></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div><hr>

<?php if ($uyebilgi){ ?>
	
<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>AİDAT GİRİŞ FORMU</h5>
		</div>
		<div class="widget-content nopadding">
		<form action="" method="post">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>MAKBUZ KESİM TARİH</th>
						<th>MAKBUZ NO</th>
						<th>MAKBUZU KESEN</th>
						<th>AİDAT YILI</th>
						<th>AİDAT ÜCRETİ</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td><input type="text" name="mkt" id="tarih" class="span12"></td>
						<td><input type="text" name="mn" class="span12"></td>
						<td>
						<select name="mk" id="" class="span12">
							<optgroup label="Aktif Yönetim Kurulu">
							<option value="">Seçiniz...</option>
							<?php foreach (Myfnc::yonetim() as $key): ?>
								<option value="<?php echo $key->adi; ?>"><?php echo $key->adi; ?></option>
							<?php endforeach ?> 
							</optgroup>
							<optgroup label="Pasif Yönetim Kurulu">
							<?php foreach (Myfnc::yonetim('0') as $key): ?>
								<option value="<?php echo $key->adi; ?>"><?php echo $key->adi; ?></option>
							<?php endforeach ?>
							</optgroup>
						</select>
					
					</td>
						<td><input type="text" name="ay" class="span12" value="<?php echo gmdate('Y') ?> 	"></td>
						<td><input type="text" name="au" class="span10" value="15"> TL
						<input type="hidden" name="islem" value="aidatkaydet">
						<input type="hidden" name="uyeno" value="<?php echo $uyebilgi->uyeno; ?> ">
						</td>
					</tr>
					<tr>
						<td colspan="5"><button class="btn btn-primary span12">AİDAT KAYDET</button></td>
					</tr>
				</tbody>
			</table>
			</form>
		</div>
	</div>

<div class="row-fluid">
	<div class="span6">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
				<h5>ÜYE BİLGİLERİ</h5>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered table-striped">
					<tr><td>ÜYE NO</td><td><?php echo $uyebilgi->uyeno; ?></td></tr>
					<tr><td>ADI SOYADI</td><td ><?php echo $uyebilgi->adi.' '.$uyebilgi->soyadi; ?></td></tr>
					<tr><td>TC NO</td><td ><?php echo $uyebilgi->tcno; ?></td></tr>
					<tr><td>YERLEŞİM YERİ</td><td ><?php echo $uyebilgi->evadres; ?></td></tr>
					<tr><td>ÜYELİK TARİHİ</td><td ><?php echo Myfnc::tarih($uyebilgi->ubt,'-'); ?></td></tr>
					<tr><td>ÜYELİK TİPİ</td><td><?php echo $uyebilgi->uyetur; ?></td></tr>
				</table>
			</div>
		</div>
	</div>
<div class="span6">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>AİDAT LİSTESİ</h5>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>MAKBUZ KESİM TARİH</th>
						<th>MAKBUZ NO</th>
						<th>MAKBUZU KESEN</th>
						<th>AİDAT YILI</th>
						<th>AİDAT ÜCRETİ</th>
						<th>İŞLEMLER</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($aia as $key): ?>
						<tr class="odd gradeX">
							<td style="text-align: center"><?php echo  Myfnc::tarih($key->mkt, '-'); ?></td>
							<td style="text-align: center"><?php echo $key->mno ?></td>
							<td style="text-align: center"><?php echo $key->mkesen ?></td>
							<td style="text-align: center"><?php echo $key->ay ?></td>
							<td style="text-align: center"><?php echo $key->au.' TL' ?></td>
							<td style="text-align: center;">
								<a href="<?php echo P::link('uye/edit_dues/'.$key->id) ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
								<a href="<?php echo P::link('uye/delete_dues/'.$key->id) ?>" onclick="return window.confirm('Bu kaydı silmek istediginden emimisin');"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>								
							</td>	
						</tr> 
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	
</div>
</div>

<?php } ?> 

<?php Import::view('footer'); ?>