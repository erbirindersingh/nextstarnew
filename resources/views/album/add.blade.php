@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="albumname">Upload Cover</label>
			<input type="file" name="albumcover" id="albumcover" class="btn btn-primary">
			<label for="albumname">Album Author</label>
			<input type="text" name="albumauthor" id="albumauthor" value="{{ $user->name }}" class="form-control" disabled>
			<label for="albumname">Album Name</label>
			<input type="text" name="albumname" id="albumname" class="form-control">
		</div>
	</div>
</div>
@endsection