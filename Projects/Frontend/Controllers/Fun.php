<?php namespace Project\Controllers;

use Generate;
/**
 * ""
 */
class Fun extends Controller
{
	function main(){
		Generate::grandVision();
		output( Generate::grandVision() );
	}
}

