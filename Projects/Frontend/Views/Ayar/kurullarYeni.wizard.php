@cardStart('KURUL ÜYESİ EKLEME FORMU')

<form action="" method="post">

	@formSelect('ADI SOYADI','adi','uyeList','isim','isim')

	@formBlock('GÖREVİ','<select name="gorevi" class="form-select" required>
                  <option value="">SEÇİNİZ...</option>
                	<option value="BAŞKAN" >BAŞKAN</option>
                	<option value="BAŞKAN YARDIMCISI">BAŞKAN YARDIMCISI</option>
                	<option value="GENEL SEKRETER" >GENEL SEKRETER</option>
                	<option value="MUHASİP" >MUHASİP</option>
                	<option value="ASIL ÜYE">ASIL ÜYE</option>
                  <option value="YEDEK ÜYE">YEDEK ÜYE</option>
                </select>')


	@formBlock('GÖREV ALACAĞI KURUL','<select name="kurul_adi" id="" class="form-select" required>
                  <option value="YÖNETİM KURULU">YÖNETİM KURULU</option>
                  <option value="DENETLEME KURULU"  >DENETLEME KURULU</option>                  
                </select>')
    @formInput('GÖREV BAŞLAMA TARİHİ','ilktarih', '','date')
    @formInput('GÖREV BİTİŞ TARİHİ','sontarih', '','date')
    @formBlock('İMZA YETKİSİ','

						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="imzaYetki" value="1">
							<span class="form-check-label">Evet</span>
						</label>

						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="imzaYetki" value="0" checked>
							<span class="form-check-label">Hayır</span>
						</label>')
    @formButton('KAYDET','primary btn-block','submit')
</form>



@cardEnd()


          