<?php import::view('header'); ?>
<hr>
Son Kaydedilen üye -> üyeno: <?php echo $sonuye->uyeno; ?> Adı Soyadı: <?php echo $sonuye->adi.' '.$sonuye->soyadi; ?>
<hr>
<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-user"></i> </span>
		<h5>ÜYE HAKKINDA KISA BİLGİ</h5> 
	</div>
	<div class="widget-content nopadding">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="100">Müracaat Tarihi</th>
					<th>Üye Adı</th>
					<th>Üyelik Türü</th>
				</tr>
			</thead>

			<tbody>
				<tr class="odd gradeX">
					<td width="10"><?php echo Myfnc::tarih($onaybilgi->mtarih,'-'); ?></td>
					<td><?php echo $onaybilgi->adi.' '.$onaybilgi->soyadi; ?></td>
					<td><?php echo $onaybilgi->uyetur; ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"> <span class="icon"> <i class="fa fa-user"></i> </span>
		<h5>ÜYELİK ONAYLAMA FORMU</h5> 
	</div>
	<div class="widget-content nopadding">
		<form action="" method="post" class="form-horizontal">
			 <div class="control-group">
              <label class="control-label">KARAR DEFTERİ NO :</label>
              <div class="controls">
                <input type="text" name="kararno" class="span11" placeholder="Karar defterindeki üyelik kabul edildiği sayfanın numarası..." required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">ÜYELİK NUMARASI :</label>
              <div class="controls">
                <input type="text" name="uyeno" class="span11" placeholder="Üyeye  verilen üyelik numarasını yazın..." required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">ÜYE BAŞLANGIÇ TARİHİ:</label>
              <div class="controls">
                <input type="date" name="ubt" class="span11" placeholder="Üyelik başlangıç tarihini girin" required>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">NOT</label>
              <div class="controls">
                <input type="text" name="not" class="span11" placeholder="Üye hakkındda eklemek istediğiniz notu girin...">
              </div>
            </div>
           
            <div class="form-actions">
            <input type="hidden" name="id" value="<?php echo $onaybilgi->id; ?>">
              <button type="submit" class="btn btn-success">ÜYELİĞİ ONAYLA</button>
            </div>
          </form>
	</div>
</div>

	

	<?php import::view('footer'); ?>