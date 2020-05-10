DROP TABLE IF EXISTS HealthCareQualitySnapshot ;
DROP TABLE IF EXISTS BMI_Data ;


CREATE TABLE BMI_Data (
                                       countryName  VARCHAR(20),
                                       year     DECIMAL(4,0),
                                       BMI DECIMAL(4,2),
                                       PRIMARY KEY(countryName, year)
);

LOAD DATA LOCAL INFILE
    'C:/Users/Stanley Chu/Desktop/College Docs/Senior Year/databases/data/bmi.txt'
    INTO TABLE BMI_Data
FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;


CREATE TABLE HealthCareQualitySnapshot AS
SELECT a.countryName, a.year, a.BMI, b.lifeExpectancy
FROM BMI_Data AS a INNER JOIN LifeExpectancyCountry AS b ON a.year = b.theYear AND a.countryName LIKE b.countryName;

DROP TABLE IF EXISTS BMI_Data ;
