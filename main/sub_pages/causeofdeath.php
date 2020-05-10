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
    echo "<th> Total Movies</th>";
    echo "<th> Total Action Movies</th>";
    echo "<th> Rate of Action Movies</th>";
    echo "<th> Rate of Homicide as Cause of Death</th>";
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
        <div class="sub_page_title">CAUSE OF DEATH</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 class="tab_title" style="color: #87CEFA;">Crime Rate and Life Expectancy</h1>
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
                        outputResultsTableHeader();
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
                        outputResultsTableHeader();
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
