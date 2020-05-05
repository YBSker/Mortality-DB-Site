<html>
<head>
    <link rel="stylesheet" type="text/css" href="../mainStyle.css">
</head>

<body class="background">
<?php
include 'sub_page_sidebar.html';
include "../open.php";

$sql = "SELECT countryName FROM HappinessSnapshot";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$mysqli->close();
?>
<!--Div for Home filler text-->
<div class="general fade-in">
    <h2>Mortality or smth</h2>
    </p>
</div>

</body>
</html>
