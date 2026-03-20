<?php
// If else ladder-grade marks
$marks=38;
if($marks>=80 && $marks<=100){
   echo "Grade A";
}else if($marks>=50 && $marks<80){
    echo "Grade B";

}else if($marks>=34 && $marks<50){
  echo "Grade C";
}else{
    echo "Fail";
}
?>