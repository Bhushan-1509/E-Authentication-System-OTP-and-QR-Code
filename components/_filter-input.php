<?php
    function filterOutInput($inputData){
        $inputData = trim($inputData);
        $inputData = stripslashes($inputData);
        $inputData = htmlspecialchars($inputData);

        return $inputData;
    }

?>