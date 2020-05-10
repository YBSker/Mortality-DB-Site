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
DROP TABLE IF EXISTS EducationSnapshot;
DROP TABLE IF EXISTS LifeExpectancyCountry;
DROP TABLE IF EXISTS Movies;
DROP TABLE IF EXISTS Crimes;
DROP TABLE IF EXISTS CausesOfDeath;
DROP TABLE IF EXISTS LifeExpectancyState;
DROP TABLE IF EXISTS TotalPopulations;
DROP TABLE IF EXISTS CausesOfDeathPercent;


CREATE TABLE LifeExpectancyCountry (
                                       countryName  VARCHAR(20),
                                       theYear     YEAR,
                                       lifeExpectancy FLOAT,
                                       PRIMARY KEY(countryName, theYear)
);

CREATE TABLE Movies (
                        movieName  VARCHAR(20),
                        theYear     DECIMAL(4,0),
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
                               theYear     DECIMAL(4,0),
                               cardiovascular FLOAT,
                               homicide FLOAT,
                               roadInjury FLOAT,
                               naturalDisaster FLOAT,
                               suicide FLOAT,
                               PRIMARY KEY(countryName, theYear)
                               );
                               
CREATE TABLE TotalPopulations (
                               countryName  VARCHAR(20),
                               theYear     DECIMAL(4,0),
                               totalPop FLOAT,
                               PRIMARY KEY(countryName, theYear)
                               );

CREATE TABLE CausesOfDeathPercent (
                               countryName  VARCHAR(20),
                               theYear     DECIMAL(4,0),
                               cardiovascular FLOAT,
                               homicide FLOAT,
                               roadInjury FLOAT,
                               naturalDisaster FLOAT,
                               suicide FLOAT,
                               PRIMARY KEY(countryName, theYear)
);

CREATE TABLE LifeExpectancyState (
                                     stateName  VARCHAR(20),
                                     countyName VARCHAR(30),
                                     lifeExpectancy FLOAT,
                                     PRIMARY KEY(stateName, countyName, lifeExpectancy)
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

CREATE TABLE EducationSnapshot (
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
LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Country.txt'
    INTO TABLE LifeExpectancyCountry
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(countryName, theYear, lifeExpectancy);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/State.txt'
    INTO TABLE LifeExpectancyState
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(stateName, countyName, lifeExpectancy);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Movies.txt'
    INTO TABLE Movies
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(movieName, theYear, genre, country, IMDBScore);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Crime.txt'
    INTO TABLE Crimes
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES
(jurisdiction, theYear, prisonerCount, statePopulation, violentCrimeTotal);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Cause.txt'
    INTO TABLE CausesOfDeath
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES;

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/happiness.txt'
    INTO TABLE HappinessSnapshot
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/education.txt'
    INTO TABLE EducationSnapshot
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/healthcare.txt'
    INTO TABLE HealthCareQualitySnapshot
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Per Capita Health in Millions USD.txt'
    INTO TABLE HealthCareExpenditureSnapshotPerCapita
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/Total Health in Millions USD.txt'
    INTO TABLE HealthCareExpenditureSnapshotTotals
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/totalPop.txt'
    INTO TABLE TotalPopulations
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;

DELETE FROM TotalPopulations
WHERE theYear=0;

DELETE FROM CausesOfDeath WHERE theYear = 0;


INSERT INTO CausesOfDeathPercent (countryName, theYear, cardiovascular, homicide, roadInjury, naturalDisaster, suicide)
SELECT a.countryName, a.theYear, 100.0 * cardiovascular / b.totalPop, 100.0 * homicide / b.totalPop, 
100.0 * roadInjury / b.totalPop, 100.0 * naturalDisaster / b.totalPop, 100.0 * suicide / b.totalPop 
FROM CausesOfDeath AS a CROSS JOIN TotalPopulations AS b
WHERE a.countryName = b.countryName AND a.theYear = b.theYear;

DELETE FROM EducationSnapshot
WHERE year=0;

DROP TABLE IF EXISTS CausesOfDeath;
DROP TABLE IF EXISTS TotalPopulations;


