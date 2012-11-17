<?php 
class OIRAPExpert extends Entity {
	private static $DB_TABLE_NAME = 'OIRAPExperts';
	
	public function __construct() {
		$entityAttributes = new EntityAttributes(self::$DB_TABLE_NAME);
		$entityAttributes->addKey('I_ID');
		$entityAttributes->addKey('RESPONSE_CATEGORY_CD');
		parent::__construct($entityAttributes);
	}
	
	
	/**
	 * getIId()
	 *
	 * @return char(16) $I_ID
	 */
	public function getIId() {
		return $this->I_ID;
	}

	/**
	 * setIId($i_id)
	 *
	 * @param char(16) $I_ID
	 */
	public function setIId($i_id) {
		$this->I_ID = $i_id;
	}

	/**
	 * getRESPONSECATEGORYCD()
	 *
	 * @return tinyint(2) $RESPONSE_CATEGORY_CD
	 */
	public function getRESPONSECATEGORYCD() {
		return $this->RESPONSE_CATEGORY_CD;
	}

	/**
	 * setRESPONSECATEGORYCD($response_category_cd)
	 *
	 * @param tinyint(2) $RESPONSE_CATEGORY_CD
	 */
	public function setRESPONSECATEGORYCD($response_category_cd) {
		$this->RESPONSE_CATEGORY_CD = $response_category_cd;
	}

	public function iidExists() {
		$id = $this->I_ID;
		$cd = $this->RESPONSE_CATEGORY_CD;
	
		if (!empty($id) && !empty($cd)) {
			return true;
		}
	
		return false;
	}
	
	/**
	 * getALTOFFICEPHONE()
	 *
	 * @return char(20) $ALT_OFFICE_PHONE
	 */
	public function getALTOFFICEPHONE() {
		return $this->ALT_OFFICE_PHONE;
	}

	/**
	 * setALTOFFICEPHONE($alt_office_phone)
	 *
	 * @param char(20) $ALT_OFFICE_PHONE
	 */
	public function setALTOFFICEPHONE($alt_office_phone) {
		$this->ALT_OFFICE_PHONE = $alt_office_phone;
	}

	/**
	 * getALTOFFICEPHONEEXT()
	 *
	 * @return char(15) $ALT_OFFICE_PHONE_EXT
	 */
	public function getALTOFFICEPHONEEXT() {
		return $this->ALT_OFFICE_PHONE_EXT;
	}

	/**
	 * setALTOFFICEPHONEEXT($alt_office_phone_ext)
	 *
	 * @param char(15) $ALT_OFFICE_PHONE_EXT
	 */
	public function setALTOFFICEPHONEEXT($alt_office_phone_ext) {
		$this->ALT_OFFICE_PHONE_EXT = $alt_office_phone_ext;
	}

	/**
	 * getHOMEPHONE()
	 *
	 * @return char(20) $HOME_PHONE
	 */
	public function getHOMEPHONE() {
		return $this->HOME_PHONE;
	}

	/**
	 * setHOMEPHONE($home_phone)
	 *
	 * @param char(20) $HOME_PHONE
	 */
	public function setHOMEPHONE($home_phone) {
		$this->HOME_PHONE = $home_phone;
	}

	/**
	 * getHPHONEDISPLAYIND()
	 *
	 * @return char(3) $HPHONE_DISPLAY_IND
	 */
	public function getHPHONEDISPLAYIND() {
		return $this->HPHONE_DISPLAY_IND;
	}

	/**
	 * setHPHONEDISPLAYIND($hphone_display_ind)
	 *
	 * @param char(3) $HPHONE_DISPLAY_IND
	 */
	public function setHPHONEDISPLAYIND($hphone_display_ind) {
		$this->HPHONE_DISPLAY_IND = $hphone_display_ind;
	}

	/**
	 * getCELLPHONE()
	 *
	 * @return char(20) $CELL_PHONE
	 */
	public function getCELLPHONE() {
		return $this->CELL_PHONE;
	}

	/**
	 * setCELLPHONE($cell_phone)
	 *
	 * @param char(20) $CELL_PHONE
	 */
	public function setCELLPHONE($cell_phone) {
		$this->CELL_PHONE = $cell_phone;
	}

	/**
	 * getCPHONEDISPLAYIND()
	 *
	 * @return char(20) $CPHONE_DISPLAY_IND
	 */
	public function getCPHONEDISPLAYIND() {
		return $this->CPHONE_DISPLAY_IND;
	}

	/**
	 * setCPHONEDISPLAYIND($cphone_display_ind)
	 *
	 * @param char(20) $CPHONE_DISPLAY_IND
	 */
	public function setCPHONEDISPLAYIND($cphone_display_ind) {
		$this->CPHONE_DISPLAY_IND = $cphone_display_ind;
	}

	/**
	 * getALTEMAIL()
	 *
	 * @return char(255) $ALT_EMAIL
	 */
	public function getALTEMAIL() {
		return $this->ALT_EMAIL;
	}

	/**
	 * setALTEMAIL($alt_email)
	 *
	 * @param char(255) $ALT_EMAIL
	 */
	public function setALTEMAIL($alt_email) {
		$this->ALT_EMAIL = $alt_email;
	}

	/**
	 * getPREFERREDCONTACT()
	 *
	 * @return char(255) $PREFERRED_CONTACT
	 */
	public function getPREFERREDCONTACT() {
		return $this->PREFERRED_CONTACT;
	}

	/**
	 * setPREFERREDCONTACT($preferred_contact)
	 *
	 * @param char(255) $PREFERRED_CONTACT
	 */
	public function setPREFERREDCONTACT($preferred_contact) {
		$this->PREFERRED_CONTACT = $preferred_contact;
	}

	/**
	 * getMEDIADIRECTCONTACTIND()
	 *
	 * @return char(3) $MEDIA_DIRECT_CONTACT_IND
	 */
	public function getMEDIADIRECTCONTACTIND() {
		return $this->MEDIA_DIRECT_CONTACT_IND;
	}

	/**
	 * setMEDIADIRECTCONTACTIND($media_direct_contact_ind)
	 *
	 * @param char(3) $MEDIA_DIRECT_CONTACT_IND
	 */
	public function setMEDIADIRECTCONTACTIND($media_direct_contact_ind) {
		$this->MEDIA_DIRECT_CONTACT_IND = $media_direct_contact_ind;
	}

	/**
	 * getEXPERTBIO()
	 *
	 * @return text $EXPERT_BIO
	 */
	public function getEXPERTBIO() {
		return $this->EXPERT_BIO;
	}

	/**
	 * setEXPERTBIO($expert_bio)
	 *
	 * @param text $EXPERT_BIO
	 */
	public function setEXPERTBIO($expert_bio) {
		$this->EXPERT_BIO = $expert_bio;
	}

	/**
	 * getKEYTOPICS()
	 *
	 * @return text $KEY_TOPICS
	 */
	public function getKEYTOPICS() {
		return $this->KEY_TOPICS;
	}

	/**
	 * setKEYTOPICS($key_topics)
	 *
	 * @param text $KEY_TOPICS
	 */
	public function setKEYTOPICS($key_topics) {
		$this->KEY_TOPICS = $key_topics;
	}

	/**
	 * getLASTMODIFIED()
	 *
	 * @return timestamp $LASTMODIFIED
	 */
	public function getLASTMODIFIED() {
		return $this->LASTMODIFIED;
	}

	/**
	 * setLASTMODIFIED($lastmodified)
	 *
	 * @param timestamp $LASTMODIFIED
	 */
	public function setLASTMODIFIED($lastmodified) {
		$this->LASTMODIFIED = $lastmodified;
	}

	public static function getTableFilds() {
		return Entity::getTableFilds(self::$DB_TABLE_NAME);
	}
	
	/**
	 * @param $params - Ways to filter the query
	 */
	public static function load($params) {
		$obj = Entity::loadEntity(self::$DB_TABLE_NAME, get_class(), $params);
	
		if ($obj->iidExists()) {
			return $obj;
		}
		return false;
	}
} // end class OIRAPExpert