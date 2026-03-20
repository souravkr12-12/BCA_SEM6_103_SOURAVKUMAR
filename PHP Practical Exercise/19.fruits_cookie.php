<?php
// Create the pages for fruits and vegetables and display the selected item in a separate page using cookies.

if(isset($_POST['item'])){
    setcookie("item", $_POST['item'], time()+3600);
    header("Location: show_item.php");
}
?>

<form method="post">
    <select name="item">
        <option>Apple</option>
        <option>Banana</option>
        <option>Carrot</option>
    </select>
    <input type="submit">
</form>

