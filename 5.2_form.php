<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {


    $year = $_POST['year'];
    $PRORF1 = $_POST['PRORF1'];
    $PROAF1 = $_POST['PROAF1'];

    $ACPRF1 = $_POST['ACPRF1'];
    $ACPAF1 = $_POST['ACPAF1'];
    
    $ASPRF1 = $_POST['ASPRF1'];
    $ASPAF1 = $_POST['ASPAF1'];


    

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        $sql = "INSERT INTO `criteria5.2` (`Year`, `PRORF1`, `PROAF1`,  `ACPRF1`, `ACPAF1`,`ASPRF1`,`ASPAF1`) VALUES ('$year', '$PRORF1', '$PROAF1', '$ACPRF1' ,'$ACPAF1','$ASPRF1','$ASPAF1')";

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
<title>5.2 form</title>


<head>
    <title>NBA Accreditation</title>
    <link rel="stylesheet" href="mainform.css">
    


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
        <form id="accreditationForm" action="5.2_form.php" method="post">
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
<label for="PRORF1">Required F1:</label>
<input type="number" class="inputFieldId" id="PRORF1" name="PRORF1" required><br><br>

<label for="PROAF1">Available:</label>
<input type="number" class="inputFieldId" id="PROAF1" name="PROAF1" required><br><br>

<!-- Associate Professors -->
<label style="font-size:20px;"><b>Associate Professors:</b></label><br><br>
<label for="ACPRF1">Required F2:</label>
<input type="number" class="inputFieldId" id="ACPRF1" name="ACPRF1" required><br><br>

<label for="ACPAF1">Available:</label>
<input type="number" class="inputFieldId" id="ACPAF1" name="ACPAF1" required><br><br>

<!-- Assistant Professors -->
<label style="font-size:20px;"><b>Assistant Professors:</b></label><br><br>

<label for="ASPRF1">Required F3:</label>
<input type="number" class="inputFieldId" id="ASPRF1" name="ASPRF1" required><br><br>

<label for="ASPAF1">Available:</label>
<input type="number" class="inputFieldId" id="ASPAF1" name="ASPAF1" required><br><br>


            <div class="button-container">
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
            </div>
        </form>

    </div>
    <h2>Data Table</h2>
    <table id="dataTable1" border="2" width="100%">
    <thead>
     <!-- <tr>
        <th>Year</th>
         <th colspan="2">Professors</th>
        <th colspan="2">Associate Professors</th>
        <th colspan="2">Assistant Professors</th> 
 </tr>   -->
    <tr>
        <th>Year</th>
        <th>Required F1</th>
        <th>Available</th>
        <th>Required F2</th>
        <th>Available</th>
        <th>Required F3</th>
        <th>Available</th>
    </tr>
</thead>

</table>


        <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
        </tbody>
        <?php
            
            $getdata = "SELECT * FROM `criteria5.2`";
            $data = mysqli_query($conn, $getdata);
            while ($row = $data->fetch_assoc()) 
            {
            echo '<tr>
            <td>' . $row["Year"] . '</td>
            <td>' . $row["PRORF1"] . '</td>
            <td>' . $row["PROAF1"] . '</td>
            <td>' . $row["ACPRF1"] . '</td>
            <td>' . $row["ACPAF1"] . '</td>
            <td>' . $row["ASPRF1"] . '</td>
            <td>' . $row["ASPAF1"]. '</td>';

            }
            
            //     if ($i == 0) {
            //       echo '<td>' . ($arr2[$i]) . '</td>' ;
            //   } elseif ($i == 1) {
            //       echo '<td>' . ($arr2[$i - 1] + $arr2[$i]) / 2 . '</td>';
            //   } else {
            //       echo '<td>' . ($arr2[$i - 2] + $arr2[$i - 1] + $arr2[$i]) / 3 . '</td>' ;
            //   }
            //   echo '</tr>';
            //   $i = $i + 1;



            
            
            
            ?>
             </tbody>
            </table>
<br><br>
<br><br>
<div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 10px; box-sizing: border-box;">
    <a href="5.1_form.php" style="text-decoration: none;">
        <button class="next">Go To Previous Criteria</button>
    </a>
    <a href="5.3_form.php" style="text-decoration: none;">
        <button class="next">Go To Next Criteria</button>
    </a>
</div> 
<br>
<br>
        
</body>

</html>