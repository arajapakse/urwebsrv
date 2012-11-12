<?php
Modules::library('entities/SbexEntityLoader');

class SbexAutoLoader {
	
	public function __construct() {
		SbexEntityLoader::register();
	}
}