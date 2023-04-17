@cardStart('Talepler')

<div class="table-responsive">
	<table class="table table-vcenter table-bordered">
		<thead class="text-center">
			<tr>				
				<th>Üye Adı</th>
				<th>Talebi</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach (talepler() as $key)				
			<tr>
				<td>{{uye($key->uyeId)->isim}}</td>
				<td>{{malzemeAdi($key->talep)}}</td>
				
			</tr>
			@endforeach
			
		</tbody>
		
	</table>
</div>		

@cardEnd()