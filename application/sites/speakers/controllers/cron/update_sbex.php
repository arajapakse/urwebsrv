<?php
class Update_Sbex extends MX_Controller {
	public function __construct() {
		parent::__construct();
		
		set_time_limit(0);
		ignore_user_abort(1);
	}
	
	public function extract_oirap($access_key) {
		
		Modules::library('entities/OIRAPSurvey');
		Modules::library('entities/OIRAPSpeaker');
		Modules::library('entities/OIRAPExpert');
		
		//phpinfo();
		//exit;
		$oirapDB = $this->load->database("oirap",TRUE);
		$sbexDb = $this->load->database('sbex', TRUE);
	
		$groups = array('speakers' => '41', 'experts' => '40');
		
		$fsResponse = new stdClass();

		$surveyTableFields = OIRAPSurvey::getTableFilds();
		$speakerTableFields = OIRAPSpeaker::getTableFilds();
		$expertTableFields = OIRAPExpert::getTableFilds();

		foreach ($groups as $member_group=>$group_id) {
			
			$memberSql = "SELECT R.i_id, CAST(R.RESPONSE_TXT AS Text)
						FROM  surveyuser.FS_RESPONSE AS R
						JOIN   surveyuser.FS_FACULTY AS F
							ON R.I_ID = F.I_ID
						WHERE  RESPONSE_CATEGORY_CD=?";
	 
			$surveyResponseQuery = $oirapDB->query($memberSql, $group_id);
			
			if ($surveyResponseQuery->num_rows() > 0) {

				foreach ($surveyResponseQuery->result() as $srRow) {
					$srRow->i_id = trim($srRow->i_id);					

					$doInsert = false;
					$surveyObj = OIRAPSurvey::load($srRow->i_id);
					if (empty($surveyObj)) {
						$doInsert = true;
						$surveyObj = new OIRAPSurvey();
						$surveyObj->setIId($srRow->i_id);
						$surveyObj->setLASTMODIFIED('NOW()');
						$surveyObj->setDATECREATED('NOW()');
					}
				
					// Survey Data
					$responseSql = "select * from surveyuser.FS_FACULTY where I_ID = ?";
					
					$surveyDataQuery = $oirapDB->query($responseSql, $srRow->i_id);
			
					if ($surveyDataQuery->num_rows() > 0) {
						foreach ($surveyDataQuery->result() as $surveyData) {

							foreach ($surveyData as $key=>$value) {
								$key = strtoupper($key);
								if (in_array($key, $surveyTableFields)) {
									$surveyObj->$key = $value;
								}
							}
						}
					}
					
					if ($doInsert === true) {
						$surveyObj->insert();
					}
					else {
						$surveyObj->update();
					}

					if ($member_group == 'speakers') {
				
						// Member Type Speakers
						$speakerOptions = array(55=> 'alt_office_phone', 56=> 'alt_office_phone_ext', 
						      57=> 'home_phone',       58=> 'preferred_contact', 
						      59=> 'speaker_bio',       69=> 'key_topics', 
						      61=> 'restrictions');

	
						$arrayKeys = array_keys($speakerOptions);
						$curKeys = "'".implode("','", $arrayKeys) .  "'";
		
						$speakerAttributesSql = "SELECT i_id, response_category_cd, cast(response_txt as text) as speakerResponseTXT, 
												ACTION_DT
								 				FROM surveyuser.FS_RESPONSE
												WHERE RESPONSE_CATEGORY_CD in ({$curKeys}) and I_ID=?";

						$speakersQuery = $oirapDB->query($speakerAttributesSql, $srRow->i_id);
	
						if ($speakersQuery->num_rows() > 0) {

							foreach($speakersQuery->result() as $speakerRow) {
								$response_category_cd =  trim($speakerRow->response_category_cd);
								
								$doInsert = false;
								$speakerObj = OIRAPSpeaker::load(array('I_ID' => $srRow->i_id, 'RESPONSE_CATEGORY_CD' => $response_category_cd));
									
								if (empty($speakerObj)) {								
									$doInsert = true;
									$speakerObj = new OIRAPSpeaker();
										
									$speakerObj->setIId($srRow->i_id);
									$speakerObj->setLASTMODIFIED('NOW()');
								}
	
								if (array_key_exists($response_category_cd, $speakerOptions)) {
								
									$field = $speakerOptions[$response_category_cd];
									
									$key = strtoupper($field);
									
									if (in_array($key, $speakerTableFields)) {
										$speakerObj->RESPONSE_CATEGORY_CD = $response_category_cd;
										$speakerObj->$key = trim($speakerRow->speakerResponseTXT);
									}
								}

								if ($doInsert === true) {
									$speakerObj->insert();
								}
								else {								
									$speakerObj->update();
								}

							}
						}
						


					} // end if ($member_group == 'speakers')
					else if ($member_group == 'experts') {
						
						// Memember Type Experts
						$expertOptions = array(44=>'alt_office_phone', 45=>'alt_office_phone_ext', 46=>'home_phone',
									47=>'hphone_display_ind',48=>'cell_phone',49=>'cphone_display_ind',
									50=>'alt_email',51=>'preferred_contact',52=>'media_direct_contact_ind',
									53=>'expert_bio',54=>'key_topics');

						$arrayKeys = array_keys($expertOptions);
						$curKeys = implode(',', $arrayKeys);
						$expertAttributeSql ="select i_id, response_category_cd, cast(response_txt as TEXT) as expertResponseTXT , ACTION_DT
									from surveyuser.FS_RESPONSE
									where RESPONSE_CATEGORY_CD in ({$curKeys}) and I_ID=?";

						$curKeys = "'".implode("','", $arrayKeys) .  "'";

						$expertQuery = $oirapDB->query($expertAttributeSql, $srRow->i_id);

						if ($expertQuery->num_rows() > 0) {

							foreach($expertQuery->result() as $expertRow) {
								$response_category_cd =  trim($expertRow->response_category_cd);
								
								$doInsert = false;
								$expertObj = OIRAPExpert::load(array('I_ID' => $srRow->i_id, 'RESPONSE_CATEGORY_CD' => $response_category_cd));
								if (empty($expertObj)) {
									$doInsert = true;
									$expertObj = new OIRAPExpert();
								
									$expertObj->setIId($srRow->i_id);
									$expertObj->setLASTMODIFIED('NOW()');
								}
								
								if (array_key_exists($response_category_cd, $expertOptions)) {
								
									$field = $expertOptions[$response_category_cd];
										
									$key = strtoupper($field);
										
									if (in_array($key, $expertTableFields)) {
										$expertObj->RESPONSE_CATEGORY_CD = $response_category_cd;
										$expertObj->$key = trim($expertRow->expertResponseTXT);
									}
								}
								
							
								if ($doInsert === true) {
									$expertObj->insert();
								}
								else {								
									$expertObj->update();
								}
							}
	

						}
					} // end of else if ($member_group == 'experts')
				
				} // end foreach ($surveyResponseQuery->result() as $srRow) 

			} // end if ($query->num_rows() > 0)

		} // end foreach ($groups as $group)
			
		
		echo 'DONE';
	}


	public function get_photos() {
		//phpinfo();
		$oirapDB = $this->load->database("oirap",TRUE);
		//$sbexWriter = $this->load->database('sbex', TRUE);

		$photosSql = 'SELECT F.photo_url, *
				FROM  surveyuser.FS_FACULTY AS F
				WHERE F.photo_url IS NOT NULL';

		$photoesQuery = $oirapDB->query($photosSql);
echo $oirapDB->last_query();
echo '<hr />';
		if ($photoesQuery->num_rows() > 0) {
			foreach($photoesQuery as $photoRow) {
				
				echo '<pre>';
				print_r($photoRow);
				echo '<hr />';
			}

		}
	}
}