<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $JobId = $_POST['Id'];
    $jname = $_POST['jname'];
    $charge = $_POST['chrg'];
    
    $check = $db->prepare("SELECT JOB_ID FROM Jobs WHERE JOB_ID = $JobId");
    $run = $check->execute();

    if ($run && $run->fetchArray(SQLITE3_ASSOC)){
        $update = $db->prepare("UPDATE Jobs SET JOB_CLASS = '$jname', CHG_HOUR = '$charge'WHERE JOB_ID = $JobId");
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
    <form action="EditJobs.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Edit Jobs</p>
        <div class='Form'>
            <label class='label'for="Employee_Id"><b>Job_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            <label class='label'for="fname"><b>Job Name</b></label>
            <input type="text" placeholder="Enter Job Name" name="jname" required>

            <label class='label'for="mname"><b>Charge</b></label>
            <input type="text" placeholder="Enter Charge per hour" name="chrg" required>

            
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>