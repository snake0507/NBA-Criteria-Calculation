
<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {

    $year = $_POST['year'];
    $Mean = $_POST['Mean'];
    $Y = $_POST['Y'];
    $Z = $_POST['Z'];
    
    

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        

        $API = $Mean * ($Y/$Z);
        echo $API;
        $sql = "INSERT INTO `criteria4.3` (`Year`, `Mean`, `Y`,  `Z`, `API`) VALUES ('$year', '$Mean', '$Y', $Z ,'$API')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "data submittedddd";
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
<title>Criteria 4.3</title>


<head>
    <title>NBA Accreditation</title>
    <link rel="stylesheet" href="mainform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
<header>
<a href="newhomepage.html">
        <img src="logo_new.png" alt="">
    </a></header>
    <div class="form-box">
        <h1>Welcome to Criteria 4.3!</h1>

        <form id="accreditationForm" action="criteria4.3.php" method="post">
            <label for="year">Select Year:</label><br>
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

            <label for="Mean">(Mean of 2nd Year Grade Point Average of all successful Students
            on a 10-point scale) or (Mean of the percentage of marks of all successful students in Second Year/10)</label>
            <input type="decimal" class="inputFieldId" id="Mean" name="Mean" required><br><br>

            <label for="Y">Total no. of successful students (Y)</label>
            <input type="number" class="inputFieldId" id="Y" name="Y" required><br><br>

            <label for="Z">Total no. of students appeared in the examination (Z)</label>
            <input type="number" class="inputFieldId" id="Z" name="Z" required><br><br>

            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>


    <table id="table4.3" border="2">
        <thead>
            <tr>
                <th><br>Year</th>

                <th>Mean of 2nd Year Grade Point Average of all successful Students
                on a 10-point scale (X)</th>

                <th>Total no. of successful students (Y)</th>

                <th>Total no. of students appeared in the examination (Z)</th>


                <th>API = X* (Y/Z)</th>
                <th>Average API = (AP1 + AP2 + AP3)/3</th>

            </tr>
            <h2>Tables</h2>
        <tbody id="tablebody1">
            <!-- Data rows will be added here using PHP -->
            <?php
            $getdata = "SELECT * FROM `criteria4.3`";
            $data = mysqli_query($conn, $getdata);
            $arr1 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                
                $arr1[] = $row["API"];
                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["Mean"] . '</td>
                <td>' . $row["Y"] . '</td>
                <td>' . $row["Z"] . '</td>
                <td>' . number_format((float)$row["API"], 2, '.', '') . '</td>';
                if ($i == 0) {
                      $avgAPI = ($arr1[$i]) ;
                } elseif ($i == 1) {
                     $avgAPI = ($arr1[$i - 1] + $arr1[$i]) / 2 ;
                } else {
                    $avgAPI = ($arr1[$i - 2] + $arr1[$i - 1] + $arr1[$i]) / 3 ;
                }
                echo '<td>'.number_format((float)$avgAPI, 2, '.', '').'</td></tr>';
                $i = $i + 1;
                
            }
          
            ?>
             </tbody>
            </table>
            <br><br>
    <div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
    <a href="criteria4.2.php" style="text-decoration: bold;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
    </a>
    <a href="criteria4.4.php" style="text-decoration: none;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
    </a>
</div>
<br>
<br>
        </tbody>
    </table>