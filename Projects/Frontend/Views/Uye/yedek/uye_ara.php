<?php 
	$data['header_title'] = 'ÜYE ARAMA';
	IMPORT::view('header',$data); 
	include('formlar/uye_sorgulama_formu.php');
?>

<?php if ($uyebilgi) { ?>

	<!-- arama sonuçlarını listeleme bölümü -->
<form action="" method="post">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-bars"></i> </span>
			<h5>ÜYE BİLGİ</h5>
			
		</div>
		<div class="widget-content nopadding">
		<form action="" method="post">
			<table class="table table-bordered table-striped" id="uyetable">
				<thead>
					<tr>
						<th>ID</th>
						<th width="39">ÜYE NO</th>
						<th width="70">KAYIT TARİHİ</th>
						<th width="70">ÜYELİK TİPİ</th>
						<th width="60">TC NO</th>
						<th>ÜYE ADI SOYADI</th>
						<th>ADRESİ</th>
						<th>TELEFONLARI</th>
						<th width="150">İŞLEMLER</th>
						
						</tr>
				</thead>
				
					<tbody>
						<?php $a = null; 
						if (!$uyebilgi) {
							alert('ARADIĞINI '.$post['uyeno'].' NOLU ÜYE KAYITLARIMIZDA YOKTUR.');
						}
						
						foreach ($uyebilgi as $key ){ $a = (int)$a + 1;?>
					<tr class="odd gradeX">
						<td class="center"><?php echo $key->id; ?></td>
						<td class="center"><?php echo $key->uyeno ?></td>
						<td class="center"><?php echo tcevir($key->mtarih); ?></td>
						<td class="center"><?php echo $key->uyetur ?></td>
						<td class="center"><?php echo $key->tcno ?></td>
						<td><?php echo $key->adi.' '.$key->soyadi.' ( '.yasi($key->dtarih).' )'; ?></td>
						<td><?php echo evadresi($key->id) ?></td>
						<td class="center"><?php echo $key->ev_tel.' '.$key->gsm ?></td>
						<td>
							<a href="<?php echo P::link().'uye/duzenle/'.$key->id; ?>" class="tooltips btn btn-primary">
								<span class="tooltiptext">DÜZENLEME FORMU</span><i class="fa fa-pencil"></i>
							</a>

							<a href="<?php echo P::link().'uye/detay/'.$key->id; ?>" class="tooltips btn btn-success">
								<span class="tooltiptext">DETAY FORMU ( KİŞİYE AİT TÜM İŞLEMLERİN GÖRÜLDÜĞÜ SAYFADIR )</span><i class="fa fa-eye"></i>
							</a>

							<a href="<?php echo P::link().'uye/uyelikformu/'.$key->id; ?>" class="tooltips btn btn-info">
								<span class="tooltiptext">ÜYELİK FORMU</span><i class="fa fa-share"></i>
							</a>

							<a href="<?php echo P::link().'makbuz/aytb_cikis/'.$key->id; ?>" class="tooltips btn btn-warning">
								<span class="tooltiptext">AYNİ MAKBUZ ÇIKIŞI</span><i class="fa fa-bars"></i>
							</a>

						</td>	
						
						
					</tr>
					<?php }  ?> 
				</tbody>
				
				
			</table>
			</form>
		</div>
	</div>

</form>
<?php } ?>
<!-- /Arama sonuçlarını listeleme bölümü -->
<?php Import::view('footer'); ?>