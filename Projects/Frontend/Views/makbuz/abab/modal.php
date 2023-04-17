<div id="ekle" class="modal hide" aria-hidden="true" style="display: none;">

	<div class="modal-header">

	

		<h3>Malzeme Ekle</h3> 

	</div>
<style>
	.modal-body{
		max-height: 600px; !important;
	}
</style>
	<div class="modal-body">
<form action="" method="post">
<table class="table table-bordered table-striped">
                        <thead>
                             
                              <tr>
                                    <th width="20">SN</th>
                                    <th>MALZEMENİN CİNSİ</th>
                                    <th width="20">MİKTARI</th>
                                    <th width="100">BİRİM</th>

                              </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX">
                                <td ><input type="text" name="abb_sn" id="" class="span12" value="1"></td>
                                <td><input type="text"  name="abb_mc" class="span12 buyuk"></td>
                                <td><input type="number" name="abb_miktar" value="1" class="span12" min="1"></td>
                                <td>
                                    <select name="abb_birim" id="" class="span12">
                                        <option value="">SEÇİNİZ...</option>
                                        <option value="ADET" selected>ADET</option>
                                        <option value="KUTU">KUTU</option>
                                        <option value="KOLİ">KOLİ</option>
                                        <option value="PAKET">PAKET</option>
                                    </select>
                                </td>
                            </tr>
                              
                        </tbody>
                  </table>


    <div class="form-actions">
        <input type="hidden" name="islem" value="mcsave">
        <input type="hidden" name="abab_id" value="<?php echo $edit->id; ?>">
        <button type="submit" class="btn btn-success btn-block">Kaydet</button> 
    </div>

		

		</form>

		</div>

	</div>