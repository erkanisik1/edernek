<?php import::view('header'); ?>
<?php echo 'Son kaydedilen koçan numarası: '.makbuzson('kocanno').' <br>Son kaydedilen makbuz numarası: '.makbuzson('msira'); ?>
<form class="form-horizontal" method="post" action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">

      <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fa fa-bars" aria-hidden="true"></i></span> 
                  <h5>Ayni Yardım Alındı Belgesi Girişi</h5>
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
                                    <td ><input type="number" name="kno"  class="span12" min="1" ></td>
                                    <td><input type="number" name="mtno" class="span12" min="1" value="<?php echo makbuzson('msira')+1; ?>"></td>
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
                              <input type="text" name="bas"   required class="span11 buyuk">
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">BAĞIŞÇININ ADRESİ: </label>
                        <div class="controls">
                              <input type="text" name="badres"   required class="span11 buyuk">
                        </div>
                  </div>

                  <div class="control-group">
                        <label class="control-label">BAĞIŞÇININ TELEFONU: </label>
                        <div class="controls">
                              <input type="tel" name="btel" id="tel1"  required class="span11">
                        </div>
                  </div>
                  <hr>
                  <table class="table table-bordered table-striped">
                        <thead>
                              <tr>
                                    <td colspan="4" class="btn-primary" style="text-align: center;font-weight: bolder;font-size: 16px;">ALINAN BAĞIŞIN BİLGİLERİ</td>
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
                              $a = ''; 
                              for ($i=0; $i < 9 ; $i++) { 

                                   
                                    $d = 'ab'.$a;
                                    $a = $i+1;
                                    echo '
                                    <tr class="odd gradeX">
                                          <td ><input type="text" name="'.$d.'[]" id="" class="span12" value="'.$a.'" disabled></td>
                                          <td><input type="text"  name="'.$d.'[]" class="span12 buyuk"></td>
                                          <td><input type="number" name="'.$d.'[]" value="1" class="span12" min="1"></td>
                                          <td>
                                                <select name="'.$d.'[]" id="" class="span12">
                                                      <option value="">SEÇİNİZ...</option>
                                                      <option value="ADET" selected>ADET</option>
                                                      <option value="KUTU">KUTU</option>
                                                      <option value="KOLİ">KOLİ</option>
                                                      <option value="PAKET">PAKET</option>
                                                </select>
                                          </td>
                                    </tr>';
                              }


                              ?>
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
                                    <td ><input type="text"  name="teas"  class="span12 buyuk" ></td>
                                    <td><input type="date" name="tat" class="span12"></td>
                                    <td><input type="text"  name="taas" class="span12 buyuk"></td>                                  
                              </tr>    
                              
                              
                        </tbody>
                  </table><hr>
                  <button type="submit" class="btn btn-success btn-block">AYNİYAT ALINDI BELGESİNİ KAYDET</button>

            </div>
      </div>
</form>
<?php import::view('footer'); ?> 