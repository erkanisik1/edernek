<?php import::view('header'); ?>
<form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">

<div class="widget-box">
      <div class="widget-title"><span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
            <h5>AYNİ YARDIM TESLİM BELGESİ</h5>
      </div>
      <div class="widget-content nopadding">

            <table class="table table-bordered table-striped">
                  <thead>
                        <tr><th width="50">BELGE HAZIRLAMA TARİHİ</th>
                              <th width="50">KOÇAN NO</th>
                              <th width="50">MAKBUZ SIRA NO</th>
                              
                        </tr>
                  </thead>
                  <tbody>
                        <tr class="odd gradeX">
                         <td>
                              <input type="date" name="bht" id="tafrih" class="span12" >     
                              </td>
                              <td ><input type="text" name="kocanno" id="" class="span12" ></td>
                              <td><input type="text" name="msira" class="span12"></td>
                             
                              </tr>    
                              <tr>
                                    <td colspan="3" class="btn-primary" style="text-align: center;font-weight: bolder;font-size: 16px;">YARDIM ALANIN İLETİŞİM BİLGİLERİ </td>
                              </tr>
                                                          
                        </tbody>
                  </table>

                  <div class="control-group">
                       
                      <div class="control-group">
                        <label class="control-label">ADI SOYADI: </label>
                        <div class="controls">
                              <input type="text" name="isim" class="span11 buyuk" placeholder="Adını Yazın" value="<?php echo $kisi->adi.' '.$kisi->soyadi; ?>" READONLY>
                              
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">ADRESİ: </label>
                        <div class="controls">
                              <input type="text" name="adres"   class="span11 buyuk" value="<?php echo $kisi->evadres; ?>">
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">TELEFONU: </label>
                        <div class="controls">
                              <input type="tel" name="telefon"  class="span11" value="<?php echo $kisi->ev_tel.' '.$kisi->gsm; ?>">
                        </div>
                  </div>             
                                   
                                                        
                        </div>
                             
<hr>
                  <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <td colspan="5" class="btn-primary" style="text-align: center;font-weight: bolder;font-size: 16px;">VERİLEN MALZEMENİN BİLGİLERİ</td>
                  </tr>
                        <tr>
                              <th width="20">SN</th>
                              <th>MALZEMENİN CİNSİ</th>
                              <th width="20">MİKTARI</th>
                              <th width="100">BİRİM</th>
                              <th>AÇIKLAMA</th>
                        </tr>
                  </thead> 
                  <tbody>
                  <?php for ($i=1; $i < 10 ; $i++) { ?>
                      <tr class="odd gradeX">
                              <td >
                                    <input type="text" name="aytb<?php echo $i; ?>[]" id="telefon" class="span12" value="<?php echo $i; ?>" disabled>
                              </td>
                              <td>
                                    <select name="aytb<?php echo $i; ?>[]" id="" class="span11">
                                          <option value="">seciniz...</option>
                                          <?php foreach ($malzeme as $key): ?>
                                                <option value="<?php echo $key->adi; ?>"><?php echo $key->adi ?></option>
                                          <?php endforeach ?>
                                    </select>

                              </td>
                              <td><input type="text" name="aytb<?php echo $i; ?>[]" class="span12" value="1"></td>
                              <td>
                                    <select name="aytb<?php echo $i; ?>[]" id="" class="span12">
                                          <option value="">SEÇİNİZ...</option>
                                          <option value="ADET" selected>ADET</option>
                                          <option value="KOLİ">KOLİ</option>
                                          <option value="PAKET">PAKET</option>
                                    </select>
                              </td>
                              <td><input type="text" name="aytb<?php echo $i; ?>[]" class="span11" ></td>
                        </tr>
                        
                  <?php } ?>
                        </tbody>
                  </table>


            <table class="table table-bordered table-striped">
                  <thead>
                        <tr>
                              <th width="50">TESLİM EDENİN ADI SOYADI</th>
                              <th width="50">TESLİM TARİHİ</th>
                              <th width="50">TESLİN ALANIN ADI SOYADI</th>
                        </tr>
                  </thead>
                  <tbody>
                        <tr class="odd gradeX">
                              <td >
                                    <select name="teden" id="" class="span11" required>
                                          <option value="">Seçiniz...</option>
                                          <optgroup label="Aktif Yönetim">
                                          <?php foreach (yonetim() as $key ): ?>
                                                <option value="<?php echo $key->adi; ?>"><?php echo $key->adi; ?></option>
                                          <?php endforeach ?>
                                          </optgroup>
                                           <optgroup label="Eski Yönetim">
                                          <?php foreach (eskiyonetim() as $key ): ?>
                                                <option value="<?php echo $key->adi; ?>"><?php echo $key->adi; ?></option>
                                          <?php endforeach ?>
                                          </optgroup>
                                    </select>
                              </td>
                              <td><input type="date" name="ttarih" class="span12" required></td>
                              <td><input type="text" name="talan" class="span12 buyuk" required></td>                                  
                        </tr>    
                             
                                                          
                        </tbody>
                  </table><hr>
                  <input type="hidden" name="uyeid" value="<?php echo $kisi->id; ?>">
                  <button type="submit" class="btn btn-success btn-block">AYNİ YARDIM TESLİM BELGESİNİ KAYDET</button>

            </div>
      </div>
      </form>
<?php import::view('footer'); ?> 