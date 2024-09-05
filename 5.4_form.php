<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {


    $year = $_POST['year'];
    $Facutlyretained = $_POST['Facutlyretained'];
    $Facultyrequired = $_POST['Facultyrequired'];

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {

        $PERCENT = 100*($Facutlyretained/$Facultyrequired);

        $sql = "INSERT INTO `criteria5.4` (`Year`, `Facutlyretained`, `Facultyrequired`,`PERCENT`) VALUES ('$year', '$Facutlyretained', '$Facultyrequired', '$PERCENT')";

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
<title>5.4 form</title>


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
        <h1>Welcome to Criteria 5.4!</h1><br>
        

        <form id="accreditationForm" action="5.4_form.php" method="post">
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

            <label for="Facutlyretained">No of faculty retained:</label>
            <input type="number" class="inputFieldId" id="Facutlyretained" name="Facutlyretained" required><br><br>

            <label for="Facultyrequired">Total number of required faculty:</label>
            <input type="number" class="inputFieldId" id="Facultyrequired" name="Facultyrequired" required><br><br>

            <div class="button-container">
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>

    </div>
    <br>
    <br>
    <table style="width:100%;" id="dataTable1" border="2">
        <thead>
            <tr>
                <th>Year</th>
                <th>No of faculty retained</th>
                <th>Total number of required faculty</th>
                <th>% of faculty reatained</th>
                <th>Delete</th>


        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
        </tbody>

        <?php
            $getdata = "SELECT * FROM `criteria5.4`";
            $data = mysqli_query($conn, $getdata);
            $arr2 = array();
            $i = 0;
            while ($row = $data->fetch_assoc()) {
                
                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["Facutlyretained"] . '</td>
                <td>' . $row["Facultyrequired"] . '</td>
                <td>' . $row["PERCENT"] . '</td>';

                echo '<td><button class="delete-btn" data-row-id="' .   '">Delete</button></td>'; 

            }
                ?>
                 </tbody>
            </table>
            <br><br>
            <div style="position: fixed; bottom: 0; width: 180%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
        <a href="5.3_form.php" style="text-decoration: bold;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
        </a>
        <a href="newhomepage.html" style="text-decoration: none;">
            <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
        </a>
<br>
<br>

        


</body>

</html>