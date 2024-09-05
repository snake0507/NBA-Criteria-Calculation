<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {


    $year = $_POST['year'];
    $U1 = $_POST['U1'];
    $U2 = $_POST['U2'];
    $U3 = $_POST['U3'];
    $Facultymem = $_POST['Facultymem'];
    

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        
        $U123 = $U1 + $U2 + $U3;
        $SFR = $U123/$Facultymem;
        $sql = "INSERT INTO `criteria5.1` (`Year`, `U1`, `U2`,  `U3`, `Facultymem`,`U123`,`SFR`) VALUES ('$year', '$U1', '$U2', '$U3' ,'$Facultymem','$U123','$SFR')";

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
<title>5.1 form</title>


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
        <h1>Welcome to Criteria 5.1!</h1><br>
       <br>
        <form id="accreditationForm" action="5.1_form.php" method="post">
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

            <label for="year2nd">Number of students in UG 2nd year:</label>
            <input type="number" class="inputFieldId" id="U1" name="U1" required><br><br>

            <label for="year3rd">Number of students in UG 3rd year:</label>
            <input type="number" class="inputFieldId" id="U2" name="U2" required><br><br>

            <label for="year4th">Number of students in UG 4th year</label>
            <input type="number" class="inputFieldId" id="U3" name="U3" required><br><br>

            <label for="Facultymem">Total number of faculty members in the department (Excluding first
                year)</label>
            <input type="number" class="inputFieldId" id="Facultymem" name="Facultymem" required><br><br>

            <div class="button-container">
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>

    </div>
    <h2>Data Table</h2>
    <table id="dataTable1" border="2">
        <thead>
            <tr>
                <th>Year</th>
                <th>Number of students in UG 2nd year</th>
                <th>Number of students in UG 3rd year</th>
                <th>Number of students in UG 4th year</th>
                <th>Total number of faculty members in the department (Excluding first
                    year)</th>
                <th>U1 + U2 + U3</th>
                <th>SFR</th>
                <th>Average SFR</th>
</tr>




        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
        </tbody>
        <?php
            $getdata = "SELECT * FROM `criteria5.1`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["SFR"] ;
                
                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["U1"] . '</td>
                <td>' . $row["U2"] . '</td>
                <td>' . $row["U3"] . '</td>
                <td>' . $row["Facultymem"] . '</td>
                <td>' . $row["U123"] . '</td>
                <td>' . ($row["U1"] + $row["U2"] + $row["U3"])/$row["Facultymem"] . '</td>';

                if ($i == 0) {
                  echo '<td>' . ($arr2[$i]) . '</td>' ;
              } elseif ($i == 1) {
                  echo '<td>' . ($arr2[$i - 1] + $arr2[$i]) / 2 . '</td>';
              } else {
                  echo '<td>' . ($arr2[$i - 2] + $arr2[$i - 1] + $arr2[$i]) / 3 . '</td>' ;
              }
              echo '</tr>';
              $i = $i + 1;



            }
            
            
            ?>
             </tbody>
            </table>
            <br><br>
     <div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
        <a href="newhomepage.html" style="text-decoration: bold;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
        </a>
        <a href="criteria5.2.php" style="text-decoration: none;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
        </a>
</div>
</div> 
<br>
<br>
        
</body>

</html>