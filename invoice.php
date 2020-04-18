<?php

//call the FPDF library 

require('fpdf/fpdf.php');

//A4width: 219 mm
//default margin : 10mm each side
//writable horizantal : 219-(10*2)=199mm


//create a pdf object

$pdf = new FPDF('P','mm','A4');


//add new page

$pdf->AddPage();

//$pdf->SetFillColor(123,255,234);
$pdf->SetFont('Arial','B',16);

$pdf->Cell(80,10,'ALPHA',0,0,'');

$pdf->SetFont('Arial','B',13);
$pdf->Cell(112,10,'INVOICE',0,1,'C');


$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Address : Huntington Avenue,Boston - USA',0,0,'');


$pdf->SetFont('Arial','',10);
$pdf->Cell(112,5,'Invoice : #12345',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'Phone Number : 857-294-5019',0,0,'');


$pdf->SetFont('Arial','',10);
$pdf->Cell(112,5,'Date: 12-28-2020',0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->Cell(80,5,'E-mail Adress : charan@alpha.com',0,1,'');
$pdf->Cell(80,5,'Website : www.alpha.com',0,1,'');

//Line(x1,y1,x2,y2);

$pdf->Line(5,45,205,45);
$pdf->Line(5,46,205,46);

$pdf->Ln(10);//Line break 

$pdf->SetFont('Arial','BI',12);
$pdf->Cell(20,10,'Bill To :',0,0,'C');

$pdf->SetFont('Courier','BI',14);
$pdf->Cell(50,10,'Manny',0,1,'C');

$pdf->Cell(50,5,'',0,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'PRODUCT',1,0,'C',true);
$pdf->Cell(20,8,'QTY',1,0,'C',true);
$pdf->Cell(30,8,'PRICE',1,0,'C',true);
$pdf->Cell(40,8,'TOTAL',1,1,'C',true);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(100,8,'Iphone',1,0,'L');
$pdf->Cell(20,8,'1',1,0,'C');
$pdf->Cell(30,8,'800',1,0,'C');
$pdf->Cell(40,8,'800',1,1,'C');

$pdf->SetFont('Arial','B',12);

$pdf->Cell(100,8,'Redmi',1,0,'L');
$pdf->Cell(20,8,'1',1,0,'C');
$pdf->Cell(30,8,'600',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,255,208);
$pdf->Cell(100,8,'Hard Disk',1,0,'L');
$pdf->Cell(20,8,'2',1,0,'C');
$pdf->Cell(30,8,'300',1,0,'C');
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Subtotal',1,0,'C',true);
$pdf->Cell(40,8,'600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Tax',1,0,'C',true);
$pdf->Cell(40,8,'60',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Discount',1,0,'C',true);
$pdf->Cell(40,8,'30',1,1,'C');

$pdf->SetFont('Arial','B',14);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'GrandTotal',1,0,'C',true);
$pdf->Cell(40,8,'$'.'6600',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Paid',1,0,'C',true);
$pdf->Cell(40,8,'30',1,1,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Due',1,0,'C',true);
$pdf->Cell(40,8,'400',1,1,'C');


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(208,208,208);
$pdf->Cell(100,8,'',0,0,'L');
$pdf->Cell(20,8,'',0,0,'C');
$pdf->Cell(30,8,'Payment Type',1,0,'C',true);
$pdf->Cell(40,8,'Cash',1,1,'C');

$pdf->Cell(50,5,'',0,1,'');

$pdf->SetFont('Arial','B',12);
$pdf->Cell(32,10,'Important Notice : ',0,0,'',true);

$pdf->SetFont('Arial','',7);
$pdf->Cell(148,10,' invoice Mandatory for refund . Refund validity : within  2 days of purchase. ',0,0,'');


//output the result

$pdf->Output();







?>