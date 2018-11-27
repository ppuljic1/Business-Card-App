<?php 

class PDFCreatorClass 
{
    private $card;

    public function __construct(BusinessCardClass $card) {
        $this->card = $card;
    }

    public function createPDF() {

        $pdf = new FPDF('l', 'mm', array(85,55));
        $pdf->AddPage();

        $pdf->SetLeftMargin(3);
        $pdf->SetFont('Arial','',8);

        // Convert hex to rgb
        list($r, $g, $b) = sscanf($this->card->color, "#%02x%02x%02x");
        $pdf->SetFillColor($r,$g,$b);
        $pdf->Rect(0, 0, 45, 55, 'F');

        $pdf->Image($this->card->image,40,0,50,60);

        $pdf->setY(3);
        $fullName = $this->card->fname . ' ' . $this->card->lname;
        $pdf->cell(30, 6, $fullName, 0, 1, 'L' );
        $pdf->cell(30, 6, $this->card->company, 0, 1, 'L' );
        $pdf->cell(30, 6, $this->card->position, 0, 1, 'L' );
        $pdf->cell(30, 6, $this->card->phoneNum, 0, 1, 'L' );
        $pdf->cell(30, 6, $this->card->email, 0, 1, 'L' );

        $fileName = str_replace(' ','_',$fullName).rand(0,100) . '.pdf';
        $location = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/cards/'. $fileName;

        if( $this->savePDF($pdf, $location) == '' ) {
            return $fileName;
        } else {
            return 'error';
        }

    } 

    public function savePDF($pdf,$location) {

        return $pdf->Output('F', $location, true);

    }

}