<?php require("NavBar.php");?>
<?php
$db = new SQLITE3("../CourseWork.db");

if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $empId = $_POST['Id'];
    $verify = $db->prepare("SELECT EMP_NUM FROM EMPLOYEES WHERE EMP_NUM = '$empId'");
    $output = $verify->execute();
    if ($output && $output->fetchArray(SQLITE3_ASSOC)){
        echo "<p style='color: white;'>Error: Employee ID already exists</p>";
    }
    else{
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
    
        $sql = "INSERT INTO Employees (EMP_NUM, EMP_FNAME, EMP_MNAME, EMP_LNAME) VALUES ('$empId', '$fname', '$mname', '$lname')";
        $result = $db->exec($sql);
        if ($result){
            echo "<p style='color: white;'>Employee Created</p>";
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
    <form action="AddEmployees.php" method="post">    
    <body class="BodyForm">
    
    <p class="FormTitle">Create New Employees</p>
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