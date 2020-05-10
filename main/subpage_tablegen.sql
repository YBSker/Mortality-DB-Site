DROP TABLE IF EXISTS life_Education;
DROP TABLE IF EXISTS religionPercents;
DROP TABLE IF EXISTS life_Religion;

CREATE TABLE religionPercents (
                                       year     DECIMAL(4,0),
                                       countryName  VARCHAR(20),
                                       christian     DECIMAL(4,2),
                                       muslim     DECIMAL(4,2),
                                       unaffiliated     DECIMAL(4,2),
                                       hindu     DECIMAL(4,2),
                                       buddhist     DECIMAL(4,2),
                                       folk     DECIMAL(4,2),
                                       other     DECIMAL(4,2),
                                       jew     DECIMAL(4,2),
                                       PRIMARY KEY(countryName, year)
);

LOAD DATA LOCAL INFILE 'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/religion_percents.txt'
    INTO TABLE religionPercents
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY '\n'
    IGNORE 1 LINES;

CREATE TABLE life_Religion AS
SELECT a.countryName, year, b.lifeExpectancy, christian, muslim, unaffiliated, hindu, buddhist, folk, other, jew
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
SELECT a.countryName, a.year, b.lifeExpectancy, a.happinessIndex, a.governmentConfidence, a.democracticQuality, a.logGDP
FROM HappinessSnapshot AS a
INNER JOIN LifeExpectancyCountry AS b 
ON b.countryName LIKE a.countryName 
AND a.year = b.theYear;

DROP TABLE IF EXISTS happiness_Homicide_pre;

CREATE TABLE happiness_Homicide_pre AS
SELECT a.countryName, a.year, a.lifeExpectancy, a.happinessIndex, a.governmentConfidence, a.democracticQuality, a.logGDP, ROUND(b.homicide, 4) AS homicide, ROUND(b.suicide, 4) AS suicide
FROM happiness_Homicide_temp AS a
INNER JOIN CausesOfDeathPercent AS b 
ON b.countryName LIKE a.countryName 
AND a.year = b.theYear
WHERE a.year > 2009;

DROP TABLE IF EXISTS happiness_Homicide_temp;

CREATE TABLE happiness_Homicide AS
SELECT countryName,
        ROUND(AVG(NULLIF(lifeExpectancy, 0)),2) as averageLifeExpectancy, 
        ROUND(AVG(NULLIF(happinessIndex, 0)),2) as averageHappinesIndex, 
        ROUND(AVG(NULLIF(governmentConfidence, 0)),2) AS averageGovernmentConfidence, 
        ROUND(AVG(NULLIF(democracticQuality, 0)),2) AS averageDemocraticQuality,
        ROUND(AVG(NULLIF(logGDP, 0)),2) AS averageLogGDP,
        ROUND(AVG(NULLIF(homicide, 0)), 4) AS averageHomicideRate,
        ROUND(AVG(NULLIF(suicide, 0)), 4) AS averageSuicideRate
FROM happiness_Homicide_pre
GROUP BY countryName;

DROP TABLE IF EXISTS happiness_Homicide_pre;



