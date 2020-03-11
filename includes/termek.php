





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
			  </div>
              <?php termek_lista();?>

		
		 
      </div>
      
      
      












