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
DROP TABLE IF EXISTS HappinessSnapshot;
DROP TABLE IF EXISTS HealthCareExpenditureSnapshotPerCapita;
DROP TABLE IF EXISTS HealthCareExpenditureSnapshotTotals;
DROP TABLE IF EXISTS HealthCareQualitySnapshot;
DROP TABLE IF EXISTS EducationSnapshot;
DROP TABLE IF EXISTS LifeExpectancyCountry;
DROP TABLE IF EXISTS Movies;
DROP TABLE IF EXISTS Crimes;
DROP TABLE IF EXISTS CausesOfDeath;
DROP TABLE IF EXISTS LifeExpectancyState;
DROP TABLE IF EXISTS TotalPopulations;
DROP TABLE IF EXISTS CausesOfDeathPercent;


CREATE TABLE LifeExpectancyCountry
(
    countryName    VARCHAR(20),
    theYear        DECIMAL(4, 0),
    lifeExpectancy FLOAT,
    PRIMARY KEY (countryName, theYear)
);

CREATE TABLE Movies
(
    movieName VARCHAR(20),
    theYear   DECIMAL(4, 0),
    genre     VARCHAR(15),
    country   VARCHAR(20),
    IMDBScore FLOAT,
    PRIMARY KEY (movieName, theYear)
);

CREATE TABLE Crimes
(
    jurisdiction      VARCHAR(20),
    theYear           YEAR,
    prisonerCount     MEDIUMINT,
    statePopulation   MEDIUMINT,
    violentCrimeTotal MEDIUMINT,
    PRIMARY KEY (jurisdiction, theYear)
);

CREATE TABLE CausesOfDeath
(
    countryName     VARCHAR(20),
    theYear         DECIMAL(4, 0),
    cardiovascular  FLOAT,
    homicide        FLOAT,
    roadInjury      FLOAT,
    naturalDisaster FLOAT,
    suicide         FLOAT,
    PRIMARY KEY (countryName, theYear)
);

CREATE TABLE TotalPopulations
(
    countryName VARCHAR(20),
    theYear     DECIMAL(4, 0),
    totalPop    FLOAT,
    PRIMARY KEY (countryName, theYear)
);

CREATE TABLE CausesOfDeathPercent
(
    countryName     VARCHAR(20),
    theYear         DECIMAL(4, 0),
    cardiovascular  FLOAT,
    homicide        FLOAT,
    roadInjury      FLOAT,
    naturalDisaster FLOAT,
    suicide         FLOAT,
    PRIMARY KEY (countryName, theYear)
);

CREATE TABLE LifeExpectancyState
(
    stateName      VARCHAR(20),
    countyName     VARCHAR(30),
    lifeExpectancy FLOAT,
    PRIMARY KEY (stateName, countyName, lifeExpectancy)
);

CREATE TABLE HappinessSnapshot
(
    countryName          VARCHAR(40),
    year                 DECIMAL(4, 0),
    happinessIndex       DECIMAL(4, 2),
    logGDP               DECIMAL(4, 2),
    socialSupport        DECIMAL(4, 2),
    freedom              DECIMAL(4, 2),
    corruptionPerception DECIMAL(4, 2),
    positiveAffect       DECIMAL(4, 2),
    negativeAffect       DECIMAL(4, 2),
    governmentConfidence DECIMAL(4, 2),
    democracticQuality   DECIMAL(4, 2),
    PRIMARY KEY (countryName, year)
);

CREATE TABLE HealthCareExpenditureSnapshotPerCapita
(
    countryName                 VARCHAR(40),
    year                        DECIMAL(4, 0),
    countryRegion               VARCHAR(4),
    countryIncomeGroup          VARCHAR(40),
    indicatorUnit               VARCHAR(15),
    householdOutOfPocket        DECIMAL(6, 2),
    capitalHealthExpend         DECIMAL(5, 2),
    socialInsuranceContribution DECIMAL(6, 2),
    PRIMARY KEY (countryName, year)
);

CREATE TABLE HealthCareExpenditureSnapshotTotals
(
    countryName                 VARCHAR(40),
    year                        DECIMAL(4, 0),
    countryRegion               VARCHAR(4),
    countryIncomeGroup          VARCHAR(40),
    indicatorUnit               VARCHAR(15),
    householdOutOfPocket        DECIMAL(6, 2),
    capitalHealthExpend         DECIMAL(5, 2),
    socialInsuranceContribution DECIMAL(6, 2),
    PRIMARY KEY (countryName, year)
);

CREATE TABLE HealthCareQualitySnapshot
(
    countryName                       VARCHAR(40),
    year                              DECIMAL(4, 0),
    lifeExpectancy                    DECIMAL(5, 2),
    adultMortaltyPerThousand          DECIMAL(4, 0),
    infantDeathsPerThousand           DECIMAL(4, 0),
    alcoholConsumptionLitresPerCapita DECIMAL(6, 4),
    averageBMI                        DECIMAL(5, 2),
    PRIMARY KEY (countryName, year)
);

CREATE TABLE EducationSnapshot
(
    countryName                          VARCHAR(40),
    year                                 DECIMAL(4, 0),
    educationalAttainment                DECIMAL(4, 2),
    governmentExpenditure                DECIMAL(4, 2),
    pupilTeacherRatio                    DECIMAL(4, 2),
    schoolEnrollment                     DECIMAL(5, 2),
    literacyRate                         DECIMAL(5, 2),
    primaryCompletionRate                DECIMAL(4, 2),
    Education_Tertiary_School_Enrollment DECIMAL(4, 2),
    PRIMARY KEY (countryName, year)
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

DELETE
FROM TotalPopulations
WHERE theYear = 0;

DELETE
FROM CausesOfDeath
WHERE theYear = 0;


INSERT INTO CausesOfDeathPercent (countryName, theYear, cardiovascular, homicide, roadInjury, naturalDisaster, suicide)
SELECT a.countryName,
       a.theYear,
       100.0 * cardiovascular / b.totalPop,
       100.0 * homicide / b.totalPop,
       100.0 * roadInjury / b.totalPop,
       100.0 * naturalDisaster / b.totalPop,
       100.0 * suicide / b.totalPop
FROM CausesOfDeath AS a
         CROSS JOIN TotalPopulations AS b
WHERE a.countryName = b.countryName
  AND a.theYear = b.theYear;

DELETE
FROM EducationSnapshot
WHERE year = 0;

DROP TABLE IF EXISTS CausesOfDeath;
DROP TABLE IF EXISTS TotalPopulations;

DROP TABLE IF EXISTS HealthCareQualitySnapshot;
DROP TABLE IF EXISTS BMI_Data;


CREATE TABLE BMI_Data
(
    countryName VARCHAR(20),
    year        DECIMAL(4, 0),
    BMI         DECIMAL(4, 2),
    PRIMARY KEY (countryName, year)
);

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/bmi.txt'
    INTO TABLE BMI_Data
    FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;


CREATE TABLE HealthCareQualitySnapshot AS
SELECT a.countryName, a.year, a.BMI, b.lifeExpectancy
FROM BMI_Data AS a
         INNER JOIN LifeExpectancyCountry AS b ON a.year = b.theYear AND a.countryName LIKE b.countryName;

DROP TABLE IF EXISTS BMI_Data;

DROP TABLE IF EXISTS life_Education;
DROP TABLE IF EXISTS religionPercents;
DROP TABLE IF EXISTS life_Religion;

CREATE TABLE religionPercents
(
    year         DECIMAL(4, 0),
    countryName  VARCHAR(20),
    christian    DECIMAL(4, 2),
    muslim       DECIMAL(4, 2),
    unaffiliated DECIMAL(4, 2),
    hindu        DECIMAL(4, 2),
    buddhist     DECIMAL(4, 2),
    folk         DECIMAL(4, 2),
    other        DECIMAL(4, 2),
    jew          DECIMAL(4, 2),
    PRIMARY KEY (countryName, year)
);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/religion_percents.txt'
    INTO TABLE religionPercents
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES;

CREATE TABLE life_Religion AS
SELECT a.countryName,
       year,
       b.lifeExpectancy,
       christian,
       muslim,
       unaffiliated,
       hindu,
       buddhist,
       folk,
       other,
       jew
FROM religionPercents AS a
         INNER JOIN LifeExpectancyCountry AS b
                    ON b.countryName LIKE a.countryName
                        AND a.year = b.theYear;

CREATE TABLE life_Education AS
SELECT a.countryName, a.year, b.lifeExpectancy, a.educationalAttainment, a.Education_Tertiary_School_Enrollment
FROM EducationSnapshot AS a
         INNER JOIN LifeExpectancyCountry AS b
                    ON b.countryName LIKE a.countryName
                        AND a.year = b.theYear
WHERE a.year > 2009;

DROP TABLE IF EXISTS happiness_Homicide_temp;
DROP TABLE IF EXISTS happiness_Homicide;


CREATE TABLE happiness_Homicide_temp AS
SELECT a.countryName,
       a.year,
       b.lifeExpectancy,
       a.happinessIndex,
       a.governmentConfidence,
       a.democracticQuality,
       a.logGDP
FROM HappinessSnapshot AS a
         INNER JOIN LifeExpectancyCountry AS b
                    ON b.countryName LIKE a.countryName
                        AND a.year = b.theYear;

DROP TABLE IF EXISTS happiness_Homicide_pre;

CREATE TABLE happiness_Homicide_pre AS
SELECT a.countryName,
       a.year,
       a.lifeExpectancy,
       a.happinessIndex,
       a.governmentConfidence,
       a.democracticQuality,
       a.logGDP,
       ROUND(b.homicide, 4) AS homicide,
       ROUND(b.suicide, 4)  AS suicide
FROM happiness_Homicide_temp AS a
         INNER JOIN CausesOfDeathPercent AS b
                    ON b.countryName LIKE a.countryName
                        AND a.year = b.theYear
WHERE a.year > 2009;

DROP TABLE IF EXISTS happiness_Homicide_temp;

CREATE TABLE happiness_Homicide AS
SELECT countryName,
       ROUND(AVG(NULLIF(lifeExpectancy, 0)), 2)       as averageLifeExpectancy,
       ROUND(AVG(NULLIF(happinessIndex, 0)), 2)       as averageHappinesIndex,
       ROUND(AVG(NULLIF(governmentConfidence, 0)), 2) AS averageGovernmentConfidence,
       ROUND(AVG(NULLIF(democracticQuality, 0)), 2)   AS averageDemocraticQuality,
       ROUND(AVG(NULLIF(logGDP, 0)), 2)               AS averageLogGDP,
       ROUND(AVG(NULLIF(homicide, 0)), 4)             AS averageHomicideRate,
       ROUND(AVG(NULLIF(suicide, 0)), 4)              AS averageSuicideRate
FROM happiness_Homicide_pre
GROUP BY countryName;

DROP TABLE IF EXISTS happiness_Homicide_pre;

DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;
DROP TABLE IF EXISTS perCountryDataCoDHealth;
DROP VIEW IF EXISTS average_cardio;
DROP VIEW IF EXISTS average_health_snap_per_country;
DROP TABLE IF EXISTS perCountryDataCoDHealth_pre;

DROP TABLE IF EXISTS average_cardio;


CREATE VIEW healthCare_CoD_perCapita AS
SELECT c.countryName,
       c.theYear,
       hc.countryIncomeGroup,
       c.cardiovascular,
       c.homicide,
       c.roadInjury,
       hc.householdOutOfPocket,
       hc.capitalHealthExpend,
       hc.socialInsuranceContribution
FROM CausesOfDeathPercent AS c
         INNER JOIN HealthCareExpenditureSnapshotPerCapita AS hc
                    ON hc.countryName = c.countryName
                        AND hc.year = c.theYear;

CREATE VIEW healthCare_perCapita_perCountry AS
SELECT a.countryName,
       countryIncomeGroup,
       AVG(NULLIF(householdOutOfPocket, 0))        as averageHouseholdOutOfPocket,
       AVG(NULLIF(capitalHealthExpend, 0))         AS averageCapitalHealthExpend,
       AVG(NULLIF(socialInsuranceContribution, 0)) AS averageSocialInsuranceContribution
FROM HealthCareExpenditureSnapshotPerCapita AS a
GROUP BY countryName;

CREATE VIEW average_deaths_per_country AS
SELECT c.countryName,
       AVG(NULLIF(c.cardiovascular, 0)) AS average_cardiovascular,
       AVG(NULLIF(c.homicide, 0))       AS average_homicide,
       AVG(NULLIF(c.roadInjury, 0))     AS average_roadInjury
FROM CausesOfDeathPercent AS c
GROUP BY countryName;

CREATE VIEW average_health_snap_per_country AS
SELECT countryName,
       AVG(NULLIF(lifeExpectancy, 0)) AS lifeExpectancy,
       AVG(NULLIF(BMI, 0))            AS averageBMI
FROM HealthCareQualitySnapshot
GROUP BY countryName;

CREATE TABLE perCountryDataCoDHealth_pre AS
SELECT a.countryName,
       a.countryIncomeGroup,
       ROUND(averageHouseholdOutOfPocket, 2)        AS averageHouseholdOutOfPocket,
       ROUND(averageCapitalHealthExpend, 2)         AS averageCapitalHealthExpend,
       ROUND(averageSocialInsuranceContribution, 2) AS averageSocialInsuranceContribution,
       ROUND(average_cardiovascular, 2)             AS average_cardiovascular,
       ROUND(average_homicide, 5)                   AS average_homicide,
       ROUND(average_roadInjury, 5)                 AS average_roadInjury
FROM healthCare_perCapita_perCountry AS a
         INNER JOIN average_deaths_per_country AS c ON a.countryName LIKE c.countryName;


DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;

CREATE TABLE perCountryDataCoDHealth AS
SELECT a.countryName,
       a.countryIncomeGroup,
       ROUND(averageHouseholdOutOfPocket, 2)        AS averageHouseholdOutOfPocket,
       ROUND(averageCapitalHealthExpend, 2)         AS averageCapitalHealthExpend,
       ROUND(averageSocialInsuranceContribution, 2) AS averageSocialInsuranceContribution,
       ROUND(average_cardiovascular, 2)             AS average_cardiovascular,
       ROUND(average_homicide, 5)                   AS average_homicide,
       ROUND(average_roadInjury, 5)                 AS average_roadInjury,
       ROUND(lifeExpectancy, 2)                     AS lifeExpectancy,
       ROUND(averageBMI, 2)                         AS averageBMI
FROM perCountryDataCoDHealth_pre AS a
         INNER JOIN average_health_snap_per_country AS c ON a.countryName LIKE c.countryName;

DROP TABLE IF EXISTS perCountryDataCoDHealth_pre;
DROP VIEW IF EXISTS average_health_snap_per_country;