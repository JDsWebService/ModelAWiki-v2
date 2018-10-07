<style type="text/css">
	.footer-bg {
		background-color: #424242;
		color: white;
	}
	.footer-bg a {
		text-decoration: none;
		color: rgba(255,255,255,1);
	}
	.footer-bg a:hover {
		text-decoration: none;
		color: rgba(255,255,255,0.6);
	}
	.footer-row {
		width: 100vw;
	}
</style>

<div class="row footer-row footer-bg py-4 mt-4">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-3">
				<h5>Our Newsletter</h5>
				<p>Sign up for our newsletter to subscribe to all our future and upcoming feature updates!</p>
				<input type="email" class="form-control rounded-0" placeholder="test@example.com">
				<a href="#" class="btn btn-sm btn-block btn-success mt-3 rounded-0">Sign Up</a>
			</div>

			

			<div class="col-sm-3 offset-sm-4 text-right">
				<h5>Navigation</h5>
				<a href="{{ route('pages.about') }}">About Us</a>
				<br>
				<a href="{{ route('pages.contact') }}">Contact</a>
			</div>
		</div>

		<hr>
		<div class="row">
			<div class="col-sm-12 text-center">
				<a href="{{ route('pages.terms') }}">Terms of Service</a> | <a href="{{ route('pages.privacy') }}">Privacy Policy</a>
			</div>
		</div>
		
	</div>
	

</div>