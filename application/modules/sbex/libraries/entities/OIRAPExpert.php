<?php 

class OIRAPExpert extends Entity {
	private static $DB_TABLE_NAME = 'OIRAPExperts';
	
	public function __construct() {
		$entityAttributes = new EntityAttributes(self::$DB_TABLE_NAME);
		$entityAttributes->addKey('I_ID');
		parent::__construct($entityAttributes);
	}
	
	/**
	 * getIId()
	 * Primary Key
	 *
	 * @return char(16) $I_ID
	 */
	public function getIId() {
		return $this->I_ID;
	}

	/**
	 * setIId($i_id)
	 * Primary Key
	 *
	 * @param char(16) $I_ID
	 */
	public function setIId($i_id) {
		$this->I_ID = $i_id;
	}

	public function iidExists() {
		$id = $this->I_ID;
		
		if (!empty($id) && is_numeric($id)) {
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
	 * getALTOFFICEPHONEEXIT()
	 *
	 * @return char(15) $ALT_OFFICE_PHONE_EXIT
	 */
	public function getALTOFFICEPHONEEXIT() {
		return $this->ALT_OFFICE_PHONE_EXIT;
	}

	/**
	 * setALTOFFICEPHONEEXIT($alt_office_phone_exit)
	 *
	 * @param char(15) $ALT_OFFICE_PHONE_EXIT
	 */
	public function setALTOFFICEPHONEEXIT($alt_office_phone_exit) {
		$this->ALT_OFFICE_PHONE_EXIT = $alt_office_phone_exit;
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
	 * @return tinyint(1) $HPHONE_DISPLAY_IND
	 */
	public function getHPHONEDISPLAYIND() {
		return $this->HPHONE_DISPLAY_IND;
	}

	/**
	 * setHPHONEDISPLAYIND($hphone_display_ind)
	 *
	 * @param tinyint(1) $HPHONE_DISPLAY_IND
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
	 * getMEDIAREDIRECTCONTACTIND()
	 *
	 * @return tinyint(1) $MEDIA_REDIRECT_CONTACT_IND
	 */
	public function getMEDIAREDIRECTCONTACTIND() {
		return $this->MEDIA_REDIRECT_CONTACT_IND;
	}

	/**
	 * setMEDIAREDIRECTCONTACTIND($media_redirect_contact_ind)
	 *
	 * @param tinyint(1) $MEDIA_REDIRECT_CONTACT_IND
	 */
	public function setMEDIAREDIRECTCONTACTIND($media_redirect_contact_ind) {
		$this->MEDIA_REDIRECT_CONTACT_IND = $media_redirect_contact_ind;
	}

	/**
	 * getBIO()
	 *
	 * @return text $BIO
	 */
	public function getBIO() {
		return $this->BIO;
	}

	/**
	 * setBIO($bio)
	 *
	 * @param text $BIO
	 */
	public function setBIO($bio) {
		$this->BIO = $bio;
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
