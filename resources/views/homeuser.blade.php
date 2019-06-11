@extends('layouts.app')

@section('content')
<div class="homeusercontainer">
	<aside id="sidebar-one">
		<div id="FeaturedUserProfile">
				<div id="featuredUserTitle">
					SPOTLIGHT: SWILLY
				</div>
				<div id="featuredUserDesc">
					<p>
						Swilly is is comprised of two main members Steven Williams and Kevin Campbell. The two of which have played music together going back to the mid 80's. Many other people are and have been involved also such as Klaus Passenger, Jimmy A. Armstrong, Tammy Throneberry, Operation Neptune, Nathan Donily, Dave Ward and Def Star. The sound of Swilly and not surprisingly the music many refer to a mixture of ZZ Top and ACDC. While many other influences are also present mostly from 70's bands. Most of the songs are written and recorded over a 2 day period keeping the production period very short. Having recorded over 90 songs in a two year span the goal for Swilly is to use music platforms to find the best received songs and then compile a single album and apply the necessary costly promotion associated within the music business. Whoozl is a big part of that and is major player in assisting the discovery of unknown artists such as Swilly. For us this is about having fun doing what we love and have a passion for. Swilly hopes of course you enjoy the music as much as we enjoy making it. We love to interact and hear all the good and bad news as each is valuable to us. So drop us a line and let us know what you think good or bad. We do appreciate your opinions. Looking forward to hearing from you. thank you Whoozl for all you do!!
					</p>
				</div>
			</div>
	</aside>
	<main id="main">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="FeaturedUserPic">	
					<div>
						<a href="/albumedit">
							<img src="{{URL::asset('/images/homeuser/swillypic.png')}}" id="FeaturedUserPicture">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="grid-container">
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/ache.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/carmen.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/veris.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/paul.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/demina.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/jennifer.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/biggreg.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/phillip.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/patrice.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/bamil.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/jcraig.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/nicki.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/honeybeard.jpg')}}" class="userpics">
					</div>
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/shimmer.jpg')}}" class="userpics">
					</div> 
					<div class="grid-item">
						<img src="{{URL::asset('/images/homeuser/noel.jpg')}}" class="userpics">
					</div> 
				</div>
			</div>
		</div>
	</main>
	
	<aside id="sidebar-two">
		<div id="featuredmonthcolumn">
			<div id="featuredtitle">
				<p>2019</p>
			</div>
			<div class="featuredmonthuserdetails">
				<div class="featuredmonthuserpic">
					<p class="featuredmonth">January</p>
					<img src="{{URL::asset('/images/homeuser/jan.jpg')}}" class="userpics">
				</div>
				<div class="featuredmonthuserpic">
					<p class="featuredmonth">February</p>
					<img src="{{URL::asset('/images/homeuser/feb.jpg')}}" class="userpics">
				</div>
				<div class="featuredmonthuserpic">
					<p class="featuredmonth">March</p>
					<img src="{{URL::asset('/images/homeuser/mar.jpg')}}" class="userpics">
				</div>
				<div class="featuredmonthuserpic">
					<p class="featuredmonth">April</p>
					<img src="{{URL::asset('/images/homeuser/apr.jpg')}}" class="userpics">
				</div>
				<div class="featuredmonthuserpic">
					<p class="featuredmonth">May</p>
					<img src="{{URL::asset('/images/homeuser/may.jpg')}}" class="userpics">
				</div>				
			</div>
		</div>
	</aside>
</div>

@endsection


