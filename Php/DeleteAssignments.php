<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $empId = $_POST['Id'];
    $projId = $_POST['proj_id'];

    $verify = $db->prepare("SELECT EMP_NUM FROM Assignment WHERE EMP_NUM = '$empId'");
    $output = $verify->execute();

    if ($output && $output->fetchArray(SQLITE3_ASSOC)){
        
        $delete = $db->prepare("DELETE FROM Assignment WHERE EMP_NUM = '$empId' AND PROJ_NO = '$projId'");
        $outputDelete = $delete->execute();

        if ($outputDelete) {
            echo "<p style='color: white;'>Employee Successfully Removed</p>";
        } else {
            echo "<p style='color: white;'>Failed to Remove Employee</p>";
        }
    } else {
        echo "<p style='color: white;'>No Employee ID Found</p>";
    }
}

$db->close();
?>





<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/DeleteEmployees.css">
        
    </head>
    <form action="DeleteAssignments.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Delete Employee Work</p>
        <div class='Form'>
            <label class='label'for="Employee_Id"><b>Employee_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>
            
            <label class='label'for="Employee_Id"><b>Proj_Id</b></label>
            <input type="text" placeholder="Enter Project Number" name="proj_id" required>

            
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>