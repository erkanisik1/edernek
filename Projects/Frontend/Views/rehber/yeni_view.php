<?php import::view('header'); ?>
<div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Kişi, Kurum yada firma ekleme formu</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" class="form-horizontal" method="post">

            <div class="control-group">
              <label class="control-label"><span style="color:red;">*</span>Kategori</label>
              <div class="controls">
                <select name="kategori" class="span11" required>
                  <option value="">Seçiniz...</option>
                  <?php foreach ($kategori as $key): ?>
                    <option value="<?php echo $key->kategori; ?>"><?php echo $key->kategori; ?></option>
                  <?php endforeach ?>
                </select>
                 
              </div>             
            </div>

            <div class="control-group">
              <label class="control-label"><span style="color:red;">*</span>Adı Soyadı</label>
              <div class="controls">
                 <input type="text" class="span11" name="isim" required>
              </div>             
            </div>

             <div class="control-group">
              <label class="control-label">Adres</label>
              <div class="controls">
                <textarea name="adres" class="span11" rows="3"></textarea>                
              </div>             
            </div>

            <div class="control-group">
              <label for="normal" class="control-label">Telefonlar</label>
              <div class="controls">
                <input type="text" id="tel1" name="tel1" class="span2" placeholder="telefon1"> 
                <input type="text" id="tel2" name="tel2" class="span2" placeholder="telefon2"> 
                <input type="text" id="tel3" name="tel3" class="span2" placeholder="telefon3">
                <input type="text" id="tel4" name="fax" class="span2" placeholder="FAX">
                <input type="text" id="tel5" name="cep" class="span2" placeholder="GSM">
              </div>
            </div>

              <div class="control-group">
              <label class="control-label">E-posta Adresi</label>
              <div class="controls">
                 <input type="text" class="span11" name="email" placeholder="Varsa E-Posta Adresini Girin...">
              </div>             
            </div>

              <div class="control-group">
              <label class="control-label">Web Sitesi Adres</label>
              <div class="controls">
                 <input type="text" class="span11" name="web" placeholder="Varsa Web Sitesinin Adresini Girin...">
              </div>             
            </div>

             
             <div class="control-group">
              <label class="control-label">Not</label>
              <div class="controls">
                <textarea name="not" class="span11" rows="3" placeholder="Varsa bu kayıt için notlarınızı bu alana girin..."></textarea>                
              </div>             
            </div>
           <div class="form-actions">
              <button type="submit" class="btn btn-primary btn-block">KAYDET</button>
            </div>
          </form>
        </div>
      </div>
     

    </div>
<?php import::view('footer'); ?>