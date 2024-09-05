<?php
$conn = new mysqli('localhost', 'root', '', 'nba_calculator_real');

if (isset($_POST['submit'])) {

    $year = $_POST['year'];
    
    if ($conn->connect_error) {
        die('Connection Failed  :  ' . $conn->connect_error);
    } else {
        
        
        $sql = "INSERT INTO `criteria4.2!` (`Year`) VALUES ('$year')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            
            if (count($_POST) > 0) {
                foreach ($_POST as $k => $v) {
                }  
            }
            $getdata = "SELECT * FROM `criteria4.1`";
            $data = mysqli_query($conn, $getdata);
            $row1 = $data->fetch_assoc();

            $getdata2 = "SELECT * FROM `criteria4.2!`";
            $data3 = mysqli_query($conn, $getdata2);
            $row3 = $data3->fetch_assoc();

// Check if keys exist and denominator is not zero before performing division
$SI = 0; // Default value if calculation cannot be performed
if (isset($row3["Student_Admitted"], $row1["tn1"]) && $row1["tn1"] !== 0) {
    $SI = $row3["Student_Admitted"] / $row1["tn1"];
            // Insert SI into the database
            $insertSIQuery = "UPDATE `criteria4.2!` SET `SI` = '$SI' WHERE `Year` = '$year'";
            mysqli_query($conn, $insertSIQuery);}

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
<title>4.2 Criteria</title>


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
        <h1>Welcome to Criteria 4.2!</h1>
        <br><br>

        <form id="accreditationForm" action="criteria4.2.php" method="post">
            <label for="year">Select Year:</label>
            <select id="year" name="year" required>

                <option value="18-19">2018-2019</option>
                <option value="17-18">2017-2018</option>
                <option value="16-17">2016-2017</option>
                <option value="15-16">2015-2016</option>
                <option value="14-15">2014-2015</option>
                <option value="13-14">2013-2014</option>

            </select><br><br> 

            
            <button class="btn" type="submit" name="submit" id="submit">Generate Table</button>
        </form>
    </div> 
    <br><br>

    <table id="table4.2" border="2">
        <thead>
            <tr>
                <th><br>Year</th>

                <th>Number of students admitted in the corresponding First
                Year + admitted in 2nd year via lateral entry and separate division, if applicable</th>

                <th>Number of students who have graduated in the stipulated period</th>

                <th>Success Index (SI)</th>


                <th>Average Success Index (ASI)</th>
                <th>Delete</th>


            </tr>

            <tbody id="tablebody1">
            <!-- Data rows will be added here using JavaScript -->
        </tbody>
        <?php
        

            $query2 = "select * from `criteria4.1` ";
            $getdata = "SELECT * FROM `criteria4.2b`";
            $getdata2 = "SELECT * FROM `criteria4.2!`";


            $data = mysqli_query($conn, $getdata );
            $data2 = mysqli_query($conn, $query2);
            $data3 = mysqli_query($conn, $getdata2);

            
            while (($row1 = $data->fetch_assoc()) && ($row2 = $data2->fetch_assoc()) && $row3 = $data3->fetch_assoc()) {
                $SI = $row2["Student_Admitted"] / $row1["tn1"];
                $arr = array();
                $i = 0;
                $arr[] = ($row2["Student_Admitted"] / $row1["tn1"]);

                echo '<tr>
                <td>' . $row2["Year"] . '</td>
                <td>' . $row2["Student_Admitted"] . '</td>
                <td>' . $row1["tn1"] . '</td>
                <td>' . $SI. '</td>';

                if ($i == 0) {
                    echo '<td>' . ($arr[$i]) . '</td>';
                } elseif ($i == 1) {
                    echo '<td>' . ($arr[$i - 1] + $arr[$i]) / 2 . '</td>';
                } else {
                    echo '<td>' . ($arr[$i - 2] + $arr[$i - 1] + $arr[$i]) / 3 . '</td>';
                }
                echo '<td><button class="delete-btn" data-row-id="' .   '">Delete</button></td>'; 
                echo '</tr>';
                $i = $i + 1;

                echo '</tr>';

            }
            
            
            ?>
                </tbody>
            </table>
<br><br>

<div style="position: fixed; bottom: 0; width: 100%; display: flex; justify-content: space-between; padding: 100px; box-sizing: border-box;">
    <a href="4.1FORM.php" style="text-decoration: bold;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-left"></i></b></button>
    </a>
    <a href="criteria4.3.php" style="text-decoration: none;">
        <button class="navbtn" style="width:60px;font-size:20px; height:60px;  background-color:#800000;color:white;border-radius:5px;"><b><i class="fas fa-arrow-right"></i></b></button>
    </a>
</div>
        
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add an event listener for the delete buttons
    var deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            // Get the row ID associated with the delete button
            var rowId = this.getAttribute('data-row-id');

            // Remove the corresponding row from the table
            var rowToRemove = document.querySelector('tr[data-row-id="' + rowId + '"]');
            if (rowToRemove) {
                rowToRemove.remove();
            }
        });
    });
});
</script>

</html>