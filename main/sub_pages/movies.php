<html>
<head>
    <link rel="stylesheet" type="text/css" href="../mainStyle.css">
    <link rel="stylesheet" type="text/css" href="subPageStyle.css">
</head>
<body class="general background">
<?php
function outputResultsTableHeader()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country of Origin </th>";
    echo "<th> Total Number of Movies</th>";
    echo "<th> Movies of Selected Genre </th>";
    echo "<th> Rate of Genre</th>";
    echo "<th> Life Expectancy</th>";
    echo "</tr>";
}
function outputResultsTableHeader_b()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Cardiovascular Deaths in Percent of <br>Total Population </th>";
    echo "<th> Homicide Deaths in Percent of <br>Total Population </th>";
    echo "<th> Average Social Insurance Expenditures in Millions </th>";
    echo "<th> Rank of Expenditure From Within Wealth Bracket <br>(1 is Most)</th>";
    echo "</tr>";
}
include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">MOVIES</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 style="color: #87CEFA;">Movie Preferences and Cause of Death</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not a country's movie preferences has any correlation
                with the country's average life expectancy or the rate of certain causes of death. Data in this section
                is collected from the WHO and IMDb.</h3>
            </div>

            <button type="button" class="collapsible">Is Laughter The Best Medicine: Comedy vs. Life Expectancy
            </button>
            <div class="content general fade-in tab_me">
                <h2>Rate of Comedies By Country</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Comedy' then 1 else 0 end) AS com,
                            sum(case when genre = 'Comedy' then 1 else 0 end) / COUNT(*) AS rate,    
                            lifeExpectancy AS le
                            FROM Movies
                            INNER JOIN LifeExpectancyCountry ON LifeExpectancyCountry.countryName = Movies.country AND LifeExpectancyCountry.theYear = 2015
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY rate DESC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["num"] . "</td>";
                            echo "<td>" . $row["com"] . "</td>";
                            echo "<td>" . $row["rate"] . "</td>";
                            echo "<td>" . $row["le"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Rate of Comedies By Country</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Comedy' then 1 else 0 end) AS com,
                            sum(case when genre = 'Comedy' then 1 else 0 end) / COUNT(*) AS rate,    
                            lifeExpectancy AS le
                            FROM Movies
                            INNER JOIN LifeExpectancyCountry ON LifeExpectancyCountry.countryName = Movies.country AND LifeExpectancyCountry.theYear = 2015
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY rate DESC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["num"] . "</td>";
                            echo "<td>" . $row["com"] . "</td>";
                            echo "<td>" . $row["rate"] . "</td>";
                            echo "<td>" . $row["le"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3>A higher out of pocket cost for households in affording healthcare seemed to correspond with a
                    higher rate of deaths related to cardiovascular disease,
                    a lower rate of deaths related to homicide, and a lower rate of death to do with vehicular
                    accidents. The case of cardiovascular disease seems to be sensible, as
                    higher out of pocket costs are perhaps more indicative of inability to afford preventative
                    medications or treatments. In the cases of homicides and vehicular accidents,
                    perhaps there are more factors at play, as there does seem to be a range of rankings that a country
                    can take. Perhaps we need to look at more statistics.</h3>
            </div>
            <button type="button" class="collapsible">Top 10 Countries in Average Capital Health Expenditures Per Capita
            </button>
            <div class="content general fade-in tab_me">
                <h2>Cardiovascular Disease Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageCapitalHealthExpend, average_cardiovascular, RANK() OVER (ORDER BY average_cardiovascular) cardio_rank FROM perCountryDataCoDHealth WHERE NOT (countryName = 'Qatar') ORDER BY averageCapitalHealthExpend DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageCapitalHealthExpend"] . "</td>";
                            echo "<td>" . $row["average_cardiovascular"] . "</td>";
                            echo "<td>" . $row["cardio_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Homicide Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageCapitalHealthExpend, average_homicide, RANK() OVER (ORDER BY average_homicide) homicide_rank FROM perCountryDataCoDHealth WHERE NOT (countryName = 'Qatar') ORDER BY averageCapitalHealthExpend DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageCapitalHealthExpend"] . "</td>";
                            echo "<td>" . $row["average_homicide"] . "</td>";
                            echo "<td>" . $row["homicide_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Vehicular Accident Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageCapitalHealthExpend, average_roadInjury, RANK() OVER (ORDER BY average_roadInjury) roadInjury_rank FROM perCountryDataCoDHealth WHERE NOT (countryName = 'Qatar') ORDER BY averageCapitalHealthExpend DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageCapitalHealthExpend"] . "</td>";
                            echo "<td>" . $row["average_roadInjury"] . "</td>";
                            echo "<td>" . $row["roadInjury_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3>More capital health expenditures (investments in health infrastructure, vaccine stocks, etc) seemed
                    to correspond with higher rates of
                    cardiovascular related deaths and lower homicide and vehicular accident death rates with a couple of
                    outliers. For cardiovascular disease related deaths,
                    perhaps infrastructure is not indicative of chances of surviving heart attacks and is more of an
                    indicator of a nation's wealth. This could be indicative of longer
                    life spans or other factors leading to higher rates of cardiovascular disease. Infrastructure might
                    not be as helpful in the case of cardiovascular disease. For instance, one of
                    the biggest indicators of surviving a heart attack is time until CPR or defibrillation. As for lower
                    homicide and vehicular accident deaths, in general data seems to trend towards
                    lower likelihood of this fatality. Likely since these two forms of death rely more on likelihood and
                    speed of treatment over a longer term and with more specific equipment.
                    The two outliers are consistent between both homicide and vehicular accidents and perhaps can be
                    considered as unrepresentative outliers.</h3>
            </div>
            <button type="button" class="collapsible">Top 10 Countries in Average Social Insurance Contributions Per
                Capita
            </button>
            <div class="content general fade-in tab_me">
                <h2>Cardiovascular Disease Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageSocialInsuranceContribution, average_cardiovascular, RANK() OVER (ORDER BY average_cardiovascular) cardio_rank FROM perCountryDataCoDHealth ORDER BY averageSocialInsuranceContribution DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["average_cardiovascular"] . "</td>";
                            echo "<td>" . $row["cardio_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Homicide Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageSocialInsuranceContribution, average_homicide, RANK() OVER (ORDER BY average_homicide) homicide_rank FROM perCountryDataCoDHealth ORDER BY averageSocialInsuranceContribution DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["average_homicide"] . "</td>";
                            echo "<td>" . $row["homicide_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Vehicular Accident Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageSocialInsuranceContribution, average_roadInjury, RANK() OVER (ORDER BY average_roadInjury) roadInjury_rank FROM perCountryDataCoDHealth ORDER BY averageSocialInsuranceContribution DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["average_roadInjury"] . "</td>";
                            echo "<td>" . $row["roadInjury_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3>More social insurance contributions seemed to correspond to higher cardiovascular disease death,
                    lower homicide death rates, and lower vehicular accident death rates.
                    As for the cardiovascular death rates, this may be indicative of an error in our data. Other studies
                    have demonstrated that countries such as France and Japan have
                    some of the LOWEST rates of death by cardiovascular disease
                    (https://www.aihw.gov.au/getmedia/a8138409-090c-482e-8e5f-e64943be8ff0/hsvd-c06.pdf.aspx). As for
                    the rest,
                    homicide and vehicular death rates seem consistent other than the consistent outlier of the United
                    States. Higher social insurance contributions would be indicative of being
                    able to spend preventative medications in the case of cardiovascular disease and to afford emergency
                    treatments for homicides and vehicular accidents. </h3>
            </div>
            <div class="general fade-in tab_me">
                <h3>Overall Analysis For first section</h3>
                <h3>Click above to get data and analysis on specific sections!</h3>
            </div>

            <h1 style="color: #87CEFA;">Movie Budgets and Life Expectancy</h1>

            <div class="general fade-in tab_me">
                <h3>In this section,</h3>
            </div>

            <button type="button" class="collapsible">Top 10 Cardiovascular Death Rates of High Income Countries
            </button>
            <div class="content general fade-in tab_me">
                <h2>High Income Death Rates and Social Healthcare Spending</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, average_cardiovascular, average_homicide, averageSocialInsuranceContribution, RANK() OVER (ORDER BY averageSocialInsuranceContribution) spending_rank FROM perCountryDataCoDHealth WHERE countryIncomeGroup = 'Hi' AND averageSocialInsuranceContribution IS NOT NULL  ORDER BY average_cardiovascular DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["average_cardiovascular"] . "</td>";
                            echo "<td>" . $row["average_homicide"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["spending_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3>A higher out of pocket cost for households in affording healthcare seemed to correspond with a
                    higher rate of deaths related to cardiovascular disease,
                    a lower rate of deaths related to homicide, and a lower rate of death to do with vehicular
                    accidents. The case of cardiovascular disease seems to be sensible, as
                    higher out of pocket costs are perhaps more indicative of inability to afford preventative
                    medications or treatments. In the cases of homicides and vehicular accidents,
                    perhaps there are more factors at play, as there does seem to be a range of rankings that a
                    country
                    can take. Perhaps we need to look at more statistics.</h3>
            </div>
            <button type="button" class="collapsible">Top 10 Cardiovascular Death Rates of Middle Income Countries
            </button>
            <div class="content general fade-in tab_me">
                <h2>Middle Income Death Rates and Social Healthcare Spending</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, average_cardiovascular, average_homicide, averageSocialInsuranceContribution, RANK() OVER (ORDER BY averageSocialInsuranceContribution DESC) spending_rank FROM perCountryDataCoDHealth WHERE (countryIncomeGroup = 'Low-Mid' OR countryIncomeGroup = 'Up-Mid') AND averageSocialInsuranceContribution IS NOT NULL  ORDER BY average_cardiovascular DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["average_cardiovascular"] . "</td>";
                            echo "<td>" . $row["average_homicide"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["spending_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3>More capital health expenditures (investments in health infrastructure, vaccine stocks, etc)
                    seemed
                    to correspond with higher rates of
                    cardiovascular related deaths and lower homicide and vehicular accident death rates with a
                    couple of
                    outliers. For cardiovascular disease related deaths,
                    perhaps infrastructure is not indicative of chances of surviving heart attacks and is more of an
                    indicator of a nation's wealth. This could be indicative of longer
                    life spans or other factors leading to higher rates of cardiovascular disease. Infrastructure
                    might
                    not be as helpful in the case of cardiovascular disease. For instance, one of
                    the biggest indicators of surviving a heart attack is time until CPR or defibrillation. As for
                    lower
                    homicide and vehicular accident deaths, in general data seems to trend towards
                    lower likelihood of this fatality. Likely since these two forms of death rely more on likelihood
                    and
                    speed of treatment over a longer term and with more specific equipment.
                    The two outliers are consistent between both homicide and vehicular accidents and perhaps can be
                    considered as unrepresentative outliers.</h3>
            </div>
            <button type="button" class="collapsible">Top 10 Cardiovascular Death Rates of Low Income Countries
            </button>
            <div class="content general fade-in tab_me">
                <h2>Low Income Death Rates and Social Healthcare Spending</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, average_cardiovascular, average_homicide, averageSocialInsuranceContribution, RANK() OVER (ORDER BY averageSocialInsuranceContribution) spending_rank FROM perCountryDataCoDHealth WHERE countryIncomeGroup = 'Low' AND averageSocialInsuranceContribution IS NOT NULL  ORDER BY average_cardiovascular DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["average_cardiovascular"] . "</td>";
                            echo "<td>" . $row["average_homicide"] . "</td>";
                            echo "<td>" . $row["averageSocialInsuranceContribution"] . "</td>";
                            echo "<td>" . $row["spending_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    $mysqli->close();
                    ?>
                </div>
                <h3>More social insurance contributions seemed to correspond to higher cardiovascular disease death,
                    lower homicide death rates, and lower vehicular accident death rates.
                    As for the cardiovascular death rates, this may be indicative of an error in our data. Other
                    studies
                    have demonstrated that countries such as France and Japan have
                    some of the LOWEST rates of death by cardiovascular disease
                    (https://www.aihw.gov.au/getmedia/a8138409-090c-482e-8e5f-e64943be8ff0/hsvd-c06.pdf.aspx). As
                    for
                    the rest,
                    homicide and vehicular death rates seem consistent other than the consistent outlier of the
                    United
                    States. Higher social insurance contributions would be indicative of being
                    able to spend preventative medications in the case of cardiovascular disease and to afford
                    emergency
                    treatments for homicides and vehicular accidents. </h3>
            </div>
            <div class="general fade-in tab_me">
                <h3>Overall, based purely on our data sources, it would seem that more spending by a country and
                    households on healthcare corresponds
                    to a higher rate of cardiovascular death. The country data would seem to be skewed, as there is
                    some heavy error with specific countries such
                    as Japan and France. Data on households seems to be consistent with other studies...particularly
                    in the case of affording preventative medications.
                    More spending in general seemed to be indicative of a lower risk of death by homicide and
                    vehicular accidents. Public spending on infrastructure and
                    individual healthcare makes sense, as there would be more accessability to life saving
                    treatments. Individual spendings may be indicative of more availability
                    to spend money on healthcare and again be indicative of more accessability to life saving
                    treatments or hospitals in drastic cases.</h3>
                <h3>Click above to get data and analysis on specific sections!</h3>
            </div>

        </div>
    </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
