<?php

require_once('tcpdf/tcpdf.php');
class Mail_cert extends model
{
    
    public function send_certificate($u_name,$event,$org)
    {
        //============================================================+
        // File name   : example_006.php
        // Begin       : 2008-03-04
        // Last Update : 2013-05-14
        //
        // Description : Example 006 for TCPDF class
        //               WriteHTML and RTL support
        //
        // Author: Nicola Asuni
        //
        // (c) Copyright:
        //               Nicola Asuni
        //               Tecnick.com LTD
        //               www.tecnick.com
        //               info@tecnick.com
        //============================================================+

        /**
         * Creates an example PDF TEST document using TCPDF
         * @package com.tecnick.tcpdf
         * @abstract TCPDF - Example: WriteHTML and RTL support
         * @author Nicola Asuni
         * @since 2008-03-04
         */

        // Include the main TCPDF library (search for installation path).
        // require_once('tcpdf/tcpdf.php');





        // create new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // create new PDF document
        // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Food For All');
        $pdf->SetTitle('Certificate');
        $pdf->SetSubject('appreciation for volunteering');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, 30, 'Food For All', "Appreciation for volunteering\nwww.foodforall.org");

        // set header and footer fonts
        $pdf->setHeaderFont(array('times', '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set font
        $pdf->SetFont('dejavusans', '', 10);

        // add a page
        $pdf->AddPage();

        // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
        // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

        // create some HTML content
        // background-color: #e4df8d;
        // background-color: rgb(216, 216, 215,0.9);
        $vol_name = $u_name;
        $html1 = <<<EOF
        
        <!DOCTYPE html>
        <html>
        <head>
            <title>Volunteering Certificate</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    
                    border: solid 2px;
                    border-raduis: 5px;
                }
                .container {
                    margin: 50px auto;
                    width: 700px;
                    
                    padding: 40px;
                    
                    text-align: center;
                }
                .logo {
                    max-width: 80px;
                    margin-bottom: 20px;
                }
                .title {
                    font-family: cursive;
                    font-size: 45px;
                    margin-bottom: 20px;
                    color:  #7681BF;
                }
                .subtitle {
                    font-size: 24px;
                    margin-bottom: 40px;
                }
                .recipient {
                    font-size: 28px;
                    margin-bottom: 40px;
                }
                .signature {
                    margin-top: 60px;
                    font-weight: bold;
                }
                .signature img {
                    max-width: 200px;
                }
            </style>
        </head>
        <body>
            <div class="container">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
                <div class="title"></div>
                <div class="subtitle"></div>
                <div class="recipient">
                
        EOF;

        $html2 = <<<EOF
                </div>
                <div class="subtitle">
                   
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="recipient">
                
        EOF;
                
        $html3 = <<<EOF
                </div>
                <div class="subtitle">
                     
                </div>
                <br>
                <br>
                <div class="recipient">
                    
        EOF;

        $html4 = <<<EOF
                </div>
                <div class="signature">
                </div>
            </div>
        </body>
        </html>
        EOF;
        $html = $html1 . $vol_name . $html2 . $event . $html3 . $org . $html4;

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

        // reset pointer to the last page
        $pdf->lastPage();

        // ---------------------------------------------------------

        //Close and output PDF document
        // $pdf->Output('certificate.pdf', 'I');
        // die;
        $email_pdf = $pdf->Output('certificate.pdf', 'S');

        //============================================================+
        // END OF FILE
        //============================================================+
        return $email_pdf;
    }

}

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        $this->SetCreator(PDF_CREATOR);
        $this->SetAuthor('Food For All');
        // $this->SetHeaderData(PDF_HEADER_LOGO, 30, 'Food For All', "Appreciation for volunteering\nwww.foodforall.org");
        // get the current page break margin

        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        // $img_file = K_PATH_IMAGES.'image_demo.jpg';
        // $img_file = K_PATH_IMAGES . 'background3.png';
        $img_file = K_PATH_IMAGES . 'foodforall_certificate.png';
        $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->Cell(0, 30, 'Food For All, www.foodforall.org', 0, false, 'L', 0, '', 0, false, 'L', 'L');
        // set the starting point for the page content
        $this->setPageMark();
    }
}
