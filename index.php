<?php 
    include('includes/database.php');
    
    $edit_firstname ='';
    $edit_lastname ='';
    $edit_middlename ='';
    $edit_birthday ='';
    $edit_gender ='';

    $op1 = "";
    $op2 = "";
    $op3 = "";

    $selectData = "SELECT person_id,firstname,lastname,middlename,birthday,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),birthday)), '%Y') + 0 AS age,gender,date_registered FROM info_tb;

    ";
    $resultSelect = mysqli_query($connect,$selectData);

    if(isset($_GET['person_id'])){
        $person_id = $_GET['person_id'];
        $sqlGetData = "SELECT * FROM info_tb WHERE person_id = '$person_id' LIMIT 1";
        $resultGetData = mysqli_query($connect,$sqlGetData);
        $rowData = mysqli_fetch_assoc($resultGetData);

        $edit_firstname = $rowData['firstname'];
         $edit_lastname =$rowData['lastname'];
         $edit_middlename =$rowData['middlename'];
         $edit_birthday =$rowData['birthday'];
         $edit_gender =$rowData['gender'];
    }

    if($edit_gender == 1){
        $op1 = "selected";
    }else if($edit_gender == 2){
        $op2 = "selected";
    }else if($edit_gender == 3){
        $op3 = "selected";
    }else{

    }

    function convertDate($orgDate){
        $newDate = date("M jS,Y", strtotime($orgDate));
        echo $newDate;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js";></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js";></script>
<script src="https://kit.fontawesome.com/b5e479155c.js" crossorigin="anonymous"></script>


<title>Document</title>
</head>
<body>
    <?php include('includes/crud.php'); ?>
    <div class="modal-container" id="modal-container">
    <?php include('includes/forms.php'); ?>
    </div>


    <div class="main-container">
        <div class="header-container">
            <h1>Personal Record</h1>
        </div>
        <div class="button-container">
            <button onclick="openAdd();"><i class="fas fa-plus"></i>Add Person</button>
        </div>
        <div class="table-container">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full name</th>
                <th>Birthday</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Registered At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                    while($rowSelectedData = mysqli_fetch_assoc($resultSelect)){
            ?>
            <tr>
                <td><?php echo $rowSelectedData['person_id'] ?></td>
                <td><?php echo $rowSelectedData["firstname"] .' '.$rowSelectedData["middlename"].'. '. $rowSelectedData['lastname']; ?></td>
                <td><?php convertDate($rowSelectedData['birthday']);?></td>
                <td><?php echo $rowSelectedData['age'].' years old'; ?></td>
                <td><?php 
                    if($rowSelectedData['gender'] == '1'){
                        echo 'Male';
                    }else if($rowSelectedData['gender'] == '2'){
                        echo 'Female';
                    }else if($rowSelectedData['gender'] == '3'){
                        echo 'Others';
                    }
                ?></td>      
                <td><?php convertDate($rowSelectedData['date_registered']);?></td>
                <td><a class="green" href="index.php?person_id=<?php echo $rowSelectedData['person_id'];?>">Edit</a></td>
                <td><a class="red" href="javascrip:void(0)" onclick="deleteItem(<?php echo $rowSelectedData['person_id']; ?>)">Delete</a></td>
            </tr>
            <?php }?>
        </tbody>
      
    </table>
        </div>
    </div>
   
    <script>
        $(document).ready(function () {
    $('#example').DataTable({"order": [[ 0, "desc" ]],});
});
    </script>
<script src="js/script.js"></script>
</body>
</html>

<?php 
        if(isset($_GET['person_id'])){
            echo "<script>
                openEdit();
            </script>";
        }
        ?>