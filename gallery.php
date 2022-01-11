<?php
	session_start();
	require "incl/functions.php";
	require "dbconnect.php";

	$get_recent = $conn->query("SELECT * FROM produk");

	$result = "";

	if($get_recent->num_rows) {

		while($row = $get_recent->fetch_assoc()) {

			$result .= "
			<div data-aos=\"zoom-in-up\" class=\"book_container\">
				<div class=\"book\">
					<div class=\"cover\">
						<img src='produk/".$row['namaproduk'].".jpg' width='80px' height='80px' />
					</div>
					<div class=\"details\">

								<h2>".$row['namaproduk']."</h2>
								<h3 class='desc'>".$row['deskripsi']."...</h3>

					 </div>
							<p class='clear'></p>
							</a>
					</div>
				</div>";

		}

	}else{



	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link rel="icon" type="image/png" href="images/logo.png"/>
<head>
  <title>Cha Chi Ngan Restaurant</title>
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js" ></script>
	<script src="js/myscript.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
			function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<!-- //js -->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
  <body>
    <?php include 'incl/header.php'; ?>
		<div class="breadcrumbs">
			<div class="container">
				<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
					<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li class="active">Gallery</li>
				</ol>
			</div>
		</div>
    <div class="container1">
    	<h2 class="above center">Gallery</h2>
    	<div class="wrap">
    		<?php echo $result; ?>
    	</div>
    </div>
		<?php include 'incl/footer.php'; ?>
			<script> AOS.init(); </script>
			<script src="js/bootstrap.min.js"></script>

			<!-- top-header and slider -->
			<!-- here stars scrolling icon -->
				<script type="text/javascript">
					$(document).ready(function() {

							var defaults = {
							containerID: 'toTop', // fading element id
							containerHoverID: 'toTopHover', // fading element hover id
							scrollSpeed: 4000,
							easingType: 'linear'
							};


						$().UItoTop({ easingType: 'easeOutQuart' });

						});
				</script>
			<!-- //here ends scrolling icon -->

			<!-- main slider-banner -->
			<script src="js/skdslider.min.js"></script>
			<link href="css/skdslider.css" rel="stylesheet">
			<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

						jQuery('#responsive').change(function(){
						  $('#responsive_wrapper').width(jQuery(this).val());
						});

					});
			</script>
			<!-- //main slider-banner -->
  </body>
</html>
