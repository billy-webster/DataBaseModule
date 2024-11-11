<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $JobId = $_POST['Id'];
    $verify = $db->prepare("SELECT JOB_ID FROM Jobs WHERE JOB_ID = '$JobId'");
    $output = $verify->execute();
    if ($output && $output->fetchArray(SQLITE3_ASSOC)){
        echo "<p style='color: white;'>Error: Job ID already exists</p>";
    }
    else{
        $jname = $_POST['jname'];
        $chrg = $_POST['chrg'];
        
    
        $sql = "INSERT INTO Jobs (JOB_ID, JOB_CLASS, CHG_HOUR) VALUES ('$JobId', '$jname', '$chrg')";
        $result = $db->exec($sql);
        if ($result){
            echo "<p style='color: white;'>Job created</p>";
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
    <form action="AddJobs.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Create New Jobs</p>
        <div class='Form'>
            <label class='label'for="Job_Id"><b>Job_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            <label class='label'for="fname"><b>Job Name</b></label>
            <input type="text" placeholder="Enter Job Name" name="jname" required>

            <label class='label'for="mname"><b>Charge per hour</b></label>
            <input type="text" placeholder="Enter Charge per hour " name="chrg" required>

            
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>