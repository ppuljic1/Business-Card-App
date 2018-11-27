<?php

require('../../lib/fpdf/fpdf.php');
require('PDFCreatorClass.php');

class BusinessCardClass
{
    private $fname;
    private $lname;
    private $company;
    private $positoin;
    private $phoneNum;
    private $email;
    private $color;
    private $image;


    function __construct($fname, $lname, $company, $position, $phoneNum, $email, $color, $image) {

        $this->fname = $fname;
        $this->lname = $lname;
        $this->company = $company;
        $this->position = $position;
        $this->phoneNum = $phoneNum;
        $this->email = $email;
        $this->color = $color;
        $this->image = $image;

    }

    public function __get($property) {  
        if (property_exists($this, $property)) {  
            return $this->$property;  
        }  
    }  

    public function create() {

        $PDFCreator = new PDFCreatorClass($this);

        $fileName = $PDFCreator->createPDF();
        if( $fileName != 'error' ) {
            return $fileName; 
        } else {
            return 'error';
        }

    }


}