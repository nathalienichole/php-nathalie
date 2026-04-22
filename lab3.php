<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program 3 - ATM</title>
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

<h2>ATM Machine Simulation</h2>

<form method="POST">
    Account Name: <input type="text" name="name" required><br><br>

    Initial Balance: <input type="number" name="balance" required><br><br>

    Action:
    <select name="action">
        <option value="check">Check Balance</option>
        <option value="deposit">Deposit</option>
        <option value="withdraw">Withdraw</option>
    </select><br><br>

    Amount (for Deposit/Withdraw):
    <input type="number" name="amount" value="0"><br><br>

    <button type="submit">Submit Transaction</button>
</form>

<hr>

<h3>Transaction Result</h3>

<?php
class ATM {
    public $name;
    public $balance;

    function __construct($name, $balance) {
        $this->name = $name;
        $this->balance = $balance;
    }

    function checkBalance() {
        return $this->balance;
    }

    function deposit($amount) {
        $this->balance += $amount;
        return "Deposit of $$amount";
    }

    function withdraw($amount) {
        if ($amount > $this->balance) {
            return "Withdraw failed (Insufficient Balance)";
        } else {
            $this->balance -= $amount;
            return "Withdraw of $$amount";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $balance = $_POST['balance'];
    $action = $_POST['action'];
    $amount = $_POST['amount'];

    $atm = new ATM($name, $balance);

    if ($action == "deposit") {
        $actionResult = $atm->deposit($amount);
    } elseif ($action == "withdraw") {
        $actionResult = $atm->withdraw($amount);
    } else {
        $actionResult = "Check Balance";
    }

    echo "<p><b>Account:</b> $name</p>";
    echo "<p><b>Action:</b> $actionResult</p>";
    echo "<p><b>New Balance:</b> $" . $atm->balance . "</p>";
}
?>
</body>
</html>