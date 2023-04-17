  	<div class="card mt-2" id="talebi" >
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> TALEBİ
      			</div>
      		</div>
      		<div class="card-body">
      			 <div class="mt-3">
      			 	<select name="talep" id="" multiple multiselect-search="true" multiselect-select-all="true">
      			 		<option value="0">Talebi yok.</option>
      			 		@foreach(talep() as $key)
      			 		<option value="{{$key->id}}">{{$key->adi}}</option>
      			 		@endforeach
      			 	</select>
      		
      			 	
      			 </div>
      			
      		</div>
      	</div>
