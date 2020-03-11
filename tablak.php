<!DOCTYPE html>
<html>
<head>
<title>Táblák</title>
</head>
<body>

<h1>Táblák létrehozása</h1>
<p>Adatbázis bejelentkezés</p>

<form  method="POST">
    Felhasználó:<br>
    <input type="text" name="username"><br>
    Jelszó:<br>
    <input type="password" name="psw">
    <br><br>
    <input type="hidden" name="action" value="tabla_letrehozas">
    <input type="submit" value="Indítás">
</form>

<?php 


if(isset($_POST["action"]) and $_POST["action"]=="tabla_letrehozas"){
	if (isset($_POST["username"]) and 
		!empty($_POST["username"]) and 
		isset($_POST["psw"]) and 
		!empty($_POST["psw"])   		
		){
		$servername = "localhost";
		$username = $_POST['username'];
		$password = $_POST['psw'];

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
			die("Kapcsolódási hiba: " . mysqli_connect_error());
		}
		$sql = "CREATE DATABASE login_db character set UTF8 collate utf8_general_ci";
					
		if(mysqli_query($conn, $sql)){
			echo "Adatbázis létrehova!<br /><br />";
		} else {
			echo "Sikertelen adatfelvétel!<br /><br />";
		}

		mysqli_close($conn);	
        } 
        

        $dbname = "login_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE users (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            password TEXT NOT NULL,
            validation_code TEXT NOT NULL,
            active TINYINT(4)  NULL,
            email VARCHAR(255)  
            )";

        if ($conn->query($sql) === TRUE) {
            echo "Users tábla létrehozva!";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();


		
		


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE kategoria (
            kat_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            kategoria VARCHAR(20) NOT NULL  
            )";

        if ($conn->query($sql) === TRUE) {
            echo "</br>kategória tábla létrehozva!";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();		
		
		
		
		
		// előnézet
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE elonezet (
            kep VARCHAR(40) NOT NULL  
            )";

        if ($conn->query($sql) === TRUE) {
            echo "</br>Előnézet tábla létrehozva!";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
		
		
		
		


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE termek (
            termek_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			termek_kategoria TINYINT(4),
            termek_nev VARCHAR(128) NOT NULL,
            termek_gyarto VARCHAR(128) NOT NULL,
            termek_kep VARCHAR(128) NOT NULL,
            termek_ar INT(11) NOT NULL,
            termek_hely VARCHAR(128) NOT NULL,
            termek_hirdeto VARCHAR(128) NOT NULL,
            termek_datum DATE,
			termek_comment VARCHAR(600) NOT NULL
            )";

        if ($conn->query($sql) === TRUE) {
            echo "</br>Termek tábla létrehozva!";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();




        

        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO users (id, first_name, last_name, username, password, validation_code, active, email)
        VALUES (10, 'Zsolt', 'Farkas', 'DooZeeR', '6ff406e1d6dc8f158f0989526b8811f3', '5c6cdafa71d46ce9e631b2db63d193d0', 1, 'dozer@gmail.com')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>DooZeeR felhasználó feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
		
		
		
				// elonezet feltöltés
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO elonezet (kep)
        VALUES ('img_placeholder.jpg')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>img_placeholder.jpg  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
		


        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (1, 'Bot')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>1 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (2, 'Orso')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>2 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (3, 'Lada')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>3 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (4, 'Szek')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>4 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (5, 'Alvany')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>5 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (6, 'Sátor')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>6 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (7, 'Taska')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>7 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (8, 'Csonak')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>8 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
		
		        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO kategoria (kat_id, kategoria)
        VALUES (9, 'Egyeb')";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>9 kategória feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		



        $dbname = "login_db";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (1, 1, 'CARP FIGHTER FEEDER LCS 4000', 'Shimano', 'orso1.jpg', 12400, 'Szigetújfalu', 'DooZeeR', '2020-02-02',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
            if (mysqli_query($conn, $sql)) {
                echo "</br>Termék 1  feltöltve!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (2, 2, 'CARP FIGHTER FEEDER LCS 2000', 'Shimano', 'akcio1.jpg', 11000, 'Tököl', 'DooZeeR', '2020-02-01',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
            if (mysqli_query($conn, $sql)) {
                echo "</br>Termék 2  feltöltve!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (3, 3, 'CARP FIGHTER FEEDER LCS 1000', 'Shimano', 'orso2.jpg', 10000, 'Ráckeve', 'DooZeeR', '2020-02-04',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
            if (mysqli_query($conn, $sql)) {
                echo "</br>Termék 3  feltöltve!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (4, 4, 'CARP FIGHTER FEEDER LCS 5000', 'Shimano', 'orso3.jpg', 13500, 'Budapest', 'DooZeeR', '2020-02-05',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 4  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        

        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (5, 5, 'CARP FIGHTER FEEDER  500', 'Shimano', 'orso4.jpg', 14500, 'Budapest', 'DooZeeR', '2020-02-01',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 5  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (6, 6, 'CARP FIGHTER FEEDER  550', 'Shimano', 'orso5.jpg', 12000, 'Budapest', 'DooZeeR', '2020-02-03',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 6  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }        
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (7, 7, 'CARP FEEDER LCS 500', 'Shimano', 'orso6.jpg', 14500, 'Budapest', 'DooZeeR', '2020-02-06',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 7  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (8, 8, 'CARP FIGHTER FEEDER  1500', 'Shimano', 'akcio2.jpg', 17500, 'Budapest', 'DooZeeR', '2020-02-01',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 8  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_set_charset($conn, 'utf8');
        $sql = "INSERT INTO termek (termek_id, termek_kategoria, termek_nev, termek_gyarto, termek_kep, termek_ar, termek_hely, termek_hirdeto, termek_datum, termek_comment)
        VALUES (9, 9, 'CARP FIGHTER FEEDER  4500', 'Shimano', 'orso1.jpg', 11500, 'Budapest', 'DooZeeR', '2020-02-03',
		'A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak. A Lorem Ipsum az 1500-as évek 
		óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította a betûkészletét és egy 
		példa-könyvet vagy szöveget nyomott papírra, ezt használta. Nem csak 5 évszázadot élt túl, de az elektronikus 
		betûkészleteknél is változatlanul megmaradt. Az 1960-as években népszerûsítették a Lorem Ipsum részleteket
		magukbafoglaló Letraset lapokkal, és legutóbb softwarekkel mint például az Aldus Pagemaker.' )";
        
        if (mysqli_query($conn, $sql)) {
            echo "</br>Termék 9  feltöltve!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }



        

        
        mysqli_close($conn);


















}











?>
</body>
</html>