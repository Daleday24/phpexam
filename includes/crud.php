<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 
$curr_date = date('Y-m-d');

    if(isset($_POST['submit-add'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $date_registered = $curr_date;

        $sqlAdd = "INSERT INTO info_tb(firstname,lastname,middlename,birthday,gender,date_registered)
        VALUES ('$firstname','$lastname','$middlename','$birthday','$gender','$date_registered')";
        $resultAdd = mysqli_query($connect,$sqlAdd);
        
        if($resultAdd){
            echo '<script>
            swal({
                title: "Add Person Info",
                text: "Successfully Added Person Info",
                icon: "success",
                
            }).then(function() {
                window.location = "index.php";
            });
        </script>';
        }else{
            echo '<script>
            swal({
                title: "Add Person Info",
                text: "Failed To Add Person Info",
                icon: "error",
                
            }).then(function() {
                window.location = "index.php";
            });
        </script>';
        }
    }

    if(isset($_POST['submit-edit'])){
        $person_id = $_GET['person_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $date_registered = $curr_date;

        $sqlEdit = "UPDATE info_tb SET 
        firstname = '$firstname',
        lastname = '$lastname',
        middlename = '$middlename',
        birthday = '$birthday',
        gender = '$gender'
        WHERE person_id = '$person_id';

        ";
        $resultEdit = mysqli_query($connect,$sqlEdit);
        
        if($resultEdit){
            echo '<script>
            swal({
                title: "Edit Person Info",
                text: "Successfully Edit Person Info",
                icon: "success",
                
            }).then(function() {
                window.location = "index.php";
            });
        </script>';
        }else{
            echo '<script>
            swal({
                title: "Edit Person Info",
                text: "Failed To Edit Person Info",
                icon: "error",
                
            }).then(function() {
                window.location = "index.php";
            });
        </script>';
        }
    }

    
    if(isset($_GET['delete_id'])){
        $id = $_GET['delete_id'];

        $sqlDelete = "DELETE FROM info_tb WHERE person_id = '$id'";
        $resultDelete = mysqli_query($connect,$sqlDelete);

        if($resultDelete){
            header('location: index.php');
        }else{
            header('location: index.php');
        }
        
    }

    

    
?>


