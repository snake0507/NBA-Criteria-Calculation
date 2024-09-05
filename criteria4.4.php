
<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {

    $year = $_POST['year'];
    $N123 = $_POST['N123'];
    $x = $_POST['x'];
    $y = $_POST['y'];
    $z = $_POST['z'];
    

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        

        $xyz = $x + $y + $z;
        $PI = ($x + $y + $z)/$N123;    
        
        $sql = "INSERT INTO `criteria4.4` (`Year`, `N123`, `x`,  `y`, `z`,`xyz`,`PI`) VALUES ('$year', '$N123', '$x', '$y' ,'$z','$xyz','$PI')";

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
<title>Criteria 4.4</title>


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
        <h1>Welcome to Criteria 4.4!</h1>

        <form id="accreditationForm" action="criteria4.4.php" method="post">
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

            <label for="N123">Total No. of Final Year Students (N)</label>
            <input type="decimal" class="inputFieldId" id="N123" name="N123" required><br><br>

            <label for="x">No. of students placed in companies or Government Sector (x)</label>
            <input type="number" class="inputFieldId" id="x" name="x" required><br><br>

            <label for="y">No. of students admitted to higher studies with valid qualifying scores(GATE or equivalent State or National Level Tests,GRE,GMAT etc.) (y)</label><br>
            <input type="number" class="inputFieldId" id="y" name="y" required><br><br>

            
            <label for="z">No. of students turned entrepreneur in engineering/technology (z)</label>
            <input type="number" class="inputFieldId" id="z" name="z" required><br><br>

            
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>
    <br><br>

    <table id="table4.4" border="2">
        <thead>
            <tr>
                <th><br>Year</th>

                <th>Total No. of Final Year Students (N)</th>

                <th>No. of students placed in companies or Government Sector (x)</th>

                <th>No. of students admitted to higher studies with valid qualifying scores
(GATE or equivalent State or National Level Tests, GRE, GMAT etc.) (y)</th>


                <th>No. of students turned entrepreneur in engineering/technology (z)</th>

                <th>x + y + z =</th>

                <th>Placement Index : (x + y + z )/N</th>

                <th>Average placement= (P1 + P2 + P3)/3</th>

                <th>Assessment Points = 30 × average placement</th>

            </tr>

            <h2>Tables</h2>
        <tbody id="tablebody1">
            <!-- Data rows will be added here using PHP -->
            <?php
            $getdata = "SELECT * FROM `criteria4.4`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                $arr2[] = $row["PI"];
                
                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["N123"] . '</td>
                <td>' . $row["x"] . '</td>
                <td>' . $row["y"] . '</td>
                <td>' . $row["z"] . '</td>
                <td>' . $row["x"] + $row["y"] + $row["z"] . '</td>
                <td>' . $row["PI"] . '</td>';

                if ($i == 0) {
                    $AVG_PLC = ($arr2[$i]) ;
              } elseif ($i == 1) {
                   $AVG_PLC = ($arr2[$i - 1] + $arr2[$i]) / 2 ;
              } else {
                  $AVG_PLC = ($arr2[$i - 2] + $arr2[$i - 1] + $arr2[$i]) / 3 ;
              }
              echo '<td>'.number_format((float)$AVG_PLC, 3, '.', '').'</td>
              <td>' . $AVG_PLC * 30 . '</td>
              </tr>';
              $i = $i + 1;

            //   echo $AVG_PLC;
            //   echo "<br>";
            }
          
            ?>
             </tbody>
            </table>

<br><br>
<div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
    <a href="criteria4.3.php" style="text-decoration: bold;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
    </a>
    <a href="newhomepage.html" style="text-decoration: none;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
    </a>
</div>
<br>
<br>
        </body>
</html>