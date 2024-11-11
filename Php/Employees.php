<?php require("NavBar.php");?>
<?php


if (isset($_POST['create_button'])){
    header('Location: AddEmployees.php');
    exit();
}
if  (isset($_POST['edit_button'])){
    header('Location: EditEmployees.php');
    exit();
}
if (isset($_POST['delete_button'])){
    header('Location: DeleteEmployees.php');
    exit();
}

function Get_Data(){
    try{   
    $db = new SQLite3("../CourseWork.db");
    $sql = "SELECT * FROM Employees";
    $run = $db->prepare($sql);
    $output = $run->execute();
    while ($row = $output->fetchArray()){
        $arrayResult [] = $row; 
        }       
        return $arrayResult;
    }
    
    catch(Exception $e) {
        echo "failed to connect to database and process request" .  $e->getMessage();
        return [];
    }
    
    $db->close(); 
}






?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/Employee.css">
    </head>

    <body class="TitleText">
        <p class="TitleText">Employee Table</p>
        <form method="post" action="Employees.php">
        <button  type="submit" name="create_button">Create</button>
        <button type="submit" name='edit_button'>Edit</button>
        <button type="submit" name='delete_button'>Delete</button>
        </form>
    <div class='columns'>
    <table>    
        <thead class='employee_table'>
            
                <td>Employee Id</td>
                <td>First Name</td>
                <td>Middle Name</td>
                <td>Last Name</td>
            
        </thead>
        
         <?php
                 $data = Get_Data();            
                 for ($i = 0; $i < count($data); $i++):                     
         ?>
         <tr>
            <td><?php echo $data[$i]['EMP_NUM']?></td>
            <td><?php echo $data[$i]['EMP_FNAME']?></td>
            <td><?php echo $data[$i]['EMP_MNAME']?></td>
            <td><?php echo $data[$i]['EMP_LNAME']?></td>
        </tr>
        <?php endfor;?>
    </table>
    </div>
</body>        
</html>




<?php require("Footer.php");?>