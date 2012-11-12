<?php
class Update_Sbex extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function extract_oirap($access_key) {
		//phpinfo();
		//exit;
		$oirapDB = $this->load->database("oirap",TRUE);
		$sbexDb = $this->load->database('sbex', TRUE);
		
		$groups = array('speakers' => '41', 'experts' => 40);
		
		$fsResponse = new stdClass();

		$fields = array();

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

					// OIRAP Members
					$responseSql = "select * from surveyuser.FS_FACULTY where I_ID = ?";
					
					$surveyDataQuery = $oirapDB->query($responseSql, $srRow->i_id);
				
					if ($surveyDataQuery->num_rows() > 0) {
						foreach ($surveyDataQuery->result() as $sdRow) {
							//echo '<pre>';
							//print_r($sdRow);
							//echo '<hr />';

						}
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

							//	echo '<p style="color: blue;"'>
									//echo '<pre>';
								//	print_r($speakerRow);
							
								//	echo '<hr />';
							//	echo '</p>';


								//foreach ($speakerRow as $key=>$value) {

								//	echo "	{$key} => {$value}\n";

								//}

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
								echo '<p style="color: blue;"'>
									print_r($expertRow);
								
									echo '<hr />';
								echo '</p>';

							}
	

						}
					} // end of else if ($member_group == 'experts')
				
				} // end foreach ($surveyResponseQuery->result() as $srRow) 

			} // end if ($query->num_rows() > 0)

		} // end foreach ($groups as $group)


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