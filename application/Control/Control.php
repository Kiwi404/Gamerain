<?php
session_start();
require_once(__DIR__.'/../View/View.php');
require_once(__DIR__.'/../Model/modelInterface.php');
require_once(__DIR__.'/../FPDF/fpdf.php');
require_once(__DIR__.'/eMail.php');
class control{
    
    private $v;
    private $m;
    private $mc;
    
    public function __construct(){
        $this->v = new view();
        $this->m = new modelInterface();
        $this->mc = new emailControl();
    }
    
    public function loadFrontGames(){
        $frontGameData = $this->m->getFrontGameData();
        $this->v->echoFrontGameData($frontGameData);
    }
    
    public function loadFullGame($id){
        $stock = $this->m->getStock($id);
        $fullGameData = $this->m->getFullGameData($id);
        $fullGameData['screenshotUrls'] = explode('+',$fullGameData['screenshotUrls']);
        //var_dump($fullGameData);
        $this->v->echoFullGame($fullGameData,$stock);
    }
    
    public function testCardNumber($number){
        echo $this->m->tryCardNumber($number);
    }
        
    public function addItemToCard($id){
        if(isset($_SESSION["card"])){
            
            $a = $_SESSION["card"];
            
            if(isset($a[$id])){
                $a[$id]++;
            }else{
                $a[$id] = 1;
            }
            $_SESSION["card"] = $a;
            
        }else{
            
            $array = array();
            $array[$id] = 1;
            $_SESSION["card"] = $array;
            
        }

    }
    
    public function loadCard(){
        $totalCost = 0;
        if(isset($_SESSION["card"])){
            foreach ($_SESSION["card"] as $key => $value)
            {
                $data = $this->m->getCardGameData($key);
                $this->v->echoCardRow($data,$value);
                $totalCost += ($data['price']*$value);

            }
            if(count($_SESSION["card"])>0){
                $this->v->echoCardSum($totalCost);
            }else{
                $this->v->echoCardNull();
            }
        }else{
            $this->v->echoCardNull();
        }
    }
    
    public function loadBuyOverview(){
        $totalCost = 0;
        foreach ($_SESSION["card"] as $key => $value)
        {
            $data = $this->m->getBuyGameData($key);
            $this->v->echoBuyRow($data,$value);
            $totalCost += ($data['price']*$value);

        }
    }
    
    public function getCardTotalAmount(){
        $totalCost = 0;
        foreach ($_SESSION["card"] as $key => $value)
        {
            $data = $this->m->getBuyGameData($key);
            $totalCost += ($data['price']*$value);
        }
        return $totalCost;
    }
    
    public function getCardTotalAmountDiscount(){
        $totalCost = 0;
        foreach ($_SESSION["card"] as $key => $value)
        {
            $data = $this->m->getBuyGameData($key);
            $totalCost += ($data['price']*$value);
        }
        return $totalCost;
    }
    
    public function loadProductsInForm(){
        $game = 0;
        foreach ($_SESSION["card"] as $key => $value)
        {
            for($i = 0;$i<$value;$i++){
                echo'<input type="hidden" name="game'.$game.'" value="'.$key .'"/>';
                $game++;
            }
        }
    }
    
    public function getCardAmount(){
        if(isset($_SESSION["card"])){
            if(count($_SESSION["card"])>0){
                $this->v->echoCardCounter();

            }
        }
    }  
    
    public function tryAdminLogin($data){
        if($data['username'] == 'admin' && $data['password'] == 'root'){
            $_SESSION['admin_logged_in'] = true;   
        }
        if($data['username'] == 'medewerker' && $data['password'] == 'root'){
            $_SESSION['mede_logged_in'] = true;   
        }
    }
    
    public function mailOrder($code){
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hello World!');
        $pdf->Output('test.pdf', 'S');
        $msg = " Code : ".($code+100000);
        $msg = wordwrap($msg,70);
        mail("someone@example.com","Uw Bestelling",$msg);   
    }
    
    public function addOrder($data){
        $userData = $this->m->getUserData($data['cardNum']);
        $orderID = $this->m->addOrder($userData['ID'],$data);
        $order_row_array = array("key" => "value");
        $gameData = [];
        for($i = 0;$i<count($data)-2;$i++){
            $game = $this->m->getCardGameData($data['game'.$i]);
            $date = DateTime::createFromFormat("Y-m-d", $game['date']);
            $current_time = date('Y-m-d H:i:s');
            var_dump($date);
            var_dump($current_time);
               
            
            if ($current_time < $date->format('Y-m-d H:i:s')) {
                echo'<h1>Dit spel is een preorder</h1>';
            }else{
                array_push($gameData,$game);

            }
            
            $this->m->sellVirGame($data['game'.$i]);
        }

        $this->mc->mailOrder($userData,$gameData,$orderID);
    }
    
    public function removeOrder($id){

            echo '<script type="application/javascript">
           window.location.replace("mag_view.php?id='.$id.'");
           window.location.href = "mag_view.php?id='.$id.'";
        </script>';
        }
            
    public function loadMagProducts($id){
        $set = false;
        if($this->m->getOrderDone($id)){
            echo '<h3>Deze bestelling is al afgehaald</h3>';
            $set = true;
        }else{
            $gameData = $this->m->getGameDataFromOrderId($id);
            $amountData= $this->m->getGameAmountFromOrderId($id);
            if(count($gameData)>0){
                $set = true;
            }
            $this->v->echoMagGame($gameData,$amountData);
            $this->m->removeOrder($id);
            
        }
        
        if($set == false){
            echo '<h3>Deze bestelling bestaat niet</h3>';
        }
    }
    
    public function addUser($data){
        $num =  $this->m->addUser($data);
      
        return $num;
    }
    
    public function loadOrderOverView(){
        $orderData = $this->m->getAllOrderData();
        
        if ($orderData->num_rows > 0) {
            while($row = $orderData->fetch_assoc()) {
                
                $this->v->echoOrderRow($row,$this->m->getUserById($row['user_id']),$this->m->getGameDataFromOrderId($row['ID']));
            }
        }
    }
    
    public function loadStockOverView(){
        $stockData = $this->m->getAllStockData();

        if ($stockData->num_rows > 0) {
            while($row = $stockData->fetch_assoc()) {
                $this->v->echoStockRow($row,$this->m->getCardGameData($row['game_id']));
               
            }
        }
    }
    


}
?>