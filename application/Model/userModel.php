<?php
class userModel{
    
    public function tryCardNumber($num){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM user WHERE card_number =".$num;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
                return 'true';
                
            }
        }else{
            return 'false';
        }
    }
    
    public function getUserByNumber($num){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //
        }
        $sql = "SELECT * FROM user WHERE card_number =".$num;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
                return $row;
                
            }
        }else{
            return 'false';
        }
    }
    
    public function getUserById($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM user WHERE id =".$id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
                
                return $row;
                
            }
        }else{
            return 'false';
        }
    }
    
    public function addUser($data){
        //var_dump($data);
        
        $cardnum =   rand ( 200000 , 999999 );
        
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `gamerain`.`user` (`ID`, `card_number`, `name`, `phone`, `email`) VALUES (NULL, ".$cardnum .", '".$data['username']."', ".$data['tel'].", '".$data['email']."');";
        
        
        if ($conn->query($sql) === TRUE) {
            

        } else {

        }
        return $cardnum;
    }
    
}
?>