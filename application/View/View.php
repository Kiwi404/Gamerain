<?php
class view{
    public function echoFrontGameData($data){
            if ($data->num_rows > 0) {
                while($row = $data->fetch_assoc()) {
                    //var_dump($row);
                    
                    echo "<div class='game-item' onClick='window.location.href = ".'"product.php?id='.$row['id'].'";'."'>
                        <div class='game'>
                            <div class='game-front' style='background-image:url(".'"'.$row['coverUrl'].'")'."'></div>
                            <div class='game-back'>
                                <div class='game-name'>".$row['name']."</div>
                                <div class='price'>&euro; ".$row['price'].",-</div>
                                &nbsp;
                                <div class='genre'>".$row['genre']."</div>
                                &nbsp; 
                                <div class='platform'>".$row['platform']."</div>
                            </div>
                        </div>
                    </div>";
                }
            }
           
    }
    
    public function echoFullGame($data,$stock){
          // var_dump($data);
            $button_label = 'In winkelwagen';
            $date = DateTime::createFromFormat("Y-m-d", $data['date']);
            $current_time = date('Y-m-d H:i:s');
            if ($current_time < $date->format('Y-m-d H:i:s')) {
                $button_label = 'Pre-order';
            }
        
            if($stock['virtual_stock'] < 1){
                $buybutton = "<a><div id='buy-button'>";
                $button_label = 'Uitverkocht';
                
            }else{
                $buybutton = "<a href='?id=".$data['ID']."&add=true'><div id='buy-button'>";
            }
    echo " <h1>".$data['name']."</h1>
                <div id='cover' style='background-image:url(".$data['coverUrl'].")'><div id='price-label'>&euro;".$data['price'].",-</div>".$buybutton.$button_label."</div></a>Vooraad : ".$stock['virtual_stock']."</div>
                
                <div id='summary'>
                    <h3>Over het spel</h3>
                    <b>Release date : ".$data['date']."</b>
                    <p>
                    ".$data['description']."
                        </p>
                </div>
                    <br>
                    <h1>Screenshots & Trailer</h1>
                    <div id='media-holder'>
                        <a href='".$data['screenshotUrls'][0]."'><div class='media-item' style='background-image:url(".'"'.$data['screenshotUrls'][0].'"'.")'>&nbsp; </div></a>
                        <a href='".$data['screenshotUrls'][1]."'><div class='media-item' style='background-image:url(".'"'.$data['screenshotUrls'][1].'"'.")'>&nbsp; </div></a>
                        <a href='".$data['videoUrl']."'><div class='media-item'>Trailer</div></a>
                        
                    </div>";
    }
    
    public function echoCardRow($data,$amount){
        echo "<div class='card-row'><div class='name'>".$data['name']." </div>Aantal <a href='?sub=".$data['id']."'><div class='card-button'>-</div></a><div class='amount-card'> ".$amount."</div><a href='?add=".$data['id']."'><div class='card-button'>+</div></a><div class='price-card'> &euro;".$data['price']*$amount.",-</div><a href='?drop=".$data['id']."'><div class='remove-card'>x</div></a></div>";
    }
    
    public function echoCardSum($total){
        echo"<div class='card-row-total'><div class='name'>Totaal </div><div class='price-card'> &euro;".$total.",-</div></div></div><a href='buy.php'><div id='buy-button'>Betaal</div></a> <br><br><br><br>";
    }   
    
    public function echoCardNull(){
        echo'<b> Uw winkelwagentje is leeg </b><br><br>Voeg spellen toe via de home pagina'   ;
    }
    
    public function echoStock($data){
          echo $data['virtual_stock'];
    }
    
    public function echoCardCounter(){
        $c = 0;
        foreach ($_SESSION["card"] as $key => $value)
        {
                $c += $value;
        }
        echo '<div id="card-counter">'.$c.'</div>';   
    }
    
    public function echoBuyRow($data,$card){
        echo "
                        <div class='pay-overview-row' style='background-image:url(".$data['coverUrl'].")'>
                            <b>".$data['name']."</b> x ".$card."
                            <div class='pay-overview-row-price'>&euro;".$data['price']*$card.",-</div>
                        </div>
            ";
    }
    
    public function echoMagGame($data,$amountdata){
        for($i=0;$i<count($data);$i++){
             echo "                        
             <div class='mag_game'  style='background-image:url(../".$data[$i]['coverUrl'].")'>

                            <div class='mag_game_name'>".$data[$i]['name']."</div>
                        <div class='mag_game_place'>Plek : ".$data[$i]['id']." </div>
                        <div class='mag_game_place'>Aantal : ".$amountdata[$data[$i]['id']]." </div>
                        </div>";   
        }
    }
    
    public function echoOrderRow($orderData,$userData,$rows){

        $selecter = '';
        for($i = 0;$i < count($rows);$i++){
               $selecter =  $selecter.'<option value="">'.$rows[$i]['name'].'</option>';
        }

        echo'<table border="1">
              <tr>
                <th width="50">'.$orderData['ID'].'</th>
                <th width="300">'.$userData['name'].'</th>
                <th width="150">'.$orderData['discount'].' %</th>
                <th width="300"><select width="300" style="width: 300px">
                '.$selecter.'


</select></th>
              </tr>
            </table>';
    }
    
    public function echoStockRow($stockData,$gameData){

        echo'<table border="1">
              <tr>
                <th width="150">'.$stockData['id'].'</th>
                <th width="150">'.$stockData['stock'].'</th>
                <th width="150">'.$stockData['virtual_stock'].'</th>
                <th width="200">'.$gameData['name'].'</th>
              </tr>
            </table>';
    }
    
}
?>