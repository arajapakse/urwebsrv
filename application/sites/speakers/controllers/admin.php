<?php
class Admin extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		// $run->config('sbex');
		//$this->config->load('sbex');

		//echo Modules::run("sbex/welcome/index");

		//$this->load->library('entities\Test');

		Modules::library('entities/Test');

		$test = new sbex\entities\Test();
		echo $test->getTest();
		
		echo __FILE__;

	}

	public function test() { echo 'test'; }
}