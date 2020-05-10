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
    echo "<th> State </th>";
    echo "<th> Population</th>";
    echo "<th> Total Prisoners</th>";
    echo "<th> Incarceration Rate</th>";
    echo "<th> Life Expectancy</th>";
    echo "</tr>";
}

function outputResultsTableHeader_b()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> State </th>";
    echo "<th> Population</th>";
    echo "<th> Total Violent Crime</th>";
    echo "<th> Violent Crime per Capita</th>";
    echo "<th> Life Expectancy</th>";
    echo "</tr>";
}

include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">CRIME</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 style="color: #87CEFA;">Incarceration Rate and Life Expectancy</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not a state's incarceration rate has any correlation
                    with the state's average life expectancy. Data in this section is from 2016 and collected from the
                    <a href="https://www.kaggle.com/christophercorrea/prisoners-and-crime-in-united-states">Bureau of Justice</a>
                    and the
                    <a href="https://www.cdc.gov/nchs/data-visualization/life-expectancy/">CDC</a>.</h3>
            </div>

            <button type="button" class="collapsible">Does Incarceration Rate Correlate with Life Expectancy?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 States by Incarceration Rate</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT LOWER(jurisdiction) AS state, 
                            statePopulation,
                            prisonerCount,
                            prisonerCount / statePopulation AS rate,
                            lifeExpectancy AS le
                            FROM Crimes
                            INNER JOIN LifeExpectancyState ON LOWER(LifeExpectancyState.stateName) = LOWER(Crimes.jurisdiction) AND Crimes.theYear = '2016-01-01' AND LifeExpectancyState.countyName = '(blank)'         
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
                            echo "<td>" . $row["state"] . "</td>";
                            echo "<td>" . $row["statePopulation"] . "</td>";
                            echo "<td>" . $row["prisonerCount"] . "</td>";
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
                <h2>Bottom 10 Countries by Incarceration Rate</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT LOWER(jurisdiction) AS state, 
                            statePopulation,
                            prisonerCount,
                            prisonerCount / statePopulation AS rate,
                            lifeExpectancy AS le
                            FROM Crimes
                            INNER JOIN LifeExpectancyState ON LOWER(LifeExpectancyState.stateName) = LOWER(Crimes.jurisdiction) AND Crimes.theYear = '2016-01-01' AND LifeExpectancyState.countyName = '(blank)'         
                            ORDER BY rate ASC
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["state"] . "</td>";
                            echo "<td>" . $row["statePopulation"] . "</td>";
                            echo "<td>" . $row["prisonerCount"] . "</td>";
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
            </div>
            <div class="general fade-in tab_me">
                <h3>We looked
                    at top 10 and bottom 10 countries by incarceration rate. Just from the
                    eyeball test, it seems like states with a lower incarceration rate have a slight higher average life expectancy, but a
                    more rigorous statistical test can be used to confirm this. As such, the data seems to suggest that low incarceration rates
                    may be correlated with higher life expectancies.<br/>

                </h3>
                <h3>Click above to get data and analysis on specific sections!</h3>

            </div>
    </div>

        <h1 style="color: #87CEFA;">Violent Crime Rate and Life Expectancy</h1>
        <div class="general fade-in tab_me">
            <h3>In this section, we look at whether or not a state's violent crime rate has any correlation
                with the state's average life expectancy. Data in this section is from 2016 and collected from the <a href="https://www.kaggle.com/christophercorrea/prisoners-and-crime-in-united-states">Bureau of Justice</a>
                and the
                <a href="https://www.cdc.gov/nchs/data-visualization/life-expectancy/">CDC</a>.</h3>
        </div>

        <button type="button" class="collapsible">Do Violent Crime Rates Correlate with Life Expectancy?
        </button>
        <div class="content general fade-in tab_me">
            <h2>Top 10 States by Violent Crime Rate</h2>
            <div class="general fade-in">
                <?php
                $sql = "SELECT LOWER(jurisdiction) AS state, 
                            statePopulation,
                            violentCrimeTotal,
                            violentCrimeTotal / statePopulation AS rate,
                            lifeExpectancy AS le
                            FROM Crimes
                            INNER JOIN LifeExpectancyState ON LOWER(LifeExpectancyState.stateName) = LOWER(Crimes.jurisdiction) AND Crimes.theYear = '2016-01-01' AND LifeExpectancyState.countyName = '(blank)'         
                            ORDER BY rate DESC
                            ";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table border=\"1px solid black\">";
                    outputResultsTableHeader_b();
                    for ($i = 1; $i < 11; $i++) {
                        $row = $result->fetch_assoc();
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["statePopulation"] . "</td>";
                        echo "<td>" . $row["violentCrimeTotal"] . "</td>";
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
            <h2>Bottom 10 Countries by Violent Crime Rate</h2>
            <div class="general fade-in">
                <?php
                $sql = "SELECT LOWER(jurisdiction) AS state, 
                            statePopulation,
                            violentCrimeTotal,
                            violentCrimeTotal / statePopulation AS rate,
                            lifeExpectancy AS le
                            FROM Crimes
                            INNER JOIN LifeExpectancyState ON LOWER(LifeExpectancyState.stateName) = LOWER(Crimes.jurisdiction) AND Crimes.theYear = '2016-01-01' AND LifeExpectancyState.countyName = '(blank)'         
                            ORDER BY rate ASC
                            ";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table border=\"1px solid black\">";
                    outputResultsTableHeader_b();
                    for ($i = 1; $i < 11; $i++) {
                        $row = $result->fetch_assoc();
                        echo "<tr>";
                        echo "<td>$i</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["statePopulation"] . "</td>";
                        echo "<td>" . $row["violentCrimeTotal"] . "</td>";
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
        </div>
        <div class="general fade-in tab_me">
            <h3>We looked
                at top 10 and bottom 10 countries by violent crime per capita. Just from the
                eyeball test, it's hard to see a pattern. More rigorous statistical tests would provide a better conclusion, especially given
                that the large amount of data makes seemingly smaller differences in averages more significant.<br/>

            </h3>
            <h3>Click above to get data and analysis on specific sections!</h3>

            <a href="https://www.kaggle.com/christophercorrea/prisoners-and-crime-in-united-states">Crime and Incarceration Data</a>
            <br/>
            <a href="https://www.cdc.gov/nchs/data-visualization/life-expectancy/">Life Expectancy Data</a>
        </div>
    </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
