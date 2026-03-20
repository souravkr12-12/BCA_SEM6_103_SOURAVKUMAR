<?php

// Total students in class
$total_students = 60;

// Total working days in week
$total_days = 5;

// Example: attendance of one student in a subject during week
$student_present_days = 4;

// Calculate student attendance percentage
$student_percentage = ($student_present_days / $total_days) * 100;

echo "<h3>Student-wise Attendance</h3>";
echo "Student attended: " . $student_present_days . " days<br>";
echo "Attendance Percentage: " . $student_percentage . "%<br><br>";


// -----------------------------
// Day-wise attendance example
// -----------------------------

// Assume number of students present each day
$day_attendance = array(55, 52, 58, 50, 54);

echo "<h3>Day-wise Attendance Percentage</h3>";

foreach($day_attendance as $day => $present_students)
{
    // Calculate percentage for that day
    $percentage = ($present_students / $total_students) * 100;

    echo "Day " . ($day+1) . " Present Students: " . $present_students . "<br>";
    echo "Attendance Percentage: " . $percentage . "%<br><br>";
}


// -----------------------------
// Weekly attendance calculation
// -----------------------------

// Total students present in whole week
$total_present_week = array_sum($day_attendance);

// Total possible attendance
$total_possible = $total_students * $total_days;

// Weekly percentage
$weekly_percentage = ($total_present_week / $total_possible) * 100;

echo "<h3>Weekly Attendance Percentage</h3>";
echo "Weekly Attendance Percentage: " . $weekly_percentage . "%";

?>