table OIRPSurveys (
  Id int(11) NOT NULL AUTO_INCREMENT,
  IID char(16) NOT NULL,
  IsSpeaker tinyint(1) NOT NULL,
  IsExperts tinyint(1) NOT NULL,
  IsInactive tinyint(1) NOT NULL,
  SurveyData text,
  LastModified datetime, 
  DateCreated  datetime,  
  PRIMARY KEY (Id)
);