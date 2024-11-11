<?php require("NavBar.php");?>
<?php


if (isset($_POST['create_button'])){
    header('Location: AddJobs.php');
    exit();
}
if  (isset($_POST['edit_button'])){
    header('Location: EditJobs.php');
    exit();
}
if (isset($_POST['delete_button'])){
    header('Location: DeleteJobs.php');
    exit();
}

function Get_Data(){
    try{   
    $db = new SQLite3("../CourseWork.db");
    $sql = "SELECT * FROM Jobs";
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
        <link rel="stylesheet" href="../css/Jobs.css">
    </head>

    <body class="TitleText">
        <p class="TitleText">Jobs Table</p>
        <form method="post" action="jobs.php">
        <button  type="submit" name="create_button">Create</button>
        <button type="submit" name='edit_button'>Edit</button>
        <button type="submit" name='delete_button'>Delete</button>
        </form>
    <div class='columns'>
    <table>    
        <thead class='job_table'>
            
                <td>Job Id</td>
                <td>Job Name</td>
                <td>Charge Per Hour</td>
                
            
        </thead>
        
         <?php
                 $data = Get_Data();            
                 for ($i = 0; $i < count($data); $i++):                     
         ?>
         <tr>
            <td><?php echo $data[$i]['JOB_ID']?></td>
            <td><?php echo $data[$i]['JOB_CLASS']?></td>
            <td><?php echo $data[$i]['CHG_HOUR']?></td>
            
        </tr>
        <?php endfor;?>
    </table>
    </div>
</body>        
</html>




<?php require("Footer.php");?>