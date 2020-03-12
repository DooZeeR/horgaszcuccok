<?php 

/*********************** Helper functions *********************/

function clean($string){
    return htmlentities($string);
}

function redirect($location){
    return header("Location: {$location}");
}

function set_message($message){
    if (!empty($message)) {
        $_SESSION['message'] = $message;
    }else{
        $message = "";
    }   
}

function display_message(){
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function token_generator(){
    $token = $_SESSION['token'] = md5(uniqid(mt_rand(),true));
    return $token;
}


function validation_errors($error_message){
    $error_message = 
                "<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Figyelem! </strong>  ". $error_message ."
                </div>";
                return $error_message;
}


function email_exist($email){

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = query($sql);
    if(row_count($result) == 1){
        return true;
    }else{
        return false;
    }
}

function username_exist($username){

    $sql = "SELECT id FROM users WHERE username = '$username'";
    $result = query($sql);
    if(row_count($result) == 1){
        return true;
    }else{
        return false;
    }
}

function send_email($email, $subject, $msg, $headers){

    return mail($email, $subject, $msg, $headers);
    
}




/*********************** Validation functions *********************/


function validate_user_registration(){

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $errors = [];
        $min = 3;
        $max = 40;

        $first_name         = clean($_POST['first_name']);
        $last_name          = clean($_POST['last_name']);
        $username           = clean($_POST['username']);
        $email              = clean($_POST['email']);
        $password           = clean($_POST['password']);
        $confirm_password   = clean($_POST['confirm_password']);

        



        if(strlen($first_name) < $min){
            $errors[] = " A keresztnév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($first_name) > $max){
            $errors[] = " A keresztnév nem lehet több {$max} betünél ! ";
        }
        if(empty($first_name)){
            $errors[] = " A keresztnév nem lehet üres ! ";
        }
        







        if(strlen($last_name) < $min){
            $errors[] = " A vezetéknév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($last_name) > $max){
            $errors[] = " A vezetéknév nem lehet több {$max} betünél ! ";
        }
        if(empty($last_name)){
            $errors[] = " A vezetéknév nem lehet üres ! ";
        }







        if(username_exist($username)){
            $errors[] = " Ez a felhasználónév már foglalt ! ";
        }
        if(strlen($username) < $min){
            $errors[] = " A felhasználónév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($username) > $max){
            $errors[] = " A felhasználónév nem lehet több {$max} betünél ! ";
        }
        if(empty($username)){
            $errors[] = " A felhasználónév nem lehet üres ! ";
        }
        





        if(email_exist($email)){
            $errors[] = " Ez az email cím már foglalt ! ";
        }
        if(strlen($email) < $min){
            $errors[] = " Az email cím nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($email) > 100){
            $errors[] = " Az email cím nem lehet több 100 betünél ! ";
        }
        if(empty($email)){
            $errors[] = " Az email cím nem lehet üres ! ";
        }






        if(strlen($password) < $min){
            $errors[] = " A Jelszó nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($password) > $max){
            $errors[] = " A Jelszó nem lehet több {$max} betünél ! ";
        }
        if(empty($password)){
            $errors[] = " A Jelszó nem lehet üres ! ";
        }
        if($password !== $confirm_password){
            $errors[] = " A két jelszó nem eggyezik ! ";
        }


        

        if(!empty($errors)){
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        }else{
            if(register_user($first_name , $last_name , $username , $email ,  $password)){
                set_message("<div class='alert alert-success alert-dismissible container-fluid szelesseg'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Figyelem! </strong>  Email-ben elküldtük az aktivációs linket! Kérlek ellenőrizd a spam foldert is!
                </div>");
                redirect("index.php");
            }else{
                set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Figyelem! </strong>  A regisztráció nem sikerült!
                </div>");
				redirect("index.php");

            }
        }
    }
}

/*********************** Register user functions *********************/

function register_user($first_name , $last_name , $username , $email ,  $password){

    $first_name         = escape($first_name);
    $last_name          = escape($last_name);
    $username           = escape($username);
    $email              = escape($email);
    $password           = escape($password);

    if(email_exist($email)){
        return false;
    }elseif(username_exist($username)){
        return false;
    }else{
        $password = md5($password);
        $validation_code = md5($username );
        $sql = "INSERT INTO users(first_name, last_name, username, email, password, validation_code, active)";
        $sql.= " VALUES('$first_name','$last_name','$username','$email','$password','$validation_code', 0)";
		mysqli_query($conn, "SET NAMES 'UTF8';");
        $result = query($sql);
        confirm($result);
        $subject = "Activate account";
        $msg = " Please click the link below to activate your Account
        http://localhost/projects/Login/exercise-files/exercise-files/activate.php?email=$email&code=$validation_code
        ";
        $header = "From: noreply@youtwebsite.com";
        send_email($email, $subject, $msg, $headers);
        return true;
    }
}



/*********************** Regisztráció function *********************/

function regisztracio($first_name , $last_name , $username , $email ,  $password){


	$first_name         = escape($first_name);
    $last_name          = escape($last_name);
    $username           = escape($username);
    $email              = escape($email);
    $password           = escape($password);
	echo $first_name;
	
	if(email_exist($email)){
        return false;
    }elseif(username_exist($username)){
        return false;
    }else{
        $password = md5($password);
        $validation_code = md5($username );
		$conn = kapcsolodas();
		$sql = "INSERT INTO users(first_name, last_name, username, email, password, validation_code, active)";
		$sql.= " VALUES('$first_name','$last_name','$username','$email','$password','$validation_code', 0)";
		mysqli_query($conn, "SET NAMES 'UTF8';");
		if(mysqli_query($conn, $sql)){
			$subject = "Activate account";
			$msg = " Please click the link below to activate your Account
			http://localhost/projects/Login/exercise-files/exercise-files/activate.php?email=$email&code=$validation_code
			";
			$header = "From: noreply@youtwebsite.com";
			send_email($email, $subject, $msg, $headers);
			return true;
		} else {
			return false;
		}
	}
	mysqli_close($conn);

	
}











/*********************** Activate user functions *********************/
/*   ?email=vandor@gmail.com&code=64e852a07a23cf8c746ccd2f3e210831    példa   */



function activate_user(){

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        if(isset($_GET['email'])){
            $email = clean($_GET['email']);
            $validation_code = clean($_GET['code']);
            $sql = "SELECT id FROM users WHERE email = '".escape($_GET['email'])."' AND validation_code = '".escape($_GET['code'])."' ";
            $result = query($sql);
            confirm($result);
            if(row_count($result) == 1){
                $sql2 = "UPDATE users SET active = 1, validation_code = 0 WHERE email = '".escape($email)."' AND validation_code = '".escape($validation_code)."' ";
                $result2 = query($sql2);
                confirm($result2);
                set_message("<p class='bg-success'>Aktíváció sikerült! Kérjük lépjen be!</p>"); 
                redirect("login.php");
            }else{
                set_message("<p class='bg-danger'>Aktíváció nem sikerült!</p>"); 
                redirect("login.php");
            }
        }
    }
}



/*********************** Validate  user login functions *********************/

function validate_user_login(){
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $errors = [];
        $min = 2;
        $max = 40;

        $email              = clean($_POST['email']);
        $password           = clean($_POST['password']);
        $remember           = isset($_POST['remember']);

        if(empty($email)){
            $errors[] = " Az email cím nem lehet üres ! ";
        }
        if(empty($password)){
            $errors[] = " A Jelszó nem lehet üres ! ";
        }

        if(!empty($errors)){
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        }else{
            if(login_user($email , $password , $remember)){
                redirect("index.php");
            }else{
                echo validation_errors("Hibás email, vagy jelszó!");
            }
        }
    }
}

/*********************** User login functions *********************/



function login_user($email , $password , $remember){
    $sql = "SELECT password, id FROM users WHERE email = '".escape($email)."' AND active = 1";
    $result = query($sql);
    if(row_count($result) == 1){
        $row = fetch_array($result);
        $db_password = $row['password'];
		$id = $row['id'];
        if(md5($password) === $db_password){
            if($remember == "on"){
                setcookie('email' , $email , time() + 86400);
            }
            $_SESSION['email'] = $email;
			$_SESSION['id'] = $id;
            return true;
        }else{
            return false;
        }
        return true;
    }else{
        return false;
    }
}



/*********************** Logged in functions *********************/



function logged_in(){
    if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
        return true;
    }else{
        return false;
    }
}

/*********************** Menu választás functions *********************/




function menu_select(){
	if(logged_in()){
		
		//echo include("includes/menu_in.php");
		?>
		<div class="container-fluid szelesseg " style="background-color:rgba(255, 255, 255, 0.3);">
			  <div class="row">
				  <div id="logo" class="col-md-4 d-none d-md-block">
					  <div Class="Box-logo"> 
						  <img src="logo2.png" class="img-fluid Logo">
					  </div>
				  </div>
				  <div id="menu" class="col-md-8 d-flex align-items-center">
					  <div class="container">            
					  <table class="table table-borderless">    
						  <tr>
							<td style="border: none; font-size: 27px;">
								<div class="container">
									<ul class="nav nav-pills justify-content-end">
										<li class="nav-item dropdown">
										<a class="nav-link  dropdown-toggle" style="color:white;"  data-toggle="dropdown" >Hirdetéseim</a>									
										<div class="dropdown-menu">
											<a class="dropdown-item" id="hir_fel" style="font-size: 25px;" href="Hidetes_feladas.php">Hirdetés Feladás</a>
											<a class="dropdown-item" style="font-size: 25px;" href="#">Hirdetés módosítása</a>
											<a class="dropdown-item" style="font-size: 25px;" href="#">Hirdetés törlése</a>
										</div>
										</li>
										<li class="nav-item dropdown">
										<a class="nav-link  dropdown-toggle" style="color:white; font-size: 27px;"  data-toggle="dropdown" >Profil</a>									
										<div class="dropdown-menu">
											<a class="dropdown-item" style="font-size: 25px;" href="reset_pwd.php">Jelszó módosítása</a>
											<a class="dropdown-item" style="font-size: 25px;" href="modositas.php">Adatok módosítása</a>
											<a class="dropdown-item" style="font-size: 25px;" href="torles.php">Felhasználó törlése</a>
										</div>
										</li>
										<li class="nav-item">
										<a class="nav-link" style="color:white;" href="#">Üzenetek</a>
										</li>
										<li class="nav-item" style="color:red;">
										<h5 class="nav-link" style="font-size: 32px;"><b><?php felhasznalo();?></b></h5>
										</li>
									</ul>
								</div>
							</td>
							<td style="border: none;">
								<form method="POST">
									<?php log_out();?>
									<button type="submit"  class="btn-lg btn-danger"  name="kijelentkezes" >Kilépés</button>
									<input type="hidden" name="action" value="cmd_kijelentkezes">
								</form>
							</td>
						  </tr>    
					  </table>
					</div>
				  </div>
			  </div>
		  </div>
      		
		<?php
	}else{
		//echo include("includes/menu.php");
		?>
		<div class="container-fluid szelesseg" style="background-color:rgba(255, 255, 255, 0.3);">
			  <div class="row">
				  <div id="logo" class="col-md-4 d-none d-md-block">
					  <div Class="Box-logo"> 
						  <img src="logo2.png" class="img-fluid Logo">
					  </div>
				  </div>
				  <div id="menu" class="col-md-8 d-flex align-items-center">
					  <div class="container">            
					  <table class="table table-borderless">    
						  <tr> 
							<td style="border: none;" ><button id="regbt" type="button" class="btn-lg btn-info   float-right" onclick="window.location.href = 'register.php';">Regisztráció</button> 
							<button id="loginbt" type="button" class="btn-lg btn-primary  float-right" onclick="window.location.href = 'login.php';">Log in</button> 
							</td>
						  </tr>                     
					  </table>
					</div>
				  </div>
			  </div>
		  </div>		
		<?php		

	}
}





/*********************** LogOut functions *********************/





function log_out(){
	if (isset($_POST["action"]) and $_POST["action"] == "cmd_kijelentkezes"){
		session_destroy();             
		redirect("index.php");	
	}
}	




/*********************** Recovery password functions *********************/


function recover_password(){
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']){
            $email = clean($_POST['email']);
            if(email_exist($email)){
                $validation_code = md5($email, microtime());
                $subject = "Please reset your password";
                $message = "Here is your password reset code {$validation_code}
                Click here to reset your password http://localhost//code.php?email=$email&code=$validation_code";
                $headers = "From: noreply@yourwebsite.com";
                send_email($email, $subject, $message, $headers);
            }
        }
    }
}

/*********************** Felhasználó neve functions *********************/

function felhasznalo(){
	$email = $_SESSION['email'];
	$conn = kapcsolodas();
	$sql = "SELECT 
				username
			FROM
				users 
			WHERE
				email = '".$email."'
			";
	$result1 = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result1) > 0) {
		$row = mysqli_fetch_assoc($result1);
        echo  $row["username"];
		
	} else {
		echo "0 results";
	}

	mysqli_close($conn);
}


/*********************** Jelszo modosítás functions *********************/



function jelszo_modositas(){
	if (isset($_POST["action"]) and $_POST["action"] == "cmd_jelszo_modositas_form"){
 
		$errors = [];
		$min = 3;
		$max = 40;

		$password           = clean($_POST['password']);
		$confirm_password   = clean($_POST['confirm_password']);
				
		if(strlen($password) < $min){
			$errors[] = " A Jelszó nem lehet kissebb {$min} betünél ! ";
		}
		if(strlen($password) > $max){
			$errors[] = " A Jelszó nem lehet több {$max} betünél ! ";
		}
		if(empty($password)){
			$errors[] = " A Jelszó nem lehet üres ! ";
		}
		if($password !== $confirm_password){
			$errors[] = " A két jelszó nem eggyezik ! ";
		}

		if(!empty($errors)){
			foreach ($errors as $error) {
				echo validation_errors($error);
			}
		}else{
			pass_modositas($password);	
		}
	}
}



function pass_modositas($password){

	$password = md5($password);
	$email = $_SESSION['email'];
	$conn = kapcsolodas();
	$sql = "UPDATE 
				users
			SET
				password = '".$password."'
			WHERE
				email = '".$email."'
			";
	if(mysqli_query($conn, $sql)){
		redirect("index-in.php");
		set_message("<div class='alert alert-success alert-dismissible text-center container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  A Jelszó módosítva! 
		</div>");
	} else {
		set_message("<div class='alert alert-danger alert-dismissible text-center container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  Módosítás nem sikerült! 
		</div>");
	}
	mysqli_close($conn);	
}
	
		
/*********************** Adat modosítás functions *********************/


function adat_modositas(){
	if (isset($_POST["action"]) and $_POST["action"] == "cmd_adat_modositas_form"){
 
		$errors = [];
		$min = 3;
		$max = 40;

		$first_name         = clean($_POST['first_name']);
        $last_name          = clean($_POST['last_name']);
        $username           = clean($_POST['username']);
				
        if(strlen($first_name) < $min){
            $errors[] = " A keresztnév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($first_name) > $max){
            $errors[] = " A keresztnév nem lehet több {$max} betünél ! ";
        }
        if(empty($first_name)){
            $errors[] = " A keresztnév nem lehet üres ! ";
        }
        


        if(strlen($last_name) < $min){
            $errors[] = " A vezetéknév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($last_name) > $max){
            $errors[] = " A vezetéknév nem lehet több {$max} betünél ! ";
        }
        if(empty($last_name)){
            $errors[] = " A vezetéknév nem lehet üres ! ";
        }



        if(username_exist($username)){
            $errors[] = " Ez a felhasználónév már foglalt ! ";
        }
        if(strlen($username) < $min){
            $errors[] = " A felhasználónév nem lehet kissebb {$min} betünél ! ";
        }
        if(strlen($username) > $max){
            $errors[] = " A felhasználónév nem lehet több {$max} betünél ! ";
        }
        if(empty($username)){
            $errors[] = " A felhasználónév nem lehet üres ! ";
        }

		if(!empty($errors)){
			foreach ($errors as $error) {
				echo validation_errors($error);
			}
		}else{
			data_modositas($first_name , $last_name , $username);	
		}
	}
}



function data_modositas($first_name , $last_name , $username){


	$email = $_SESSION['email'];
	$conn = kapcsolodas();
	$sql = "UPDATE 
				users
			SET
				first_name = '".$first_name."',
				last_name = '".$last_name."',
				username = '".$username."'
			WHERE
				email = '".$email."'
			";
	if(mysqli_query($conn, $sql)){
		redirect("index.php");
		set_message("<div class='alert alert-success alert-dismissible container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  Adatok módosítva! 
		</div>");
	} else {
		set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  Módosítás nem sikerült! 
		</div>");
	}
	mysqli_close($conn);	
}





/*********************** Felhasználó törlése functions *********************/




function felhasznalo_torlese(){
	if (isset($_POST["action"]) and $_POST["action"] == "cmd_user_delete_form"){

	$email = $_SESSION['email'];
	$conn = kapcsolodas();
	$sql = "DELETE 
			FROM
				users
			WHERE
				email = '".$email."'
			";
	if(mysqli_query($conn, $sql)){
		redirect("index.php");
		set_message("<div class='alert alert-success alert-dismissible container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  Felhasználó törölve! 
		</div>");
	} else {
		set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Figyelem! </strong>  Felhasználó törlése nem sikerült! 
		</div>");
	}
	mysqli_close($conn);

	}
}


function vardump_sessions(){
	echo "<pre>Munkamenetek:</pre>";
	echo "<pre>"; var_dump($_SESSION); echo "</pre>"; 
}




/*********************** termék szűrés functions *********************/


$category = 'osszes';
function termek_lista(){
	
	$conn = mysqli_connect('mysql.rackhost.hu', 'c15953horgasz', 'pikkely','c15953horgaszcuccok');

	if(!$conn) {echo "kapcsolat nem jöttlétre!";}
	mysqli_query($conn, "SET NAMES 'UTF8';");

	if($GLOBALS['category'] != 'osszes'){
		
		$sql='  SELECT 
						termek_id, 
						termek_nev , 
						termek_gyarto, 
						termek_kep, 
						termek_ar, 
						termek_hely, 
						termek_hirdeto, 
						termek_datum 
					FROM 
						termek , 
						kategoria 
					WHERE 
						termek.termek_kategoria = kategoria.kat_id 
						AND
						kategoria.kategoria = "'.$GLOBALS['category'].'"
					';
	}else{
		$sql='  SELECT 
					termek_id, 
					termek_nev , 
					termek_gyarto, 
					termek_kep, 
					termek_ar, 
					termek_hely, 
					termek_hirdeto, 
					termek_datum 
				FROM 
					termek ';
	}			
			

	$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) == 0 ) { 
			
			die("A lekérdezés eredménye üres halmaz");  
		}
		$kep;
		$termek_id;
		$termek_nev;
		$termek_gyarto;
		$termek_kep;
		$termek_ar;
		$termek_hely;
		$termek_hirdeto;
		$termek_datum;
		$termek_kategoria;


		while ($row = mysqli_fetch_assoc($result)) {
		 
			$termek_id=$row["termek_id"];
			$termek_nev=$row["termek_nev"];
			$termek_gyarto=$row["termek_gyarto"];
			$termek_kep=$row["termek_kep"];
			$termek_ar=$row["termek_ar"];
			$termek_hely=$row["termek_hely"];
			$termek_hirdeto=$row["termek_hirdeto"];
			$termek_datum=$row["termek_datum"];
			
			
			
			
			echo '<div class="col-sm-6 col-md-4 col-lg-3" id="termek">';
			echo '	<div class="termek" id=" '.$termek_id.' " >';
			echo '	  <div class="img-holder" >';
			echo '		<img class="card-img-top" src="img/'.$termek_kep.'" >';
			echo '	  </div>';
			echo '		<div class="card-body" >';
			echo '			  <h5 class="text-center"><b>'.$termek_nev.'</b></h5>';
			echo '			  <h5 class="text-center"><b>Gyártó: </b>'.$termek_gyarto.'</h5>';
			echo '			  <h5 class="text-center"><b>Település: </b>'.$termek_hely.'</h5>';
			echo '			  <h2 class="text-center" style="color:red;" > '.$termek_ar.' Ft</h2>';
			echo '		</div>';
			echo '	</div>';
			echo '</div>';	
			}
		mysqli_close($conn);
			echo '</div>';
			echo '	<div class="container-fluid szelesseg">';
			echo '		<ul class="pagination pagination-lg justify-content-center" style="margin:20px 0">';
			echo '	 	    <li class="page-item"><a class="page-link" href="javascript:void(0);">Előző</a></li>';
			echo '	 	    <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>';
			echo '	  		<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>';
			echo '	  		<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>';
			echo '	  		<li class="page-item"><a class="page-link" href="javascript:void(0);">Következő</a></li>';
			echo '		</ul>';
			echo '	</div>';
}







/*********************** Termék részletes functions *********************/




if (isset($_POST["action"]) and $_POST["action"]=="termekreszletes"){
	if (isset($_POST["input_id"]) ){
		echo termek_reszletes($_POST["input_id"]);
	}
}






function termek_reszletes(){
	
	
	$conn = mysqli_connect('mysql.rackhost.hu', 'c15953horgasz', 'pikkely','c15953horgaszcuccok');

	if(!$conn) {echo "kapcsolat nem jöttlétre!";}
	mysqli_query($conn, "SET NAMES 'UTF8';");


		$sql='  SELECT 
					termek_id, 
					termek_nev , 
					termek_gyarto, 
					termek_kep, 
					termek_ar, 
					termek_hely, 
					termek_hirdeto, 
					termek_datum,
					termek_comment
				FROM 
					termek 
				WHERE
					termek_id = "'.$_POST["input_id"].'"
					';
				
			
	
	$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result) == 0 ) { 
			
			die("A lekérdezés eredménye üres halmaz");  
		}
		$kep;
		$termek_id;
		$termek_nev;
		$termek_gyarto;
		$termek_kep;
		$termek_ar;
		$termek_hely;
		$termek_hirdeto;
		$termek_datum;
		$termek_kategoria;
		$termek_comment;


		while ($row = mysqli_fetch_assoc($result)) {
		 
			$termek_id=$row["termek_id"];
			$termek_nev=$row["termek_nev"];
			$termek_gyarto=$row["termek_gyarto"];
			$termek_kep=$row["termek_kep"];
			$termek_ar=$row["termek_ar"];
			$termek_hely=$row["termek_hely"];
			$termek_hirdeto=$row["termek_hirdeto"];
			$termek_datum=$row["termek_datum"];
			$termek_comment=$row["termek_comment"];
			
			echo '<script>';
			echo '$(".xxx").click(function(){';
			echo '  $("#reszletes").hide();';
			echo '});';
			echo '</script>';

			echo '<div class="container-fluid">';
			echo '	 <div  class="row reszletes">';
			echo '	  		<div class="col-lg-6 p-3  reszletes_kep" >';
			echo '					<img class="img-fluid"  align="middle" src="img/'.$termek_kep.'" >';
			echo '	  		</div>';
			echo '	  		<div class="col-lg-6 p-3 reszletes_adat" >';
			echo '	          		<input type="button" class="xxx" id="fff" value="X">';
			echo '			  		<h2 class="text-center"><b>'.$termek_nev.'</b></h2>';
			echo '			  		<h5 class="text-center"><b>Gyártó: </b>'.$termek_gyarto.' </h5>';
			echo '			  		<h5 class="#" style="text-align: justify;"> '. $termek_comment .'</h5>';
			echo '			  		<h5 class="text-center"><b>Hirdető: <span style="color: blue;"> '.$termek_hirdeto.' </span>Település: </b>'.$termek_hely.' </h5>';
			echo '			  		<h1 class="text-center" style="color:red;"><b> '.$termek_ar.' Ft </b></h1>';
			echo '			  		<h6 class="text-center">Hirdetés feladása: '.$termek_datum.' </h6>';
			echo '	  		</div>';
			echo '	  </div>';
			echo '</div>';
			}
		mysqli_close($conn);
	
	
	
	
	
}

/*********************** Hirdetes felvetel / Előnézet functions *********************/




if (isset($_POST["action"]) and $_POST["action"] == "cmd_kep_elonezet"){
	global $kep_elonezet;
	$T_KEP_NAME = $_FILES['image']['name'];			
	$T_KEP_TMP = $_FILES['image']['tmp_name'];			
	$T_KEP_SIZE = $_FILES['image']['size'];			
	$T_KEP_TYPE = $_FILES['image']['type'];			
	$T_KEP_ERROR = $_FILES['image']['error'];
	$ok = true;
	$type = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	$_FILES['image']['name'] = date("Ymdhis").mt_rand().".".$type;
	
	if( !($type=="jpeg" || $type=="jpg" || $type=="png" || $type=="gif") ){
		$ok = false;
		set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Figyelem! </strong>  Nem megfelelő formátum! Csak '.jpeg  .jpg  .png  .gif' file-ok engedélyezettek!
			</div>");
	}
	if($_FILES['image']['size'] > 512000){
		$ok = false;
		set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Figyelem! </strong>  Túl nagy a file mérete! Max 500 kb lehet! 
			</div>");
	}
	if(file_exists("img/".$_FILES['image']['name'])){
		$ok = false;
		set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Figyelem! </strong>  Ilyen nevü file már létezik! Próbálja újra!  
			</div>");
	}
	if($ok){
		move_uploaded_file($_FILES['image']['tmp_name'],"img/".$_FILES['image']['name']);
		$kep_elonezet = $_FILES['image']['name'];


		$conn = kapcsolodas();
				$sql = "UPDATE 
							elonezet
						SET
							kep = '".$kep_elonezet."'
						WHERE
							1
						";
				if(mysqli_query($conn, $sql)){
					/*set_message("<div class='alert alert-success alert-dismissible container-fluid szelesseg'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Figyelem! </strong>  kép módosítva! ".$kep_elonezet."
					</div>");*/
				} else {
					/*set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
					<button type='button' class='close' data-dismiss='alert'>&times;</button>
					<strong>Figyelem! </strong>  Kép módosítás nem sikerült! 
					</div>");*/
				}
				mysqli_close($conn);

		
		return $kep_elonezet;
	}
}








/*********************** Hirdetes felvetel functions *********************/

if (isset($_POST["action"]) and $_POST["action"]=="cmd_hirdetes_feladas"){

	if (isset($_POST["Termek_nev"])      and           
		isset($_POST["Termek_gyarto"])   and          
		isset($_POST["Termek_hely"])     and  
		isset($_POST["Termek_ar"])        
		){
		$datum = date("Y-m-d");
		$email = $_SESSION['email'];
		$id = $_SESSION['id'];				
		$conn = kapcsolodas();
		mysqli_query($conn, "SET NAMES 'UTF8';");
		$sql = "SELECT 
					username
				FROM
					users 
				WHERE
					email = '".$email."'
				";
		$result1 = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result1) > 0) {
			$row = mysqli_fetch_assoc($result1);
			$username = $row["username"];
			
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
		
		
		$conn = kapcsolodas();
			$sql = "SELECT
						`kep`
					FROM
						`elonezet`
					WHERE
						1
					";
			$result1 = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result1) > 0) {
				$row = mysqli_fetch_assoc($result1);
				$kep_elonezet2 =  $row["kep"];
				
			} else {
				echo "0 results";
			}

			mysqli_close($conn);
		}
		
		$termek_nev;
		$termek_gyarto;
		$termek_kep;
		$termek_ar;
		$termek_hely;
		$termek_hirdeto;
		$termek_datum;
		$termek_kategoria;
		$termek_comment;
		

		$termek_nev = $_POST["Termek_nev"];
		$termek_gyarto = $_POST["Termek_gyarto"];
		$termek_kep = $kep_elonezet2;
		$termek_ar = $_POST["Termek_ar"];
		$termek_hely = $_POST["Termek_hely"];
		$termek_hirdeto = $username;
		$termek_datum = $datum;
		$termek_kategoria = $_POST["Kategoria"];
		$termek_comment = $_POST["Termek_comment"];
		
		
		$conn = kapcsolodas();
		mysqli_query($conn, "SET NAMES 'UTF8';");
		$sql = "INSERT INTO termek(
									termek_kategoria,
									termek_nev,
									termek_gyarto,
									termek_kep,
									termek_ar,
									termek_hely,
									termek_hirdeto,
									termek_datum,
									termek_comment
								  )
						VALUES(
									'$termek_kategoria',				
									'$termek_nev',				
									'$termek_gyarto',				
									'$termek_kep',				
									'$termek_ar',				
									'$termek_hely',				
									'$termek_hirdeto',				
									'$termek_datum',				
									'$termek_comment' 				
								)
				";

		if(mysqli_query($conn, $sql)){
			redirect("index.php");
			set_message("<div class='alert alert-success alert-dismissible container-fluid szelesseg'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>      
			<strong>Figyelem! </strong>  A hirdeteést rögzítettük! 
			</div>"); // valamiért nem megy

		} else {
			set_message("<div class='alert alert-danger alert-dismissible container-fluid szelesseg'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Figyelem! </strong>  Hirdetés feladása nem sikerült!
			</div>");
		}
		mysqli_close($conn);
		
}		
		
	



$kep_elonezet = "img_placeholder.jpg";










//session_destroy();
?>
