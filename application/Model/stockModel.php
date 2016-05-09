<?php
class stockModel{
    
    public function minVirtualStock($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE stock SET virtual_stock=virtual_stock-1 WHERE game_id =".$id;
        $conn->query($sql);

    }
    
    public function getVirtualStock($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT virtual_stock FROM stock WHERE game_id =".$id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }   
    }
    
    public function setRealStock($id){
                $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE stock SET real_stock=virtual_stock";
        $conn->query($sql);
        
    }
    
        public function getAllStock(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM stock";
        $result = $conn->query($sql);
 
                            return $result;
    }
}
?>