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
$pdf->SetTitle('Projects');
$pdf->SetSubject('Projects');
$pdf->SetKeywords('PDF, Projects');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ' . $today . ' ', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
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
            $mod_proj_id = $gen->mod_proj_id;
            $proj_title = $gen->proj_title;
            $proj_kind = $gen->proj_kind;
            $proj_description = $gen->proj_description;
            $mod_name = $gen->mod_name;
            $mod_description = $gen->mod_description;

        endforeach;
    endif;
endif;


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
    <td colspan="2" class="tg-pnx7" style=" text-align: center;"><h1>Project: ' . $proj_title . '</h1></td>
</tr>
<tr>
    <td colspan="2" class="tg-pnx7" style=" text-align: center;"><h1>Model: ' . $mod_name . '</h1></td>
</tr>
<tr><td colspan="2"><br><br></td></tr>

</table>

        ';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);




if (isset($gens_1)):
    if (count($gen_1) > 0) :

        foreach ($gen_1 as $gen):

            $cf_name = $gen->cf_name;
            $cf_description = $gen->cf_description;
            $cf_reference = $gen->cf_reference;
            $cf_restriction = $gen->cf_restriction;
            $cf_category = $gen->cf_category;
            $cf_weight = $gen->cf_weight;
            $metric_name = $gen->metric_name;
            $metric_description = $gen->metric_description;
            $metric_reference = $gen->metric_reference;
            $metric_restriction = $gen->metric_restriction;
            $metric_weight = $gen->metric_weight;
            $evsc_name = $gen->evsc_name;
            $evsc_description = $gen->evsc_description;
            $evsc_type = $gen->evsc_type;
            $evsc_number_of_choices = $gen->evsc_number_of_choices;
            $ep1_value = $gen->ep1_value;
            $ep1_descr = $gen->ep1_descr;
            $ep1_weight = $gen->ep1_weight;
            $ep2_value = $gen->ep2_value;
            $ep2_descr = $gen->ep2_descr;
            $ep2_weight = $gen->ep2_weight;
            $ep3_value = $gen->ep3_value;
            $ep3_descr = $gen->ep3_descr;
            $ep3_weight = $gen->ep3_weight;
            $ep4_value = $gen->ep4_value;
            $ep4_descr = $gen->ep4_descr;
            $ep4_weight = $gen->ep4_weight;
            $ep5_value = $gen->ep5_value;
            $ep5_descr = $gen->ep5_descr;
            $ep5_weight = $gen->ep5_weight;
            $ep6_value = $gen->ep6_value;
            $ep6_descr = $gen->ep6_descr;
            $ep6_weight = $gen->ep6_weight;
            $ep7_value = $gen->ep7_value;
            $ep7_descr = $gen->ep7_descr;
            $ep7_weight = $gen->ep7_weight;
            $ep8_value = $gen->ep8_value;
            $ep8_descr = $gen->ep8_descr;
            $ep8_weight = $gen->ep8_weight;
            $ep9_value = $gen->ep9_value;
            $ep9_descr = $gen->ep9_descr;
            $ep9_weight = $gen->ep9_weight;
            $ep10_value = $gen->ep10_value;
            $ep10_descr = $gen->ep10_descr;
            $ep10_weight = $gen->ep10_weight;

            $ep1_descr = htmlentities($ep1_descr);
            $ep2_descr = htmlentities($ep2_descr);
            $ep3_descr = htmlentities($ep3_descr);
            $ep4_descr = htmlentities($ep4_descr);
            $ep5_descr = htmlentities($ep5_descr);
            $ep6_descr = htmlentities($ep6_descr);
            $ep7_descr = htmlentities($ep7_descr);
            $ep8_descr = htmlentities($ep8_descr);
            $ep9_descr = htmlentities($ep9_descr);
            $ep10_descr = htmlentities($ep10_descr);
            $space="&nbsp;";
            
            if ($evsc_type == "yes/no") {
                // Set some content to print
                $html1 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $html1, 0, 1, 0, true, '', true);
            } else if ($evsc_type == "Likert Scale" || $evsc_type == "Number") {

                if ($evsc_number_of_choices == 1) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td colspan="9" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                } if ($evsc_number_of_choices == 2) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td colspan="8" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 3) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td colspan="7" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 4) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="width:64px;font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="width:64px;font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="width:64px;font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="width:64px;font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td colspan="6" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 5) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td>
    <td colspan="5" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 6) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td> 
    <td style="font-size:10px;" class="tg-saqj" >' . $ep6_descr . '</td>
    <td colspan="4" class="tg-saqj" ></td> 
    </tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 7) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td> 
    <td style="font-size:10px;" class="tg-saqj" >' . $ep6_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep7_descr . '</td>
    <td colspan="3" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 8) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td> 
    <td style="font-size:10px;" class="tg-saqj" >' . $ep6_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep7_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep8_descr . '</td>
    <td colspan="2" class="tg-saqj" ></td>    
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 9) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td> 
    <td style="font-size:10px;" class="tg-saqj" >' . $ep6_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep7_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep8_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep9_descr . '</td>
    <td colspan="1" class="tg-saqj" ></td>   
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }  if ($evsc_number_of_choices == 10) {
                    // Set some content to print
                    $html2 = '<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#999;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#444;background-color:#F7FDFA;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#999;color:#fff;background-color:#26ADE4;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-58iv{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;;text-align:center}
.tg .tg-pnx7{background-color:#D2E4FC;font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
.tg .tg-saqj{font-size:18px;font-family:Arial, Helvetica, sans-serif !important;}
</style>

<table class="tg">

 
<tr>
    <td colspan="10" class="tg-saqj"><h3>' . $metric_name . '</h3></td>
</tr>
<tr>
    <td colspan="10" class="tg-saqj" >Evaluation Scale: (' . $evsc_name . ') </td>
</tr>
<tr>
<tr>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep1_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep2_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep3_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep4_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep5_descr . '</td> 
    <td style="font-size:10px;" class="tg-saqj" >' . $ep6_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep7_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep8_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep9_descr . '</td>
    <td style="font-size:10px;" class="tg-saqj" >' . $ep10_descr . '</td>
</tr>
<tr><td colspan="10" ><br><br><br><br></td></tr>
</table>
        ';

// Print text using writeHTMLCell()
                    //$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);
                    $pdf->writeHTML($html2, true, false, true, false, '');
                }
            }
        endforeach;
    endif;
endif;





// ---------------------------------------------------------
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Projects_' . $today . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
