<?php include("includes/header.php")?>


<?php include("includes/menu.php")?>





<div class="loginablak">
    <div class="login-doboz">
            <span class="login-close" onclick="window.location.href = 'index.php';">X</span>
            <h2> Bejelentkezés</h2>
            <hr>
            <form  id="logform"  method="POST">
            <?php display_message(); ?>
            <?php validate_user_login(); ?>
                <input id="1" type="email" class="email input-box" name="email" placeholder="Email cím" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email cím'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Maximum 80 karakter" required><br />
                <input id="2" type="password" class="password input-box" name="password" placeholder="Jelszó"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó'" pattern=".{8,20}" title="Minimum 8 , maximum 20 karakter" required><br />
                <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Bejelentkezve marad!</label>
                <input type="hidden" name="action" value="cmd_bejelentkezes">
                <button id="Belepesgomb" type="submit" class="login-btn" name="login_submit"  >Belépés</button>
                <hr>
                <button type="button" class="megsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button><br/>
                <a href="recover.php" >Elfelejtette a jelszavát?</a>
                    |  
                <a href="register.php" >Regisztráció</a>
            </form>
    </div>
</div>
		

	
<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>