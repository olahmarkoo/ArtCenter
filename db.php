<?php
    include "productData.php";
    include "productsData.php";
    include "userData.php";

    $dataB = new dataBase("artcenter");

    if(isset($_POST["function"]))
    {
        if($_POST["function"]=="products")
        {
            if ($_POST["order"]=="abc") {
                echo $dataB->SelectABC();
            }
            if ($_POST["order"]=="desc") {
                echo $dataB->SelectDESC();
            }
            if ($_POST["order"]=="asc") {
                echo $dataB->SelectASC();
            }
        }
        if ($_POST["function"]=="product") {
            echo $dataB->SelectProduct();
        }
        if ($_POST["function"]=="login") {
            echo $dataB->SelectLogin();
        }
        if ($_POST["function"]=="insertAppointment") {
            echo $dataB->InsertAppointment();
        }
        if ($_POST["function"]=="signin") {
            echo $dataB->InsertUser();
        }
        if ($_POST["function"]=="dataModify") {
            echo $dataB->dataModify();
        }
        if ($_POST["function"]=="variantsDelete") {
            echo $dataB->variantsDelete();
        }
        if ($_POST["function"]=="variantsInsert") {
            echo $dataB->variantsInsert();
        }
        if ($_POST["function"]=="orderSave") {
            echo $dataB->orderSave();
        }
        if ($_POST["function"]=="variantsToOrder") {
            echo $dataB->variantsToOrder();
        }
        if ($_POST["function"]=="passwordToEmail") {
            echo $dataB->passwordToEmail();
        }
    }

    class dataBase {
        private $name;

        function __construct($name)
        {
            $this->name=$name;
        }

        function GetDbName()
        {
            return $this->name;
        }

        function DbConnectOpen()
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = $this->GetDbName();
    
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }
        function DbConnectClose($conn)
        {
            $conn->close();
        }
    
    
        function SelectABC()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "SELECT termekek.termekId,termekek.termekKep,termekek.alapAr,termekek.tipus FROM termekek ORDER BY termekek.nev;";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re[]=new productsData($row[0],$row[1],$row[2],$row[3]);
                }
            }
            $this->DbConnectClose($conn);
            return json_encode($re);
        }
        function SelectASC()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "SELECT termekek.termekId,termekek.termekKep,termekek.alapAr,termekek.tipus FROM termekek ORDER BY termekek.alapAr ASC;";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re[]=new productsData($row[0],$row[1],$row[2],$row[3]);
                }
            }
            $this->DbConnectClose($conn);
            return json_encode($re);
        }
        function SelectDESC()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "SELECT termekek.termekId,termekek.termekKep,termekek.alapAr,termekek.tipus FROM termekek ORDER BY termekek.alapAr DESC;";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re[]=new productsData($row[0],$row[1],$row[2],$row[3]);
                }
            }
            $this->DbConnectClose($conn);
            return json_encode($re);
        }
    
    
        function SelectProduct()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "SELECT termekek.termekId,termekek.nev,termekek.termekKep,termekek.alapAr,termekek.leiras FROM termekek WHERE termekek.termekId LIKE '".$_POST['id']."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re[]=new productData($row[0],$row[1],$row[2],$row[3],$row[4]);
                }
            }
            $this->DbConnectClose($conn);
            return json_encode($re);
        }
    
    
        function SelectLogin()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "SELECT felhasznalok.felhasznaloId,felhasznalok.email,felhasznalok.jelszo,felhasznalok.teljesNev,felhasznalok.telefon,felhasznalok.cim FROM felhasznalok WHERE felhasznalok.email LIKE '".$_POST["email"]."' AND felhasznalok.jelszo LIKE '".$_POST["pass"]."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re[]=new userData($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
                }
                return json_encode($re);
            }
            else {
                return "Nincs ilyen felhasználó!";
            }
            $this->DbConnectClose($conn);
        }
    
    
        function InsertAppointment()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
            $sql = "INSERT INTO `idopont`(`teljesNev`, `email`, `telefon`, `datum`, `ido`) VALUES ('".$_POST["nev"]."','".$_POST["email"]."','".$_POST["telefon"]."','".$_POST["datum"]."','".$_POST["idopont"]."')";
            
            if ($conn->query($sql) === TRUE) {
              return "Sikeres foglalás!";
            } else {
              return "Sikertelen foglalás!";
            }
            $this->DbConnectClose($conn);
        }
    
    
        function InsertUser()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
    
            $sql = "SELECT * FROM felhasznalok WHERE felhasznalok.email LIKE '".$_POST["email"]."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                return "Már létezik ilyen felhasználó";
            }
            else {
                $sql = "INSERT INTO `felhasznalok`(`email`, `jelszo`, `teljesNev`, `telefon`, `cim`) VALUES ('".$_POST["email"]."','".$_POST["pass1"]."','".$_POST["name"]."',".$_POST["phone"].",'".$_POST["adress"]."');";
            
                if ($conn->query($sql) === TRUE) {
                  return "Sikeres regisztáció!";
                } else {
                  return "Sikertelen regisztráció!";
                }
            }
    
            $this->DbConnectClose($conn);
        }
    
    
        function dataModify()
        {
            $re=[];
            $conn=$this->DbConnectOpen();
    
            $sql = "SELECT * FROM felhasznalok WHERE felhasznalok.felhasznaloId NOT LIKE '".$_POST["idMod"]."' AND felhasznalok.email LIKE '".$_POST["emailMod"]."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                return "Az email már foglalt";
            }
            else {
                $sql = "UPDATE `felhasznalok` SET felhasznalok.email='".$_POST["emailMod"]."',felhasznalok.jelszo='".$_POST["pass1Mod"]."',felhasznalok.teljesNev='".$_POST["nameMod"]."',felhasznalok.telefon=".$_POST["phoneMod"].",felhasznalok.cim='".$_POST["adressMod"]."' WHERE felhasznalok.felhasznaloId LIKE ".$_POST["idMod"].";";
           
                if ($conn->query($sql) === TRUE) {
                    return "Sikeres módosítás!";
                  } else {
                    return "Sikertelen módosítás!";
                  }
            }
    
            $this->DbConnectClose($conn);
        }
    
    
        function variantsDelete()
        {
            $conn=$this->DbConnectOpen();
    
            $sql = "TRUNCATE TABLE termekVariansok;";
            $conn->query($sql);
    
            return "OK";
    
            $this->DbConnectClose($conn);
        }
        function variantsInsert()
        {
            $re = "";
            $conn=$this->DbConnectOpen();
    
            $sizes = $_POST["productSizes"];
            $materials = $_POST["productMaterials"];
    
            foreach( $sizes as $size ) {
                foreach( $materials as $material ) {
                    $sql = "INSERT INTO `termekVariansok`(`termekId`, `meret`, `anyag`) VALUES ('".$_POST["productId"]."','".$size."','".$material."')";
                
                    if ($conn->query($sql) === TRUE) {
                      $re .= "Sikeres ";
                    } else {
                      $re .= "Sikertelen ";
                    }
                }
            }
            return $re;
    
            $this->DbConnectClose($conn);
        }
    
    
        function orderSave()
        {
            $re= "";
            $conn=$this->DbConnectOpen();
            $sql = "INSERT INTO `rendelesek`(`nev`, `email`, `telefon`, `cim`, `fizetesMod`, `fizetendo`, `datum`, `teljesitve`) VALUES ('".$_POST["nev"]."','".$_POST["email"]."',".$_POST["telefon"].",'".$_POST["cim"]."','".$_POST["fizetes"]."',".$_POST["fizetendo"].",'".$_POST["datum"]."',0)";
            
            if ($conn->query($sql) === TRUE) {
                $re .= "Sikeres rendelés!";
              } else {
                $re .= "Sikertelen rendelés!";
              }
    
              return $re;
    
              $this->DbConnectClose($conn);
        }
    
        function variantsToOrder()
        {
            $orderId = -1;
            $conn=$this->DbConnectOpen();
    
            $sql = "SELECT rendelesId FROM `rendelesek` WHERE email LIKE '".$_POST["email"]."' AND datum LIKE '".$_POST["datum"]."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $orderId = $row[0];
                }
            }
    
            $ids = $_POST["productsIds"];
            $datas = $_POST["productsDatas"];
            $re = TRUE;
            $j = 0;
    
            foreach( $ids as $id ) {
                $dataRow = explode(", ",$datas[$j]);
                $sql = "INSERT INTO `termekrendelt`(`rendelesId`, `termekId`) VALUES (".$orderId.",(SELECT termekVariansId from termekVariansok WHERE termekId LIKE ".$id." AND meret LIKE '".$dataRow[1]."' AND anyag LIKE '".$dataRow[2]."'));";
                $j++;
                if ($conn->query($sql) !== TRUE) {
                  $re = FALSE;
                }
            }
            if ($re) {
                return $orderId;
              } else {
                return "Sikertelen összefűzés!";
              }
    
              $this->DbConnectClose($conn);
        }
    
        
        function passwordToEmail()
        {
            $re="";
            $conn=$this->DbConnectOpen();
            $sql = "SELECT felhasznalok.jelszo FROM felhasznalok WHERE felhasznalok.email LIKE '".$_POST["requestedEmail"]."';";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_array()) {
                    $re= $row[0];
                }
            }
            else {
                $re = "Sikertelen email küldés!";
            }
            $this->DbConnectClose($conn);
            return $re;
        }
    }
?>