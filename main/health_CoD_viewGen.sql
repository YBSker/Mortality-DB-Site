DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;
DROP TABLE IF EXISTS perCountryDataCoDHealth;
DROP VIEW IF EXISTS average_cardio;
DROP VIEW IF EXISTS average_health_snap_per_country;
DROP TABLE IF EXISTS perCountryDataCoDHealth_pre;

DROP TABLE IF EXISTS average_cardio;


CREATE VIEW healthCare_CoD_perCapita AS
SELECT c.countryName, c.theYear, hc.countryIncomeGroup, c.cardiovascular, c.homicide, c.roadInjury, hc.householdOutOfPocket, hc.capitalHealthExpend, hc.socialInsuranceContribution
FROM CausesOfDeathPercent AS c 
INNER JOIN HealthCareExpenditureSnapshotPerCapita AS hc 
ON hc.countryName = c.countryName 
AND hc.year = c.theYear;

CREATE VIEW healthCare_perCapita_perCountry AS
SELECT a.countryName, countryIncomeGroup,
        AVG(NULLIF(householdOutOfPocket, 0)) as averageHouseholdOutOfPocket, 
        AVG(NULLIF(capitalHealthExpend, 0)) AS averageCapitalHealthExpend, 
        AVG(NULLIF(socialInsuranceContribution, 0)) AS averageSocialInsuranceContribution
FROM HealthCareExpenditureSnapshotPerCapita AS a
GROUP BY countryName;

CREATE VIEW average_deaths_per_country AS
SELECT c.countryName,
        AVG(NULLIF(c.cardiovascular, 0)) AS average_cardiovascular,
        AVG(NULLIF(c.homicide, 0)) AS average_homicide,
        AVG(NULLIF(c.roadInjury, 0)) AS average_roadInjury
FROM CausesOfDeathPercent AS c
GROUP BY countryName;

CREATE VIEW average_health_snap_per_country AS
SELECT countryName, 
        AVG(NULLIF(lifeExpectancy, 0)) AS lifeExpectancy,
        AVG(NULLIF(BMI, 0)) AS averageBMI
FROM HealthCareQualitySnapshot
GROUP BY countryName;

CREATE TABLE perCountryDataCoDHealth_pre AS
SELECT a.countryName, a.countryIncomeGroup,
 ROUND(averageHouseholdOutOfPocket, 2) AS averageHouseholdOutOfPocket, 
ROUND(averageCapitalHealthExpend, 2) AS averageCapitalHealthExpend, 
ROUND(averageSocialInsuranceContribution, 2) AS averageSocialInsuranceContribution, 
ROUND(average_cardiovascular, 2) AS average_cardiovascular, 
ROUND(average_homicide, 5) AS average_homicide, 
ROUND(average_roadInjury, 5) AS average_roadInjury
FROM healthCare_perCapita_perCountry AS a INNER JOIN average_deaths_per_country AS c ON a.countryName LIKE c.countryName;


DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;

CREATE TABLE perCountryDataCoDHealth AS
SELECT a.countryName, a.countryIncomeGroup,
 ROUND(averageHouseholdOutOfPocket, 2) AS averageHouseholdOutOfPocket, 
ROUND(averageCapitalHealthExpend, 2) AS averageCapitalHealthExpend, 
ROUND(averageSocialInsuranceContribution, 2) AS averageSocialInsuranceContribution, 
ROUND(average_cardiovascular, 2) AS average_cardiovascular, 
ROUND(average_homicide, 5) AS average_homicide, 
ROUND(average_roadInjury, 5) AS average_roadInjury,
ROUND(lifeExpectancy, 5) AS lifeExpectancy, 
ROUND(averageBMI, 5) AS averageBMI
FROM perCountryDataCoDHealth_pre AS a INNER JOIN average_health_snap_per_country AS c ON a.countryName LIKE c.countryName;

DROP TABLE IF EXISTS perCountryDataCoDHealth_pre;
DROP VIEW IF EXISTS average_health_snap_per_country;

