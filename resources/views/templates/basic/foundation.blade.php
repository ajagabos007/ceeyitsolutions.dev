@extends($activeTemplate.'layouts.frontend')
@section('style')
<style>
	.scholarship-b {
		background: linear-gradient(180deg, #00E8DB -31.4%, #095450 126.74%);
		padding: 12px 30px;
		border-radius: 25px;
		font-weight: 400;
	}

	.hero-section {
		background-color: inherit;
		/* dark background */
		/* dark background */
		color: #fff;
		padding: 80px 0;
		text-align: center;
	}

	.hero-section h1 {
		font-size: 2.5rem;
		font-weight: bold;
	}

	.hero-section p {
		font-size: 1.1rem;
		margin-bottom: 20px;
	}

	.btn-primary,
	.btn-outline-light {
		margin: 10px;
	}

	.info-section {
		background-color: inherit;
		padding: 60px 20px;
		text-align: center;
	}

	.info-section h2 {
		font-size: 2rem;
		margin-bottom: 20px;
		height: 43px;
		border-radius: 10px 0px 0px 0px;
		opacity: 0px;

	}

	.icon-box {
		font-size: 1.5rem;
		margin-bottom: 10px;
	}

	.info-cards .card {
		border: none;
		background: none;
		color: white;

	}

	.underline-green {
		position: relative;
	}

	.underline-green::after {
		content: "";
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		height: 3px;
		/* Adjust thickness */
		background-color: #17a2b8;
		/* Green color */
		border-radius: 2px;
	}

	.card {
		padding: 20px;
		border: 1px solid #ddd;
		border-radius: 8px;
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		width: 57%;
		max-width: 60%;
		/* Optional: limits the width of each card */
		background-color: #fff;
		text-align: left;
		font-size: 34.02px;
		font-weight: 400;
		line-height: 47.97px;
		color: #fff
			/* Ensures content inside each card is left-aligned */
	}

	.icon-box {
		font-size: 2rem;
		/* Makes the icon larger */
		margin-bottom: 10px;
		/* Adds spacing below the icon */
		color: #17a2b8;
		/* Example color for the icon */

	}

	.info-cards {
		gap: 20px;
		/* Adds space between each card */
		margin-top: 40px;
		/* Adds some spacing above the card row */
	}

	.body {
		background-image: url('/assets/images/CeeYIT.webp');
		background-size: cover;
		/* Makes the image cover the entire body */
		background-repeat: no-repeat;
		/* Prevents the image from repeating */
		background-position: center;
		/* Centers the image */
	}
</style>
@endsection
@section('content')

<div class="body">
	<div class="hero-section">
		<h1 style="font-size: 75px;font-weight: 900;line-height: 85px;
					letter-spacing: -0.04em;text-align: center;">
			Help Build Talents with <br><span style="color: #15BAB1;">CeeY-Solutions Foundation</span></h1>
		<p style="font-size: 22.5px;font-weight: 400;line-height: 32.04px;text-align: center;">We're in the business of building world-class tech talents and we are in <br> need of your help to impact more lives.</p>
		<div>
			<a href="#" class="btn btn-primaryn scholarship-b text-white mt-3">Apply for scholarships</a>

		</div>
	</div>

	<div class="info-section text-white">
		<h2 class="mb-5">Who Are <span class="underline-green">We</span>?</h2>
		<p style="font-size: 53.1px;font-weight: 900;line-height: 59.48px;text-align: center;">Our Goal to help more people have <br>access to learning tech skills.</p>
		<p style="font-size: 33.99px;font-weight: 400;line-height: 38.23px;text-align: center;">
			Shortage of skilled tech professionals is a global problem. <br> We are training people in tech and outsourcing them to <br> tech companies. We use your donations to:
		</p>
		<div class="row info-cards justify-content-center">
			<div class="col-12 col-md-6 col-lg-12 mb-4 d-flex justify-content-center">
				<div class="card text-start">

					<p><img src="assets/images/Frame 169.png" width="40px" alt=""> Sponsor scholarships to enroll in any course.</p>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-12 mb-4 d-flex justify-content-center">
				<div class="card text-start">

					<p><img src="assets/images/Frame 170.png" width="40px" alt=""> Purchase laptops for those in need.</p>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-12 mb-4 d-flex justify-content-center">
				<div class="card text-start">

					<p><img src="assets/images/Frame 168.png" width="40px" alt=""> Support students in any way necessary.</p>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection