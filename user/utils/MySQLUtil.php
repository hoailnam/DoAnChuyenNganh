<?php

class MySQLUtil
{
    private $servername;
    private $username;
    private $password;
    private $myDB;
    private static $conn;
    public function __construct()
    {
        $this->servername="localhost";
        $this->username="root";
        $this->password="";
        $this->myDB="doan";   
        $this->connectDB();

    }
    public function __destruct()
    {
        $this->servername="";
        $this->username="";
        $this->password="";
        $this->myDB="";
        self::$conn == NULL;
    }

    public function connectDB()
    {
        try {
            self::$conn = new PDO("mysql:host=$this->servername;dbname=$this->myDB", $this->username, $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        } 
    }
    public function disConnectDB(){
      
        self::$conn==NULL;
    }


    public function insertData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
    }

    public function getAllData($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->rowCount();
    }
    public function updateData($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        return $stmt->rowCount();
    }
    
    //Product
   
    public function getDataPr($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $list = array();
        while ($pr = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($list, $pr);
        }
        return $list;
    }
    public function getType($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<a class="nav-item nav-link active" id="nav-home-tab"  href="shop.php?type_id=' . $row['type_id'] . '" role="tab" aria-controls="nav-home" aria-selected="false">' . $row['type_name'] . '</a>';
        }
    }
    public function getPage($query, $param = array())
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $tong = $stmt->fetchColumn();
        $sotrang = ceil($tong / 6);
        return $sotrang;
    }
    public function getPrDetails($query, $param = array())
    {   
        $stmt = self::$conn->prepare($query);
        $stmt->execute($param);
        $pr = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pr;
    }
    public function getAbout($query)
    {
        $stmt = self::$conn->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="about-details-cap mb-50">';
            echo '<h4>' . $row['about_id'] . '</h4>';
            echo '<p>' . $row['about_us'] . '</p>';
            echo '</div>';
        }
    }

}
