<?php

include_once './file-controller.php';
include_once './db-config.php';
  
if(isset($_POST)) {
    $db             =           new DBController();
    $conn           =           $db->connect();

    if(!empty($_FILES['file'])) {
            $fController         =       new FileController($conn);
            $uploadResult        =       $fController->uploadFile($_FILES['file']);

            if($uploadResult['status'] == "SUCCESS") {
                echo "<div class='alert alert-success alert-dismissible'>" .$uploadResult['message'] . "</div>";

                echo '<img src="./uploads/'.$uploadResult['image'].'" style="max-width: 540px;">';
            }

            elseif($uploadResult['status'] == "FAILED") {
                echo "<div class='alert alert-danger alert-dismissible'>" .$uploadResult['message'] . "</div>";
            }

            else {
                echo "<div class='alert alert-success alert-dismissible'>" .$uploadResult['message'] . "</div>";
            }
    }        
}

?>