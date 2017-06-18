<?php
include_once ('../../../vendor/autoload.php');
use App\Summary\Summary;

$obj= new Summary();
$allData=$obj->trashList();
//var_dump($allData);
$trs="";
$sl=0;

foreach($allData as $row) {
    $id =  $row->id;
    $name = $row->name;
    $organization = $row->organization;
    $summary =$row->summary;
    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='50'> $sl</td>";
    $trs .= "<td width='50'> $id </td>";
    $trs .= "<td width='250'> $name </td>";
    $trs .= "<td width='250'> $organization </td>";
    $trs .= "<td width='250'> $summary </td>";

    $trs .= "</tr>";
}

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Name</th>
                    <th align='left' >Organization</th>
                    <th align='left' >Summary</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;

//\App\Utility\Utility::dd($html);

// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('Summary - TrashList.pdf', 'D');