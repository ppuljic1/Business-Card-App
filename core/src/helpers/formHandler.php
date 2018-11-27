<?php

require('../BusinessCardClass.php');

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

    $destination = '../../../assets/img/cards';

    if( move_uploaded_file($_FILES["cardImage"]["tmp_name"], $destination . $_FILES["cardImage"]["name"]) ) {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $company = $_POST['company'];
            $position = $_POST['position'];
            $phoneNum = $_POST['phoneNum'];
            $email = $_POST['email'];
            $color = $_POST['baseColor'];
            $image = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/cards' . $_FILES["cardImage"]["name"];
        
            $card = new BusinessCardClass($fname, $lname, $company, $position, $phoneNum, $email, $color, $image);
        
            if( $card->create() != 'error' ) {
                unlink($image);
                header("Location: http://business-card-app.loc/yourCard.php?PDF=$fileName");
                exit();
            }else {
                header("Location: http://business-card-app.loc/?PDF=false");
                exit();
            }

    } else {

        header("Location: http://business-card-app.loc/?PDF=false");
        exit();

    }


}