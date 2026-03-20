<?php
// Store al subject learning bca sem vi
$subjects = array(
"Web Programming",
"Indian Culture",
"Digital Marketing",
"Software Project Management",
"Data Warehousing and Data Mining",
"Introduction to Data Science",
"Lab on Data Visualization",
"Lab on Web Programming"
);

echo "Subjects in BCA Sem VI:<br><br>";

for($i = 0; $i < count($subjects); $i++)
{
    echo $subjects[$i] . "<br>";
}

?>