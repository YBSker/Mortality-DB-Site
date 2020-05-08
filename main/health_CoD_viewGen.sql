DROP VIEW IF EXISTS healthCare_Cardio;
DROP VIEW IF EXISTS healthCare_CoD_perCapita;
DROP VIEW IF EXISTS healthCare_perCapita_perCountry;


CREATE VIEW healthCare_CoD_perCapita AS
SELECT c.countryName, c.theYear, c.cardiovascular, c.homicide, c.roadInjury, hc.householdOutOfPocket, hc.capitalHealthExpend, hc.socialInsuranceContribution
FROM CausesOfDeathPercent AS c 
INNER JOIN HealthCareExpenditureSnapshotPerCapita AS hc 
ON hc.countryName = c.countryName 
AND hc.year = c.theYear;

CREATE VIEW healthCare_perCapita_perCountry AS
SELECT countryName, year, 
        AVG(NULLIF(householdOutOfPocket, 0)) as householdOutOfPocket, 
        AVG(NULLIF(capitalHealthExpend, 0)) AS capitalHealthExpend, 
        AVG(NULLIF(socialInsuranceContribution, 0)) AS socialInsuranceContribution
FROM HealthCareExpenditureSnapshotPerCapita
GROUP BY countryName;

