<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $JOB_ID = $_POST['Id'];
    $verify = $db->prepare("SELECT JOB_ID FROM Jobs WHERE JOB_ID = '$JOB_ID'");
    $output = $verify->execute();
    if ($output && $output->fetchArray(SQLITE3_ASSOC)){
        $delete = $db->prepare("DELETE FROM Jobs WHERE JOB_ID = $JOB_ID;");
        $outputdelete = $delete->execute();
        echo "<p style='color: white;'>Job Sucessfully Removed</p>";
    }
    else {
        echo "<p style='color: white;'>No Job Id Found</p>";
    }
}
$db->close();
?>




<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/DeleteEmployees.css">
        
    </head>
    <form action="DeleteJobs.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Delete Jobs</p>
        <div class='Form'>
            <label class='label'for="Job_Id"><b>Job_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>