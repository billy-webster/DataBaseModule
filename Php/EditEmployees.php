<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $empId = $_POST['Id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $check = $db->prepare("SELECT EMP_NUM FROM Employees WHERE EMP_NUM = $empId");
    $run = $check->execute();

    if ($run && $run->fetchArray(SQLITE3_ASSOC)){
        $update = $db->prepare("UPDATE Employees SET EMP_FNAME = '$fname', EMP_MNAME = '$mname', EMP_LNAME = '$lname' WHERE EMP_NUM = $empId");
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
    <form action="EditEmployees.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Edit Employees</p>
        <div class='Form'>
            <label class='label'for="Employee_Id"><b>Employee_Id</b></label>
            <input type="text" placeholder="Enter Id" name="Id" required>

            <label class='label'for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" required>

            <label class='label'for="mname"><b>Middle Name</b></label>
            <input type="text" placeholder="Enter Middle Name" name="mname" required>

            <label class='label'for="lname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lname" required>
        
            <button type="submit">Submit</button>
            
            
      
      
</div>
    </body>
</form>

</html>


<?php require("Footer.php");?>