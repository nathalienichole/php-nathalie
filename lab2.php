<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program 2 - Temperature Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
    <a href="index.php">Lab 1</a> 
    <a href="lab2.php">Lab 2</a> 
    <a href="lab3.php">Lab 3</a>
</nav>
<h2>Temperature Converter</h2>

<form method="POST">
    <label for="cel-id">Enter Celcius: </label>
    <input type="number" name="celsius"required>
    <button type="submit">Convert</button>
</form>

<?php
function convertToFahrenheit($c) {
    return ($c * 9/5) + 32;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $celsius = $_POST['celsius'];
    $fahrenheit = convertToFahrenheit($celsius);

    echo "<h1>Result: </h1>";
    echo "<h3>$celsius °C = $fahrenheit °F</h3>";
}
?>

</body>
</html>