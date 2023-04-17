<?php import::view('header'); ?>
<!-- Ayni Yardım Teslim Belgesi -->
<div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="fa fa-th-large"></i> </span>
            <h5>Ayni Yardım Teslim Belgesi Arama Formu</h5>
            <span class="btp"><a href="<?php echo P::link('uye/ara') ?>"><button><i class="fa fa-plus"></i> EKLE</button></a></span>
      </div>
      <form action="" method="post">
            <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th>Kocan no</th>
                                    <th>Makbuz no</th>                                   
                                    <th>Yardım Alanın Adı Soyadı </th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr class="odd gradeX">
                                    <td>
                                          <select name="kocanno" id="" class="span12" onchange="submit()">
                                                <option value="">Seçiniz..</option>
                                                <?php foreach ($kocanno as $key) {
                                                      echo '<option value="'.$key->kocanno.'">'.$key->kocanno.'</option>';
                                                } ?>
                                          </select>
                                    </td>
                                    <td>
                                         <select name="msira" id="" class="span12" onchange="submit()">
                                          <option value="">Seçiniz..</option>
                                          <?php foreach ($msira as $key) {
                                                echo '<option value="'.$key->msira.'">'.$key->msira.'</option>';
                                          } ?>
                                    </select>
                              </td>
                             
                              <td>
                                    <select name="adi" id="" class="span12 select2" onchange="submit()">
                                          <option value="0">Seçiniz..</option>
                                                                                  
                                          <?php foreach ($isim as $key) {
                                                echo '<option value="'.$key->adi.'">'.$key->adi.'</option>';
                                          } ?>
                                       
                                    </select>
                              </td>

                        </tr>
                  </tbody>
            </table>
      </div>
</form>
</div>


<style>
.center td{
      text-align: center;
}
.center{
      background: #515151;
      color:#fff;
      font-weight: bolder;
}
</style>
<!-- sorguları listeliyoruz -->
<?php 

if (isset($listele)) {
      $kisi = '';
      if (method::post('adi')) {$kisi = 'Aranan kişi: '.method::post('adi'); }
      echo $kisi.' Bulunan kayıt sayısı: '.COUNT($listele);



      foreach ($listele as $key ){ ?>
      <table class="table table-bordered table-striped">
            <thead>
                  <tr><th width="80">Teslim Tarihi</th>
                        <th width="30">K No</th>
                        <th width="30">M No</th>
                        <th>Yardım Alanın Adı Soyadı </th>
                        <th>Adresi</th>
                        <th>Telefonu</th>
                        <th>Teslim Alanın Adı Soyadı</th>
                        <th>Teslim Edenin Adı Soyadı</th>
                  </tr>
            </thead>
            <tbody>

                  <tr class="odd gradeX">
                        <td><?php echo Myfnc::tarih($key->ttarih,'-'); ?></td>
                        <td><?php echo $key->kocanno; ?></td>
                        <td><?php echo $key->msira; ?></td>

                       
                        <td><?php echo $key->adi ?></td>
                        <td><?php echo $key->yyeri ?></td>
                        <td><?php echo $key->telefon ?></td>
                        
                        <td><?php echo $key->talan; ?></td>
                        <td><?php echo $key->teden; ?></td>
                  </tr>

                  <!-- malzemeleri listeliyoruz -->
                  <tr class="center" >
                        <td width="10">SN</td>
                        <td colspan="5">Açıklama</td>
                        <td>Miktarı</td>
                        <td>Birim</td>
                  </tr>
                  <?php foreach (aytbList($key->id) as $key1 ): ?>
                       <tr>
                        <td><?php echo $key1->sirano ?></td>
                        <td colspan="5"><?php 
                              if ($key1->aciklama) {$aciklama = $key1->mcinsi.' / '.$key1->aciklama;}else{$aciklama = $key1->mcinsi;}
                              echo $aciklama; ?>
                        </td>
                        <td><?php echo $key1->adet; ?></td>
                        <td><?php echo $key1->birim; ?></td>
                  </tr>
            <?php endforeach ?>
            <tr>

                  <td colspan="8"> 
                        <span class="btp">
                              <a href="<?php echo P::link("makbuz/aytb_edit/$key->id"); ?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> Düzenle</button></a> 

                              <a href="<?php echo P::link("makbuz/aytb_delete/$key->id"); ?>" onclick="return confirm('Bu makbusu silmek istediğinize eminmisiniz..?')"><button class="btn btn-primary"><i class="fa fa-remove"></i> SİL</button></a>
                        </span>
                  </td>
            </tr>

      </tbody>
</table>

<?php } } ?>
<?php import::view('footer'); ?> 