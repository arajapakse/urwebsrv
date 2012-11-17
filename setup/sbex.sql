DROP  TABLE if EXISTS OIRAPSurveys;
DROP  TABLE if EXISTS OIRAPSpeakers;
DROP  TABLE if EXISTS OIRAPExperts;


--
-- Table structure for table `OIRAPExperts`
--

CREATE TABLE IF NOT EXISTS `OIRAPExperts` (
  `I_ID` char(16) default NULL,
  `RESPONSE_CATEGORY_CD` tinyint(2) default NULL,
  `ALT_OFFICE_PHONE` char(20) default NULL,
  `ALT_OFFICE_PHONE_EXT` char(15) default NULL,
  `HOME_PHONE` char(20) default NULL,
  `HPHONE_DISPLAY_IND` char(3) default NULL,
  `CELL_PHONE` char(20) default NULL,
  `CPHONE_DISPLAY_IND` char(20) default NULL,
  `ALT_EMAIL` char(255) default NULL,
  `PREFERRED_CONTACT` char(255) default NULL,
  `MEDIA_DIRECT_CONTACT_IND` char(3) default NULL,
  `EXPERT_BIO` text,
  `KEY_TOPICS` text,
  `LASTMODIFIED` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  UNIQUE KEY `I_ID` (`I_ID`,`RESPONSE_CATEGORY_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `OIRAPSpeakers`
--

CREATE TABLE IF NOT EXISTS `OIRAPSpeakers` (
  `I_ID` char(16) default NULL,
  `RESPONSE_CATEGORY_CD` tinyint(2) default NULL,
  `ALT_OFFICE_PHONE` char(20) default NULL,
  `ALT_OFFICE_PHONE_EXT` char(15) default NULL,
  `HOME_PHONE` char(20) default NULL,
  `PREFERRED_CONTACT` char(255) default NULL,
  `SPEAKER_BIO` text,
  `KEY_TOPICS` text,
  `RESTRICTIONS` text,
  `LASTMODIFIED` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  UNIQUE KEY `I_ID` (`I_ID`,`RESPONSE_CATEGORY_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `OIRAPSurveys`
--

CREATE TABLE IF NOT EXISTS `OIRAPSurveys` (
  `I_ID` char(16) NOT NULL default '',
  `EMPLOYEE_ID` bigint(20) default NULL,
  `FIRST_NM` varchar(255) default NULL,
  `MIDDLE_NM` varchar(255) default NULL,
  `LAST_NM` varchar(255) default NULL,
  `TITLE_DESCR` varchar(255) default NULL,
  `EMAIL_ADDR` varchar(255) default NULL,
  `HOMEPAGE_URL` varchar(255) default NULL,
  `PHOTO_URL` varchar(255) default NULL,
  `CAMPUS_CODE` char(5) default NULL,
  `CAMPUS_DESCR` varchar(255) default NULL,
  `DIVISION_CODE` char(5) default NULL,
  `DIVISION_DESCR` varchar(32) default NULL,
  `DEPT_CODE` char(5) default NULL,
  `DEPT_DESCR` varchar(255) default NULL,
  `REPORTING_REL_CODE` varchar(20) default NULL,
  `REPORTING_REL_DESCR` varchar(255) default NULL,
  `ADDR_1` varchar(255) default NULL,
  `ADDR_2` varchar(255) default NULL,
  `CITY` varchar(255) default NULL,
  `STATE` varchar(5) default NULL,
  `ZIP` varchar(10) default NULL,
  `PHONE` varchar(20) default NULL,
  `PHONE_EXT` varchar(20) default NULL,
  `FAX` varchar(20) default NULL,
  `COS_IND` char(3) default NULL,
  `COS_TRANS_DT` varchar(30) default NULL,
  `IS_PROFILE_PRIVATE_FLAG` char(3) default NULL,
  `IS_RESUME_PRIVATE_FLAG` char(3) default NULL,
  `IS_ADMIN_FLAG` char(3) default NULL,
  `IS_USING_FACSURV` char(3) default NULL,
  `PHONE2` varchar(20) default NULL,
  `PHONE2_EXT` varchar(15) default NULL,
  `JOB_BEGIN_DATE` varchar(20) default NULL,
  `JOB_CLASS` varchar(15) default NULL,
  `SOURCE_FLAG` char(3) default NULL,
  `UPDATE_NAME` char(3) default NULL,
  `EMPLOYMENT_STATUS_CODE` varchar(5) default NULL,
  `TENURE_DATE` varchar(20) default NULL,
  `RANK_CODE` char(10) default NULL,
  `EMPLOYEE_TYPE_CODE` char(8) default NULL,
  `PPROFILE` char(10) default NULL,
  `ISINACTIVE` char(3) default NULL,
  `SURVEYDATA` text,
  `LASTMODIFIED` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `DATECREATED` datetime default NULL,
  PRIMARY KEY  (`I_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;