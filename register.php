<?php include("includes/header.php")?>

<?php include("includes/menu.php")?>





<div class="regablak">
    <div class="reg-doboz">
        <span class="reg-close" onclick="window.location.href = 'index.php';">X</span>
        <h2> Regisztráció</h2>
        <hr>
        <form  id="regform"  method="POST" >
            <?php display_message(); ?>
            <?php validate_user_registration(); ?>
            <input id="" type="text" class="keresztnevnev input-box" name="first_name" placeholder="Keresztnév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Keresztnév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
            <input id="" type="text" class="vezeteknevnev input-box" name="last_name" placeholder="Vezetéknév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vezetéknév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
            <input id="" type="text" class="felhasznalonev input-box" name="username" placeholder="Felhasználónév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Felhasználónév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
            <input id="" type="email" class="email input-box" name="email" placeholder="Email cím" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email cím'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br />
            <input id="" type="password" class="password input-box" name="password" placeholder="Jelszó" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó'" pattern=".{8,20}" title="Minimum 8 , maximum 20 karakter" required><br />
            <input id="" type="password" class="password1 input-box" name="confirm_password" placeholder="Jelszó újra" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó újra'" pattern=".{8,20}" title="Minimum 8 , maximum 20 karakter" required><br /><br />
            <p><span><input id="" type="checkbox" ></span> Elfogadom a <a href="#">Adatkezelési szabályok</a>-at.</p>
            <p><span><input id="" type="checkbox" ></span> Elfogadom a <a href="#">Felhasználási feltételek</a>-et.</p>
    

            <button type="submit" id="register-submit" class="reg-btn" name="register-submit" >Regisztrálás</button>
                <hr>
            <button type="button" class="rmegsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button><br/>

        </form>
    </div>
</div>
		

	
<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>