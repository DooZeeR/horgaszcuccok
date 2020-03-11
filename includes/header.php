<?php
error_reporting(-1);
?>
<?php include("functions/init.php")?>

<!doctype html>
<html lang="hu">
  <head>


	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="Custom.css" >
    <title>Használt Horgász Holmik</title>
	<style>
		body  {
		  background-image: url("háttér.jpg");
		  background-repeat: no-repeat;
		  background-attachment: fixed;
		  background-size: 100% 100%;
		}
	</style>
		<script>
							
		/*function toltsdbe(kep) {                    
		var imghtml = "<img class='img-fluid'  align='middle' src='+kep+'>";          
		$(".reszletes_kep").html(imghtml);          
		} */
		
		
		
	
		
		
		$(function(){
			$(document).on('click', '.termek', function(){
				var input_id = $(this).attr('id');
				$.post("functions/functions.php",
					{
						action: "termekreszletes",
						input_id: input_id
					},
				function(data){
					$("#reszletes").show();
					$("#reszletes").html(data);					
				});
			});
		});	


	</script>
  </head>
  <body>