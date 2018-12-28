<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script
          src="https://code.jquery.com/jquery-3.3.1.js"
          integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
          crossorigin="anonymous"></script>
          <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
       
        <style>
                body {
        	margin: 0;
        	padding: 0;
        	overflow: hidden;
        }
        .Home {
        	display: block;
        	/*margin-top:44px;*/
        }

		.Home-wrapper {
			display: block;
			width: 100%;
			height: 100%;
		}
    
    	.Side-left {
    	    margin-top:56px;
    		background-color: #00a8a4;
    		height: 100%;
    		left: -100%;
    		overflow: hidden;
    		position: absolute;
    		top: 0;
    		transform: skew(-45deg);
    		width: 150%;
    		z-index: 5;
    	}
		.Side-left-wrapper {
			width: 100%;
			height: 100%;
		}
		.Side-left-image {
			background:url(https://svgshare.com/i/A7X.svg) center no-repeat transparent;
			height: 100%;
			left: 50%;
			position: absolute;
			top: 0;
			transform: skew(45deg);
			width: 100%;
		}

			.Side-right {
				width: 100%;
          height: 100%;
          position: absolute;
          background-color: #1F2B52;
			}
		.Side-right-image {
			position: absolute;
			top: 0;
			right: 0;
			width: 100%;
			height: 100%;
			background: url(https://svgshare.com/i/A7k.svg) center no-repeat transparent;
		}

            .Signature {
              position: absolute;
              z-index: 100;
              bottom: 20px;
              right: 20px;
              color: #fff;
              line-height: .2;
              font-size: .7em;
              font-family: Open Sans, sans-serif;
            }

.bg-light {
    background-color: #1b1b1b!important;
}
.navbar-light .navbar-brand {
    color: rgba(173, 173, 173, 0.9);
}
@media screen and (max-width: 768px) {
        
        	.Side-left {
        		top: -65%;
        		left: 0;
        		transform: skewY(-35deg);
        		width: 100%;
        	}
    		.Side-left-image {
    			background-size: 65%;
    			left: 0;
    			top: 50%;
    			transform: skewY(35deg);
    		}

        	.Side-right-image {
        		top: -15%;
        		background-size: 65%;
        	}

}
          

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
               
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
             @if (Route::has('login'))
            
                    @auth
                    <a class="navbar-brand" href="{{ url('/home') }}">Home</a>
                      
                    @else
                    <a class="navbar-brand" href="{{ route('login') }}">Login</a>
                        

                        @if (Route::has('register'))
                        <a class="navbar-brand" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                
            @endif
  <a class="navbar-brand" href="#">Navbar</a>
</nav>
        
            
          

            <div class="content">
              
                <div class="Home">

		<div class="Home-wrapper js-Home-desktop-wrapper">

			<section class="Side-left js-Side-left">
				<div class="Side-left-wrapper">
					<div class="Side-left-image js-Side-left-image"></div>
				</div>
			</section>

			<section class="Side-right">
				<div class="Side-right-image js-Side-right-image"></div>
			</section>

		</div>
                
            </div>
        </div>
    </body>
    <script>
        $( document ).ready(function() {

	$( window ).resize(function() {

		windowSize = $( window ).width();

		if (windowSize >= 768) {
			mouseMove();
		} else {
			$(".js-Side-left").css({
				"left": 0
			});

			// Image translation
			$(".js-Side-left-image").css({
				"margin-left": 0
			});

			$(".js-Side-right-image").css({
				"right": 0
			});
		}
		
	});

	var windowSize = $( window ).width();

	// Getting mouse move and animating div and images
	function mouseMove() {

		$( ".js-Home-desktop-wrapper" ).mousemove(function( event ) {
			if (windowSize >= 768) {

				var mouseX = event.pageX,
					result = mouseX * 100/windowSize,
					move   = -(windowSize/2) - mouseX;

				$(".js-Side-left").css({
					"left": move
				});

				// Image translation
				$(".js-Side-left-image").css({
					"margin-left": -windowSize - move+(mouseX-(windowSize/2))/40,
				});

				$(".js-Side-right-image").css({
					"right": -(mouseX-(windowSize/2))/40,
				});
			}
		});
	}

	mouseMove();
	
});
    </script>
</html>
