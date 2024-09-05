


<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {
    // if (isset($_POST['submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")) {


    $year = $_POST['year'];
    $intake = $_POST['intake'];
    $StudentsAdmitted = $_POST['StudentsAdmitted'];
    $LateralEntry = $_POST['LateralEntry'];
    $SeparateDivision = $_POST['SeparateDivision'];
    $year2 = $_POST['year2'];
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];
    $n4 = $_POST['n4'];
    $tn1 = $_POST['tn1'];
    $tn2 = $_POST['tn2'];
    $tn3 = $_POST['tn3'];
    $tn4 = $_POST['tn4'];

    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        $Enrollment_Ratio = $StudentsAdmitted / $intake;
        echo $Enrollment_Ratio;
        $sql = "INSERT INTO `criteria4.1` (`Year`, `Intake`, `Student_Admitted`,  `Enrollment_Ratio`, `Lateral_Entry`, `Seperate_Division`) VALUES ('$year', '$intake', '$StudentsAdmitted', $Enrollment_Ratio ,'$LateralEntry', '$SeparateDivision')";

        $sql2 = "INSERT INTO `criteria4.2` (`Year2`, `n1`, `n2`, `n3`, `n4`) VALUES ('$year2', '$n1', '$n2', '$n3', '$n4')";

        $sql3 = "INSERT INTO `criteria4.2b` (`tn1`, `tn2`, `tn3`, `tn4`) VALUES ('$tn1', '$tn2', '$tn3', '$tn4')";

        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $result3 = mysqli_query($conn, $sql3);

        if ($result3) {
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
<title>Criteria 4.1</title>


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
        <h1>Welcome to Criteria 4.1!</h1>
<br><br>
        <form id="accreditationForm" action="4.1FORM.php" method="post">
            <div class="input-container">
        <div class="left">
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

            <label for="intake">Sanctioned Intake (N):</label>
            <input type="number" class="inputFieldId" id="intake" name="intake" required><br><br>

            <label for="StudentsAdmitted">Total number of students
                admitted in first year minus
                number of students migrated to
                other programs/institutions, plus
                no. of students migrated to this
                program (N1):</label>
            <input type="number" class="inputFieldId" id="StudentsAdmitted" name="StudentsAdmitted" required><br><br>

            <label for="LateralEntry">Number of students admitted in
                2nd year in the same batch via
                lateral entry(N2)</label>
            <input type="number" class="inputFieldId" id="LateralEntry" name="LateralEntry" required><br><br>

            <label for="SeparateDivision">Separate Division(N3)</label>
            <input type="number" class="inputFieldId" id="SeparateDivision" name="SeparateDivision" required><br><br>

            <label for="year2">Select Year:</label>
            <select id="year2" name="year2" required>

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

            <label for="n1">Number of students without backlogs in Year I:</label>
            <input type="number" id="n1" class="inputFieldId"  name="n1" required><br><br>

            <label for="n2">Number of students without backlogs in Year II:</label>
            <input type="number" id="n2" class="inputFieldId" name="n2" required><br><br>
            </div>
            <div class="right">
            <label for="n3">Number of students without backlogs in Year III:</label>
            <input type="number" id="n3" class="inputFieldId" name="n3" required><br><br>

            <label for="n4">Number of students without backlogs in Year IV:</label>
            <input type="number" id="n4" class="inputFieldId" name="n4" required><br><br>


            <label for="tn1">Number of students who have successfully
                graduated in stipulated period of study
                [Total of with Backlog + without Backlog] Year I:</label>
            <input type="number" id="tn1" class="inputFieldId" name="tn1" required><br><br>

            <label for="tn2">Number of students who have successfully
                graduated in stipulated period of study
                [Total of with Backlog + without Backlog] Year II:</label>
            <input type="number" id="tn2" class="inputFieldId" name="tn2" required><br><br>

            <label for="tn3">Number of students who have successfully
                graduated in stipulated period of study
                [Total of with Backlog + without Backlog] Year III:</label>
            <input type="number" id="tn3" class="inputFieldId" name="tn3" required><br><br>

            <label for="tn4">Number of students who have successfully
                graduated in stipulated period of study
                [Total of with Backlog + without Backlog] Year IV:</label>
            <input type="number" id="tn4" class="inputFieldId" name="tn4" required><br><br>

            </div>
            </div>
            <button class="btn" type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>





    <table id="dataTable1" border="2">
        <thead>
            <tr>
                <th><br>Year</th>
                <th>Sanctioned Intake (N)</th>
                <th>Total number of students
                    admitted in first year minus
                    number of students migrated to
                    other programs/institutions, plus
                    no. of students migrated to this
                    program (N1)</th>
                <th>Number of stusdents admitted in
                    2nd year in the same batch via
                    lateral entry(N2)</th>
                <th>Separate Division (N3)</th>
                <th>Total number of students
                    admitted in the Program(N1+N2+N3)</th>

            </tr>
            <h2>Tables</h2>
        <tbody id="tablebody1">
            <!-- Data rows will be added here using PHP -->
            <?php
            $getdata = "SELECT * FROM `criteria4.1`";
            $data = mysqli_query($conn, $getdata);
            while ($row = $data->fetch_assoc()) {


                echo '<tr>
                <td>' . $row["Year"] . '</td>
                <td>' . $row["Intake"] . '</td>
                <td>' . $row["Student_Admitted"] . '</td>
                <td>' . $row["Lateral_Entry"] . '</td>
                <td>' . $row["Seperate_Division"] . '</td>
                <td>' . $row["Student_Admitted"] + $row["Lateral_Entry"] + $row["Seperate_Division"] . '</td>
                </tr>';
            }

            ?>

        </tbody>
    </table>

    <table id="dataTable2" border="2">
        <thead>
            <tr>
                <th><br>Year</th>
                <th>Number of students without backlogs in Year I</th>
                <th>Number of students without backlogs in Year II</th>
                <th>Number of students without backlogs in Year III</th>
                <th>Number of students without backlogs in Year IV</th>
                <!-- #region -->

            </tr>
            <h2></h2>
        <tbody id="tablebody2">
            <!-- Data rows will be added here using PHP -->
            <?php
            $getdata = "SELECT * FROM `criteria4.2`";
            $data = mysqli_query($conn, $getdata);
            while ($row = $data->fetch_assoc()) {
                echo '<tr>
                <td>' . $row["Year2"] . '</td>
                <td>' . $row["n1"] . '</td>
                <td>' . $row["n2"] . '</td>
                <td>' . $row["n3"] . '</td>
                <td>' . $row["n4"] . '</td>
                </tr>';
            }
            echo "<br><br>";

            ?>


        </tbody>
    </table>

    <table id="dataTable3" border="2">
        <thead>
            <tr>
                <th>Number of students who have successfully graduated in stipulated period of study [Total of with
                    Backlog + without Backlog] Year I</th>
                <th>Number of students who have successfully
                    graduated in stipulated period of study
                    [Total of with Backlog + without Backlog] Year II</th>
                <th>Number of students who have successfully
                    graduated in stipulated period of study
                    [Total of with Backlog + without Backlog] Year III</th>
                <th>Number of students who have successfully
                    graduated in stipulated period of study
                    [Total of with Backlog + without Backlog] Year IV</th>
            </tr>
            <h2><br></h2>
        <tbody id="tablebody3">
            <!-- Data rows will be added here using PHP -->
            <?php
            $getdata = "SELECT * FROM `criteria4.2b`";
            $data = mysqli_query($conn, $getdata);
            while ($row = $data->fetch_assoc()) {
                echo '<tr>
                <td>' . $row["tn1"] . '</td>
                <td>' . $row["tn2"] . '</td>
                <td>' . $row["tn3"] . '</td>
                <td>' . $row["tn4"] . '</td>
                </tr>';
            }



            ?>

            <table id="dataTable4" border="2">
                <thead>
                    <tr>

                        <th>
                            Item (Students enrolled at the First Year Level on
                            average basis during the last three years starting from
                            current academic years)</th>
                        <th>Sanctioned intake of the program (N)</th>
                        <th>Total number of students admitted in first year minus
                            number of students migrated to other
                            programs/institutions plus no. of students migrated to
                            this program (N1)</th>
                        <th>Enrolment Ratio</th>
                        <th>Average Enrolment Ratio</th>
                        <!-- #region -->

                    </tr>
                    <h2>Table 4.1</h2>
                <tbody id="tablebody2">
                    <!-- Data rows will be added here using PHP -->
                    <?php
                    $getdata = "SELECT * FROM `criteria4.1`";
                    $data = mysqli_query($conn, $getdata);
                    $arr = array();
                    $i = 0;
                    while ($row = $data->fetch_assoc()) {
                        $arr[] = $row["Student_Admitted"] / $row["Intake"];
                        echo '<tr>
                        <td>' . $row["Year"] . '</td>
                        <td>' . $row["Intake"] . '</td>
                        <td>' . $row["Student_Admitted"] . '</td>
                        <td>' . $row["Enrollment_Ratio"] . '</td>';
                        if ($i == 0) {
                            echo '<td>' . ($arr[$i]) . '</td>';
                        } elseif ($i == 1) {
                            echo '<td>' . ($arr[$i - 1] + $arr[$i]) / 2 . '</td>';
                        } else {
                            echo '<td>' . ($arr[$i - 2] + $arr[$i - 1] + $arr[$i]) / 3 . '</td>';
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
    <a href="criteria4.2.php" style="text-decoration: none;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
    </a>
</div>

</body>

</html>
