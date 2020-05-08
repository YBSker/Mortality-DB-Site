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
    echo "<th> Expenditures in Millions </th>";
    echo "<th> Deaths in Percent of <br>Total Population </th>";
    echo "<th> Rank of Deaths/195 <br>(1 is Least)</th>";
    echo "</tr>";
}

include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">HEALTHCARE</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 style="color: #87CEFA;">Expenditures and Likelihood of Various Forms of Death</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we attempt to look at three possible causes of death:
                    deaths related to cardiovascular disease, vehicular accidents, and homicide. Cardiovascular
                    disease was chosen as it is both the number one cause of death and the number one cause of natural
                    deaths.
                    Homicide and vehicular accidents were chosen as we wished to explore any kind of correspondence
                    between various forms of healthcare expenditures and violent deaths.</h3>
            </div>

            <button type="button" class="collapsible">Top 10 Countries in Average Household Out of Pocket Expenses Per Capita
            </button>
            <div class="content general fade-in tab_me">
                <h2>Cardiovascular Disease Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHouseholdOutOfPocket, average_cardiovascular, RANK() OVER (ORDER BY average_cardiovascular) cardio_rank FROM perCountryDataCoDHealth ORDER BY averageHouseholdOutOfPocket DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHouseholdOutOfPocket"] . "</td>";
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
                <h3>In this section, we attempt to look at three possible causes of death:
                    deaths related to cardiovascular disease, vehicular accidents, and homicide. Cardiovascular
                    disease was chosen as it is both the number one cause of death and the number one cause of natural
                    deaths.
                    Homicide and vehicular accidents were chosen as we wished to explore any kind of correspondence
                    between various forms of healthcare expenditures and violent deaths.</h3>

                <h2>Homicide Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHouseholdOutOfPocket, average_homicide, RANK() OVER (ORDER BY average_homicide) homicide_rank FROM perCountryDataCoDHealth ORDER BY averageHouseholdOutOfPocket DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHouseholdOutOfPocket"] . "</td>";
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
                <h3>In this section, we attempt to look at three possible causes of death:
                    deaths related to cardiovascular disease, vehicular accidents, and homicide. Cardiovascular
                    disease was chosen as it is both the number one cause of death and the number one cause of natural
                    deaths.
                    Homicide and vehicular accidents were chosen as we wished to explore any kind of correspondence
                    between various forms of healthcare expenditures and violent deaths.</h3>

                <h2>Vehicular Accident Death Rates</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, averageHouseholdOutOfPocket, average_roadInjury, RANK() OVER (ORDER BY average_roadInjury) roadInjury_rank FROM perCountryDataCoDHealth ORDER BY averageHouseholdOutOfPocket DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table border=\"1px solid black\">";
                        outputResultsTableHeader();
                        for ($i = 1; $i < 11; $i++) {
                            $row = $result->fetch_assoc();
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row["countryName"] . "</td>";
                            echo "<td>" . $row["averageHouseholdOutOfPocket"] . "</td>";
                            echo "<td>" . $row["average_roadInjury"] . "</td>";
                            echo "<td>" . $row["roadInjury_rank"] . "</td>";
                            echo "</tr>";

                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    $mysqli->close();
                    ?>
                </div>
                <h3>In this section, we attempt to look at three possible causes of death:
                    deaths related to cardiovascular disease, vehicular accidents, and homicide. Cardiovascular
                    disease was chosen as it is both the number one cause of death and the number one cause of natural
                    deaths.
                    Homicide and vehicular accidents were chosen as we wished to explore any kind of correspondence
                    between various forms of healthcare expenditures and violent deaths.</h3>
            </div>
        </div>
    </div>
</div>
<script src="sub_page_scripts.js"></script>

</body>
</html>
