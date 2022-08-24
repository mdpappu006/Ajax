<?php


// Print result in browser

// $data = $_REQUEST;
// $data['result']='success';
// $data['method']=$_SERVER['REQUEST_METHOD'];
// echo json_encode( $data, JSON_PRETTY_PRINT );


    $conn = mysqli_connect("localhost", "root", "", "ajax") or die("connection error!");

    if(!empty($_POST)){

        
        $firstName = $_POST['fname'];
        $lastName = $_POST['lsname'];
        $email = $_POST['email'];  
        
        $insert = "INSERT into students(firstname, lastname, email) VALUES('$firstName', '$lastName', '$email')";

        $result = mysqli_query($conn, $insert);
        if($result){
            header("locaiton: index.php");
            echo 1;
        }else{
            echo 0;
        }

    }



$allUser = "SELECT * FROM students";
$userQuery = mysqli_query($conn, $allUser);

if(mysqli_num_rows($userQuery) > 0):
    while($row = mysqli_fetch_array($userQuery)):
    ?>    
    <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['firstname']?></td>
        <td><?php echo $row['lastname']?></td>
        <td><?php echo $row['email']?></td>
    </tr>
    <?php
    endwhile;
endif;
?>