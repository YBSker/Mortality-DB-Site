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
    echo "<th> Country </th>";
    echo "<th> Average Rating of Movies</th>";
    echo "<th> Happiness Index</th>";
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
            <h1 style="color: #87CEFA;">Crime Rate and Life Expectancy</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not a state's crime rate has any correlation
                    with the state's average life expectancy. Data in this section is collected from the Bureau of Justice and the CDC.</h3>
            </div>

            <button type="button" class="collapsible">Do Crime Rates Correlate with Life Expectancy?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 States by Highest Rate of Crime</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT jurisdiction, 
                            statePopulation,
                            prisonerCount,   
                            lifeExpectancy AS le
                            FROM Crime
                            INNER JOIN LifeExpectancyState ON LifeExpectancyState.stateName = Crime.jurisdiction
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
                <h2>Bottom 10 Countries by Rate of Comedies</h2>
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
                <h3>Countries producing fewer than 10 movies were omitted due to insufficient data.</h3>
            </div>
            <div class="general fade-in tab_me">
                <h3>We looked
                    at top 10 and bottom 10 countries by rate at which they produce movies of a certain genre versus
                    movies in general. Just from the
                    eyeball test, there doesn't seem to be a noticeable difference in life expectancies between the two
                    sets for any of the genres, but a
                    more rigorous statistical test can be used to confirm this. As such, the data doesn't seem to reject
                    the idea that
                    movie genres don't affect life expectancy in a significant way. <br/>


                </h3>

                <h3>Click above to get data and analysis on specific sections!</h3>

                <a href="https://www.kaggle.com/christophercorrea/prisoners-and-crime-in-united-states">Crime and Incarceration Data</a>
                <br/>
                <a href="https://www.cdc.gov/nchs/data-visualization/life-expectancy/">Life Expectancy Data</a>
            </div>

            <h1 style="color: #87CEFA;">Movie Ratings and Happiness</h1>

            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not there's a correlation between average movie ratings for a
                    country and that country's happiness index.</h3>
            </div>

            <button type="button" class="collapsible">Do Better Movies Mean Better Living?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Countries by Average Movie Ratings</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            AVG(IMDBScore) AS score,   
                            happinessIndex AS ind
                            FROM Movies
                            INNER JOIN HappinessSnapshot ON HappinessSnapshot.countryName = Movies.country AND HappinessSnapshot.year = 2016
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY score DESC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["score"] . "</td>";
                            echo "<td>" . $row["ind"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 Countries by Average Movie Ratings</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            AVG(IMDBScore) AS score,   
                            happinessIndex AS ind
                            FROM Movies
                            INNER JOIN HappinessSnapshot ON HappinessSnapshot.countryName = Movies.country AND HappinessSnapshot.year = 2016
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY score ASC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["score"] . "</td>";
                            echo "<td>" . $row["ind"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h3> Countries with fewer than 10 total movie entries have been excluded due to insufficient data. Humorously, Iran had the on-average highest rated movies and Canada had the lowest. According to the happiness indexes of these
                    two countries, this is the inverse of what we expected, however, the rest of the data don't seem to follow a pattern obvious to naked eye,
                    so this remains rather inconclusive.</h3>
            </div>
            <div class="general fade-in tab_me">
                <h3></h3>
                <h3>Click above to get data and analysis on specific sections!</h3>
                <a href="https://www.kaggle.com/danielgrijalvas/movies">Movie Data</a>
                <br/>
                <a href="https://data.world/laurel/world-happiness-report-data">Happiness Data</a>
            </div>

        </div>
    </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
