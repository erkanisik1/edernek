<?php 

function cardStart($title,$content = '',$body = 0){
	$a='';$b='';
	if ($body == 1) {
		$a = '<div class="card-body">';
		$b = '</div>';
	}

	return '  	<div class="card mt-2" >
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> '.$title.'
      			</div>
      		</div>	'.$a.$content;
}

function cardEnd($b = ''){
$a='';
if ($b) {
	$b = '</div>';
}

	return '</div>'.$b;
}

function formBlock($label,$formContent = ''){
	return '<div class="mt-3">
		<label class="form-label">'.$label.'</label>
		'.$formContent.'
	</div>';
}


function formSelect($label,$name,$fun, $keyvalue ,$option,$opt = ''){	

	$a = '';
	foreach ( $fun() as $key){
		$a .= '<option value="'.$key->$keyvalue.'" >'.$key->$option.'</option>';
    } 

	return '<div class="mt-3">
		<label class="form-label">'.$label.'</label>
		<select name="'.$name.'" class="form-select" '.$opt.'>
            <option value="">Seçiniz...</option>'.$a.
           '
        </select>
	</div>';	
}


function formSelectEdit($label,$name,$fun, $keyvalue ,$option, $select = '',$opt = ''){	

	$a = '';
	foreach ( $fun() as $key){
		$a .= '<option value="'.$key->$keyvalue.'" '.selected($key->$keyvalue,$select).'>'.$key->$option.'</option>';
    } 

	return '<div class="mt-3">
		<label class="form-label">'.$label.'</label>
		<select name="'.$name.'" class="form-select" '.$opt.'>
            <option value="">Seçiniz...</option>'.$a.
           '
        </select>
	</div>';	
}

function formInput($label,$name, $value = '', $placeholder='',$type='text'){

	return '<div class="mt-3">
		<label class="form-label">'.$label.'</label>
		 <input type="'.$type.'" class="form-control" name="'.$name.'" value="'.$value.'" placeholder="'.$placeholder.'" > 
	</div>';	
}

function formtextarea($label,$name, $value = '', $type='text'){

	return '<div class="mt-3">
		<label class="form-label">'.$label.'</label>
		<textarea name="'.$name.'" class="form-control" rows="5">'.$value.'</textarea>
		 
	</div>';	
}


function formButton($label,$class='primary',$type='submit'){
	return '<div class="mt-3">
	<button type="'.$type.'" class="btn btn-'.$class.' btn-block">'.$label.'</button></div>';
}

function formcheck($type='checkbox',$name,$value,$label,$select = ''){
	$say = count($name);
	$a = '';

	for ($i=0; $i < $say; $i++) { 
		$a .= '<label class="form-check form-check-inline">
				<input class="form-check-input" type="'.$type.'" name="'.$name[$i].'" value="'.$value[$i].'"'.checked($value[$i],$select).'>
				<span class="form-check-label">'.$label[$i].'</span>
			</label>';
	}

	
	return $a;
	
	
}