<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $empId = $_POST['Id'];
    $verify = $db->prepare("SELECT EMP_NUM FROM EMPLOYEES WHERE EMP_NUM = '$empId'");
    $output = $verify->execute();
    if ($output && $output->fetchArray(SQLITE3_ASSOC)){
        $delete = $db->prepare("DELETE FROM Employees WHERE EMP_NUM = $empId;");
        $outputdelete = $delete->execute();
        echo "<p style='color: white;'>Employee Sucessfully Removed</p>";
    }
    else {
        echo "<p style='color: white;'>No Employee Id Found</p>";
    }
}
$db->close();
?>




<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/DeleteEmployees.css">
        
    </head>
    <form action="DeleteEmployees.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Delete Employees</p>
        <div class='Form'>
            <label class='label'for="Employee_Id"><b>Employee_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>