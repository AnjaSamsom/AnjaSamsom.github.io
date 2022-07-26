<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UVM TV</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="author" content="Anja Samsom">
    <meta name="description" content="UVM TV">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/custom.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" media="(max-width: 800px)" href="css/custom-tablet.css?version=<?php print time(); ?>" type="text/css">
    <link rel="stylesheet" media="(max-width: 600px)" href="css/custom-phone.css?version=<?php print time(); ?>" type="text/css">
</head>

<?php
print '<body id="' . $pathParts['filename'] . '">';
print '<!-- start of body -->';
include 'connect-DB.php';
print PHP_EOL;
include "header.php";?>