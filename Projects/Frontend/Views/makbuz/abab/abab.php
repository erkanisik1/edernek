<?php import::view('header'); ?>
<h2>Ayni Bağış Alındı Belgesi İşlemleri</h2>
      <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="fa fa-th-list"></i> </span>
                  <h5>Ayni Bağış Alındı Belgesi Arama Formu</h5>
                  <span class="btp"><a href="<?php echo P::link('makbuz/abab_giris') ?>"><button><i class="fa fa-plus"></i> EKLE</button></a></span>
            </div>
            <form action="" method="post">
            <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th>Kocan no</th>
                                    <th>Makbuz no</th>
                                    <th>Bağışı yapan </th>
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
                                    <select name="bagisci" id="" class="span12" onchange="submit()">
                                          <option value="">Seçiniz..</option>
                                          <?php foreach ($adi as $key) {
                                                echo '<option value="'.$key->adi.'">'.$key->adi.'</option>';
                                          } ?>
                                    </select>
                              </td>

                        </tr>

                        
                  </tbody>
            </table>
      </div></form>
</div>

<style>
     
      .center{
            background: #515151;
            color:#fff;
            font-weight: bolder;
      }
</style>
<!-- sorguları listeliyoruz -->
<?php if (isset($listele)) {
foreach ($listele as $key ){ ?>
      
      <table class="table table-bordered table-striped">
            <thead>
                  <tr>
                        <th width="80" >Teslim Tarihi</th>
                        <th width="30" >K No</th>
                        <th width="30" >M No</th>
                        <th >Bağışı yapan </th>
                        <th >Adresi </th>
                        <th >Telefonu</th>
                        <th >Teslim Alan</th>
                  </tr>
            </thead>
            <tbody>

                  <tr class="odd gradeX">
                        <td><?php echo Myfnc::tarih($key->ttarih,'-'); ?></td>
                        <td><?php echo $key->kocanno; ?></td>
                        <td><?php echo $key->msira; ?></td>
                        <td><?php echo $key->adi; ?></td>
                        <td><?php echo $key->yyeri ?></td>
                        <td><?php echo $key->telefon ?></td>
                         <td><?php echo $key->talan; ?></td>
                  </tr>

                  <!-- malzemeleri listeliyoruz -->
                  <tr class="center" >
                        <td width="10">SN</td>
                        <td colspan="5">Açıklama</td>
                        <td>Miktarı</td>
                  </tr>
                  <?php foreach (abbList($key->id) as $lst):  ?>
                        <tr>
                         <td><?php echo $lst->abb_sn; ?></td>
                        <td colspan="5"><?php echo $lst->abb_mc; ?></td>
                        <td><?php echo $lst->abb_miktar.' '.$lst->abb_birim; ?></td>
                        </tr>
                  <?php endforeach ?>
               
                  <tr>
                        <td colspan="7"> <span class="btp"><a href="<?php echo P::link("makbuz/abab_edit/$key->id"); ?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> Düzenle</button></a> <a href="<?php echo P::link("makbuz/abab_delete/$key->id"); ?>" onclick="return confirm('Bu makbusu silmek istediğinize eminmisiniz..?')"><button class="btn btn-primary"><i class="fa fa-remove"></i> SİL</button></a></span></td>
                  </tr>
            </tbody>
      </table>

<?php } } ?>
<?php import::view('footer'); ?> 