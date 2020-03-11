<?php include("includes/header.php")?>

<?php include("includes/menu.php")?>





<div class="regablak">
    <div class="reg-doboz">
        <span class="reg-close" onclick="window.location.href = 'index.php';">X</span>
        <h2> Elfelejtett Jelszó </h2>
        <hr>
        <form  id="regform"  method="POST">
            <?php display_message(); ?>
            <input id="" type="email" class="email input-box" name="email" placeholder="Email cím" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email cím'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br />

    

            <button type="submit" id="recover-submit" class="reg-btn" name="recover-submit" >Új Jelszó</button>
                <hr>
            <button type="button" class="rmegsem-btn" name="Mégsem" onclick="window.location.href = 'index.php';">Mégsem</button><br/>

        </form>
    </div>
</div>
		

	
<?php include("includes/termek.php")?>

<?php include("includes/footer.php")?>