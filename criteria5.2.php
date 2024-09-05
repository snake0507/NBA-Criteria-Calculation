<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {


    $year = $_POST['year'];
    $ProfReq = $_POST['ProfReq'];
    $ProfAvi = $_POST['ProfAvi'];

    $AssProfReq = $_POST['AssProfReq'];
    $AssProfAvi = $_POST['AssProfAvi'];
    
    $AcoProfReq = $_POST['AcoProfReq'];
    $AcoProfAvi = $_POST['AcoProfAvi'];


    

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        $sql = "INSERT INTO `criteria5.2b` (`Year`, `ProfReq`, `ProfAvi`,  `AssProfReq`, `AssProfAvi`,`AcoProfReq`,`AcoProfAvi`) VALUES ('$year', '$ProfReq', '$ProfAvi', '$AssProfReq' ,'$AssProfAvi','$AcoProfReq','$AcoProfAvi')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            
            if (count($_POST) > 0) {
                foreach ($_POST as $k => $v) {
                }
            }
        } else {
            echo "error";

        }
    }
    unset($_POST[$k]);
}
?>

<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>5.2b form</title>


<head>
    <title>NBA Accreditation</title>
    <link rel="stylesheet" href="mainform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />


</head>

<body>
    <header>
    <a href="newhomepage.html">
        <img src="logo_new.png" alt="">
    </a>
    </header>
    <div class="form-box">
        <h1>Welcome to Criteria 5.2!</h1><br>
       <br>
        <form id="accreditationForm" action="criteria5.2.php" method="post">
            <label for="year">Select Year:</label>
            <select id="year" name="year" required>

                <option value="22-23">2022-2023</option>
                <option value="21-22">2021-2022</option>
                <option value="20-21">2020-2021</option>
                <option value="19-20">2019-2020</option>
                <option value="18-19">2018-2019</option>
                <option value="17-18">2017-2018</option>
                <option value="16-17">2016-2017</option>
                <option value="15-16">2015-2016</option>
                <option value="14-15">2014-2015</option>
                <option value="13-14">2013-2014</option>

            </select><br><br>
<!-- Professors -->
<label style="font-size:20px;"><b>Professors:</b></label><br><br>
<label for="ProfReq">Required F1:</label>
<input type="number" class="inputFieldId" id="ProfReq" name="ProfReq" required><br><br>

<label for="ProfAvi">Available:</label>
<input type="number" class="inputFieldId" id="ProfAvi" name="ProfAvi" required><br><br>

<!-- Associate Professors -->
<label style="font-size:20px;"><b>Assistant Professors:</b></label><br><br>
<label for="AssProfReq">Required F2:</label>
<input type="number" class="inputFieldId" id="AssProfReq" name="AssProfReq" required><br><br>

<label for="AssProfAvi">Available:</label>
<input type="number" class="inputFieldId" id="AssProfAvi" name="AssProfAvi" required><br><br>

<!-- Assistant Professors -->
<label style="font-size:20px;"><b>Associate Professors:</b></label><br><br>

<label for="AcoProfReq">Required F3:</label>
<input type="number" class="inputFieldId" id="AcoProfReq" name="AcoProfReq" required><br><br>

<label for="AcoProfAvi">Available:</label>
<input type="number" class="inputFieldId" id="AcoProfAvi" name="AcoProfAvi" required><br><br>


            <div class="button-container">
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>
        </div>
        <br><br>

    <h2>Data Table</h2>
    <table id="dataTable1" border="2" width="100%">
    <br><br>

        <thead>
        <tr>  
            <th>Year</th>
            <th colspan="2">Professors</th>
            <th colspan="2">Assistant Professors</th>
            <th colspan="2">Associate Professors</th> 
        </tr> 
            <tr>
                <th></th>
                <th> Required</th>
                <th> Available</th>
                <th>Required</th>
                <th> Available</th>
                <th>Required</th>
                <th>Available</th>
            </tr>

            <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>

            <?php
                $getdata = "SELECT * FROM `criteria5.2b`";
                $data = mysqli_query($conn, $getdata);
                $arr2 = array();
                $i = 0;
                while ($row = $data->fetch_assoc()) {
                    $arr2[] = $row["ProfReq"] ;
                    echo '<tr>
                    <td>' . $row["Year"] . '</td>
                    <td>' . $row["ProfReq"] . '</td>
                    <td>' . $row["ProfAvi"] . '</td>
                    <td>' . $row["AssProfReq"] . '</td>
                    <td>' . $row["AssProfAvi"] . '</td>
                    <td>' . $row["AcoProfReq"] . '</td>
                    <td>' . $row["AcoProfAvi"] . '</td>';

                 
                    
                    echo '</tr>';
                    $i = $i + 1;
                }
?>

<table id="dataTable1" border="2">
    <br>
        <thead>
        <tr>   
            <th >RF1</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr1 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr1[] = $row["ProfReq"];
            }
                    $sum1 = array_sum($arr1);
                    $count1 = count($arr1);
                  
                    if ($count1 > 0) {
                        $RF1 = $sum1 / $count1;
                        echo '<td>' . $RF1 . '</td>';

                    }         
            ?>
                 </tbody>
            </table>

            <table id="dataTable1" border="2" >
                <br>
        <thead>
        <tr>   
            <th >AF1</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["ProfAvi"];
            }
                    $sum2 = array_sum($arr2);
                    $count2 = count($arr2);
                  
                    if ($count1 > 0) {
                        $AF1 = $sum2 / $count2;
                        echo '<td>' . $AF1 . '</td>';

                    }         
            ?>

                 </tbody>
            </table>

            <table id="dataTable1" border="2" >
                <br>
        <thead>
        <tr>   
            <th >RF2</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["AssProfReq"];
            }
                    $sum2 = array_sum($arr2);
                    $count2 = count($arr2);
                  
                    if ($count1 > 0) {
                        $RF2 = $sum2 / $count2;
                        echo '<td>' . $RF2 . '</td>';

                    }         
            ?>

                 </tbody>
            </table>

            <table id="dataTable1" border="2" >
                <br>
        <thead>
        <tr>   
            <th >AF2</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["AssProfAvi"];
            }
                    $sum2 = array_sum($arr2);
                    $count2 = count($arr2);
                  
                    if ($count1 > 0) {
                        $AF2 = $sum2 / $count2;
                        echo '<td>' . $AF2 . '</td>';

                    }         
            ?>

                 </tbody>
            </table>
            <table id="dataTable1" border="2" >
                <br>
        <thead>
        <tr>   
            <th >RF3</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["AcoProfReq"];
            }
                    $sum2 = array_sum($arr2);
                    $count2 = count($arr2);
                  
                    if ($count1 > 0) {
                        $RF3 = $sum2 / $count2;
                        echo '<td>' . $RF3 . '</td>';

                    }         
            ?>

                 </tbody>
            </table>

            <table id="dataTable1" border="2" >
                <br>
        <thead>
        <tr>   
            <th >AF3</th>
            <!-- <th >AF1</th>
            <th >Assistant Professors</th>  -->
        </tr> 
        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
            </tbody>
            <?php
            $getdata = "SELECT * FROM `criteria5.2b`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["AcoProfAvi"];
            }
                    $sum2 = array_sum($arr2);
                    $count2 = count($arr2);
                  
                    if ($count1 > 0) {
                        $AF3 = $sum2 / $count2;
                        echo '<td>' . $AF3 . '</td>';

                    }         
            ?>

                 </tbody>
            </table>
<BR><BR>
            <?php
                // echo ((($AF1/$RF1)+(($AF2/$RF2)*0.6)+(($AF3/$RF3)*0.4))*10);
                echo  '<span style="font-family: Arial, sans-serif;  font-size:20px; font-weight: bold;">Cadre Ratio Marks = ' . ((($AF1/$RF1)+(($AF2/$RF2)*0.6)+(($AF3/$RF3)*0.4))*10) . '</span>';

            ?>

<div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
        <a href="5.1_from.php" style="text-decoration: bold;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
        </a>
        <a href="5.3_form.php" style="text-decoration: none;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
        </a>