<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {


    $year = $_POST['year'];
    $PHD = $_POST['PHD'];
    $MTECH = $_POST['MTECH'];
    $F = $_POST['F'];

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {

        $FQ = 2*((10*$PHD) + (4*$MTECH))/$F;


        echo "data submitted";
        $sql = "INSERT INTO `criteria5.3` (`Year`, `PHD`, `MTECH`, `Z`,`F`,`FQ`) VALUES ('$year', '$PHD', '$MTECH', '$Z','$F','$FQ')";

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
<title>5.3 form</title>
<head>
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
        <h1>Welcome to Criteria 5.3!</h1><br>
        

        <form id="accreditationForm" action="5.3_form.php" method="post">
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

            <label for="PHD">No of faculty with a Ph.D degree:</label>
            <input type="number" class="inputFieldId" id="PHD" name="PHD" required><br><br>

            <label for="MTECH">Number of faculty with M.Tech:</label>
            <input type="number" class="inputFieldId" id="MTECH" name="MTECH" required><br><br>

            <label for="F">No. of faculty required to comply 20:1 Faculty Student ratio (no. of faculty and no. of students required
are to be calculated as per 5.1):</label>
            <input type="number" class="inputFieldId" id="F" name="F" required><br><br>

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
                <th>No of faculty with a Ph.D degree [X]</th>
                <th>Number of faculty with M.Tech [Y]</th>
                <th>No. of faculty required to comply 20:1 Faculty Student ratio (no. of faculty and no. of students required
are to be calculated as per 5.1):</th>
                <th>FQ = 2.0 x [(10X +4Y)/F]</th>
                </tr>

        <tbody id="tablebody1">
            
        </tbody>
        <?php
            $getdata = "SELECT * FROM `criteria5.3`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                
                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["PHD"] . '</td>
                <td>' . $row["MTECH"] . '</td>
                <td>' . $row["F"] . '</td>
                <td>' . $row["FQ"]. '</td>';


            }
                ?>
                 </tbody>
            </table>
            <br><br>
            <div style="position: fixed; bottom: 0; width: 180%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
        <a href="criteria5.2.php" style="text-decoration: bold;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
        </a>
        <a href="5.4_form.php" style="text-decoration: none;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
        </a> 
<br>
<br>
    

</body>

</html>