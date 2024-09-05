<?php

print_r($_POST);
$year = $_POST['year'];
$intake = $_POST['intake'];
$StudentsAdmitted = $_POST['StudentsAdmitted'];
$LateralEntry = $_POST['LateralEntry'];
$SeparateDivision = $_POST['SeparateDivision'];

$conn = new mysqli('localhost' , 'root' , '' , 'nba_calculator_real');

if($conn -> connect_error){
    die('Connection Failed  :  '.$conn->connect_error);
}else{

    $sql = "INSERT INTO `criteria4.1` (`Year`, `Intake`, `Student_Admitted`, `Lateral_Entry`, `Seperate_Division`) VALUES ('$year', '$intake', '$StudentsAdmitted', '$LateralEntry', '$SeparateDivision')";

    $result = mysqli_query($conn,$sql);

    if($result){
        echo "data submitted";
    }else{
        echo "error";
    }
}

?>