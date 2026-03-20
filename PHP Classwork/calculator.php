<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body>

<h2>Simple PHP Calculator</h2>

<form method="post">
    Number 1:
    <input type="number" name="num1" required>
    <br><br>

    Number 2:
    <input type="number" name="num2" required>
    <br><br>

    Operation:
    <select name="operation">
        <option value="add">Addition</option>
        <option value="sub">Subtraction</option>
        <option value="mul">Multiplication</option>
        <option value="div">Division</option>
    </select>

    <br><br>
    <input type="submit" name="submit" value="Calculate">
</form>

<?php

if(isset($_POST['submit'])){

    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    $result = 0;

    if($operation == "add"){
        $result = $num1 + $num2;
    }
    elseif($operation == "sub"){
        $result = $num1 - $num2;
    }
    elseif($operation == "mul"){
        $result = $num1 * $num2;
    }
    elseif($operation == "div"){
        if($num2 == 0){
            echo "<h3>Cannot divide by zero</h3>";
            exit();
        }
        $result = $num1 / $num2;
    }

    echo "<h3>Result: ".$result."</h3>";
}

?>

</body>
</html>