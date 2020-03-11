





    <?php
	$category = "osszes";

	if(isset($_GET['category'])){
		$category = $_GET['category'];
	}
	
	?>














	   <div class="container-fluid szelesseg" style="background-color:white;">
          <div class="row">
              <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse " id="navbarText">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item ">
                        <a class="nav-link text-dark" href="index.php?category=Bot"><b>Bot</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Orso"><b>Orsó</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Lada"><b>Láda</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Szek"><b>Szék</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Alvany"><b>Álvány</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Sator"><b>Sátor</b></a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Taska"><b>Táska</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Csonak"><b>Csónak</b></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=Egyeb"><b>Egyéb</b></a>
                      </li>
					  <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?category=osszes"><b>Összes</b></a>
                      </li>	
                  </div>
                </nav>
              </div>
          </div>
      </div>
      
      


      
      
      
      <div class="container-fluid szelesseg" style="background-color:white; ">
          <div  id="termekdoboz" class="row" style="position: relative; " >
			  <div class="container-fluid szelesseg" style="background-color:white; position: absolute; top: 0;left: 0;  z-index: 1;" id="reszletes">
			  </div>
			  <div class="container-fluid szelesseg" style="background-color:white; position: absolute; top: 0;left: 0;  z-index: 1;" id="hirdetes_fel">
					<div class="container-fluid">
						<div  class="row reszletes">
							<div class="col-lg-6 p-3  reszletes_kep" >
								<img class="img-fluid"  align="middle" src="<?php echo $kep_elonezet ;?>" >
							</div>
							<div class="col-lg-6 p-3 reszletes_adat" >
								<a class="nav-link"  id="fff" style="font-size: 25px; " href="index.php"><b>X</b></a>
								<form id="regform" method="POST" enctype="multipart/form-data">
									<input type="file" name="image" >
									<input type="submit" id="T_KEP" name="T_KEP" value="Előnézet" onclick="#">
									<input type="hidden" name="action" value="cmd_kep_elonezet">
									<?php display_message(); ?>
								</form>
								<form id="regform" method="POST" enctype="multipart/form-data">
									<input id="" type="text" class="input-box-hf" name="Termek_nev" placeholder="Termék neve......" onfocus="this.placeholder = " onblur="this.placeholder = Termék neve" pattern=".{3,30}" title="Minimum 3 , maximum 30 karakter" required><br />
			                		<input id="" type="text" class="input-box-hf" name="Termek_gyarto" placeholder="Gyártó neve......" onfocus="this.placeholder = " onblur="this.placeholder = Gyártó neve" pattern=".{3,30}" title="Minimum 3 , maximum 30 karakter" required><br />
									<input id="" type="text" class="input-box-hf" name="Termek_hely" placeholder="Település neve......" onfocus="this.placeholder = " onblur="this.placeholder = Település neve" pattern=".{3,30}" title="Minimum 3 , maximum 30 karakter" required><br />
									<input id="" type="number" class="input-box-hfn" name="Termek_ar" placeholder="Termék ára" onfocus="this.placeholder = " onblur="this.placeholder = Termék ára" pattern=".{3,30}" title="Csak egész számot lehet megadni! Ft-ban értendő!" required>
									<label for="category">Kategória </label>
									<select id="category" class="input-box-ctg" name="Kategoria">
									  <option value="1">Bot</option>
									  <option value="2">Orsó</option>
									  <option value="3">Láda</option>
									  <option value="4">Szék</option>
									  <option value="5">Álvány</option>
									  <option value="6">Sátor</option>
									  <option value="7">Táska</option>
									  <option value="8">Csónak</option>
									  <option value="9">Egyéb</option>
									</select><br />
									<textarea rows="5" cols="55" name="Termek_comment" id="textarea"  placeholder="Részletes leírás......" pattern=".{1,600}" title="Maximum 600 karakter"></textarea>';
									<button type="submit" id="hf-submit" class="reg-btn" name="hf-submit" >Hirdetés Feladása</button>								
									<input type="hidden" name="action" value="cmd_hirdetes_feladas">
								</form>
							</div>
						</div>
					</div>
			  </div>
              <?php termek_lista();?>

		
		 
      </div>
      
      
      












