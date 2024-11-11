<?php require("NavBar.php"); ?>
<?php
$db = new SQLite3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empNum = $_POST['emp_num'];
    $projno = $_POST['Id'];
    $charge = $_POST['charge'];

    $verify = $db->prepare("SELECT EMP_NUM FROM Assignment WHERE EMP_NUM = '$empNum' AND PROJ_NO = '$projno'");
    $result = $verify->execute();

    if ($result && $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<p style='color: white;'>Error: Assignment for this Employee ID in the current project already exists</p>";
    } else {
        $Insert = "INSERT INTO Assignment (PROJ_NO, EMP_NUM, HOURS) VALUES ('$projno', '$empNum', '$charge')";
        $result = $db->exec($Insert);

        if ($result) {
            echo "<p style='color: white;'>Assignment Work Created</p>";
        } else {
            echo "<p style='color: white;'>Failed to process</p>";
        }
    }
}

$db->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/AddEmployees.css">
        
    </head>
    <form action="AddAssignments.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Create New Assingment Information</p>
        <div class='Form'>
            <label class='label'for="Proj_no"><b>Proj_No</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            <label class='label'for="fname"><b>Emp_No</b></label>
            <input type="text" placeholder="Enter Employee Number" name="emp_num" required>

            <label class='label'for="mname"><b>Hours</b></label>
            <input type="text" placeholder="Enter Hours Worked" name="charge" required>

            
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>