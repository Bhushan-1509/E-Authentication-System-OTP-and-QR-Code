<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<?php
    include_once "components/_dbConfig.php";



 if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $targetDirectory = "qr-images/";
        $targetFileName = "qr-images/" . basename($_FILES['filesToUpload']['name']);

        if(isset($_POST['submitBtn']) && isset($_FILES['filesToUpload'])){
            $tmpFileName = strval($_FILES['filesToUpload']['tmp_name']);
            $result = move_uploaded_file($tmpFileName,$targetFileName);
            if($result){
                
                $instantChecksum = md5_file($targetFileName);
                /*
                    SELECT * FROM sys_users
                    where checksum_value = '$instantChecksum';
                
                */
                $instance = new dbConfig();

                $connection = new mysqli($instance->hostName,$instance->userName,$instance->password,$instance->database,$instance->port);

                $sql = "SELECT * FROM sys_users
                where checksum_value = '$instantChecksum';";
                $result = $connection->query($sql);
                $followingData = $result->fetch_assoc();
                session_start();
                $_SESSION['email'] = $followingData['email'];
                $_SESSION['password'] = $followingData['password_hash'];
                unlink($targetFileName);
                header("refresh: 3; url = http://localhost/mini-project/otpauthenticationforsignin.php");
                
                if ($result == false){
                    // user doesn't exists show him a prompt 
                }

              
            }
            else{
                
                //give a message    
                echo '<div class="alert alert-danger" role="alert">
                Unable to upload qr code in system for verification
              </div>';

            }
        }
    }
?>