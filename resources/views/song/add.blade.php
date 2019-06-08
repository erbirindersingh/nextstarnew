@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	        <form method="POST" action="addsong">
                @csrf
                <div class="form-group row">
                    <label for="songfile" class="col-md-4 col-form-label text-md-right">{{ __('Select File') }}</label>
                    <div class="col-md-6">
                        <input id="songfile" type="file" class="btn btn-primary @error('songfile') is-invalid @enderror" name="songfile" required autocomplete="songfile">

                        @error('songfile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="songtitle" class="col-md-4 col-form-label text-md-right">{{ __('Song Title') }}</label>
                    <div class="col-md-6">
                        <input id="songtitle" type="text" class="form-control @error('songtitle') is-invalid @enderror" name="songtitle" value="{{ old('songtitle') }}" required autocomplete="songtitle" autofocus>
                        @error('songtitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="songauthorname" class="col-md-4 col-form-label text-md-right">{{ __('Song Artist') }}</label>
                    <div class="col-md-6">
                        <input id="songauthorname" type="text" class="form-control" name="songauthorname" value="{{ $user->name }}" required readonly>
                        <input id="songauthor" type="hidden" class="form-control" name="songauthor" value="{{ $user->id }}" required readonly>
                        @error('songauthor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="albumname" class="col-md-4 col-form-label text-md-right">{{ __('Album Name') }}</label>
                    <div class="col-md-6">
                        <input id="albumname" type="text" class="form-control" name="albumname" value="{{ $album->albumname }}" required readonly>
                        <input id="albumid" type="hidden" class="form-control" name="albumid" value="{{ $album->id }}" required readonly>
                        @error('albumid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="songgenre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>
                    <div class="col-md-6">
                        <select id="songgenre" class="form-control" name="songgenre" required>
                            <option value=''>HipHop</option>
                            <option value=''>Classical</option>
                            <option value=''>Reggae</option>
                            <option value=''>Rock</option>
                            <option value=''>Jazz</option>
                            <option value=''>Heavy Metal</option>
                            <option value=''>Dance</option>
                            <option value=''>Pop</option>

                        </select>
                        @error('songgenre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Song') }}
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