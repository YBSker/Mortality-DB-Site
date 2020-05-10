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
    echo "<th> Percent of Population Unaffiliated </th>";
    echo "<th> Life Expectancy </th>";
    echo "<th> Life Expectancy Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_b()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Percent of Population Affiliated </th>";
    echo "<th> Life Expectancy </th>";
    echo "<th> Life Expectancy Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">RELIGION</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 class="tab_title" style="color: #87CEFA;">Religions and Life Expectancy</h1>
            <div class="general tab_me">
                <h3>
                    In this section we attempt to explore correlations between religion and life expectancy. This wil be
                    accomplished by
                    comparing life expectancies of countries and the percents of the populations that are religious for
                    those who are not.
                </h3>
            </div>
            <button type="button" class="collapsible">Countries with Top 10 Average Life Expectancy</button>
            <div class="content general fade-in tab_me">
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, unaffiliated, lifeExpectancy, RANK() OVER (ORDER BY lifeExpectancy DESC) attain_rank FROM life_Religion ORDER BY unaffiliated DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["unaffiliated"] . "</td>";
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
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
                    $sql = "SELECT countryName, (100 -unaffiliated) AS affiliated, lifeExpectancy, RANK() OVER (ORDER BY lifeExpectancy DESC) attain_rank FROM life_Religion ORDER BY unaffiliated ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {

                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader_b();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["affiliated"] . "</td>";
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
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
            <h3 class="general tab_me"> The data seems to indicate that countries with a higher portion of the population being
            unaffiliated with any religion ranks higher on the list of life expectancies while those who have a higher percent of the population
            affiliated with a religion have a noticeably lower trend in lifespan. </h3>
            <h3 class="general tab_me">Click above to get data on specific sets!</h3>
        </div>
    </div>


</div>


<script src="sub_page_scripts.js"></script>

</body>
</html>
