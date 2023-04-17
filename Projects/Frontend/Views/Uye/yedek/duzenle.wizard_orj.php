
<style>
.check label{
    float:left;
    margin-right: 15px;		
} 
</style>


<form action="" method="post" class="form-horizontal">

<!-- ÜYELİK TÜRÜ BİLGİLERİ -->
<div class="widget-box" id="uyelik_turu" >
    <div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> ÜYELİK BİLGİLERİ</h5>
    </div>
    <div class="widget-content nopadding">
        <div class="control-group">
            <label class="control-label">ÜYELİK TÜRÜ: </label>
            <div class="controls">							
                <select name="uyetur" id="uyetur" class="span11">
                    <option value="">Seçiniz...</option> 
                    <option value="ENGELLİ ÜYE" {[ selected('ENGELLİ ÜYE', uye_edit($id)->uyetur) ]}>ENGELLİ ÜYE</option>
                    <option value="SAĞLAM ÜYE" {[ selected('SAĞLAM ÜYE', uye_edit($id)->uyetur) ]}>SAĞLAM ÜYE</option>
                    <option value="ENGELLİ VASİSİ" {[ selected('ENGELLİ VASİSİ', uye_edit($id)->uyetur) ]}>ENGELLİ VASİSİ</option>
                    <option value="ÜYE DEĞİL" {[ selected('ÜYE DEĞİL', uye_edit($id)->uyetur) ]}>ÜYE DEĞİL</option>
                </select>				
            </div>
        </div>	


        <div class="control-group">
            <label class="control-label">BAŞVURU TARİHİ: </label>
            <div class="controls">	
                <input type="text" value="{[ echo tcevir(uye_edit($id)->mtarih) ]}" name="mtarih"  class="span1" id="mtarih" > ÜYELİK KABUL TARİHİ: 
                <input type="text" value="{[ echo tcevir(uye_edit($id)->ubt) ]}" name="ubt" class="span1" id="ubt" >  	ÜYELİK DURUMU:	 
                <select name="uyedurumu" id="uyedurumu" class="span8">
                    <option value="ONAY BEKLİYOR" {[ selected('ONAY BEKLİYOR', uye_edit($id)->uyedurumu) ]}>ONAY BEKLİYOR</option>
                    <option value="AKTİF" {[ selected('AKTİF', uye_edit($id)->uyedurumu) ]}>AKTİF</option>
                    <option value="VEFAT" {[ selected('VEFAT', uye_edit($id)->uyedurumu) ]}>VEFAT</option>
                    <option value="AYRILDI" {[ selected('AYRILDI', uye_edit($id)->uyedurumu) ]}>AYRILDI</option>
                    <option value="ÇIKARILDI" {[ selected('ÇIKARILDI', uye_edit($id)->uyedurumu) ]}>ÇIKARILDI</option>
                    <option value="ÜYE DEĞİL" {[ selected('ÜYE DEĞİL', uye_edit($id)->uyedurumu) ]}>ÜYE DEĞİL</option>
                </select>			
            </div>
        </div>

            
        <div id="onay">
        <div class="control-group">
            <label class="control-label">ÜYELİK NO: </label>
            <div class="controls">	
                <input type="text" name="uyeno" value="{{uye_edit($id)->uyeno}}" class="span1" >	
                KARAR NO: <input type="text" name="ukararno" value="{{uye_edit($id)->ukararno}}" class="span1" > 					
            </div>
        </div>
        </div>					
    </div>
</div>		
<!-- / ÜYELİK TÜRÜ BİLGİLERİ -->


<!-- KİMLİK BİLGİLERİ -->
<div class="widget-box" id="kimlik_bilgileri" >
    <div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> KİMLİK BİLGİLERİ</h5>
    </div>
        <div class="widget-content nopadding">

        <div class="control-group">
            <label class="control-label">*TC NO: </label>
            <div class="controls">
                <input type="text"  name="tcno" id="tcno" value="{[ echo uye_edit($id)->tcno ]}" maxlength="11"  class="span11" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">*ADI: </label>
            <div class="controls">
                <input type="text" name="adi" value="{[ echo uye_edit($id)->adi ]}" class="span6 buyuk char"> *SOYADI: <input type="text" name="soyadi" value="{[ echo uye_edit($id)->soyadi ]}"  class="span5 buyuk" >
            </div>
        </div>

        

        <div class="control-group">
            <label class="control-label">*BABA ADI: </label>
            <div class="controls">
                <input type="text" name="babaadi" value="{[ echo uye_edit($id)->babaadi ]}" class="span6 buyuk char" > *ANNE ADI: <input type="text" name="anneadi" value="{[ echo uye_edit($id)->anneadi ]}" class="span5 buyuk char" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">*DOĞUM TARİHİ: </label>
            <div class="controls">
                <div class="rows">
                    <input type="text" name="dtarih" value="{[ echo tcevir(uye_edit($id)->dtarih) ]}" id="dtarih"  class="span2">  *DOĞUM YERİ: 
                    <input type="text" name="dyeri" value="{[ echo uye_edit($id)->dyeri ]}" class="span4 buyuk">  *KÜTÜK İL / İLÇE: 
                    <input type="text" name="kutuk" value="{[ echo uye_edit($id)->kutuk ]}" class="span4 buyuk">  
                </div>
            </div>
        </div>

        
        <div class="control-group">
            <label class="control-label">*CİNSİYETİ: </label>
            <div class="controls">
                <select name="cinsiyeti"> 
                    <option value="">SEÇİNİZ....</option>
                    <option value="KADIN" {[ selected('KADIN', uye_edit($id)->cinsiyeti) ]} >KADIN</option>
                    <option value="ERKEK" {[ selected('ERKEK', uye_edit($id)->cinsiyeti) ]} >ERKEK</option>
                </select> *KAN GURUBU 
                <select name="kangrub">
                    <option value="">SEÇİNİZ...</option>
                    <option value="BİLİNMİYOR" {[ selected('BİLİNMİYOR', uye_edit($id)->kangrub) ]}>BİLİNMİYOR</option>
                    <option value="A - RH" {[ selected('A - RH', uye_edit($id)->kangrub) ]}>A - RH</option>
                    <option value="A + RH" {[ selected('A + RH', uye_edit($id)->kangrub) ]}>A + RH</option>
                    <option value="B - RH" {[ selected('B - RH', uye_edit($id)->kangrub) ]}>B - RH</option>
                    <option value="B + RH" {[ selected('B + RH', uye_edit($id)->kangrub) ]}>B + RH</option>
                    <option value="AB - RH"{[ selected('AB - RH', uye_edit($id)->kangrub) ]}>AB - RH</option>
                    <option value="AB + RH"{[ selected('AB + RH', uye_edit($id)->kangrub) ]}>AB + RH</option>
                    <option value="0 - RH" {[ selected('0 - RH', uye_edit($id)->kangrub) ]}>0 - RH</option>
                    <option value="0 + RH" {[ selected('0 + RH', uye_edit($id)->kangrub) ]}>0 + RH </option>
                </select> *MEDENİ DURUMU 
                <select name="medenidurum" >
                    <option value="">SEÇİNİZ...</option>
                    <option value="BİLİNMİYOR"{[ selected('BİLİNMİYOR', uye_edit($id)->medenidurum) ]}>BİLİNMİYOR</option>
                    <option value="BEKAR"{[ selected('BEKAR', uye_edit($id)->medenidurum) ]}>BEKAR</option>
                    <option value="EVLİ"{[ selected('EVLİ', uye_edit($id)->medenidurum) ]}>EVLİ</option>
                    <option value="DUL"{[ selected('DUL', uye_edit($id)->medenidurum) ]}>DUL</option>
                    <option value="BOŞANMIŞ"{[ selected('BOŞANMIŞ', uye_edit($id)->medenidurum) ]}>BOŞANMIŞ</option>
                </select>
            </div>
        </div>
    </div>
</div> 
<!-- /KİMLİK BİLGİLERİ -->

<!--  İKAMET BİLGİLERİ -->	
<div class="widget-box" id="ikamet_bilgileri" >
    <div class="widget-title"> <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> İKAMET BİLGİLERİ</h5>			
    </div>
    <div class="widget-content nopadding" >
        <div class="control-group">
            <label class="control-label">İL : </label>
            <div class="controls">
                <select name="i_il" class="span5" >
                        <option value="0">SEÇİNİZ...</option>	
                        @foreach (il_select_list() as $key )
                            <option value="{[ echo $key->CityID; ]}" {[ selected($key->CityName,uye_edit($id)->i_il) ]}>{[ echo $key->CityName; ]}</option>
                        @endforeach
                    </select> İLÇE
                    
                    <select name="i_ilce"  class="span6" >
                        <option value="0">ÖNCE İLİ SEÇİN...</option>
                        @foreach (ilce_select_list(uye_edit($id)->i_il) as $key1)
                            <option value="{[ echo $key1->CountyName; ]}" {[ selected($key1->CountyName,uye_edit($id)->i_ilce) ]}>{[ echo $key1->CountyName; ]}</option>
                        @endforeach
                    </select>					
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">SEMT / KÖY: </label>
            <div class="controls">
                <input type="text" name="i_semt" value="{[ echo uye_edit($id)->i_semt ]}" class="span11 buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
            </div>
        </div> 

        <div class="control-group">
            <label class="control-label">*MAHALLE : </label>
            <div class="controls">
                <input type="text" name="i_mh" value="{[ echo uye_edit($id)->i_mh ]}" class="span11 buyuk"  placeholder="MAHALLE ADI ">
            </div>
            
            </div>
        

        <div class="control-group">
            <label class="control-label">CADDE: </label>
            <div class="controls">
                <input type="text" name="i_cd" id="" value="{{uye_edit($id)->i_cd}}"  class="span11 buyuk"  placeholder="VARSA CADDE ADI">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">*SOKAK: </label>
            <div class="controls">
                <input type="text" name="i_sk" id="" value="{[ echo uye_edit($id)->i_sk ]}"  class="span11 buyuk">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">SİTE ADI: </label>
            <div class="controls">
                <input type="text" name="i_site" value="{[ echo uye_edit($id)->i_site ]}"   class="span11 buyuk">
            </div>
        </div>

        
        <div class="control-group">
            <label class="control-label">*BİNA NO: </label>
            <div class="controls">
                <input type="text" name="i_kapino"  id="i_kapino" value="{[ echo uye_edit($id)->i_kapino ]}" class="span1" > DAİRE NO: 
                <input type="text" name="i_daireno" id="i_daireno" value="{[ echo uye_edit($id)->i_daireno ]}" class="span1" >
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">TELEFON 1: </label>
            <div class="controls">
                {[ $tel = explode(',', uye_edit($id)->ev_tel)  ]}
                <input type="text" name="tel[]" class="span2" value="{[ echo $tel['0'] ]}" id="tel1"  > TEL2 
                <input type="text" name="tel[]" class="span2" value="{[ echo $tel['1'] ]}" id="tel2"  > 
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">*CEP TELEFON: </label>
            <div class="controls">
                {[ $gsm = explode(',', uye_edit($id)->gsm)  ]}
                <input type="text" name="cep[]" class="span2" value="{[ echo $gsm['0'] ]}" id="tel3">  CEP2: 
                <input type="text" name="cep[]" class="span2" value="{[ echo $gsm['1'] ]}" id="tel4"  >
            </div>
        </div>

    </div>
</div>
<!-- /İKAMET BİLGİLERİ -->

<!--  MESLEK BİLGİLERİ -->
<div class="widget-box" id="meslek_bilgileri" >
    <div class="widget-title"> <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> MESLEK BİLGİLERİ</h5>			
    </div>
    <div class="widget-content nopadding" >
        
        <div id="meslek">
        <div class="control-group" >
            <label class="control-label">MESLEĞİ: </label>
            <div class="controls">
                <input type="text" name="meslegi" value="{[ echo uye_edit($id)->meslegi ]}" id="meslek"  class="span11 meslek"  >
            </div>
        </div>
        </div>

        <div id="calisma">
        <div class="control-group">
            <label class="control-label">ÇALIŞTIĞI FİRMA ADI: </label>
            <div class="controls">
                <input type="text" name="firmaadi" value="{{uye_edit($id)->firmaadi}}" id="firma"  class="span11">
            </div>
        </div>

    <div class="control-group">
                <label class="control-label">İş ADRESİ : </label>
                <div class="controls">
                    <input name="is_adresi" class="span11" id="" cols="30" rows="10">
                </div>
            </div>

        <div class="control-group">
            <label class="control-label">TELEFON 1: </label>
            <div class="controls">
                <input type="text" name="is_tel" value="{[ echo uye_edit($id)->is_tel ]}" class="span2" id="tel5"  > FAX: 
                <input type="text" name="is_fax" value="{[ echo uye_edit($id)->is_fax ]}" class="span2" id="tel6"   >
            </div>
        </div>

    </div>
    
    </div>
</div>
<!-- /MESLEK BİLGİLERİ -->

<!--  SAĞLIK BİLGİLERİ -->
<div class="widget-box" id="saglik_bilgileri" >
    <div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> SAĞLIK BİLGİLERİ</h5>
    </div>    
    <div class="widget-content nopadding" >

        <div class="control-group">
            <label class="control-label">SOSYAL GÜVENCESİ: </label>
            <div class="controls check">
                <label><input type="radio" name="s_guvence" value="BİLİNMİYOR" {[ checked('BİLİNMİYOR', uye_edit($id)->s_guvence) ]}> BİLİNMİYOR</label>
                <label><input type="radio" name="s_guvence" value="SGK" {[ checked('SGK', uye_edit($id)->s_guvence) ]}>SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</label>
                <label><input type="radio" name="s_guvence" value="GSS" {[ checked('GSS', uye_edit($id)->s_guvence) ]}> GSS (YEŞİLKART, 2022)</label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">ENGELİN OLUŞ SEBEBİ: </label>
            <div class="controls check">
                {[ $eos = explode(',', uye_edit($id)->eos) ]}
                <label>
                    <input type="checkbox" name="eos[]" value="KAZA" {[ checked('KAZA',in_array('KAZA', $eos)) ]}> KAZA
                </label>
                <label>
                    <input type="checkbox" name="eos[]" value="HASTALIK" {[ checked('HASTALIK',in_array('HASTALIK', $eos)) ]}> HASTALIK
                </label>
                <label>
                    <input type="checkbox" name="eos[]" value="DOĞUŞTAN" {[ checked('DOĞUŞTAN',in_array('DOĞUŞTAN', $eos)) ]}> DOĞUŞTAN
                </label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">ENGEL GRUBU: </label>
            <div class="controls check">
                {[ $engl_grubu = explode(',', uye_edit($id)->engl_grubu) ]}
                <label><input type="checkbox" name="engl_grubu[]" value="BEDENSEL" {[ checked('BEDENSEL', in_array('BEDENSEL', $engl_grubu)) ]}> BEDENSEL</label>
                <label><input type="checkbox" name="engl_grubu[]" value="GÖRME" {[ checked('GÖRME', in_array('GÖRME', $engl_grubu)) ]}> GÖRME</label>
                <label><input type="checkbox" name="engl_grubu[]" value="ZİHİNSEL" {[ checked('ZİHİNSEL', in_array('ZİHİNSEL', $engl_grubu)) ]}> ZİHİNSEL</label>
                <label><input type="checkbox" name="engl_grubu[]" value="İŞİTME" {[ checked('İŞİTME', in_array('İŞİTME', $engl_grubu)) ]}> İŞİTME</label>
                <label><input type="checkbox" name="engl_grubu[]" value="SÜREĞEN HASTALIK" {[ checked('SÜREĞEN HASTALIK', in_array('SÜREĞEN HASTALIK', $engl_grubu)) ]}> SÜREĞEN HASTALIK</label>
                <label><input type="checkbox" name="engl_grubu[]" value="HASTALIK" {[ checked('HASTALIK', in_array('HASTALIK', $engl_grubu)) ]}> HASTALIK</label>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">ENGEL ORANI : </label>
            <div class="controls">

                <select name="engl_svy" id="englsvy">
                    <option value="0">SEÇİNİZ...</option>
                {[ for ($i=40; $i <101 ; $i++) { ]}
                    <option value="{[ echo $i; ]}" {[ selected($i, uye_edit($id)->engl_svy) ]}>{[ echo $i; ]}</option>
                {[	} ]}
                </select> %
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">ENGEL SEBEBİ: </label>
                <div class="controls">
                    <textarea class="span11" name="engl_sebebi" rows="5">{[ echo uye_edit($id)->engl_sebebi ]}</textarea>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">O.F'Lİ İSE SEVİYESİ: </label>
                <div class="controls">
                    <input type="text" name="ofdsvy" value="{[ echo uye_edit($id)->ofdsvy ]}" class="span11" placeholder="OMURİLİK FELÇLİSİ İSE O.F SEVİYESİNİ YAZIN">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">ENGEL AÇIKLAMASI: </label>
                <div class="controls">
                    <textarea name="engel_aciklamasi" class="span11" rows="5">{[ echo uye_edit($id)->engl_aciklamasi ]}</textarea>
                </div>
            </div>
        </div>    
</div>
<!-- /SAĞLIK BİLGİLERİ -->

<!--  EĞİTİM BİLGİLERİ -->
<div class="widget-box" id="egitim_bilgileri" >
    <div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
        <h5> EĞİTİM BİLGİLERİ</h5>
    </div>
    <div class="widget-content nopadding" >

        <div class="control-group">
            <label class="control-label">ÖĞRENİM DURUMU: </label>
            <div class="controls">
                <select name="ogrenimdurumu" >
                    <option value="">SEÇİNİZ...</option>
                    <option value="OKUMA YAZMA  BİLMİYOR"{[ selected('OKUMA YAZMA  BİLMİYOR', uye_edit($id)->ogrenimdurumu) ]}>OKUMA YAZMA BİLMİYOR</option>
                    <option value="OKUR YAZAR" {[ selected('OKUR YAZAR', uye_edit($id)->ogrenimdurumu) ]}>OKUR YAZAR</option>
                    <option value="ÖZEL EĞİTİM" {[ selected('ÖZEL EĞİTİM', uye_edit($id)->ogrenimdurumu) ]}>ÖZEL EĞİTİM</option>
                    <option value="İLKOKUL" {[ selected('İLKOKUL', uye_edit($id)->ogrenimdurumu) ]}>İLKOKUL</option>
                    <option value="ORTAOKUL" {[ selected('ORTAOKUL', uye_edit($id)->ogrenimdurumu) ]}>ORTAOKUL</option>
                    <option value="İLKÖĞRETİM" {[ selected('İLKÖĞRETİM', uye_edit($id)->ogrenimdurumu) ]}>İLKÖĞRETİM</option>
                    <option value="LİSE" {[ selected('LİSE', uye_edit($id)->ogrenimdurumu) ]}>LİSE</option>
                    <option value="ÜNİVERSİTE" {[ selected('ÜNİVERSİTE', uye_edit($id)->ogrenimdurumu) ]}>ÜNİVERSİTE</option>
                </select> HALEN OKUYORMU? 
                <select name="okuyormu" class="teCxtarea" id="okuyormu">
                    <option value="" {[ selected('', uye_edit($id)->okuyormu) ]}>BİLİNMİYOR</option>
                    <option value="EVET" {[ selected('EVET', uye_edit($id)->okuyormu) ]}>EVET</option>
                    <option value="HAYIR" {[ selected('HAYIR', uye_edit($id)->okuyormu) ]}>HAYIR</option>
                    <option value="TERK" {[ selected('TERK', uye_edit($id)->okuyormu) ]}>TERK</option>
                </select>
            </div>
        </div>
        <div id="okuma">
        <div class="control-group">
            <label class="control-label">OKUL ADI: </label>
            <div class="controls">
                <input type="text" name="okul_adi" value="{[ echo uye_edit($id)->okuladi ]}" class="span5"> SINIFI YADA BÖLÜMÜ: 
                <input type="text" name="sinif" value="{[ echo uye_edit($id)->sinif ]}" class="span5">
            </div>
        </div>
        </div>
    </div>
</div>
<!-- / EĞİTİM BİLGİLERİ -->

<!--  DİĞER BİLGİLERİ -->
<div class="widget-box" id="diger_bilgiler" >
    <div class="widget-title" > <span class="icon"> <i class="fa fa-th"></i> </span>
        <h5> DİĞER BİLGİLERİ</h5>
    </div>
    <div class="widget-content nopadding" >
        <div class="control-group">
            <label class="control-label">İLGİL ALANLARI: </label>
            <div class="controls">
                <textarea name="ilgialani"  class="span11" rows="5">{[ echo uye_edit($id)->ilgialani ]}</textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">NOT: </label>
            <div class="controls">
                <textarea name="not" class="span11" rows="5">{[ echo uye_edit($id)->notlar ]}</textarea>
            </div>
        </div>		
    </div>
</div>
<!-- /DİĞER BİLGİLERİ -->

<!--  AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?: -->
<div class="widget-box" id="gorev"  >
    <div class="widget-title" > <span class="icon"> <i class="fa fa-th"></i> </span>
        <h5> AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ? </h5>
    </div>
    <div class="widget-content nopadding" >
        <div class="control-group">
            <label class="control-label"> </label>
            <div class="controls check">
                <label><input type="checkbox" name="gorev[]" value="HAYIR" {[ checked('HAYIR', uye_edit($id)->gorev) ]}> HAYIR</label>
                <label><input type="checkbox" name="gorev[]" value="HAFTA İÇİ" {[ checked('HAFTA İÇİ', uye_edit($id)->gorev) ]}> HAFTA İÇİ</label>
                <label><input type="checkbox" name="gorev[]" value="HAFTA SONU" {[ checked('HAFTA SONU', uye_edit($id)->gorev) ]} > HAFTA SONU</label>
                <label><input type="checkbox" name="gorev[]" value="HERHANGİ BİR GÜN" {[ checked('HERHANGİ BİR GÜN', uye_edit($id)->gorev) ]} > HERHANGİ BİR GÜN</label>
                <label><input type="checkbox" name="gorev[]" value="GÖNÜLLÜ" {[ checked('GÖNÜLLÜ', uye_edit($id)->gorev) ]} > GÖNÜLLÜ (BELLİ ZAMANLARDA GÖREV ALABİLİRİM) </label>
            </div>
        </div>
    </div>
</div>	
<!-- / AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?: -->

<!-- GEREKLİ EVRAKLAR -->
<div class="widget-box" id="evrak" >
        <div class="widget-title"> <span class="icon"> <i class="fa fa-signal"></i> </span>
            <h5>GEREKLİ EVREKLAR ( Aday resim getirdiyse adedini seçin. Aşağıdaki hangi belgeleri getirdiyse, getirdiği belgeleri seçin.)</h5>
        </div>
        <div class="widget-content">
        <div class="control-group">
                <label class="control-label">RESİM: </label>
                <div class="controls">
                    <select name="resim" id="">
                        <option value="0" {[ selected('0', uye_edit($id)->resimadet) ]}>Resim yok</option>
                        <option value="1" {[ selected('1', uye_edit($id)->resimadet) ]} >1 Resim</option>
                        <option value="2" {[ selected('2', uye_edit($id)->resimadet) ]} >2 Resim</option>
                        <option value="3" {[ selected('3', uye_edit($id)->resimadet) ]} >3 Resim</option>
                        <option value="4" {[ selected('4', uye_edit($id)->resimadet) ]} >4 Resim</option>
                    </select> 

                    {[ $evrak = explode(',',uye_edit($id)->evrak);  ]}						
                    <label>
                        <input type="checkbox" name="evrak[]" value="İKAMETGAH" {[ checked('İKAMETGAH', in_array('İKAMETGAH', $evrak)) ]}> İKAMETGAH
                    </label>
                    <label><input type="checkbox" name="evrak[]" value="NÜFUS CÜZDANI FOTOKOPİSİ" {[ checked('NÜFUS CÜZDANI FOTOKOPİSİ', in_array('İKAMETGAH', $evrak)) ]}> NÜFUS CÜZDANI FOTOKOPİSİ</label> 
                    <label><input type="checkbox" name="evrak[]" value="ENGELLİ RAPORU" {[ checked('ENGELLİ RAPORU', in_array('İKAMETGAH', $evrak)) ]}> ENGELLİ RAPORU</label>
                    
                </div>
            </div>
            
        </div>
</div>
<!-- /GEREKLİ EVRAKLAR -->

<!--  TALEBİ -->
<div class="widget-box" id="talebi"  >
        <div class="widget-title"  id="ut_btn">
            <span class="icon"><i class="fa fa-th"></i></span>
            <h5> TALEBİ</h5>				
        </div>
        <div class="widget-content" style="overflow: auto;">

            
            {[ $talep = explode(',', uye_edit($id)->talep);]}
             @foreach (talep() as $key) 
            <label><div class="check1">
                <input type="checkbox" name="talep[]" value="{[ echo $key->adi ]}" {[ checked($key->adi, in_array($key->adi, $talep)) ]}> {[ echo $key->adi ]}
            </div></label>
            @endforeach				
        </div>
</div>	
<!--  /TALEBİ -->	
<input type="hidden" name="id" value="{[ echo $id; ]}">
<button type="submit" class="btn btn-primary btn-block" id="saveBtn"><b>GÜNCELLE</b></button> 
</form>
<hr>
EN SON GÜNCELLEME TARİHİ: {[ echo uye_edit($id)->guncelleme; ]}
<hr>

<a href="{[ echo baseUrl(Session::select('path')); ]}/uye/delete/{[ echo $id; ]}" class="btn btn-danger" onclick="return confirm('Bu Kaydı Silmek istediğinize eminmisiniz?')">ÜYE KAYDINI SİL</a>

