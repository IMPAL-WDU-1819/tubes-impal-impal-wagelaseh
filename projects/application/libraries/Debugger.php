<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debugger 
{

        public function _dump($data, $exit = false) {
        	echo "<pre>";
        	var_dump($data);
        	echo "</pre>";

        	if ($exit) exit();
	} 
	public function _print($data, $exit = false) {
        	echo "<pre>";
        	print_r($data);
        	echo "</pre>";

        	if ($exit) exit();
        }
}