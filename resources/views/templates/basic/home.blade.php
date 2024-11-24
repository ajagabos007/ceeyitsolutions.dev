@extends($activeTemplate.'layouts.frontend')
@section('style')
<style>
	body {
		font-family: 'Inter', sans-serif;
	}

	.navbar {
		padding: 1rem 2rem;
		background-color: white;
	}

	.nav-link {
		color: #333;
		font-size: 14px;
		font-weight: 500;
		padding: 0.5rem 1.5rem;
	}

	.navbar-nav {
		align-items: center;
	}


	.hero-section {
		padding: 4rem 0;
	}

	.hero-title {
		font-size: 3.5rem;
		font-weight: 700;
		line-height: 1.2;
		display: flex;
		flex-direction: column;
	}

	.hero-image-container {
		display: flex;
		justify-content: flex-end;
	}

	.hero-content {
		padding-right: 3rem;
	}

	.accent-text {
		color: #00BFA5;
	}

	.section-header {
		text-align: center;
		margin-bottom: 3rem;
	}

	.section-title {
		font-size: 2.5rem;
		font-weight: 700;
		margin-bottom: 1rem;
		text-align: center;
	}

	.section-subtitle {
		color: #64748B;
		text-align: center;
		max-width: 700px;
		margin: 0 auto 2rem;
	}

	.course-card {
		background-color: white;
		border-radius: 12px;
		padding: 1.5rem;
		height: 100%;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
		display: flex;
		flex-direction: column;
		margin-bottom: 1.5rem;
	}

	.course-card .icon {
		width: 48px;
		height: 48px;
		margin-bottom: 1rem;
	}

	.course-card hr {
		/* margin: 2rem 0; */
		opacity: 0.2;
	}

	.who-card {
		background-color: #1E293B;
		border-radius: 16px;
		overflow: hidden;
		height: 100%;
	}

	.who-card .content {
		padding: 2rem;
		color: white;
	}

	.who-card .image {
		height: 100%;
		min-height: 300px;
		background-size: cover;
		background-position: center;
	}

	.feature-card {
		background-color: #1E293B;
		border-radius: 16px;
		padding: 2rem;
		color: white;
		height: 100%;
		text-align: center;
		margin-bottom: 2rem;
	}

	.feature-card img {
		width: 80px;
		height: 80px;
		margin-bottom: 1.5rem;
	}

	.testimonial-carousel {
		padding: 2rem 0;
	}

	.testimonial-card {
		background: white;
		border-radius: 16px;
		padding: 2rem;
		margin: 0 1rem;
		box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}

	.carousel-indicators {
		position: relative;
		margin-top: 2rem;
	}

	.carousel-indicators button {
		width: 10px;
		height: 10px;
		border-radius: 50%;
		margin: 0 5px;
	}

	.carousel-indicators [data-bs-target] {
		width: 50px;
		height: 4px;
		background-color: #ccc;
		border: none;
		border-radius: 2px;
		margin: 0 4px;
	}

	.carousel-indicators .active {
		background-color: #00BFA5;
	}

	span,
	.accent-text {
		width: 580px;
		height: 137;
		font-size: 75px;
		letter-spacing: -4%;
		font-weight: bolder;
		line-height: 85px;
	}

	.fin-aid-outline {
		width: 152px;
		height: 43px;
		border: 1px solid #15BAB1;
		border-radius: 20px;
	}

	hr {
		margin-top: 3rem;
		border: none;
		width: 236px;
		height: 5px;
		background-color: white;
		border-radius: 10px;
		/* opacity: 20%; */
	}

	.courses-gradient {
		width: 294px;
		height: 258px;
		border-radius: 40px;
	}

	.python-gradient {
		background: linear-gradient(180deg, #FB729F 10%, #F55989 100%);
	}

	.Data-Analysis-Gradient {
		background: linear-gradient(180deg, #A08CFD 10%, #917AFC 100%);
	}

	.carousel-item img {
		margin: 0 auto;
		/* Centers horizontally */
		display: block;
		/* Ensures proper block-level centering */
	}

	.card {
		height: 100%;
		border: none;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		transition: transform 0.3s ease-in-out;
	}

	.card:hover {
		transform: translateY(-5px);
	}

	.card-img-top {
		height: 150px;
		object-fit: cover;
	}

	.card-body {
		padding: 1rem;
		flex-direction: column;
		justify-content: center;
		text-align: center;
	}

	.card-title {
		font-size: 1.2rem;
		font-weight: bold;
		margin-top: 0.5rem;
		text-align: start;
	}

	.card {
		width: 294px;
		height: 258px;
		border-radius: 40px;
	}

	.hero-section {
		padding: 80px 0;
	}

	.hero-title {
		font-size: 75px;
		font-weight: 700;
		line-height: 1.2;
		margin-bottom: 20px;
	}

	.hero-title span {
		color: #00CED1;
	}

	.hero-description {
		font-size: 1.1rem;
		color: #666;
		margin-bottom: 30px;
		max-width: 600px;
	}

	.hero-buttons .btn {
		padding: 12px 30px;
		border-radius: 25px;
		font-weight: 500;
		margin-right: 15px;
	}

	/* .btn-get-started {
            background-color: #00CED1;
            color: white;
            border: none;
        } */

	.btn-financial-aid {
		background-color: transparent;
		border: 1px solid #00CED1;
		color: #00CED1;
	}

	.hero-image {
		position: relative;
		width: 100%;
		height: 100%;
		overflow: hidden;
		z-index: 2;
	}

	.hero-image img {
		max-width: 100%;
		width: 358px;
		height: auto;

	}

	.floating-element {
		position: absolute;
		background: white;
		padding: 10px 15px;
		border-radius: 8px;
		box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
		z-index: 3;
		display: flex;
		align-items: center;
		gap: 10px;
	}

	.float-1 {
		top: 15%;
		right: 10%;
	}

	.floating-element .icon {
		width: 30px;
		height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
	}

	.float-1 .icon {
		background-color: #E8F0FF;
		color: #4A90E2;
	}


	.icon-wrapper {
		font-size: 2rem;
		margin-bottom: 1rem;
		margin-top: 2rem;
	}


	.course-card {
		aspect-ratio: 1;
		width: 260px;
		height: 258px;
		border-radius: 40px;
		padding: 20px;
		color: white;
		transition: transform 0.3s ease;
		margin-bottom: 20px;
		display: flex;
		flex-direction: column;
		align-items: start;
		justify-content: start;
	}



	.course-card:hover {
		transform: scale(1.05);
	}

	.python-bg {
		background-color: #FF69B4;
	}

	.data-analysis-bg {
		background-color: #8A2BE2;
	}

	.data-eng-bg {
		background: linear-gradient(180deg, #65D5F3 10%, #4BC9E9 100%);
	}

	.site-reliability-bg {
		background-color: #FFA500;
	}

	.cloud-eng-bg {
		background-color: #40E0D0;
	}

	.project-management-bg {
		background-color: #FF69B4;
	}

	.devops-bg {
		background-color: #8A2BE2;
	}

	.icon-wrapper {
		font-size: 2rem;
		margin-bottom: 1rem;
	}

	.courses-section {
		padding: 40px 0;
	}

	.courses-title {
		color: #333;
		margin-bottom: 0.5rem;
		text-align: center;
	}

	.courses-subtitle {
		color: #666;
		margin-bottom: 2rem;
		text-align: center;
	}

	.container {
		max-width: 1200px;
		padding: 0 15px;
		margin: 0 auto;
	}

	h1 {
		font-size: 75px;
		font-weight: 400;
	}

	h2 {
		font-size: 40px;
		font-weight: 400;
	}

	p.about-us {
		color: #FFFFFF;
		font-size: 12px;
	}

	.no-wrap {
		white-space: nowrap;
	}

	button.btn-get-started {
		color: #FFFFFF;
	}
</style>
@endsection
@section('content')
@php
$banner = getContent('banner.content',true)->data_values;
@endphp
<!-- <section class="hero bg_img" style="background-image: url('{{getImage('assets/images/frontend/banner/bg.svg','1920x640')}}')">
		<div class="container">
			<div class="row align-items-center justify-content-xl-start justify-content-center">
				<div class="col-xl-5 col-lg-6 text-xl-start text-center">
					<h2 class="hero__title text-white">{{__(@$banner->heading)}}</h2>
					<p class="hero__description text-white mt-3">{{__(@$banner->sub_heading)}}</p>
					<div class="join_us row">
						<a href="{{route('user.register')}}" class="btn btn-sm btn-outline--base d-flex align-items-center mt-sm-0 mt-2">

							<p style="padding: 5px;font-size:15px">@lang('Get Started')</p>
						</a>
					</div>
					{{-- <form class="hero-search-form mt-xl-5 mt-4" action="{{route('courses')}}" method="GET">
					<i class="las la-search"></i>
					<input type="text" name="search" autocomplete="on" class="form--control" placeholder="@lang('title, tags eg. web design, art, skill development')...">
					<button type="submit" class="hero-search-form__btn">@lang('Search')</button>
					</form> --}}
				</div>
			</div>
		</div>
	</section> -->

<!-- Hero Section -->
<div class="container">
	<div class="hero-section row align-items-center">
		<div class="col-lg-6">
			<h1 class="hero-title">Building the<br><span class="no-wrap">Next <span class="highlight">Tech&nbsp;Giants</span></span></span></h1>
			<p class="hero-description">Ceeyit offers a self-paced platform to learn software development and management skills. Our e-learning programs has been developed to build giants in tech.</p>
			<div class="hero-buttons">
				<a href="{{route('user.register')}}" class="btn btn-get-started btn-sm">@lang('Get Started')</a>
				<button class="btn btn-financial-aid">Financial Aid</button>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="hero-image">
				<img src="assets/images/boy_with_book.jpg" alt="Student learning" style="float: right;">
				<img src="assets/images/aid_overlay_svg.svg" alt="" style="position: absolute; border-radius: 10px; right: 250px; width: 354px; height: 150px; top: 50px;">
				<img src="assets/images/it_overlay_svg.svg" alt="" style="position: absolute; border-radius: 10px; top: 90px; right: 200px; width: 354px; height: 150px; top: 130px; right: 190px;">
				<img src="assets/images/chart_overlay_svg.svg" alt="" style="position: absolute; top: 200px; right: 240px; width: 400px; height: 180px; top: 240px; right: 190px;">
			</div>

			<!-- Floating Elements -->
			<!-- <div class=""> -->
			<div class="col-lg-6 text-center position-relative hero-image">
				<img src="assets/images/aid_overlay.png" alt="" class="position-absolute" style="left: -60px; top: 20px; z-index: 500;">

			</div>
			<!-- <div class="text">Financial Aid is available</div> -->
		</div>
	</div>
</div>

<!-- Courses Section -->
<section>
	<!-- Courses Section -->
	<div class="container courses-section">
		<h2 class="courses-title">Our top essential career courses</h2>
		<p class="courses-subtitle">Introductory courses or modules that covers basic principles and concepts of DevOps</p>

		<div class="row g-4">
			<!-- First Row -->
			<div class="col-md-3 col-sm-6">
				<div class="course-card python-bg">
					<div class="icon-wrapper">
						<img src="assets/images/python_vector.png" alt="">
					</div>
					<h5>Phython</h5>
					<hr class="me-5">
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="course-card data-analysis-bg">
					<div class="icon-wrapper">
						<img src="assets/images/Data-Analysis-vector.png" alt="">
					</div>
					<h5>Data Analysis</h5>
					<hr style="clear: both;">
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="course-card data-eng-bg">
					<div class="icon-wrapper">
						<img src="assets/images/Data-Engineering_vector.png" alt="">
					</div>
					<h5>Data Engineering</h5>
					<hr>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="course-card site-reliability-bg">
					<div class="icon-wrapper">
						<img src="assets/images/site-reliability-engineering_vector.png" alt="">
					</div>
					<h5>Site Reliability Engineering</h5>
					<hr>
				</div>
			</div>

			<!-- Second Row -->
			<div class="col-md-3 col-sm-6">
				<div class="course-card site-reliability-bg">
					<div class="icon-wrapper">
						<img src="assets/images/cloud_vector.png" alt="">
					</div>
					<h5>Cloud Engineering</h5>
					<hr>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="course-card python-bg">
					<div class="icon-wrapper">
						<img src="assets/images/prjt-mgmt-vector.png" alt="">
					</div>
					<h5>Project Management</h5>
					<hr>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="course-card data-analysis-bg">
					<div class="icon-wrapper">
						<img src="assets/images/Devops_bg.png" alt="">
					</div>
					<h5>DevOps Engineering</h5>
					<hr>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="py-5 bg-light">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title">Who Are We?</h2>
			<p class="section-subtitle">Introductory courses or modules that covers basic principles and concepts of DevOps</p>
		</div>

		<div class="row g-4">
			<div class="col-md-6">
				<div class="who-card">
					<div class="row g-0">
						<div class="col-md-6">
							<div class="content">
								<h3>About us</h3>
								<p class="about-us">Ceeyit Solutions is a platform that equips individuals with technical and
									non technical skills to become a DevOps Engineer. Students learn through stored and
									live course materials online; assignments, quizzes and exams. Students can monitor due dates;
									grade results and provide relevant feedback all in one place.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="image" style="background-image: url('assets/images/what-WE_Offer-1.png');"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="who-card">
					<div class="row g-0">
						<div class="col-md-6">
							<div class="content">
								<h3>Eligibility</h3>
								<p class="about-us">Individuals with or without background and experience in Engineering and
									Computer Science fields can join it. If you desire to be a Software developer,
									Network Engineer, Testing Engineer & QA Engineer, System Administrator or Cloud Engineer.</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="image" style="background-image: url('assets/images/what-we-offer-2.png');"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- What We Offer Section -->
<section class="py-5">
	<div class="container g-4">
		<div class="section-header">
			<h2 class="section-title">What we offer</h2>
			<p class="section-subtitle">Introductory courses or modules that covers basic principles and concepts of DevOps</p>
		</div>

		<div class="row align-items-center gy-5">
			<div class="col-md-4 d-flex justify-content-center">
				<img src="assets/images/fundamental_concepts.png" alt="Fundamental Concepts" class="img-fluid">..
			</div>
			<!-- Repeat for other features -->

			<div class="col-md-4">
				<img src="assets/images/hands_on_experience.jpg" alt="Fundamental Concepts" class="img-fluid">
			</div>

			<div class="col-md-4">
				<img src="assets/images/toolchain_training.jpg" alt="Fundamental Concepts" class="img-fluid">
			</div>

			<div class="col-md-4">
				<img src="assets/images/cloud_infrastructure.jpg" alt="Fundamental Concepts" class="img-fluid">
			</div>

			<div class="col-md-4">
				<img src="assets/images/certificates.jpg" alt="Fundamental Concepts" class="img-fluid">
			</div>

			<div class="col-md-4">
				<img src="assets/images/support.jpg" alt="Fundamental Concepts" class="img-fluid">
			</div>
		</div>
	</div>
</section>
<!-- <br><br>
<section class="first-section">
	<div class="container">
		<div class="row gy-4">
			<h6 class="title-head text-center">Transition to DevOps</h6>
			<p class="title-desc text-center">CeeyIT is an online software suite that combines all the tools needed<br> to learn and become a professional DevOps..</p>

		</div>
		<br>
		<center>
			<div class="row gy-4 justify-content-center">

				<div class="col-lg-4 col-md-4 col-sm-6">

					<div class="icon_bg" style="background-image: url('assets/images/frontend/img/file.svg'); background-repeat: no-repeat;background-position: center center;">

					</div>
					<div class="box-first">
						<br>
						<p class="in_box_text_head">Comprehensive Curriculum

						</p>
						<p style="margin-top:-40px" class="in_box_text_desc">Well structured curriculum designed by Industry experts, and regularly updated to keep up with industry trends. </p>
					</div>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">

					<div class="icon_bg" style="background-color:#00CBB8;background-image: url('assets/images/frontend/img/cal.svg'); background-repeat: no-repeat;background-position: center center;">

					</div>
					<div class="box-first">
						<br>
						<p class="in_box_text_head">Collaborative And Interactive Learning
						</p>
						<p class="in_box_text_desc">There’s collaboration between learners through study groups, live classes with instructors or mentors, to aid active participation in learning process. </p>
					</div>

				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">

					<div class="icon_bg" style="background-color:#29B9E7;background-image: url('assets/images/frontend/img/last.svg'); background-repeat: no-repeat;background-position: center center;">

					</div>
					<div class="box-first">
						<br>
						<p class="in_box_text_head">Real World Projects
						</p>
						<p class="in_box_text_desc">Individuals are exposed to hands-on projects where they get to apply knowledge and skills learnt. </p>
					</div>

				</div>

			</div>

		</center>

	</div>

</section>

<section class="first-section">
	<div class="container">
		<div class="row gy-4 mx-5">
			<h6 class="title-head text-center">Who are CeeyIT?</h6>

			<center>
				<p class="title-desc text-center">CeeyIT Solutions is a platform that equips individuals with technical and non technical<br> skills to become a DevOps Engineer. Students learn through stored and live course <br>materials online; assignments, quizzes and exams. Students can monitor due dates; <br>grade results and provide relevant feedback all in one place.</p>

			</center>
		</div>
		<br>
		<center>
			<div class="row who_are align-items-center justify-content-xl-start justify-content-center">
				<div>
					<h6 class="title-head text-center text-white">FOR STUDENTS</h6>
					<div class="gain">

						<a href="{{route('user.login')}}" class="btn btn-lg text-white me-2 mt-sm-0 mt-2">
							{{-- <i class="las la-user fs--18px me-2"></i> --}}
							Gain Access</a>
					</div>
				</div>
			</div>
		</center>

	</div>

</section>
<br>
<section class="first-section">
	<div class="container">
		<div class="row gy-4 p-3">
			<div class="col-xl-5 col-lg-5 text-xl-start ">
				<svg width="73" height="73" viewBox="0 0 73 73" fill="none" xmlns="http://www.w3.org/2000/svg">
					<circle cx="36.5" cy="36.5" r="36.5" fill="#4C94FF" />
				</svg>

				<h6 class="title-head" style="color:#2F327D;margin-top:-50px;font-size:24px">Training Eligibility</h6>
				<br>
				<p class="title-desc " style="font-size:16px">Individuals with or without background and experience in Engineering and Computer Science fields can join it. If you <b>desire</b> to be a Software developer, Network Engineer, Testing Engineer & QA Engineer, System Administrator or Cloud Engineer.</p>
				<br>

				{{-- <a href="{{route('user.login')}}" style="text-decoration: underline; color:#111;font-size:14px">
				Learn More</a> --}}
			</div>
			<div class="col-xl-2 col-lg-2 text-xl-start "></div>

			<div class="col-xl-5 col-lg-5 text-xl-start ">
				<img src="assets/images/frontend/img/digital.png" style="width: 100%" />
			</div>
		</div>

	</div>

</section>

<section class="first-section">
	<div class="container">
		<div class="row gy-4 p-3">
			<h6 class="title-head text-center">What We Offer</h6>
			{{-- <p class="title-desc text-center">This very extraordinary feature, can make learning activities more efficient</p> --}}

		</div>
		<br>

		<div class="row gy-4 mt-0">
			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/devops_traning.png" style="width: 80%" />
			</div>
			<div class="col-xl-4 col-lg-4 text-xl-start ">

				<br><br><br>
				<p class="title-desc " style="font-size:14px;">We cover a wide range of topics and provide comprehensive resources and tools to support learners in their journey.
				</p>

			</div>
			<div class="col-xl-2 col-lg-2 text-xl-start "></div>
		</div>


		<div class="row gy-4 mt-5">

			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<h6 class="title-head" style="color:#2F327D;margin-top:40px;font-size:24px">Fundamental Concepts</h6>
				<br>

				<p class="title-desc " style="font-size:14px;">Introductory courses or modules that covers basic <br>principles and concepts of DevOps
				</p>

			</div>
			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/software.png" style="width: 80%;margin-top:0px" />
			</div>
		</div>

		<div class="row gy-4 mt-0 mx-5">
			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/handson.png" style="width: 100%;margin-top:30px" />
			</div>
			<div class="col-xl-4 col-lg-4 text-xl-start ">
				<br /><br />
				<h6 class="title-head" style="color:#2F327D;margin-top:40px;font-size:24px">Hands-on Experience</h6>
				<br>

				<p class="title-desc " style="font-size:14px;">Interactive and hands on training which allows learners to practice using DevOps tools and technologies. This helps to reinforce their understanding of concepts and gain practical experience,
				</p>

			</div>
			<div class="col-xl-2 col-lg-2 text-xl-start "></div>
		</div>


		<div class="row gy-4 mt-5 mx-5">

			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<h6 class="title-head" style="color:#2F327D;margin-top:40px;font-size:24px">Toolchain Training</h6>
				<br>

				<p class="title-desc " style="font-size:14px;">In-depth training on popular DevOps tools and <br />technologies such as version control systems
				</p>

			</div>
			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/devopsstuff.png" style="width: 100%;margin-top:0px" />
			</div>
		</div>



		<br /><br /><br />
		<section class="first-section ">
			<div class="container">
				<div class="row gy-4">
					<h6 class="title-head text-center" style="color: #2F327D">Cloud Infrastructure</h6>

					<center>
						<p class="title-desc text-center">This cover topics that provides guidance on deploying <br>and managing infrastructure in the cloud e.g <br>Amazon Web Services (AWS).
						</p>

					</center>
				</div>
				<br><br>
				<center>
					<div>
						<img src="assets/images/frontend/img/devops_server.png" style="width: 100%;" />

					</div>
				</center>

			</div>

		</section>
		<br><br>


		<div class="row gy-4 mt-5 mx-5">
			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/graduation.png" style="width: 80%;margin-top:-60px" />
			</div>

			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<h6 class="title-head" style="color:#2F327D;margin-top:40px;font-size:24px">Certification & Assessments</h6>
				<br>

				<p class="title-desc " style="font-size:14px;">We offer certification programs or assessments to <br>validate learners' knowledge and skills in specific DevOps <br>domains, to provide recognition and enhance their <br>professional profiles.
				</p>

			</div>

		</div>
		<br><br><br>

		<div class="row gy-4 mt-5 mx-5">


			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<h6 class="title-head" style="color:#2F327D;margin-top:40px;font-size:24px">Support</h6>
				<br>

				<p class="title-desc " style="font-size:14px;">We provide support needed. We are available for <br>questions, clarifications, and also to share our <br />experiences. This gives all access to subject matter <br>experts or mentors who can provide guidance <br>and support.

				</p>

			</div>

			<div class="col-xl-6 col-lg-6 text-xl-start ">
				<img src="assets/images/frontend/img/support_devops.png" style="width: 80%;margin-top:-60px" />
			</div>

		</div>






		{{-- <div class="col-xl-7 col-lg-7 text-xl-start " >
			<img src="assets/images/frontend/img/people.png" style="width: 100%"  />
		</div>
		<div class="col-xl-1 col-lg-1 text-xl-start " ></div>
			<div class="col-xl-4 col-lg-4 text-xl-start " >
				<br><br>
				 <h6 class="title-head" style="color:#2F327D;margin-top:30px">A user interface designed <br>for the classroom</h6>
		  <br>
		<div style="display: flex">
			  <img src="assets/images/frontend/img/item_1.svg"   />
				<p class="title-desc " style="font-size:16px" >Students have smooth access to all courses enrolled for.</p>
		</div>
		<div style="display: flex">
			  <img src="assets/images/frontend/img/item_2.svg"   />
				<p class="title-desc " style="font-size:16px" >Study Experience is precise and completely exciting</p>
		</div>
		<div style="display: flex; margin-left:30px">
			  <img src="assets/images/frontend/img/item_3.svg" style="width: 30px;margin-right:20px"   />
				<p class="title-desc " style="font-size:16px" >Teachers can easily see all students and class data at one time.</p>
		</div>
	
			</div>
			
		
		
		</div> --}}

		{{-- <br><br><br><br>
		<div class="row gy-4 mt-3 p-3" >
			
			<div class="col-xl-4 col-lg-4 text-xl-start " >
				
				 <h6 class="title-head" style="color:#2F327D;margin-top:30px">Best Tool for <br>Learners.</h6>
		  <br>
				<p class="title-desc " style="font-size:14px" >Class has a dynamic set of teaching tools built to be deployed and used during class. Teachers can handout assignments in real-time for students to complete and submit.
				</p>
		 
			</div>
			<div class="col-xl-3 col-lg-3 text-xl-start " ></div>
			<div class="col-xl-5 col-lg-5 text-xl-start " >
			<img src="assets/images/frontend/img/besttool.png" style="width: 100%"  />
		</div>
			
		
		
		</div>

		<br><br><br><br> --}}
		{{-- <div class="row gy-4 mt-3 p-3" >
			<div class="col-xl-5 col-lg-5 text-xl-start " >
			<img src="assets/images/frontend/img/assessment.png" style="width: 100%"  />
		</div>
		<div class="col-xl-2 col-lg-2 text-xl-start " ></div>
			
			<div class="col-xl-5 col-lg-5 text-xl-start " >
				 <h6 class="title-head" style="color:#2F327D;margin-top:30px">Assessments, <br><span style="color:#00CBB8">Quizzes,</span> Tests</h6>
		  <br>
				<p class="title-desc " style="font-size:14px" >Easily launch live assignments, quizzes, and tests. Student results are automatically entered in the online gradebook.
				</p>
		 
			</div>
		
		</div>

		<br><br><br><br> --}}
		{{-- <div class="row gy-4 mt-3" >
			
		<div class="col-xl-5 col-lg-5 text-xl-start " >
				 <h6 class="title-head" style="color:#2F327D;margin-top:30px"><span style="color:#00CBB8">Class Management</span> <br>Tools for Educators</h6>
		  <br>
				<p class="title-desc " style="font-size:14px" >Class provides tools to help run and manage the class such as Class Roster, Attendance, and more. With the Gradebook, teachers can review and grade tests and quizzes in real-time.
				</p>
		 
			</div>
			<div class="col-xl-2 col-lg-2 text-xl-start " ></div>
		
			<div class="col-xl-5 col-lg-5 text-xl-start " >
			<img src="assets/images/frontend/img/classmanagment.png" style="width: 100%"  />
		</div>
		
		</div>
		

		<br><br><br><br> --}}
		{{-- <div class="row gy-4 mt-3" >
			<div class="col-xl-5 col-lg-5 text-xl-start " >
			<img src="assets/images/frontend/img/oneonone.png" style="width: 100%"  />
		</div>
		<div class="col-xl-2 col-lg-2 text-xl-start " ></div>
		<div class="col-xl-5 col-lg-5 text-xl-start " >
				 <h6 class="title-head" style="color:#2F327D;margin-top:50px">One-on-One <br><span style="color:#00CBB8">Discussions</span> </h6>
		  <br>
				<p class="title-desc " style="font-size:14px" >Teachers and teacher assistants can talk with students privately without leaving the Zoom environment.
				</p>
		 
			</div>
			
		
			
		
		</div> --}}
	</div>

</section> -->

<!-- Student's Feedback Section -->
<section class="py-5 bg-light">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title">Student's Feedback</h2>
			<p class="section-subtitle">Introductory courses or modules that covers basic principles and concepts of DevOps</p>
		</div>

		<div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="assets/images/chika_feedback.png" class="d-block w-50 img-fluid" alt="Student Feedback" height="228px" width="399">
				</div>
				<div class="carousel-item">
					<img src="assets/images/dave_feedback.png" class="d-block w-50 img-fluid" alt="Student Feedback">
				</div>
				<div class="carousel-item">
					<img src="assets/images/tosin_feedback.png" class="d-block w-50 img-fluid" alt="Student Feedback">
				</div>
			</div>
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
				<button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
				<button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
			</div>
		</div>
	</div>
</section>

<!-- Consultation Section -->
<section class="py-5">
	<div class="container text-center">
		<h2 class="section-title">Get Expert Consultation</h2>
		<p class="section-subtitle">Introductory courses or modules that covers basic principles and concepts of DevOps</p>
		<a href="{{ url('consultation')}}" class="btn btn-signup btn-sm" style="width: 230; height: 43; border-radius: 20px;">Get Consultation</a>
	</div>
</section>

<!-- <section class="first-section">
	<div class="container">
		<div class="row gy-4">
			<h6 class="title-head headerHod text-center" style="font-weight:500">GET EXPERT <br>CONSULTATION & GET <br>YOUR DREAM JOB.</h6>

			<center>
				<a href="{{ url('consultation')}}">
					<p class="title-desc text-white" style="width: 280px; font-weight:600;background:#252641;padding:10px;border-radius:8px">GET CONSULTATION</p>
				</a>
			</center>
		</div>
		<br>

	</div>

</section> -->
<br>

@if($sections->secs != null)
@foreach(json_decode($sections->secs) as $sec)
<!-- @include($activeTemplate.'sections.'.$sec) -->
@endforeach
@endif
@endsection