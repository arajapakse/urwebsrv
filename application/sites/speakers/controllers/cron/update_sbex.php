<?php
class Update_Sbex extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function extract_oirp($access_key) {

		
		//phpinfo();
		$oirpReader = $this->load->database("oirap",TRUE);
		$sbexWriter = $this->load->database('sbex', TRUE);
		
	print_r($oirpReader);
		echo 'test'; exit;
		/*
		$member_types = array(1 => 41, 2 => 42);
		
		echo '<pre>';
		print_r($member_types);
		exit;
		
		foreach ($member_typs as $type_id=>$type_category) {
			/*
			$sql = 'select i_id, cast(response_txt as TEXT) as responseTXT
					from surveyuser.FS_RESPONSE
					 where RESPONSE_CATEGORY_CD=? and response_txt like \'Y\' ';
			
			$results = $oirpReader->get($sql, $type_category);

			echo '<pre>';
			print_r($results);
			exit;
			
			
			echo $type_id;
		}
		*/
	}
}