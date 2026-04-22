<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program 3 - ATM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
    <a href="index.php">Lab 1</a> 
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