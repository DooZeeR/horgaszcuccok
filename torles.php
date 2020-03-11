<?php include("includes/header.php")?>

<?php include("includes/menu_in.php")?>





<div class="regablak">
    <div class="reg-doboz">
        <span class="reg-close" onclick="window.location.href = 'index.php';">X</span>
        <h2> Felhasználó törlése</h2>
        <hr>
        <form  id="regform"  method="POST">
            <?php display_message(); ?>
			<h2 style="color:red;">Biztos?</h2>
			<hr>


    
			<?php felhasznalo_torlese();?>	
            <button type="submit" id="torles-submit" class="reg-btn" name="torles-submit" >Törlés</button>
			<input type="hidden" name="action" value="cmd_user_delete_form">
            <button type="button" class="rmegsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button><br/>

        </form>
    </div>
</div>
		

	
<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>