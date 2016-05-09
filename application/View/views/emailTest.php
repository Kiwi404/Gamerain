<?php
include '../../Control/Control.php';
$c = new control();
// fpdf object
$pdf = new FPDF();
// generate a simple PDF (for more info, see http://fpdf.org/en/tutorial/)


$pdf->AddPage();
$pdf->SetFont("Arial","B",14);
$pdf->Cell(40,10, "this is a pdf example");


// email stuff (change data below)
$to = "target@domain.com"; 
$from = "me@domain.com"; 
$subject = "send email with pdf attachment"; 
$messageEmail = "<b>get rekt nubs</b>";
$message = '';
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
// attachment name
$filename = "gamerain_aankoop.pdf";
// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
echo $attachment;
// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 8bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;
// message
$message .= "--".$separator.$eol;
$message .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$message .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$message .= $messageEmail.$eol.$eol;
// attachment
$message .= "--".$separator.$eol;
$message .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$message .= "Content-Transfer-Encoding: base64".$eol;
$message .= "Content-Disposition: attachment".$eol.$eol;
$message .= $attachment.$eol.$eol;
$message .= "--".$separator."--";
// send message
mail($to, $subject, $message, $headers);
?>