<?php

//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
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
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('PMCTool');
$pdf->SetTitle('' .$username.'');
$pdf->SetSubject('User');
$pdf->SetKeywords('PDF, ' .$username.' ');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' '.$today.' ', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

if (isset($gens)):
    if (count($gen) > 0) :
        foreach ($gen as $gen):
            $first_name = $gen->first_name;
            $last_name = $gen->last_name;
            $username = $gen->username;
            $password = $gen->password;
            $email = $gen->email;
            $user_group_name = $gen->user_group_name;
            $sendEmail = $gen->sendEmail;
            $registerDate = $gen->registerDate;
            $lastvisitDate = $gen->lastvisitDate;
            $activation = $gen->activation;
            $lastResetTime = $gen->lastResetTime;
            $resetCount = $gen->resetCount;
            
            // Set some content to print
$html = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">
<tr>
    <td colspan="2" class="tg-pnx7" style=" text-align: center;"><h1>PMCTool User</h1></td>
</tr>
<tr>
    <td class="tg-saqj" ><h3>First Name</h3></td>
    <td class="tg-saqj" >' . $first_name . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Last Name</h3></td>
    <td class="tg-saqj">' . $last_name . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Username</h3></td>
    <td class="tg-saqj">' . $username . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Email</h3></td>
    <td class="tg-saqj">' . $email . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>User Group</h3></td>
    <td class="tg-saqj">' . $user_group_name . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Send Activation Email</h3></td>
    <td class="tg-saqj">' . $sendEmail . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Register Date</h3></td>
    <td class="tg-saqj">' . $registerDate . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Last Visit</h3></td>
    <td class="tg-saqj">' . $lastvisitDate . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>User Activation</h3></td>
    <td class="tg-saqj">' . $activation . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Last Password Reset Time</h3></td>
    <td class="tg-saqj">' . $lastResetTime . '</td>
  </tr>
  <tr>
    <td class="tg-saqj"><h3>Reset Counter</h3></td>
    <td class="tg-saqj">' . $resetCount . '</td>
  </tr>
  
  
</table>
        ';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        endforeach;
    endif;
endif;


$pdf->lastPage();
// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output(''.$username.'_'.$today.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
