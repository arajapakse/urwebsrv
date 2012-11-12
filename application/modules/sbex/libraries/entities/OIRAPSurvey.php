<?php 

class OIRAPSurvey extends Entity {
	private static $DB_TABLE_NAME = 'OIRAPSurveys';
	
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
	 * getEMPLOYEEId() 
	 *
	 * @return bigint(20) $EMPLOYEE_ID
	 */
	public function getEMPLOYEEId() {
		return $this->EMPLOYEE_ID;
	}

	/**
	 * setEMPLOYEEId($employee_id) 
	 *
	 * @param bigint(20) $EMPLOYEE_ID
	 */
	public function setEMPLOYEEId($employee_id) {
		$this->EMPLOYEE_ID = $employee_id;
	}

	/**
	 * getFIRSTNM() 
	 *
	 * @return varchar(255) $FIRST_NM
	 */
	public function getFIRSTNM() {
		return $this->FIRST_NM;
	}

	/**
	 * setFIRSTNM($first_nm) 
	 *
	 * @param varchar(255) $FIRST_NM
	 */
	public function setFIRSTNM($first_nm) {
		$this->FIRST_NM = $first_nm;
	}

	/**
	 * getMIDDLENM() 
	 *
	 * @return varchar(255) $MIDDLE_NM
	 */
	public function getMIDDLENM() {
		return $this->MIDDLE_NM;
	}

	/**
	 * setMIDDLENM($middle_nm) 
	 *
	 * @param varchar(255) $MIDDLE_NM
	 */
	public function setMIDDLENM($middle_nm) {
		$this->MIDDLE_NM = $middle_nm;
	}

	/**
	 * getLASTNM() 
	 *
	 * @return varchar(255) $LAST_NM
	 */
	public function getLASTNM() {
		return $this->LAST_NM;
	}

	/**
	 * setLASTNM($last_nm) 
	 *
	 * @param varchar(255) $LAST_NM
	 */
	public function setLASTNM($last_nm) {
		$this->LAST_NM = $last_nm;
	}

	/**
	 * getTITLEDESCR() 
	 *
	 * @return varchar(255) $TITLE_DESCR
	 */
	public function getTITLEDESCR() {
		return $this->TITLE_DESCR;
	}

	/**
	 * setTITLEDESCR($title_descr) 
	 *
	 * @param varchar(255) $TITLE_DESCR
	 */
	public function setTITLEDESCR($title_descr) {
		$this->TITLE_DESCR = $title_descr;
	}

	/**
	 * getEMAILADDR() 
	 *
	 * @return varchar(255) $EMAIL_ADDR
	 */
	public function getEMAILADDR() {
		return $this->EMAIL_ADDR;
	}

	/**
	 * setEMAILADDR($email_addr) 
	 *
	 * @param varchar(255) $EMAIL_ADDR
	 */
	public function setEMAILADDR($email_addr) {
		$this->EMAIL_ADDR = $email_addr;
	}

	/**
	 * getHOMEPAGEURL() 
	 *
	 * @return varchar(255) $HOMEPAGE_URL
	 */
	public function getHOMEPAGEURL() {
		return $this->HOMEPAGE_URL;
	}

	/**
	 * setHOMEPAGEURL($homepage_url) 
	 *
	 * @param varchar(255) $HOMEPAGE_URL
	 */
	public function setHOMEPAGEURL($homepage_url) {
		$this->HOMEPAGE_URL = $homepage_url;
	}

	/**
	 * getPHOTOURL() 
	 *
	 * @return varchar(255) $PHOTO_URL
	 */
	public function getPHOTOURL() {
		return $this->PHOTO_URL;
	}

	/**
	 * setPHOTOURL($photo_url) 
	 *
	 * @param varchar(255) $PHOTO_URL
	 */
	public function setPHOTOURL($photo_url) {
		$this->PHOTO_URL = $photo_url;
	}

	/**
	 * getCAMPUSCODE() 
	 *
	 * @return varchar(255) $CAMPUS_CODE
	 */
	public function getCAMPUSCODE() {
		return $this->CAMPUS_CODE;
	}

	/**
	 * setCAMPUSCODE($campus_code) 
	 *
	 * @param varchar(255) $CAMPUS_CODE
	 */
	public function setCAMPUSCODE($campus_code) {
		$this->CAMPUS_CODE = $campus_code;
	}

	/**
	 * getCAMPUSDESCR() 
	 *
	 * @return varchar(255) $CAMPUS_DESCR
	 */
	public function getCAMPUSDESCR() {
		return $this->CAMPUS_DESCR;
	}

	/**
	 * setCAMPUSDESCR($campus_descr) 
	 *
	 * @param varchar(255) $CAMPUS_DESCR
	 */
	public function setCAMPUSDESCR($campus_descr) {
		$this->CAMPUS_DESCR = $campus_descr;
	}

	/**
	 * getDIVISIONCODE() 
	 *
	 * @return varchar(20) $DIVISION_CODE
	 */
	public function getDIVISIONCODE() {
		return $this->DIVISION_CODE;
	}

	/**
	 * setDIVISIONCODE($division_code) 
	 *
	 * @param varchar(20) $DIVISION_CODE
	 */
	public function setDIVISIONCODE($division_code) {
		$this->DIVISION_CODE = $division_code;
	}

	/**
	 * getDIVISIONDESCR() 
	 *
	 * @return varchar(255) $DIVISION_DESCR
	 */
	public function getDIVISIONDESCR() {
		return $this->DIVISION_DESCR;
	}

	/**
	 * setDIVISIONDESCR($division_descr) 
	 *
	 * @param varchar(255) $DIVISION_DESCR
	 */
	public function setDIVISIONDESCR($division_descr) {
		$this->DIVISION_DESCR = $division_descr;
	}

	/**
	 * getDEPTCODE() 
	 *
	 * @return varchar(20) $DEPT_CODE
	 */
	public function getDEPTCODE() {
		return $this->DEPT_CODE;
	}

	/**
	 * setDEPTCODE($dept_code) 
	 *
	 * @param varchar(20) $DEPT_CODE
	 */
	public function setDEPTCODE($dept_code) {
		$this->DEPT_CODE = $dept_code;
	}

	/**
	 * getDEPTDESCR() 
	 *
	 * @return varchar(255) $DEPT_DESCR
	 */
	public function getDEPTDESCR() {
		return $this->DEPT_DESCR;
	}

	/**
	 * setDEPTDESCR($dept_descr) 
	 *
	 * @param varchar(255) $DEPT_DESCR
	 */
	public function setDEPTDESCR($dept_descr) {
		$this->DEPT_DESCR = $dept_descr;
	}

	/**
	 * getREPORTINGRELCODE() 
	 *
	 * @return varchar(20) $REPORTING_REL_CODE
	 */
	public function getREPORTINGRELCODE() {
		return $this->REPORTING_REL_CODE;
	}

	/**
	 * setREPORTINGRELCODE($reporting_rel_code) 
	 *
	 * @param varchar(20) $REPORTING_REL_CODE
	 */
	public function setREPORTINGRELCODE($reporting_rel_code) {
		$this->REPORTING_REL_CODE = $reporting_rel_code;
	}

	/**
	 * getREPORTINGRELDESCR() 
	 *
	 * @return varchar(255) $REPORTING_REL_DESCR
	 */
	public function getREPORTINGRELDESCR() {
		return $this->REPORTING_REL_DESCR;
	}

	/**
	 * setREPORTINGRELDESCR($reporting_rel_descr) 
	 *
	 * @param varchar(255) $REPORTING_REL_DESCR
	 */
	public function setREPORTINGRELDESCR($reporting_rel_descr) {
		$this->REPORTING_REL_DESCR = $reporting_rel_descr;
	}

	/**
	 * getADDR1() 
	 *
	 * @return varchar(255) $ADDR_1
	 */
	public function getADDR1() {
		return $this->ADDR_1;
	}

	/**
	 * setADDR1($addr_1) 
	 *
	 * @param varchar(255) $ADDR_1
	 */
	public function setADDR1($addr_1) {
		$this->ADDR_1 = $addr_1;
	}

	/**
	 * getADDR2() 
	 *
	 * @return varchar(255) $ADDR_2
	 */
	public function getADDR2() {
		return $this->ADDR_2;
	}

	/**
	 * setADDR2($addr_2) 
	 *
	 * @param varchar(255) $ADDR_2
	 */
	public function setADDR2($addr_2) {
		$this->ADDR_2 = $addr_2;
	}

	/**
	 * getCITY() 
	 *
	 * @return varchar(255) $CITY
	 */
	public function getCITY() {
		return $this->CITY;
	}

	/**
	 * setCITY($city) 
	 *
	 * @param varchar(255) $CITY
	 */
	public function setCITY($city) {
		$this->CITY = $city;
	}

	/**
	 * getSTATE() 
	 *
	 * @return varchar(5) $STATE
	 */
	public function getSTATE() {
		return $this->STATE;
	}

	/**
	 * setSTATE($state) 
	 *
	 * @param varchar(5) $STATE
	 */
	public function setSTATE($state) {
		$this->STATE = $state;
	}

	/**
	 * getZIP() 
	 *
	 * @return varchar(10) $ZIP
	 */
	public function getZIP() {
		return $this->ZIP;
	}

	/**
	 * setZIP($zip) 
	 *
	 * @param varchar(10) $ZIP
	 */
	public function setZIP($zip) {
		$this->ZIP = $zip;
	}

	/**
	 * getPHONE() 
	 *
	 * @return varchar(20) $PHONE
	 */
	public function getPHONE() {
		return $this->PHONE;
	}

	/**
	 * setPHONE($phone) 
	 *
	 * @param varchar(20) $PHONE
	 */
	public function setPHONE($phone) {
		$this->PHONE = $phone;
	}

	/**
	 * getPHONEEXT() 
	 *
	 * @return varchar(20) $PHONE_EXT
	 */
	public function getPHONEEXT() {
		return $this->PHONE_EXT;
	}

	/**
	 * setPHONEEXT($phone_ext) 
	 *
	 * @param varchar(20) $PHONE_EXT
	 */
	public function setPHONEEXT($phone_ext) {
		$this->PHONE_EXT = $phone_ext;
	}

	/**
	 * getFAX() 
	 *
	 * @return varchar(20) $FAX
	 */
	public function getFAX() {
		return $this->FAX;
	}

	/**
	 * setFAX($fax) 
	 *
	 * @param varchar(20) $FAX
	 */
	public function setFAX($fax) {
		$this->FAX = $fax;
	}

	/**
	 * getCOSIND() 
	 *
	 * @return tinyint(1) $COS_IND
	 */
	public function getCOSIND() {
		return $this->COS_IND;
	}

	/**
	 * setCOSIND($cos_ind) 
	 *
	 * @param tinyint(1) $COS_IND
	 */
	public function setCOSIND($cos_ind) {
		$this->COS_IND = $cos_ind;
	}

	/**
	 * getCOSTRANSDT() 
	 *
	 * @return varchar(30) $COS_TRANS_DT
	 */
	public function getCOSTRANSDT() {
		return $this->COS_TRANS_DT;
	}

	/**
	 * setCOSTRANSDT($cos_trans_dt) 
	 *
	 * @param varchar(30) $COS_TRANS_DT
	 */
	public function setCOSTRANSDT($cos_trans_dt) {
		$this->COS_TRANS_DT = $cos_trans_dt;
	}

	/**
	 * getISPROFILEPRIVATEFLAG() 
	 *
	 * @return tinyint(1) $IS_PROFILE_PRIVATE_FLAG
	 */
	public function getISPROFILEPRIVATEFLAG() {
		return $this->IS_PROFILE_PRIVATE_FLAG;
	}

	/**
	 * setISPROFILEPRIVATEFLAG($is_profile_private_flag) 
	 *
	 * @param tinyint(1) $IS_PROFILE_PRIVATE_FLAG
	 */
	public function setISPROFILEPRIVATEFLAG($is_profile_private_flag) {
		$this->IS_PROFILE_PRIVATE_FLAG = $is_profile_private_flag;
	}

	/**
	 * getISRESUMEPRIVATEFLAG() 
	 *
	 * @return tinyint(1) $IS_RESUME_PRIVATE_FLAG
	 */
	public function getISRESUMEPRIVATEFLAG() {
		return $this->IS_RESUME_PRIVATE_FLAG;
	}

	/**
	 * setISRESUMEPRIVATEFLAG($is_resume_private_flag) 
	 *
	 * @param tinyint(1) $IS_RESUME_PRIVATE_FLAG
	 */
	public function setISRESUMEPRIVATEFLAG($is_resume_private_flag) {
		$this->IS_RESUME_PRIVATE_FLAG = $is_resume_private_flag;
	}

	/**
	 * getISADMINFLAG() 
	 *
	 * @return tinyint(1) $IS_ADMIN_FLAG
	 */
	public function getISADMINFLAG() {
		return $this->IS_ADMIN_FLAG;
	}

	/**
	 * setISADMINFLAG($is_admin_flag) 
	 *
	 * @param tinyint(1) $IS_ADMIN_FLAG
	 */
	public function setISADMINFLAG($is_admin_flag) {
		$this->IS_ADMIN_FLAG = $is_admin_flag;
	}

	/**
	 * getISUSINGFACSURV() 
	 *
	 * @return tinyint(1) $IS_USING_FACSURV
	 */
	public function getISUSINGFACSURV() {
		return $this->IS_USING_FACSURV;
	}

	/**
	 * setISUSINGFACSURV($is_using_facsurv) 
	 *
	 * @param tinyint(1) $IS_USING_FACSURV
	 */
	public function setISUSINGFACSURV($is_using_facsurv) {
		$this->IS_USING_FACSURV = $is_using_facsurv;
	}

	/**
	 * getPHONE2() 
	 *
	 * @return varchar(20) $PHONE2
	 */
	public function getPHONE2() {
		return $this->PHONE2;
	}

	/**
	 * setPHONE2($phone2) 
	 *
	 * @param varchar(20) $PHONE2
	 */
	public function setPHONE2($phone2) {
		$this->PHONE2 = $phone2;
	}

	/**
	 * getPHONE2EXT() 
	 *
	 * @return varchar(15) $PHONE2_EXT
	 */
	public function getPHONE2EXT() {
		return $this->PHONE2_EXT;
	}

	/**
	 * setPHONE2EXT($phone2_ext) 
	 *
	 * @param varchar(15) $PHONE2_EXT
	 */
	public function setPHONE2EXT($phone2_ext) {
		$this->PHONE2_EXT = $phone2_ext;
	}

	/**
	 * getJOBBEGINDATE() 
	 *
	 * @return varchar(20) $JOB_BEGIN_DATE
	 */
	public function getJOBBEGINDATE() {
		return $this->JOB_BEGIN_DATE;
	}

	/**
	 * setJOBBEGINDATE($job_begin_date) 
	 *
	 * @param varchar(20) $JOB_BEGIN_DATE
	 */
	public function setJOBBEGINDATE($job_begin_date) {
		$this->JOB_BEGIN_DATE = $job_begin_date;
	}

	/**
	 * getJOBCLASS() 
	 *
	 * @return varchar(15) $JOB_CLASS
	 */
	public function getJOBCLASS() {
		return $this->JOB_CLASS;
	}

	/**
	 * setJOBCLASS($job_class) 
	 *
	 * @param varchar(15) $JOB_CLASS
	 */
	public function setJOBCLASS($job_class) {
		$this->JOB_CLASS = $job_class;
	}

	/**
	 * getSOURCEFLAG() 
	 *
	 * @return tinyint(1) $SOURCE_FLAG
	 */
	public function getSOURCEFLAG() {
		return $this->SOURCE_FLAG;
	}

	/**
	 * setSOURCEFLAG($source_flag) 
	 *
	 * @param tinyint(1) $SOURCE_FLAG
	 */
	public function setSOURCEFLAG($source_flag) {
		$this->SOURCE_FLAG = $source_flag;
	}

	/**
	 * getUPDATENAME() 
	 *
	 * @return tinyint(1) $UPDATE_NAME
	 */
	public function getUPDATENAME() {
		return $this->UPDATE_NAME;
	}

	/**
	 * setUPDATENAME($update_name) 
	 *
	 * @param tinyint(1) $UPDATE_NAME
	 */
	public function setUPDATENAME($update_name) {
		$this->UPDATE_NAME = $update_name;
	}

	/**
	 * getEMPLOYMENTSTATUSCODE() 
	 *
	 * @return varchar(5) $EMPLOYMENT_STATUS_CODE
	 */
	public function getEMPLOYMENTSTATUSCODE() {
		return $this->EMPLOYMENT_STATUS_CODE;
	}

	/**
	 * setEMPLOYMENTSTATUSCODE($employment_status_code) 
	 *
	 * @param varchar(5) $EMPLOYMENT_STATUS_CODE
	 */
	public function setEMPLOYMENTSTATUSCODE($employment_status_code) {
		$this->EMPLOYMENT_STATUS_CODE = $employment_status_code;
	}

	/**
	 * getTENUREDATE() 
	 *
	 * @return varchar(20) $TENURE_DATE
	 */
	public function getTENUREDATE() {
		return $this->TENURE_DATE;
	}

	/**
	 * setTENUREDATE($tenure_date) 
	 *
	 * @param varchar(20) $TENURE_DATE
	 */
	public function setTENUREDATE($tenure_date) {
		$this->TENURE_DATE = $tenure_date;
	}

	/**
	 * getRANKCODE() 
	 *
	 * @return char(10) $RANK_CODE
	 */
	public function getRANKCODE() {
		return $this->RANK_CODE;
	}

	/**
	 * setRANKCODE($rank_code) 
	 *
	 * @param char(10) $RANK_CODE
	 */
	public function setRANKCODE($rank_code) {
		$this->RANK_CODE = $rank_code;
	}

	/**
	 * getEMPLOYEETYPECODE() 
	 *
	 * @return char(8) $EMPLOYEE_TYPE_CODE
	 */
	public function getEMPLOYEETYPECODE() {
		return $this->EMPLOYEE_TYPE_CODE;
	}

	/**
	 * setEMPLOYEETYPECODE($employee_type_code) 
	 *
	 * @param char(8) $EMPLOYEE_TYPE_CODE
	 */
	public function setEMPLOYEETYPECODE($employee_type_code) {
		$this->EMPLOYEE_TYPE_CODE = $employee_type_code;
	}

	/**
	 * getPPROFILE() 
	 *
	 * @return char(10) $PPROFILE
	 */
	public function getPPROFILE() {
		return $this->PPROFILE;
	}

	/**
	 * setPPROFILE($pprofile) 
	 *
	 * @param char(10) $PPROFILE
	 */
	public function setPPROFILE($pprofile) {
		$this->PPROFILE = $pprofile;
	}

	/**
	 * getISINACTIVE() 
	 *
	 * @return tinyint(1) $ISINACTIVE
	 */
	public function getISINACTIVE() {
		return $this->ISINACTIVE;
	}

	/**
	 * setISINACTIVE($isinactive) 
	 *
	 * @param tinyint(1) $ISINACTIVE
	 */
	public function setISINACTIVE($isinactive) {
		$this->ISINACTIVE = $isinactive;
	}

	/**
	 * getSURVEYDATA() 
	 *
	 * @return text $SURVEYDATA
	 */
	public function getSURVEYDATA() {
		return $this->SURVEYDATA;
	}

	/**
	 * setSURVEYDATA($surveydata) 
	 *
	 * @param text $SURVEYDATA
	 */
	public function setSURVEYDATA($surveydata) {
		$this->SURVEYDATA = $surveydata;
	}

	/**
	 * getLASTMODIFIED() 
	 *
	 * @return datetime $LASTMODIFIED
	 */
	public function getLASTMODIFIED() {
		return $this->LASTMODIFIED;
	}

	/**
	 * setLASTMODIFIED($lastmodified) 
	 *
	 * @param datetime $LASTMODIFIED
	 */
	public function setLASTMODIFIED($lastmodified) {
		$this->LASTMODIFIED = $lastmodified;
	}

	/**
	 * getDATECREATED() 
	 *
	 * @return datetime $DATECREATED
	 */
	public function getDATECREATED() {
		return $this->DATECREATED;
	}

	/**
	 * setDATECREATED($datecreated) 
	 *
	 * @param datetime $DATECREATED
	 */
	public function setDATECREATED($datecreated) {
		$this->DATECREATED = $datecreated;
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
	
} // end class OIRAPSurvey


