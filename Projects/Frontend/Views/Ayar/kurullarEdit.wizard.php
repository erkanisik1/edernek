@cardStart('KURUL ÜYESİ DÜZENLEME FORMU')

<form action="" method="post">

	@formSelect('ADI SOYADI','adi','uyeList','isim','isim',yonetimEdit($id)->adi)
	@formSelect('GÖREVİ','gorevi','kurulGorev','name','name',yonetimEdit($id)->gorevi)
	@formSelect('GÖREV ALDIĞI KURUL','kurul_adi','kurullar','name','name',yonetimEdit($id)->kurul_adi)
    @formInput('GÖREV BAŞLAMA TARİHİ','ilktarih', yonetimEdit($id)->ilk_tarih,'date')
    @formInput('GÖREV BİTİŞ TARİHİ','sontarih', yonetimEdit($id)->son_tarih,'date')
    @formblock('İMZA YETKİSİ',
    	formcheck('radio',['imzaYetki','imzaYetki'],[1,0],['EVET','HAYIR'],yonetimEdit($id)->imzaYetki)
    )

    @formblock('AKTİFMİ?',
    	formcheck('radio',['durum','durum'],[1,0],['EVET','HAYIR'],yonetimEdit($id)->durum)
    )

    <!-- 
    	formcheck(type,name,value,etiket,selected)
    	formInput(Başlık,name, value, type)
     -->
    
	@formInput('','id',$id,'hidden')
    @formButton('GÜNCELLE','primary btn-block','submit')
</form>



@cardEnd()


          