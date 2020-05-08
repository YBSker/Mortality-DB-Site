<html>
<head>
    <link rel="stylesheet" type="text/css" href="../mainStyle.css">
    <link rel="stylesheet" type="text/css" href="subPageStyle.css">
</head>

<body class="general background">
<?php
include 'sub_page_sidebar.html';
?>

<div>
    <div class="image-container">
        <div class="sub_page_title">HEALTHCARE</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1>Expenditures and Likelihood of Various Forms of Death</h1>

            <button type="button" class="collapsible">Click for Commentary</button>
            <div class="content general fade-in tab_me">
                <h3>In this section, we attempt to look at three possible causes of death:
                    deaths related to cardiovascular disease, vehicular accidents, and homicide. Cardiovascular
                    disease was chosen as it is both the number one cause of death and the number one cause of natural deaths.
                    Homicide and vehicular accidents were chosen as we wished to explore any kind of correspondence
                    between various forms of healthcare expenditures and violent deaths.</h3>
            </div>
<?php
include "../open.php";

//$sql = "SELECT c.countryName, c.theYear, c.cardiovascular FROM CausesOfDeathPercent c INNER JOIN HealthCareExpenditureSnapshotTotals hc ON hc.countryName = c.countryName AND hc.year = c.theYear";
//$sql = "SELECT CausesOfDeath.countryName, theYear, cardiovascular FROM CausesOfDeath INNER JOIN HealthCareExpenditureSnapshotTotals ON CausesOfDeath.theYear = HealthCareExpenditureSnapshotTotals.year";
$sql = "SELECT countryName, theYear, cardiovascular FROM healthCare_CoD_perCapita";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    echo "Top 10 Countries";


    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "Country: " . $row["countryName"]. " - Year: " . $row["theYear"]. "Amount of Deaths as a Percent of Population: " . $row["cardiovascular"]. "<br>";
//    }
} else {
    echo "0 results";
}
$mysqli->close();
?>

        </div>
    </div>
</div>
<script src="sub_page_scripts.js"></script>

</body>
</html>
