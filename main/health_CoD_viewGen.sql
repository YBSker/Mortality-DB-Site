DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;
DROP TABLE IF EXISTS perCountryDataCoDHealth;
DROP VIEW IF EXISTS average_cardio;

DROP TABLE IF EXISTS average_cardio;


CREATE VIEW healthCare_CoD_perCapita AS
SELECT c.countryName, c.theYear, c.cardiovascular, c.homicide, c.roadInjury, hc.householdOutOfPocket, hc.capitalHealthExpend, hc.socialInsuranceContribution
FROM CausesOfDeathPercent AS c 
INNER JOIN HealthCareExpenditureSnapshotPerCapita AS hc 
ON hc.countryName = c.countryName 
AND hc.year = c.theYear;

CREATE VIEW healthCare_perCapita_perCountry AS
SELECT a.countryName,
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

CREATE TABLE perCountryDataCoDHealth AS
SELECT a.countryName, ROUND(averageHouseholdOutOfPocket, 2) AS averageHouseholdOutOfPocket, 
ROUND(averageCapitalHealthExpend, 2) AS averageCapitalHealthExpend, 
ROUND(averageSocialInsuranceContribution, 2) AS averageSocialInsuranceContribution, 
ROUND(average_cardiovascular, 2) AS average_cardiovascular, 
ROUND(average_homicide, 2) AS average_homicide, 
ROUND(average_roadInjury, 2) AS average_roadInjury
FROM healthCare_perCapita_perCountry AS a INNER JOIN average_deaths_per_country AS c ON a.countryName = c.countryName;


DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;
DROP VIEW IF EXISTS average_deaths_per_country;

CREATE TABLE average_cardio AS
SELECT countryName, averageHouseholdOutOfPocket, average_cardiovascular 
FROM perCountryDataCoDHealth ORDER BY averageHouseholdOutOfPocket DESC;

