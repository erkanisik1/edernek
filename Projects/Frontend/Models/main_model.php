<?php 

	
	class Main_model extends Model{
		
		function log1(){ 
			return DB::query('SELECT * FROM log WHERE  userid NOT IN(63) ORDER BY id DESC LIMIT 10 ')->result();
			#return DB::Orderby('id','desc')->limit('10')->get('log')->result();
			//return DB::where('userid NOT IN ','63')->orderBy('log.id','desc')->limit('10')->get('log')->result();
		}

		function logara($post){
			return DB::where('date LIKE',"%$post%")->get('log')->result();			
		}
	} 