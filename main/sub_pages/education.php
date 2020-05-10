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
    echo "<th> Educational Attainment (%pop)</th>";
    echo "<th> Educational Attainment Ranking <br>(1 is highest)</th>";
    echo "</tr>";
}

function outputResultsTableHeader_b()
{
    echo "<tr>";
    echo "<th>  </th>";
    echo "<th> Country </th>";
    echo "<th> Average Life Expectancy </th>";
    echo "<th> Tertiary School Enrollment (%pop)</th>";
    echo "<th> Tertiary School Enrollment <br>(1 is highest)</th>";
    echo "</tr>";
}

include "../open.php";

include 'sub_page_sidebar.html';

?>

<div class="wrapper">
    <div class="image-container">
        <div class="sub_page_title">EDUCATION</div>
    </div>

    <div class="image-container2">
        <div class="sub_page_spacing">
            <h1 class="tab_title" style="color: #87CEFA;">Level of Education and Life Expectancy</h1>
            <div class="general fade-in tab_me">
                <h3>In this section, we attempt to see if the level of education of a country is indicative of life
                    expectancy of said country.
                    In order to do so, we explore the primary school education attainment of a country and the tertiary
                    school enrollment of a country.</h3>
            </div>

            <button type="button" class="collapsible">2010
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2010 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2010 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2010 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2010 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2010 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2010 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2010 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2010 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>

                </div>
                <h3></h3>
            </div>
            <button type="button" class="collapsible">2011
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2011 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2011 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2011 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2011 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2011 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2011 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2011 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2011 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>

                </div>
                <h3></h3>
            </div>
            <button type="button" class="collapsible">2012
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2012 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2012 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2012 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2012 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2012 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2012 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2012 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2012 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>

                </div>
                <h3></h3>
            </div>
            <button type="button" class="collapsible">2013
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2013 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2013 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2013 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2013 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2013 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2013 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2013 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2013 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>

                </div>
                <h3></h3>
            </div>
            <button type="button" class="collapsible">2014
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2014 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2014 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2014 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2014 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2014 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2014 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2014 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2014 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>

                </div>
                <h3></h3>
            </div>
            <button type="button" class="collapsible">2015
            </button>
            <div class="content general fade-in tab_me">
                <h2>Countries with the Top 10 Longest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2015 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2015 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2015 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2015 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    ?>
                </div>
                <h2>Countries with the Top 10 Shortest Life Expectancies</h2>
                <div class="general fade-in">
                    <?php
                    $sql = "SELECT countryName, lifeExpectancy, educationalAttainment, RANK() OVER (ORDER BY educationalAttainment DESC) attain_rank FROM life_Education WHERE year = 2015 AND educationalAttainment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2015 AND educationalAttainment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["educationalAttainment"] . "</td>";
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
                    $sql = "SELECT countryName, lifeExpectancy, Education_Tertiary_School_Enrollment, RANK() OVER (ORDER BY Education_Tertiary_School_Enrollment DESC) tertiary_rank FROM life_Education WHERE year = 2015 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy ASC";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        $sql_count = "SELECT COUNT(*) AS count FROM life_Education WHERE year = 2015 AND Education_Tertiary_School_Enrollment <> 0 ORDER BY lifeExpectancy DESC";
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
                            echo "<td>" . $row["lifeExpectancy"] . "</td>";
                            echo "<td>" . $row["Education_Tertiary_School_Enrollment"] . "</td>";
                            echo "<td>" . $row["tertiary_rank"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }
                    echo "</table>";
                    mysqli_close($mysqli);
                    ?>

                </div>
                <h3></h3>
            </div>
            <div class="general fade-in tab_me">
                <h3>Overall, all years tended to trend such that the countries that had higher life expectancies could
                    also expect to be in the upper half to a third in the list of countries ranked by educational
                    attainment and tertiary school enrollment.
                    This trend was a little more spread in 2010, but became noticeably tighter in the years to 2015,
                    especially with tertiary school enrollment. The correlation between lifespan and education was
                    significantly more noticeable in the countries with the lowest expected lifespans. Other than one or
                    two outliers, in all years, the countries with the shortest life expectancies tended to be near the
                    very bottom in primary school educational attainment as well as tertiary school enrollment. Overall,
                    it seemed as though
                    a higher tertiary school enrollment rate was more closely tied with a higher average life expectancy
                    and a lower enrollment rate was closely tied with lower life expectancies. Primary school
                    educational attainment was more spread out but in general tended towards higher with higher life
                    expectancy countries and lower in lower life expectancy countries. This was, however, not consistent
                    at all, and perhaps primary school educational attainment is not very indicative of a great life
                    expectancy.</h3>
                <h3>Click above to get data on specific years!</h3>
            </div>

        </div>
    </div>


    <script src="sub_page_scripts.js"></script>

</body>
</html>
