<div class="card mt-2" id="saglik_bilgileri" >
      		<div class="card-header">
                <h4 class="card-title">Sağlık Bilgileri</h4>      			
      		</div>
      		<div class="card-body">
      			<div class="mt-3">
      				<label class="form-label">SOSYAL GÜVENCESİ</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence" checked value="BİLİNMİYOR">
                        <span class="form-check-label">BİLİNMİYOR</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence"  value="SGK">
                        <span class="form-check-label">SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence"  value="GSS">
                        <span class="form-check-label">GSS (YEŞİLKART, 2022)</span>
                    </label>      			
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGELİN OLUŞ SEBEBİ</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="KAZA">
                        <span class="form-check-label">KAZA</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="HASTALIK">
                        <span class="form-check-label">HASTALIK</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="DOĞUŞTAN">
                        <span class="form-check-label">DOĞUŞTAN</span>
                    </label>
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL GRUBU</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="BEDENSEL">
                        <span class="form-check-label">BEDENSEL</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="GÖRME">
                        <span class="form-check-label">GÖRME</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="ZİHİNSEL">
                        <span class="form-check-label">ZİHİNSEL</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="İŞİTME">
                        <span class="form-check-label">İŞİTME</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="SÜREĞEN HASTALIK">
                        <span class="form-check-label">SÜREĞEN HASTALIK</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="HASTALIK">
                        <span class="form-check-label">HASTALIK</span>
                    </label>                    
      			</div>
      			<div class="mt-3">
      				<div class="row">
      					<div class="col-6">
      						<label class="form-label">ENGEL ORANI</label>
      						<div class="input-group">
								<select name="engl_svy" id="englsvy" class="form-select" >
									<option value="0">SEÇİNİZ...</option>
									@for ($i=40; $i <101 ; $i++)
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
								</select>                              
	                            <span class="input-group-text">%</span>
                            </div>
      					</div>
      					<div class="col-6">
      						<label class="form-label">ENGELLİ İLE YAKINLIĞI</label>
      						<input type="text" name="engl_yakinligi" value="KENDİSİ" class="form-control">
      					</div>
      				</div>      				
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL SEBEBİ</label>
      				<textarea class="form-control" name="engl_sebebi" rows="6"></textarea>
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL AÇIKLAMASI</label>
      				<textarea class="form-control" name="engl_aciklamasi" rows="6"></textarea>
      			</div>      			
      		</div>
      	</div>