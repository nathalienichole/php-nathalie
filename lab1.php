<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Program 1 - fruits</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    font-family: "Poppins", sans-serif;
    background: #0f172a;
    color: #f5f7fa;
    margin: 0;
    padding: 0;
    text-align: center;
}

nav {
    width: fit-content;
    margin: 15px auto 30px auto;
    padding: 10px 25px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50px;
    backdrop-filter: blur(15px);
    display: flex;
    gap: 20px;
}

nav a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 20px;
}

nav a:hover {
    background-color: #f1a0af;
}

h2 {
    color: #a59bca;
}

form {
    background-color: rgb(102, 110, 106);
    display: inline-block;
    padding: 20px;
    border-radius: 8px;
}

input {
    padding: 8px;
    margin: 5px;
    width: 200px;
}

button {
    background-color: #201c24;
    color: white;
    padding: 10px;
    border: none;
}

button:hover {
    background-color: #061016;
}
</style>
</head>
<body>
    <nav>
    <a href="lab1.php">Lab 1</a> 
    <a href="lab2.php">Lab 2</a> 
    <a href="lab3.php">Lab 3</a>
</nav>

<h2>My Favorite Fruits</h2>

<form method="POST">
    <label for="fruit-id1">Fruit 1: </label>
    <input type="text" name="fruit1" required><br>

    <label for="fruit-id2">Fruit 2: </label>
    <input type="text" name="fruit2" required><br>

    <label for="fruit-id3">Fruit 3: </label>
    <input type="text" name="fruit3" required><br>

    <label for="fruit-id4">Fruit 4: </label>
    <input type="text" name="fruit4" required><br>

    <label for="fruit-id5">Fruit 5: </label>
    <input type="text" name="fruit5" required><br><br>
    <button type="submit">Save My Fruits</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fruits = [
        $_POST['fruit1'],
        $_POST['fruit2'],
        $_POST['fruit3'],
        $_POST['fruit4'],
        $_POST['fruit5']
    ];

    echo "<h3>Your Favorite Fruits:</h3><ul>";
    foreach ($fruits as $fruit) {
        echo "<li>$fruit</li>";
    }
    echo "</ul>";

   
    echo "My Favorite Fruit is: " . $fruits[0];
}
?>



</body>
</html>