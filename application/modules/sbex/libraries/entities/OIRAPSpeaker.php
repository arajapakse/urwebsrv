<?php 
class OIRAPSpeaker extends Entity {
	private static $DB_TABLE_NAME = 'OIRAPSpeakers';
	
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
	 * getSPEAKERBIO()
	 *
	 * @return text $SPEAKER_BIO
	 */
	public function getSPEAKERBIO() {
		return $this->SPEAKER_BIO;
	}

	/**
	 * setSPEAKERBIO($speaker_bio)
	 *
	 * @param text $SPEAKER_BIO
	 */
	public function setSPEAKERBIO($speaker_bio) {
		$this->SPEAKER_BIO = $speaker_bio;
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
	 * getRESTRICTIONS()
	 *
	 * @return text $RESTRICTIONS
	 */
	public function getRESTRICTIONS() {
		return $this->RESTRICTIONS;
	}

	/**
	 * setRESTRICTIONS($restrictions)
	 *
	 * @param text $RESTRICTIONS
	 */
	public function setRESTRICTIONS($restrictions) {
		$this->RESTRICTIONS = $restrictions;
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
} // end class OIRAPSpeaker