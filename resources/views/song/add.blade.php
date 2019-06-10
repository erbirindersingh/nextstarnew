@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	        <form method="POST" action="{{ action('SongController@create') }}" enctype="multipart/form-data">
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
                            
                            <option value="A Capella">A Capella</option>
                            <option value="2">Acid</option>
                            <option value="7">Alternative</option>
                            <option value="30">Classical</option>
                            <option value="35">Contemporary</option>
                            <option value="36">Country</option>
                            <option value="40">Dance</option>
                            <option value="46">Disco</option>
                            <option value="54">Electronic/Techno</option>
                            <option value="69">Garage</option>
                            <option value="82">House</option>
                            <option value="70">Inspirational/Christian</option>
                            <option value="86">Instrumental</option>
                            <option value="89">Jazz</option>
                            <option value="95">Latin</option>
                            <option value="98">Metal</option>
                            <option value="103">New Age</option>
                            <option value="116">Pop</option>
                            <option value="128">R&B/Soul</option>
                            <option value="129">Rap/Hip Hop</option>
                            <option value="133">Reggae</option>
                            <option value="140">Rock</option>
                            <option value="165">Techno</option>
                            <option value="170">Trance</option>
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