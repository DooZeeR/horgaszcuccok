<?php include("includes/header.php")?>

<?php include("includes/menu_in.php")?>





<div class="regablak">
    <div class="reg-doboz">
        <span class="reg-close" onclick="window.location.href = 'index.php';">X</span>
        <h2> Jelszó módosítása </h2>
        <hr>
        <form  id="regform"  method="POST">
            <?php display_message(); ?>
            <input id="password" type="password" class="password input-box" name="password" placeholder="Jelszó" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó'" pattern=".{8,20}" title="Minimum 8 , maximum 20 karakter" required>
            <input id="confirm_password" type="password" class="password1 input-box" name="confirm_password" placeholder="Jelszó újra" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jelszó újra'" pattern=".{8,20}" title="Minimum 8 , maximum 20 karakter" required><br />
            <hr>
			<?php jelszo_modositas();?>	
            <button type="submit" id="modositas-submit" class="reg-btn" name="modositas-submit" >Módosítás</button> 
			<input type="hidden" name="action" value="cmd_jelszo_modositas_form">			
            <button type="button" class="rmegsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button>
        </form>
    </div>
</div>

<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>