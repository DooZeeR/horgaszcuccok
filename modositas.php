<?php include("includes/header.php")?>

<?php include("includes/menu_in.php")?>





<div class="regablak">
    <div class="reg-doboz">
        <span class="reg-close" onclick="window.location.href = 'index.php';">X</span>
        <h2> Adatok módosítása</h2>
        <hr>
        <form  id="regform"  method="POST">
            <?php display_message(); ?>
            <input id="" type="text" class="keresztnevnev input-box" name="first_name" placeholder="Keresztnév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Keresztnév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
            <input id="" type="text" class="vezeteknevnev input-box" name="last_name" placeholder="Vezetéknév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Vezetéknév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
            <input id="" type="text" class="felhasznalonev input-box" name="username" placeholder="Felhasználónév" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Felhasználónév'" pattern=".{3,20}" title="Minimum 3 , maximum 20 karakter" required><br />
			<hr>


    
			<?php adat_modositas();?>	
            <button type="submit" id="modositas-submit" class="reg-btn" name="modositas-submit" >Módosítás</button>
			<input type="hidden" name="action" value="cmd_adat_modositas_form">
            <button type="button" class="rmegsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button><br/>

        </form>
    </div>
</div>
		

	
<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>