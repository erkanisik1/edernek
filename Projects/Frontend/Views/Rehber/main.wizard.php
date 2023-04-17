
<form action="" method="post">
	
@cardStart('Rehberde Arama Formu','','1')
<div class="row">
	<div class="col-6">
		@formSelect('Kategori','kategori','rehberKategori', 'id', 'kat_adi')

	</div>
	<div class="col-6">
		@formInput('Adı Soyadı','isim')

	</div>
</div>
@formButton('ARA','primary btn-block','submit')
@cardEnd('1')
</form>


<!-- rehber listeleme -->
@cardStart('Rehber Listeleme')
<div class="table-responsive">


<table class="table table-vcenter table-striped">
	<thead class="text-center">
		@if ($katara)
		<tr>
			<th>Adı Soyadı</th>
			<th>Telefon1</th>
			<th>Telefon2</th>
			<th>Telefon3</th>
			<th>Fax</th>
			<th>Cep</th>
			<th>Email</th>
			<th>Web</th>
			<th>Kategorisi</th>
			<th>İşlemler</th>
		</tr>
	</thead>
	<tbody>				
	@foreach ($katara as $key)
		<tr>
			<td>{[ echo $key->isim; ]}</td>
			<td>{[ echo $key->tel1; ]}</td>
			<td>{[ echo $key->tel2; ]}</td>
			<td>{[ echo $key->tel3; ]}</td>
			<td>{[ echo $key->fax; ]}</td>
			<td>{[ echo $key->cep; ]}</td>
			<td>{[ echo $key->email; ]}</td>
			<td>{[ echo $key->web; ]}</td>
			<td>{[ echo $key->kategori; ]}</td>
			<td><button class="btn btn-success"><i class="fa fa-edit"></i></button> <button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
		</tr>
		<tr >
			<td colspan="10" style="margin-bottom:15px; ">NOT: {[ echo $key->not; ]}		</td>
		</tr>

					
		
	</tbody>
	@endforeach
			@endif
		</table></div>

@cardEnd()

