<?php require("NavBar.php"); ?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $proj_id = $_POST['Id'];
    $emp_id = $_POST['emp_id'];
    $hours = $_POST['hours'];

    $check = $db->prepare("SELECT EMP_NUM FROM Assignment WHERE EMP_NUM = $emp_id");
    $run = $check->execute();

    if ($run && $run->fetchArray(SQLITE3_ASSOC)){
        $update = $db->prepare("UPDATE Assignment SET HOURS = '$hours' WHERE EMP_NUM = '$emp_id' AND PROJ_NO = '$proj_id'");
        $completed = $update->execute();

        if ($completed) {
            echo "<p style='color: white;'>Edited Successfully</p>";
        } else {
            echo "<p style='color: white;'>Unable to edit</p>";
        }
    }
    else{
        echo "<p style='color: white;'>No Id Found</p>";
    }
}

$db->close();
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/EditEmployees.css">
        
    </head>
    <form action="EditAssignments.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Edit Assignments</p>
        <div class='Form'>
            <label class='label'for="Employee_Id"><b>Project_Number</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            <label class='label'for="fname"><b>Employee_Id</b></label>
            <input type="text" placeholder="Enter Employee id" name="emp_id" required>

            <label class='label'for="mname"><b>Hours</b></label>
            <input type="text" placeholder="Enter Hours Worked" name="hours" required>

            
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>