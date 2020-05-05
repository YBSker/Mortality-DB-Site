/*
Stanley Chu, schu17
Jerry Chen, jchen268
*/
DROP TABLE IF EXISTS EducationPrimaryAttainment;
DROP TABLE IF EXISTS EducationExpenditureGDP;
DROP TABLE IF EXISTS EducationLiteracyRate;
DROP TABLE IF EXISTS EducationPrimaryCompletionRate;
DROP TABLE IF EXISTS EducationPrimarySchoolEnrollment;
DROP TABLE IF EXISTS EducationTertiarySchoolEnrollment;
DROP TABLE IF EXISTS EducationPupilTeacherRatio;
DROP TABLE IF EXISTS HappinessSnapshot ;
DROP TABLE IF EXISTS HealthCareExpenditureSnapshotPerCapita ;
DROP TABLE IF EXISTS HealthCareExpenditureSnapshotTotals ;
DROP TABLE IF EXISTS HealthCareQualitySnapshot ;
DROP TABLE IF EXISTS tempEducation;
DROP TABLE IF EXISTS LifeExpectancyCountry;
DROP TABLE IF EXISTS Movies;
DROP TABLE IF EXISTS Crimes;
DROP TABLE IF EXISTS CausesOfDeath;
DROP TABLE IF EXISTS LifeExpectancyState;


CREATE TABLE LifeExpectancyCountry (
                                       countryName  VARCHAR(20),
                                       theYear     YEAR,
                                       lifeExpectancy FLOAT,
                                       PRIMARY KEY(countryName, theYear)
);

CREATE TABLE Movies (
                        movieName  VARCHAR(20),
                        theYear     YEAR,
                        genre VARCHAR(15),
                        country VARCHAR(20),
                        IMDBScore FLOAT,
                        PRIMARY KEY(movieName, theYear)
);

CREATE TABLE Crimes (
                        jurisdiction  VARCHAR(20),
                        theYear     YEAR,
                        prisonerCount MEDIUMINT,
                        statePopulation MEDIUMINT,
                        violentCrimeTotal MEDIUMINT,
                        PRIMARY KEY(jurisdiction, theYear)
);

CREATE TABLE CausesOfDeath (
                               countryName  VARCHAR(20),
                               theYear     YEAR,
                               cardiovascular INT,
                               homicide INT,
                               roadInjury INT,
                               naturalDisaster INT,
                               suicide INT,
                               PRIMARY KEY(countryName, theYear)
);

CREATE TABLE LifeExpectancyState (
                                     stateName  VARCHAR(20),
                                     countyName VARCHAR(30),
                                     lifeExpectancy FLOAT,
                                     PRIMARY KEY(stateName, countyName, lifeExpectancy)
);

CREATE TABLE EducationPrimaryAttainment (
                                            countryName VARCHAR(40),
                                            year DECIMAL(4,0),
                                            value DECIMAL(10,2),
                                            PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationExpenditureGDP (
                                         countryName VARCHAR(40),
                                         year DECIMAL(4,0),
                                         value DECIMAL(10,2),
                                         PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationLiteracyRate (
                                       countryName VARCHAR(40),
                                       year DECIMAL(4,0),
                                       value DECIMAL(10,2),
                                       PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationPrimaryCompletionRate (
                                                countryName VARCHAR(40),
                                                year DECIMAL(4,0),
                                                value DECIMAL(10,2),
                                                PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationPrimarySchoolEnrollment (
                                                  countryName VARCHAR(40),
                                                  year DECIMAL(4,0),
                                                  value DECIMAL(10,2),
                                                  PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationTertiarySchoolEnrollment (
                                                   countryName VARCHAR(40),
                                                   year DECIMAL(4,0),
                                                   value DECIMAL(10,2),
                                                   PRIMARY KEY(countryName, year)
);
CREATE TABLE EducationPupilTeacherRatio (
                                            countryName VARCHAR(40),
                                            year DECIMAL(4,0),
                                            value DECIMAL(50,2),
                                            PRIMARY KEY(countryName, year)
);

CREATE TABLE HappinessSnapshot (
                                   countryName VARCHAR(40),
                                   year DECIMAL(4,0),
                                   happinessIndex DECIMAL(4,2),
                                   logGDP DECIMAL(4,2),
                                   socialSupport DECIMAL(4,2),
                                   freedom DECIMAL(4,2),
                                   corruptionPerception DECIMAL(4,2),
                                   positiveAffect DECIMAL(4,2),
                                   negativeAffect DECIMAL(4,2),
                                   governmentConfidence DECIMAL(4,2),
                                   democracticQuality DECIMAL(4,2),
                                   PRIMARY KEY(countryName, year)
);

CREATE TABLE HealthCareExpenditureSnapshotPerCapita (
                                                        countryName VARCHAR(40),
                                                        year DECIMAL(4,0),
                                                        countryRegion VARCHAR(4),
                                                        countryIncomeGroup VARCHAR(40),
                                                        indicatorUnit VARCHAR(15),
                                                        householdOutOfPocket DECIMAL(6,2),
                                                        capitalHealthExpend DECIMAL(5, 2),
                                                        socialInsuranceContribution DECIMAL(6,2),
                                                        PRIMARY KEY(countryName, year)
);

CREATE TABLE HealthCareExpenditureSnapshotTotals (
                                                     countryName VARCHAR(40),
                                                     year DECIMAL(4,0),
                                                     countryRegion VARCHAR(4),
                                                     countryIncomeGroup VARCHAR(40),
                                                     indicatorUnit VARCHAR(15),
                                                     householdOutOfPocket DECIMAL(6,2),
                                                     capitalHealthExpend DECIMAL(5, 2),
                                                     socialInsuranceContribution DECIMAL(6,2),
                                                     PRIMARY KEY(countryName, year)
);

CREATE TABLE HealthCareQualitySnapshot (
                                           countryName VARCHAR(40),
                                           year DECIMAL(4,0),
                                           lifeExpectancy DECIMAL(5,2),
                                           adultMortaltyPerThousand DECIMAL(4,0),
                                           infantDeathsPerThousand DECIMAL(4,0),
                                           alcoholConsumptionLitresPerCapita DECIMAL(6,4),
                                           averageBMI DECIMAL(5,2),
                                           PRIMARY KEY(countryName, year)
);

CREATE TABLE tempEducation (
                               countryName VARCHAR(40),
                               year DECIMAL(4,0),
                               educationalAttainment DECIMAL(4,2),
                               governmentExpenditure DECIMAL(4,2),
                               pupilTeacherRatio DECIMAL(4,2),
                               schoolEnrollment DECIMAL(5,2),
                               literacyRate DECIMAL(5,2),
                               primaryCompletionRate DECIMAL(4,2),
                               Education_Tertiary_School_Enrollment DECIMAL(4,2),
                               PRIMARY KEY(countryName, year)
);

/*Couldn't find files with just the "name.txt", if grader wants to run might need to change the filepath, sorry.*/
LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/Country.txt'
    INTO TABLE LifeExpectancyCountry
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(countryName, theYear, lifeExpectancy);

LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/State.txt'
    INTO TABLE LifeExpectancyState
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(stateName, countyName, lifeExpectancy);

LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/Movies.txt'
    INTO TABLE Movies
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(movieName, theYear, genre, country, IMDBScore);

LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/Crime.txt'
    INTO TABLE Crimes
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(jurisdiction, theYear, prisonerCount, statePopulation, violentCrimeTotal);

LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/Cause.txt'
    INTO TABLE CausesOfDeath
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:/Users/stanl/Desktop/Senior Year/databases/data/happiness.txt'
    INTO TABLE HappinessSnapshot
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/stanl/Desktop/Senior Year/databases/data/education.txt'
    INTO TABLE tempEducation
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/stanl/Desktop/Senior Year/databases/data/healthcare.txt'
    INTO TABLE HealthCareQualitySnapshot
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/stanl/Desktop/Senior Year/databases/data/Per Capita Health in Millions USD.txt'
    INTO TABLE HealthCareExpenditureSnapshotPerCapita
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/stanl/Desktop/Senior Year/databases/data/Total Health in Millions USD.txt'
    INTO TABLE HealthCareExpenditureSnapshotTotals
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

DELETE FROM tempEducation
WHERE year=0;

INSERT INTO EducationPrimaryAttainment (countryName, year, value)
SELECT countryName, year, educationalAttainment FROM tempEducation;

INSERT INTO EducationExpenditureGDP  (countryName, year, value)
SELECT countryName, year, governmentExpenditure FROM tempEducation;

INSERT INTO EducationLiteracyRate  (countryName, year, value)
SELECT countryName, year, literacyRate FROM tempEducation;

INSERT INTO EducationPrimaryCompletionRate  (countryName, year, value)
SELECT countryName, year, primaryCompletionRate FROM tempEducation;

INSERT INTO EducationPrimarySchoolEnrollment  (countryName, year, value)
SELECT countryName, year, schoolEnrollment FROM tempEducation;

INSERT INTO EducationTertiarySchoolEnrollment  (countryName, year, value)
SELECT countryName, year, Education_Tertiary_School_Enrollment FROM tempEducation;

INSERT INTO EducationPupilTeacherRatio   (countryName, year, value)
SELECT countryName, year, pupilTeacherRatio FROM tempEducation;

DROP TABLE IF EXISTS tempEducation;