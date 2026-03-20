<?php
// Create pages for fruits and vegetables with rates and quantity and calculate subtotal and total using cookies.

if(isset($_POST['item'])){
    $rate = $_POST['rate'];
    $qty = $_POST['qty'];
    $subtotal = $rate * $qty;

    setcookie("item", $_POST['item'], time()+3600);
    setcookie("subtotal", $subtotal, time()+3600);

    header("Location: bill.php");
}
?>

<form method="post">
    Item: <input type="text" name="item"><br>
    Rate: <input type="number" name="rate"><br>
    Qty: <input type="number" name="qty"><br>
    <input type="submit">
</form>