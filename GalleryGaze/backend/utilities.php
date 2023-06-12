<?php
    function displayErrors($errors){
        if(!empty($errors['empty_field'])){
            echo "<div class='authentication__error-box' role='alert'>
            ".$errors['empty_field']."
            </div>";
          }

        if(!empty($errors['invalid_info'])){
            echo "<div class='authentication__error-box' role='alert'>
            ".$errors['invalid_info']."
            </div>";
        }
    }

    function checkErrorField($errorName){
        global $errors;
        if(!empty($errors[$errorName])) {
          echo "authentication__invalid-field";
        }
    }

    function checkErrorIcon($errorName){
        global $errors;
        if(!empty($errors[$errorName])) {
          echo "authentication__invalid-icon";
        }
    }
      
    function printErrorMessage($errorName){
        global $errors;
        if(!empty($errors[$errorName])){
          echo "<small class='authentication__error-message'>".$errors[$errorName]."</small>";
        }
    }
      
?>