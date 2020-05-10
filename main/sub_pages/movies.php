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
    echo "<th> Average Rating of Movies</th>";
    echo "<th> Happiness Index</th>";
    echo "</tr>";
}

function outputResultsTableHeader_c()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Total Movies</th>";
    echo "<th> Total Action Movies</th>";
    echo "<th> Rate of Action Movies</th>";
    echo "<th> Rate of Homicide as Cause of Death</th>";
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
            <h1 style="color: #87CEFA;">Movie Preferences and Life Expectancy</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not a country's movie preferences has any correlation
                    with the country's average life expectancy. Data in this section
                    is collected from the <a href="https://www.kaggle.com/kumarajarshi/life-expectancy-who">WHO</a>
                    and <a href="https://www.kaggle.com/danielgrijalvas/movies">IMDb</a>.</h3>

            </div>

            <button type="button" class="collapsible">Is Laughter The Best Medicine?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Countries by Highest Rate of Comedies</h2>
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

            <button type="button" class="collapsible">Are Jump Scares Taking Years Off Your Life?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Countries by Highest Rate of Horrors</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Horror' then 1 else 0 end) AS com,
                            sum(case when genre = 'Horror' then 1 else 0 end) / COUNT(*) AS rate,    
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
                <h2>Bottom 10 Countries by Rate of Horrors</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Horror' then 1 else 0 end) AS com,
                            sum(case when genre = 'Horror' then 1 else 0 end) / COUNT(*) AS rate,    
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
                <h3>Countries producing fewer than 10 movies were omitted due to insufficient data. </h3>
            </div>
            <button type="button" class="collapsible">Is 2D > 3D after all?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Countries by Highest Rate of Animated Movies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Animation' then 1 else 0 end) AS com,
                            sum(case when genre = 'Animation' then 1 else 0 end) / COUNT(*) AS rate,    
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
                <h2>Bottom 10 Countries by Rate of Animated Movies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Animation' then 1 else 0 end) AS com,
                            sum(case when genre = 'Animation' then 1 else 0 end) / COUNT(*) AS rate,    
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
                <h3>Countries producing fewer than 10 movies were omitted due to insufficient data, although animation
                    is less popular overall,
                    so there aren't even 10 entries above a rate of 0%. Having more data would make this a lot
                    better.</h3>
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

            </div>

            <h1 style="color: #87CEFA;">Movie Ratings and Happiness</h1>

            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not there's a correlation between average movie ratings for a
                    country and that country's happiness index. Data is collected from the
                    <a href="https://data.world/laurel/world-happiness-report-data">World Happiness Report</a>
                    and <a href="https://www.kaggle.com/danielgrijalvas/movies">IMDb</a>.</h3>
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

            </div>

            <h1 style="color: #87CEFA;">Action Movies and Homicide</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we look at whether or not the proportion of action movies to total movies a country produces
                    is correlated with average proportion of deaths in that country that are categorized as homicide, as action is the genre
                    with the highest frequency of violent scenes.
                    Data in this section is and collected from <a href="https://www.kaggle.com/danielgrijalvas/movies"> IMDb </a>and <a
                            href="https://ourworldindata.org/homicides"> ourworldindata.org.<a/></h3>
            </div>

            <button type="button" class="collapsible">Do Action Movies Make People Violent?
            </button>
            <div class="content general fade-in tab_me">
                <h2>Top 10 Countries By Action Movie Production</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Action' then 1 else 0 end) AS com,
                            sum(case when genre = 'Action' then 1 else 0 end) / COUNT(*) AS rate,    
                            average_homicide AS hom
                            FROM Movies
                            INNER JOIN perCountryDataCoDHealth ON perCountryDataCoDHealth.countryName = Movies.country
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY hom DESC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_c();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["num"] . "</td>";
                            echo "<td>" . $row["com"] . "</td>";
                            echo "<td>" . $row["rate"] . "</td>";
                            echo "<td>" . $row["hom"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Bottom 10 Countries by Action Movie Production</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT country, 
                            COUNT(*) AS num, 
                            sum(case when genre = 'Action' then 1 else 0 end) AS com,
                            sum(case when genre = 'Action' then 1 else 0 end) / COUNT(*) AS rate,    
                            average_homicide AS hom
                            FROM Movies
                            INNER JOIN perCountryDataCoDHealth ON perCountryDataCoDHealth.countryName = Movies.country
                            GROUP BY country
                            HAVING COUNT(*) > 9
                            ORDER BY hom ASC                            
                            ";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_c();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["country"] . "</td>";
                            echo "<td>" . $row["num"] . "</td>";
                            echo "<td>" . $row["com"] . "</td>";
                            echo "<td>" . $row["rate"] . "</td>";
                            echo "<td>" . $row["hom"] . "</td>";
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
                    at top 10 and bottom 10 countries by proportion of total movies produced that are action movies. Just from the
                    eyeball test, it's hard to see any meaningful pattern, but the countries producing proportionately less action movies
                    do seem to have a lower rate of homicide, though you should take that with a grain of salt without rigorous statistical
                    analysis to back it up.<br/>

                </h3>
                <h3>Click above to get data and analysis on specific sections!</h3>

            </div>
        </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
