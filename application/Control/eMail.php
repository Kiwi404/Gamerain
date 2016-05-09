<?php

require_once(__DIR__.'/../FPDF/fpdf.php');
require_once(__DIR__.'/../PHPMailer/PHPMailerAutoload.php');


class emailControl{
    
        public function __construct(){

        }
    
        public function mailOrder($userdata,$orderdata,$orderId){
            var_dump($userdata);
            
            var_dump($orderdata);
            
            var_dump($orderId);
            
            if(count($orderdata) > 0){

            $pdf = new FPDF();


            $total = 0;
            $pdf->AddPage();
            $pdf->SetFont("Arial","B",14);
            $pdf->Image('../../../public/img/logo_inv.png',10,6,30);
            $pdf->Cell(30);
            $pdf->Cell(40,10, "Jouw GameRain bestelling !");
            $pdf->SetFont("Arial","B",12);
            $pdf->Ln(20);
            $order_row_array = array();
            for($i = 0;$i<count($orderdata);$i++){
                if(!isset($order_row_array[$orderdata[$i]['name']])){
                    $order_row_array[$orderdata[$i]['name']] = 1;
                }else{
                    $order_row_array[$orderdata[$i]['name']] = $order_row_array[$orderdata[$i]['name']]+1;
                }

            }
            foreach ($order_row_array as $key => $value){
                $pdf->Ln(10);
                $pdf->Cell(110 ,10 , $key,'TB');
                $pdf->Cell(20 ,10 , 'x '.$value,'TB');
                 for($i = 0;$i<count($orderdata);$i++){
                     if($orderdata[$i]['name'] == $key){
                        $pdf->Cell(20 ,10 , $orderdata[$i]['price'].',-','TB');
                         $pdf->Cell(20 ,10 , $orderdata[$i]['price']*$value.',-','TB');
                        $total+=($orderdata[$i]['price']*$value);
                         break;
                     }
                 }
            }  
            
                
            $pdf->Ln(20);
            $pdf->Cell(150 ,10 , "Totaal prijs : ");
            $pdf->Cell(30,10,$total.',-');
            $pdf->Ln(20);
            $pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='.($orderId+100000),170,6,30,30,'PNG');
            
            $pdf->Output('temp.pdf', 'F');
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 2;
                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 465;
                $mail->Username = 'gamerainutrecht@gmail.com';
                $mail->Password = 'danknugs';

                $mail->From = 'gamerainutrecht@gmail.com';
                $mail->FromName = 'Gamerain';

                $mail->AddAddress($userdata['email']);
                $mail->Subject ='Uw gamerain bestelling';
                $mail->Body = "<b>Beste ".$userdata['name'].'</b><br><br>In de bijlage van deze email vind u een pdf, met deze kunt u uw spel ophalen in de winkel.<br>als u spellen heeft gekocht die nog niet uit zijn zal u een ophaal document van deze spellen krijgen zodra ze uit zijn.<br><br>GameRain';
                $mail->isHTML(true);
                $mail->AddAttachment("temp.pdf", "Bestelling.pdf");
                if(!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
            }else{
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->SMTPSecure = 'ssl';
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 2;
                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 465;
                $mail->Username = 'gamerainutrecht@gmail.com';
                $mail->Password = 'danknugs';

                $mail->From = 'gamerainutrecht@gmail.com';
                $mail->FromName = 'Gamerain';

                $mail->AddAddress($userdata['email']);
                $mail->Subject ='Uw gamerain bestelling';
                $mail->Body = "<b>Beste ".$userdata['name'].'</b><br><br>U krijgt uw een email met het ophaal document zodra de games uitgebracht zijn.<br><br>GameRain';
                $mail->isHTML(true);
                
                if(!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }
            }
    }
}
?>