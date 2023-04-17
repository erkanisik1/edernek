@cardStart('Kişi, Kurum yada firma ekleme formu','','1')
<form method="post">
@formSelect('Kategori','kategori','rehberKategori', 'id', 'kat_adi')
<div class="row">
  <div class="col-6">
    @formInput('ADI ','adi')
  </div>
  <div class="col-6">
    @formInput('SOYADI','soyadi')
  </div>
</div>
@formInput('Adresi','adres')


@formInput('Telefonları','tel','','Birden fazla telefon varsa araya virgül koyarak ve (000) 000-00-00 şeklinde yazın.')
<div class="row">
  <div class="col-6">
    @formInput('E-posta Adresi','email','','sık kullanılan E-posta adresini yazın','email')
  </div>
  <div class="col-6">
    @formInput('Web Sitesi Adres','web','','https:// ve www eklemeden yazın...')
  </div>
</div>
@formtextarea('NOT','not')
@formButton('KAYDET')
</form>

@cardEnd()