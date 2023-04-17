@cardStart('MALZEME Düzenleme FORMU','','1')

<form action="" method="post">
    @formInput('MALZEME ADI','malzemeAdi', malzemeAdi($id))
    
    @formBlock('Durum',' <select name="durum" class="form-select">
        <option value="0">Pasif</option>
        <option value="1">Aktif</option>
    </select>')



   
   
    @formButton('KAYDET','primary btn-block','submit')
</form>

@cardEnd()