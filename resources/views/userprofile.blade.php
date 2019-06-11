@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
			<div id="profilecontent">
				<div class="category">	
				<form>
					<h1 >Edit Profile </h1>
					<div class="form-group">
						<div class="form-row">
							<div class="form-group col-md-12">
							  <label for="inputName">Name</label>
							  <input type="text" class="form-control" id="inputName" placeholder="Name">
							</div>						
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-2">
							<label>Gender</label>
						</div>
						<div class="form-group col-md-10">
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
							<label class="form-check-label" for="inlineRadio1">Male</label>
							</div>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
							<label class="form-check-label" for="inlineRadio2">Female</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Address</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Address 2</label>
						<input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="inputCity">City</label>
						  <input type="text" class="form-control" id="inputCity">
						</div>
						<div class="form-group col-md-4">
						  <label for="inputState">State</label>
						  <select id="inputState" class="form-control">
							<option selected>Choose...</option>
							<option>...</option>
						  </select>
						</div>
						<div class="form-group col-md-2">
						  <label for="inputZip">Zip</label>
						  <input type="text" class="form-control" id="inputZip">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label>Profile Image</label>
						</div>
						<div class="form-group col-md-9">
								<input type="file" name="image" style="width:70%; float:left; padding:0px; border:0px;"><img src="{{URL::asset('/images/homeuser/biggreg.jpg')}}" width="80px">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
							Delete Account
							</label>
						</div>
					</div>
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>

@endsection
