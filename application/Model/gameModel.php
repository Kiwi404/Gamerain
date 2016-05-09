<?php
class gameModel{
    
    public function getGameDataSmall(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, coverUrl, name, genre,platform, date,price FROM games";
        $result = $conn->query($sql);
        return $result;   
    }
    
    public function getGameDataBig($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM games WHERE id =".$id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }   
    }
    
    public function getGameDataTiny($id){
 $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamerain";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            //die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, name,price,coverUrl,date FROM games WHERE id =".$id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }
    }
}


?>