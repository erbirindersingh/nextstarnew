@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	        <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="albumcover" class="col-md-4 col-form-label text-md-right">{{ __('Cover') }}</label>
                    <div class="col-md-6">
                        <input id="albumcover" type="file" class="btn btn-primary @error('albumcover') is-invalid @enderror" name="albumcover" required autocomplete="albumcover">

                        @error('albumcover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Album Name') }}</label>
                    <div class="col-md-6">
                        <input id="albumname" type="text" class="form-control @error('albumname') is-invalid @enderror" name="albumname" value="{{ old('albumname') }}" required autocomplete="albumname" autofocus>
                        @error('albumname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="albumauthorname" class="col-md-4 col-form-label text-md-right">{{ __('Album Artist') }}</label>
                    <div class="col-md-6">
                        <input id="albumauthorname" type="text" class="form-control" name="albumauthorname" value="{{ $user->name }}" required disabled>
                        <input id="albumauthor" type="hidden" class="form-control" name="albumauthor" value="{{ $user->id }}" required disabled>
                        @error('albumauthor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Album') }}
                        </button>
                    </div>
                </div>
            </form>
                <!--
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                       
                        
            -->

			<!--
			<form action="/album">
			<label for="albumname">Upload Cover</label>
			<input type="file" name="albumcover" id="albumcover" class="btn btn-primary">
			<label for="albumname">Album Author</label>
			<input type="text" name="albumauthor" id="albumauthor" value="{{ $user->name }}" class="form-control" disabled>
			<input type="hidden" name="albumauthorid" id="albumauthorid" value="{{ $user->id }}" class="form-control" disabled>
			<label for="albumname">Album Name</label>
			<input type="text" name="albumname" id="albumname" class="form-control">
			-->
		</div>
	</div>
</div>
@endsection