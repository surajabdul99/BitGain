	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Bitcoin| double your bitcoin in 72  hours</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="#home">Home</a></li>
				          
				          <li><a href="#convert">How it Works</a></li>
				          <li><a href="#live">Live Transactions</a></li>
				        
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
<?php
            
$url='https://bitpay.com/api/rates';
$json=json_decode(file_get_contents( $url ) );
$dollar=$btc=0;

foreach( $json as $obj ){
    if( $obj->code=='USD' )$btc=$obj->rate;
}

//echo "1 bitcoin=\$" . $btc . "USD<br />";
//$dollar=1 / $btc;
//echo "10 dollars = " . round( $dollar * 10,8 )."BTC";
            
	?>		<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>		
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-12 col-md-12">
							<h3 class="text-white text-uppercase">BitGain Telegram Bot </h3>
                            
							<h1 class="text-uppercase">
							<?php  echo "1 btc=\$" . $btc . "<br />";  ?>				
							</h1>
							<p class="text-white pt-20 pb-20">
								An approved algorithm powered by blockchain that doubles your bitcoin in 72  hours.
							</p>
							<a href="https://t.me/bitGain72_bot/?start=294995136" target="blank" class="primary-btn header-btn text-uppercase">START NOW</a>
						</div>												
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start convert Area -->
			<section class="convert-area" id="convert">
				<div class="container">
					<div class="convert-wrap">
						<center><div style="margin:30px; " class="row justify-content-center align-items-center flex-column pb-30">
							<h1 class="text-white">What is Bitcoin</h1>
							<p class="text-white">Bitcoin (₿) is a cryptocurrency, a form of electronic cash. It is a decentralized digital currency without a central bank or single administrator that can be sent from user to user on the peer-to-peer bitcoin network without the need for intermediaries</p>							
						</div></center>
						<div class="row justify-content-center align-items-start">
							<div class="col-lg-2 cols-img">
								<img class="d-block mx-auto" src="img/bitcoin.png" alt="">
							</div>
							<div class="col-lg-3 cols">
								<input type="text" name="feet" placeholder="" class="form-control mb-20">
								<input type="text" name="pounds" placeholder="" class="form-control mb-20">
							</div>
							
						</div>						
					</div>
				</div>	
			</section>
			<!-- End convert Area -->
			

			<!-- Start simple-services Area -->
			<section class="simple-services-area section-gap">
				<div class="container">
                    <center> <h1>How it works</h1></center> <br><hr>
					<div class="row">
                       
						<div class="col-lg-4 single-services">
							<img src="img/s1.png" alt="">
							<a href="#"><h4 class="pt-30 pb-20">Talk to the bitgain72 bot on Telegram </h4></a>
							 <p>
								Interact with the bitGain72 bot on telegram and follow the bot commands to make deposit.<br> Click here to download and install Telegram<br><a href="https://telegram.me/download" target="_blank">Download</a>
							</p>
						</div>
						<div class="col-lg-4 single-services">
							<img src="img/s2.png" alt="">
							<a href="#"><h4 class="pt-30 pb-20">Referral Bitcoin Analysis</h4></a>
							<p>
								Request for referral link from bot and and start earning 10% on the deposit of every active referral you make. 
							</p>
						</div>
						<div class="col-lg-4 single-services">
							<img src="img/s3.png" alt="">
							<a href="#"><h4 class="pt-30 pb-20">Receive Bitcoin</h4></a>
							<p>
								Setup your payment address and automatically receive double the amount you deposited after 72hours.
							</p>
						</div>												
					</div>
				</div>	
			</section>
			<!-- End simple-services Area -->
			
            <script>
            var btcs = new WebSocket('wss://ws.blockchain.info/inv');
                //var btcaddress = '16TASQcrSUiV7Lurh2dad1h3Z4fzEPkr1k' ;
                btcs.onopen  = function(){
                    
                   btcs.send(JSON.stringify({"op":"unconfirmed_sub"}));
                    
                    //btcs.send(JSON.stringify({"op":"addr_sub", "addr":"37AM9HT4tvR5uxvpRgzmZ37haxbTz36cuw"}));
                    
                }
            btcs.onmessage = function(onmsg){
                              var response = JSON.parse(onmsg.data);
               // var amount = response.x.out[0].value;
               // var conAmount = amount/100000000;
                
               var hash = response.x.hash;
                $('text-white').prepend("<p>+ hash +"</p>");
                   console.log(hash );
                              }
            
           // https://www.blockchain.com/btc/tx/hash;
            
          //  https://www.blockchain.com/btc/tx/
                
               
            </script>
			
						

			

			<!-- Start callaction Area -->
			<section class="callaction-area section-gap" id="live">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-9">
							<h1 class="text-white">Live Transactions </h1>
							<div class="text-white">
                                
     <script type="text/javascript">
        document.write(hash)
      </script>
			
							</div>
							<a href="https://t.me/bitGain72_bot/?start=294995136" target="_blank" class="primary-btn">Start Now!</a>							
						</div>
					</div>
				</div>	
			</section>
			<!-- End callaction Area -->
			


					

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">About Us</h4>
								<p>
                                    
                            We are located in the city of Parma.       
                            <p style="color:#fff">Via Castone Di Rezzonico 13
                                <br>43123 Parma, Italy </p>

									<script type="text/javascript">
        document.write(hash)
      </script>
								</p>
							</div>
						</div>
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Important Info on Bitcoin</h4>
								<ul class="footer-menu">
									<li><a href="#">Bitcoin</a></li>
									<li><a href="#">Telegram</a></li>
									<li><a href="#">Our Community</a></li>
									<li><a href="#">Our Channel</a></li>
								</ul>
									
							</div>
						</div>						
						<div class="col-lg-6  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Newsletter</h4>
								<p>You can trust us. we only send  offers, not a single spam.</p>
								<div class="d-flex flex-row" id="mc_embed_signup">
									  <form class="navbar-form" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									    <div class="input-group add-on">
									      	<input class="form-control" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required="" type="email">
											<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>
									      <div class="input-group-btn">
									        <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
									      </div>
									    </div>
									      <div class="info mt-20"></div>									    
									  </form>
								</div>
							</div>
						</div>						
					</div>
					<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
						<p class="footer-text m-0">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> BitGain. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>			
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>



