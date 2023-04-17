<?php import::view('header'); include'modal.php'; ?>
<form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">

      <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
                  <h5>Ayni Yardım Alındı Belgesi Düzenleme Formu</h5>
            </div>
            <div class="widget-content nopadding">

                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th width="50">KOÇAN NO</th>
                                    <th width="50">MAKBUZ SIRA NO</th>
                                    <th width="50">NASIL VERİLDİ</th>
                              </tr>
                        </thead>
                        <tbody>
                              <tr class="odd gradeX">
                                    <td ><input type="number" name="kno"  class="span12" min="1" value="<?php echo $edit->kocanno ?>" ></td>
                                    <td><input type="number" name="mtno" class="span12" min="1" value="<?php echo $edit->msira; ?>"></td>
                                    <td>
                                          <select name="tur" id="" class="span12">
                                                <option value="MAKBUZ">MAKBUZ</option>
                                                <option value="TUTANAK">TUTANAK</option>         
                                          </select>
                                    </td>

                              </tr>    
                              <tr>
                                    <td colspan="3" class="btn-primary" style="text-align: center;font-weight: bolder;font-size: 16px;">YARDIM EDEN KİŞİNİN KİŞİSEL BİLGİLERİ</td>
                              </tr>
                              
                        </tbody>
                  </table>

                  <div class="control-group">
                        <label class="control-label">BAĞIŞÇININ ADI SOYADI: </label>
                        <div class="controls">
                              <input type="text" name="bas"   value="<?php echo $edit->adi; ?>" class="span11 buyuk">
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">BAĞIŞÇININ ADRESİ: </label>
                        <div class="controls">
                              <input type="text" name="badres"   value="<?php echo $edit->yyeri; ?>" class="span11 buyuk">
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">BAĞIŞÇININ TELEFONU: </label>
                        <div class="controls">
                              <input type="tel" name="btel" id="tel1"  value="<?php echo $edit->telefon; ?>" class="span11">
                        </div>
                  </div>
                  <hr>
                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <td colspan="4" class="btn-primary" style="text-align: center;font-weight: bolder;font-size: 16px;">ALINAN BAĞIŞIN BİLGİLERİ
                                          <div class="pull-right">
                                                <button class="btn"><a href="#ekle" data-toggle="modal"><i class="fa fa-plus"></i> Ekle</a></button>
                                          </div>
                                    </td>
                              </tr>
                              <tr>
                                    <th width="20">SN</th>
                                    <th>MALZEMENİN CİNSİ</th>
                                    <th width="20">MİKTARI</th>
                                    <th width="100">BİRİM</th>

                              </tr>
                        </thead>
                        <tbody>
                              <?php 
                                    $count = COUNT(abbList($edit->id));
                                    foreach (abbList($edit->id) as $key ):?>
                                         <tr class="odd gradeX">

                                    <td >
                                          <!-- abb id 0 -->
                                          <input type="hidden" name="<?php echo 'ab'.$key->abb_sn.'[]'; ?>" value="<?php echo $key->abb_id; ?>" >
                                          <!-- abb sn 1 -->
                                          <input type="text" name="<?php echo 'ab'.$key->abb_sn.'[]'; ?>" id="" class="span12" value="<?php echo $key->abb_sn ?>"></td>
                                    <td>
                                          <!-- verilen malzeme 2 -->
                                          <input type="text" name="<?php echo 'ab'.$key->abb_sn.'[]'; ?>" value="<?php echo $key->abb_mc; ?>" class="span12 buyuk">
                                          
                                    </td>
                                    <td>

                                          <!-- adet 3 -->
                                          <input type="number" name="<?php echo 'ab'.$key->abb_sn.'[]'; ?>" value="<?php echo $key->abb_miktar; ?>" class="span12" min="1"></td>
                                    <td>
                                          <!-- birim 4 -->
                                          <select name="<?php echo 'ab'.$key->abb_sn.'[]'; ?>" id="" class="span12">
                                                <option value="">SEÇİNİZ...</option>
                                                <option value="ADET" selected>ADET</option>
                                                <option value="KUTU">KUTU</option>
                                                <option value="KOLİ">KOLİ</option>
                                                <option value="PAKET">PAKET</option>
                                          </select>
                                    </td>
                              </tr>
                              <?php endforeach ?>

                        </tbody>
                  </table>

                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <th width="50">TESLİM EDENİN ADI SOYADI</th>
                                    <th width="50">TESLİM ALINAN TARİH</th>
                                    <th width="50">TESLİN ALANIN ADI SOYADI</th>
                              </tr>
                        </thead>
                              <tbody>
                                    <tr class="odd gradeX">
                                          <td ><input type="text"  name="teas"  value="<?php echo $edit->teden; ?>"  class="span12 buyuk" ></td>
                                          <td><input type="date" name="tat" value="<?php echo $edit->ttarih; ?>"  class="span12"></td>
                                          <td><input type="text"  name="taas"  value="<?php echo $edit->talan; ?>"  class="span12 buyuk"></td>                                  
                                    </tr>    


                              </tbody>
                        </table><hr>
                        <input type="hidden" name="islem" value="editsave">
                        <input type="hidden" name="id" value="<?php echo $edit->id; ?>">
                        <button type="submit" class="btn btn-success btn-block">AYNİYAT ALINDI BELGESİNİ KAYDET</button>

                  </div>
            </div>
      </form>
      <?php import::view('footer'); ?> 