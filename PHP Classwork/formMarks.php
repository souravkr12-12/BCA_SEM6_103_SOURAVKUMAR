<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculate</title>
</head>
<body>
    <form method="post">
    <?php
         if(isset($_POST['submit'])){
            $marks=$_POST['num'];
            if($marks>=80 && $marks<=100){
            echo "Grade A";
         }else if($marks>=50 && $marks<80){
         echo "Grade B";

          }else if($marks>=34 && $marks<50){
          echo "Grade C";
               }else{
             echo "Fail";
             }
         }
        ?>    
    
    <h1>Grade</h1>
        <label for="marks">Enter Marks</label>
        <input type="number" name=num>
        <input type="submit" name="submit" value="Show Grade">
    </form>
</body>
</html>