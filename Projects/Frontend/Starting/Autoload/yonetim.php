<?php 

function yonetim($durum = '1'){return DB::orderBy('sira','asc')->where('durum',$durum)->yonetim()->result();}

function kurullar(){return DB::orderBy('name','asc')->kurul()->result();}

function kurulGorev(){return DB::orderBy('name','asc')->kurulGorev()->result();}

function yonetimEdit($id){return DB::where('id',$id)->yonetim()->row();}

function eskiyonetim(){return DB::orderBy('adi','asc')->where('durum','0','and')->where('dernekid',1)->yonetim()->result();}