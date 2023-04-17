<?php 

	
	class Kullanici_model extends Model{
		
		function new($post){
			DB::insert('admin', [
				'username' 		=> $post['username'],
				'password' 	=> md5($post['password']),
				'status' 	=> '1',
				
			]);

			
			if (DB::affectedRows()) {
				redirect('/');
			}				
		}//new

		function list(){
			return DB::admin()->result();
		}//list

		function edit($id){
			return DB::where('id', $id)->get('admin')->row();
		}//edit


		function update($post){
			if ($post['password']) {
				DB::where('id',$post['id'])->update('admin', [
				'username' 		=> $post['username'],
				'password' 	=> md5($post['password']),
				'status'	=> $post['status'],
				]);
			}else{
				DB::where('id',$post['id'])->update('admin', [
				'username' 		=> $post['username'],
				'status'	=> $post['status'],
			]);
			}
			
			if (DB::affectedRows()) {
				redirect('/');
			}			
		}// update	
	}//class sonu