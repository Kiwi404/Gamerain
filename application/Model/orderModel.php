<?php
class orderModel{
    
    public function addOrder($id,$dis){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $conn->autocommit(FALSE);

        $sql = "INSERT INTO `gamerain`.`order` (`ID`, `user_id`, `discount`, `date`, `status`) VALUES (NULL, $id, $dis, CURDATE(), 'payed');";
        
        
        if ($conn->query($sql) === TRUE) {
            $lastId = $conn->insert_id;
            $conn->commit();
        } else {
            $conn->rollback();
        }
var_dump($lastId);
        return $lastId;
    }
    
    public function addOrderRow($id,$gameid,$amount){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO order_row VALUES (null,$id,$gameid,$amount)";
        $result = $conn->query($sql);
    }
    
    public function removeOrder($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE `gamerain`.`order` SET `status` = 'done' WHERE `order`.`ID` = ".$id;
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
             return false;
        }
    }
    
    public function getGameIds($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT game_id FROM order_row WHERE order_id =".$id;
        $idarray = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($idarray,$row['game_id']);
            }
        }   
        return $idarray;
    }
    
    public function getgameIDamount($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT game_id,amount FROM order_row WHERE order_id =".$id;
        $idarray = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $idarray[$row['game_id']] = $row['amount'];
            }
        }   
        return $idarray;
        
    }
    
    public function orderDone($id){
        $treturn = false;
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM `order`  WHERE id=".$id;

        $result = $conn->query($sql);
        

        if ( $result === FALSE ){
            
        }else if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['status'] == 'done'){
                    $treturn = true;
                }
            }
        }   
        return $treturn;
        
    }
    
    public function getAllOrder(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM `order`";

        $result = $conn->query($sql);
        
        return $result;
    }
    
}