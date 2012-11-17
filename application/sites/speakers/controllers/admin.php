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


		
		//Modules::library('entities/Test');
	
		//$test = new Test();
		//echo $test->getTest();
		
		//$os = new OIRAPSurvey();
	//	$os->setIId(100);
		//$os->insert();


		//$os = OIRAPSurvey::load(100);
		//print_r($os->getData());
		
		//$os = OIRAPSpeakers::load(100);
		//print_r($os->getData());
		
	//	$os = new OIRAPExpert();
		//	$os->setIId(100);
		//$os->insert();
		
		Modules::library('entities/OIRAPExpert');
		//$os = OIRAPExpert::load(100);
		echo 'expert'; exit;
		echo 'what';
		exit;
		print_r($os->getData());
	}

	public function test() { echo 'test'; }
}