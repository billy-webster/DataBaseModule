<?php require("NavBar.php");?>
<?php


if (isset($_POST['create_button'])){
    header('Location: AddAssignments.php');
    exit();
}
if  (isset($_POST['edit_button'])){
    header('Location: EditAssignments.php');
    exit();
}
if (isset($_POST['delete_button'])){
    header('Location: DeleteAssignments.php');
    exit();
}

function Get_Data(){
    try{   
    $db = new SQLite3("../CourseWork.db");
    $sql = "SELECT * FROM Assignment ORDER BY PROJ_NO ASC";
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
        <link rel="stylesheet" href="../css/Assignment.css">
    </head>

    <body class="TitleText">
        <p class="TitleText">Assignment Table</p>
        <form method="post" action="Assingments.php">
        <button  type="submit" name="create_button">Create</button>
        <button type="submit" name='edit_button'>Edit</button>
        <button type="submit" name='delete_button'>Delete</button>
        </form>
    <div class='column'>
    <table class='table1'>    
        <thead class='employee_table'>
            
                <td>Project Id</td>
                <td>Employee Id</td>
                <td>Hours</td>
                
            
        </thead>
        
         <?php
                 $data = Get_Data();            
                 for ($i = 0; $i < count($data); $i++):                     
         ?>
         <tr>
            <td><?php echo $data[$i]['PROJ_NO']?></td>
            <td><?php echo $data[$i]['EMP_NUM']?></td>
            <td><?php echo $data[$i]['HOURS']?></td>
            
        </tr>
        <?php endfor;?>
        
                
                
                </table>    

    </div>
</body>        
</html>




