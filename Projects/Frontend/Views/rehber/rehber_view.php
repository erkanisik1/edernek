<?php import::view('header'); ?>
<!-- rehber arama formu -->

<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>REHBER ARAMA FORMU</h5>
			<span class="btp"><a href="<?php echo P::link('rehber/yeni') ?>"><button>Kişi Yada Kurum ekle</button></a></span>
		</div>
		<div class="widget-content nopadding">
		<form action="" method="post">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<td>Kategori</td>
						<td>Adı Soyadı</td>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select name="kategori" id="" class="span11">
								<option value="">Seçiniz</option>
								<?php foreach ($kategori as $key ): ?>
									<option value="<?php echo $key->kategori; ?>"><?php echo $key->kategori; ?></option>
								<?php endforeach ?>
							</select>
						</td>
						<td>	
							<select name="isim" id="" class="span11">
								<option value="">Seçiniz</option>
								<?php foreach ($isim as $key ): ?>
									<option value="<?php echo $key->isim; ?>"><?php echo $key->isim; ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><button type="submit" class="span12">ARA</button></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- /rehber arama formu -->

<!-- rehber listeleme -->
<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
		<h5>REHBER LİSTELEME</h5>
		
	</div>
	<div class="widget-content nopadding">
		<table class="table table-bordered table-striped">
			<thead>
				<?php 
					if (isset($katara)) {
						
					
				foreach ($katara as $key){ ?>
				<tr>
					<td>Adı Soyadı</td>
					<td>Telefon1</td>
					<td>Telefon2</td>
					<td>Telefon3</td>
					<td>Fax</td>
					<td>Cep</td>
					<td>Email</td>
					<td>Web</td>
					<td>Kategorisi</td>
					<td>İşlemler</td>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><?php echo $key->isim; ?></td>
					<td><?php echo $key->tel1; ?></td>
					<td><?php echo $key->tel2; ?></td>
					<td><?php echo $key->tel3; ?></td>
					<td><?php echo $key->fax; ?></td>
					<td><?php echo $key->cep; ?></td>
					<td><?php echo $key->email; ?></td>
					<td><?php echo $key->web; ?></td>
					<td><?php echo $key->kategori; ?></td>
					<td><button><i class="fa fa-pencil"></i></button> <button><i class="fa fa-remove"></i></button></td>
				</tr>
				<tr >
					<td colspan="10" style="margin-bottom:15px; ">NOT: <?php echo $key->not; ?>		</td>
				</tr>
<tr >
					<td colspan="10" style="height: 2px;background: #575757 ">	</td>
				</tr>
					
				<?php } } ?>
			
			</tbody>
		</table>
	</div>
</div>
<!-- /rehber listeleme -->

<?php import::view('footer'); ?>