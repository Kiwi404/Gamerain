<?php
require_once(__DIR__.'/gameModel.php');
require_once(__DIR__.'/stockModel.php');
require_once(__DIR__.'/userModel.php');
require_once(__DIR__.'/orderModel.php');

class modelInterface{

    private $gm;
    private $sm;
    private $um;
    private $om;
    
    public function __construct(){
        $this->gm = new gameModel();
        $this->sm = new stockModel();
        $this->um = new userModel();
        $this->om = new orderModel();
    }
    public function getFrontGameData(){
        
        return $this->gm->getGameDataSmall();
    }
    
    public function getFullGameData($id){
        //$gm = new gameModel();
        return $this->gm->getGameDataBig($id);
    }
    
    public function getCardGameData($id){
        //$gm = new gameModel();
        return $this->gm->getGameDataTiny($id);
    }
    
    public function getBuyGameData($id){
       // $gm = new gameModel();
        return $this->gm->getGameDataTiny($id);
    }
    
    public function getStock($id){
        return $this->sm->getVirtualStock($id);
    }
           
    public function tryCardNumber($num){
        return $this->um->tryCardNumber($num);   
    }
    
    public function addOrder($id,$data){
        $orderID = $this->om->addOrder($id,$data['discount']);
        $order_row_array = array("key" => "value");
        for($i = 0;$i<count($data)-2;$i++){
            //$this->om->addOrderRow($orderID,$data['game'.$i]);
            if(!isset($order_row_array[$data['game'.$i]])){
                $order_row_array[$data['game'.$i]] = 1;
            }else{
                $order_row_array[$data['game'.$i]] = $order_row_array[$data['game'.$i]]+1;
            }
        }
        var_dump($order_row_array);
        foreach ($order_row_array as $key => $value){
            $this->om->addOrderRow($orderID,$key,$value);
        }
        
        return $orderID;
        
    }
    
    public function addUser($data){
       $num = $this->um->addUser($data);

        return $num;
    }
    
    public function removeOrder($id){
        $this->sm->setRealStock($id);
        return $this->om->removeOrder($id);
    }
    
    public function getUserData($num){
        return $this->um->getUserByNumber($num);
    }
    
    public function sellVirGame($id){
        $this->sm->minVirtualStock($id);
    }
    
    public function getGameDataFromOrderId($id){
        $gameIds = $this->om->getGameIds($id);
        $dataArray = [];
        for($i = 0;$i<count($gameIds);$i++){
            $gameData = $this->gm->getGameDataTiny($gameIds[$i]);
            $date = DateTime::createFromFormat("Y-m-d", $gameData['date']);
            $current_time = date('Y-m-d H:i:s');
            if($current_time > $date->format('Y-m-d H:i:s')){
                array_push($dataArray,$gameData);
            }
            
        }
        return $dataArray;
    }
    
    public function getGameAmountFromOrderId($id){
        $gameIdamount = $this->om->getgameIDamount($id);

        return $gameIdamount;
    }
    
    public function getOrderDone($id){
        return $this->om->orderDone($id);
    }
    
    public function getAllOrderData(){
        return $this->om->getAllOrder();  
        
    }
    
    public function getAllStockData(){
        return $this->sm->getAllStock();   
    }
       
    public function getUserById($id){
        return $this->um->getUserById($id);
    }
}
?>