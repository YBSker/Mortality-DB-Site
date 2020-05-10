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
    echo "<th> Country </th>";
    echo "<th> Average Life Expectancy </th>";
    echo "<th>Government Confidence</th>";
    echo "<th> Government Confidence Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_b()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average Life Expectancy </th>";
    echo "<th> Democratic Quality Index</th>";
    echo "<th> Democratic Quality Index Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_c()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average Homicide Rate </th>";
    echo "<th> Average Happiness Index</th>";
    echo "<th> Average Happiness Index Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_d()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average Happiness Index </th>";
    echo "<th> Average Homicide Rate</th>";
    echo "<th> Average Homicide Rate Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_e()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average logGDP </th>";
    echo "<th> Average Suicide Rate</th>";
    echo "<th> Average Suicide Rate Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_f()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average Suicide Rate </th>";
    echo "<th> Average logGDP</th>";
    echo "<th> Average logGDP Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">HAPPINESS</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 class="tab_title" style="color: #87CEFA;">Life Expectancy and Government Quality</h1>
            <div class="general tab_me">
                <h3>In this section, we look at the quality of government and its correlation with life expectancy of
                    its people.
                    The primary indicators of government quality that we have selected are government confidence and
                    democratic quality. These factors are sourced from <a href="https://worldhappiness.report/">the
                        world happiness report</a> and indicate the amount of confidence members of a country have in a
                    lack of or a presence of corruption within their government as well as the <a
                            href="https://en.wikipedia.org/wiki/Democracy_Index">democracy index</a> associated with
                    each country. Values were averaged over a number of datapoints taken over 10 or more years, as
                    opinion on government likely does not change at the same rate as it might affect life expectancy.
                </h3>
            </div>
            <button type="button" class="collapsible">Countries with Top 10 Average Life Expectancy</button>
            <div class="content general fade-in tab_me">
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLifeExpectancy, averageGovernmentConfidence, RANK() OVER (ORDER BY averageGovernmentConfidence DESC) attain_rank FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy DESC";
                        $count_num = $mysqli->query($sql_count);
                        $count_row = $count_num->fetch_assoc();
                        echo "<p style='color: grey'>*Out of " . $count_row["count"] . "</p>";

                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLifeExpectancy"] . "</td>";
                            echo "<td>" . $row["averageGovernmentConfidence"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLifeExpectancy, averageDemocraticQuality, RANK() OVER (ORDER BY averageDemocraticQuality DESC) attain_rank FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM happiness_Homicide WHERE averageDemocraticQuality IS NOT NULL ORDER BY averageLifeExpectancy DESC";
                        $count_num = $mysqli->query($sql_count);
                        $count_row = $count_num->fetch_assoc();
                        echo "<p style='color: grey'>*Out of " . $count_row["count"] . "</p>";

                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLifeExpectancy"] . "</td>";
                            echo "<td>" . $row["averageDemocraticQuality"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
            <button type="button" class="collapsible">Countries with Bottom 10 Average Life Expectancy</button>
            <div class="content general fade-in tab_me">
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLifeExpectancy, averageGovernmentConfidence, RANK() OVER (ORDER BY averageGovernmentConfidence DESC) attain_rank FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy ASC";
                        $count_num = $mysqli->query($sql_count);
                        $count_row = $count_num->fetch_assoc();
                        echo "<p style='color: grey'>*Out of " . $count_row["count"] . "</p>";

                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLifeExpectancy"] . "</td>";
                            echo "<td>" . $row["averageGovernmentConfidence"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLifeExpectancy, averageDemocraticQuality, RANK() OVER (ORDER BY averageDemocraticQuality DESC) attain_rank FROM happiness_Homicide WHERE averageGovernmentConfidence IS NOT NULL ORDER BY averageLifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM happiness_Homicide WHERE averageDemocraticQuality IS NOT NULL ORDER BY averageLifeExpectancy ASC";
                        $count_num = $mysqli->query($sql_count);
                        $count_row = $count_num->fetch_assoc();
                        echo "<p style='color: grey'>*Out of " . $count_row["count"] . "</p>";

                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLifeExpectancy"] . "</td>";
                            echo "<td>" . $row["averageDemocraticQuality"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>

            <div class="general tab_me">
                <h3>Overall, it seemed as though countries with higher average life expectancies also had lower
                    confidence in their governments and residents observed more cases of corruption within their
                    government. The opposite seemed to hold for those countries with the bottom 10 average life
                    expectancies. There seemed to be overall a middle to higher level of government confidence in said
                    countries. On the other hand, democratic quality seemed to be significantly better in countries with
                    higher average life expectancy and much lower in those with lower average life expectancies. Perhaps
                    the difference in government confidence is as a result of the politics or internal handling and
                    freedoms within each country.</h3>
                <h3>Click above to get data on specific sets!</h3>
            </div>
            <br> <br>


            <h1 class="tab_title" style="color: #87CEFA;">Happiness and Violent Deaths</h1>
            <div class="general tab_me">
                <h3>In this section, we look at the rate of homicides and the happiness index of various countries in
                    order to get an idea of the relation between the happiness of a country and the rate at which murder
                    is committed upon a population out of 136 available data points.
                </h3>
            </div>
            <button type="button" class="collapsible">Countries with Top/Bottom 10 Average Homicide Rates</button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Homicide Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHomicideRate, averageHappinesIndex, RANK() OVER (ORDER BY averageHappinesIndex DESC) attain_rank FROM happiness_Homicide ORDER BY averageHomicideRate DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_c();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHomicideRate"] . "</td>";
                            echo "<td>" . $row["averageHappinesIndex"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 Homicide Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHomicideRate, averageHappinesIndex, RANK() OVER (ORDER BY averageHappinesIndex DESC) attain_rank FROM happiness_Homicide ORDER BY averageHomicideRate ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_c();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHappinesIndex"] . "</td>";
                            echo "<td>" . $row["averageHomicideRate"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
            <button type="button" class="collapsible">Countries with Top/Bottom 10 Average Happiness Index Score
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Happiness Index</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHappinesIndex, averageHomicideRate, RANK() OVER (ORDER BY averageHomicideRate DESC) attain_rank FROM happiness_Homicide ORDER BY averageHappinesIndex DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_d();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHappinesIndex"] . "</td>";
                            echo "<td>" . $row["averageHomicideRate"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 Happiness Index</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHappinesIndex, averageHomicideRate, RANK() OVER (ORDER BY averageHomicideRate DESC) attain_rank FROM happiness_Homicide ORDER BY averageHappinesIndex ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_d();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHappinesIndex"] . "</td>";
                            echo "<td>" . $row["averageHomicideRate"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>

            <div class="general tab_me">
                <h3>In general, it would appear that happier countries have lower homicide rates. Other than a few
                    notable exceptions (such as Burundi with a bottom 10 homicide rate and a bottom 10 happiness index),
                    most countries seemed to follow this trend. Interestingly, countries that rated lower on the
                    happiness index tended to
                    range around the middle of the pack on average homicide rates. The data seems to suggest that
                    happier countries tend to have lower homicide rates, but countries of average or low happiness
                    seemed to have similar or mixed rates of homicide.</h3>
                <h3>Click above to get data on specific sets!</h3>
            </div>
            <br> <br>


            <h1 class="tab_title" style="color: #87CEFA;">GDP and Suicide</h1>
            <div class="general tab_me">
                <h3>In this section, we look at the rate of suicide and compare it to logGDP of a country in order to
                    check for a
                    correlation positive or negative between the two.
                </h3>
            </div>
            <button type="button" class="collapsible">Countries with Top/Bottom 10 Average logGDP</button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 logGDP</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLogGDP, averageSuicideRate, RANK() OVER (ORDER BY averageSuicideRate DESC) attain_rank FROM happiness_Homicide ORDER BY averageLogGDP DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_e();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLogGDP"] . "</td>";
                            echo "<td>" . $row["averageSuicideRate"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 logGDP</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageLogGDP, averageSuicideRate, RANK() OVER (ORDER BY averageSuicideRate DESC) attain_rank FROM happiness_Homicide WHERE averageLogGDP IS NOT NULL ORDER BY averageLogGDP ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_e();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageLogGDP"] . "</td>";
                            echo "<td>" . $row["averageSuicideRate"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
            <button type="button" class="collapsible">Countries with Top/Bottom 10 Average Happiness Index Score
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Suicide Rate</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageSuicideRate, averageLogGDP, RANK() OVER (ORDER BY averageLogGDP DESC) attain_rank FROM happiness_Homicide ORDER BY averageSuicideRate DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_f();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageSuicideRate"] . "</td>";
                            echo "<td>" . $row["averageLogGDP"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 Suicide Rate</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageSuicideRate, averageLogGDP, RANK() OVER (ORDER BY averageLogGDP DESC) attain_rank FROM happiness_Homicide ORDER BY averageSuicideRate ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_f();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageSuicideRate"] . "</td>";
                            echo "<td>" . $row["averageLogGDP"] . "</td>";
                            echo "<td>" . $row["attain_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>

            <div class="general tab_me">
                <h3>There appeared to be a wide range of correspondence between suicide rates and logGDP.
                However, there seemed to be a slight trend towards higher GDPs and higher suicide rates.
                Nothing was obviously conclusive, however, and there seemed to be outliers in both directions
                for all sets of data. </h3>
                <h3>Click above to get data on specific sets!</h3>
            </div>
            <div class="general tab_me">
                <h3>Click above to get data on specific sets!</h3>
            </div>
        </div>


    </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
