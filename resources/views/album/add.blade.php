@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="panel panel-default">
                        <div class="panel-heading">Select Product Image</div>
                        <div class="panel-body" align="center">
                            <input type="file" name="file" id="upload_image" />
                            <input type="text" name="upload_image1" id="upload_image1" />

                            <div id="uploaded_image"></div>
                        </div>
                    </div>
                    <div id="uploadimageModal" class="modal" role="dialog">
                        <div class="modal-dialog">
                             <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Upload & Crop Image</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8 text-center">
                                              <div id="image_demo" style="width:350px; margin-top:30px"></div>
                                        </div>
                                        <div class="col-md-4" style="padding-top:30px;">
                                            <br />
                                            <br />
                                            <br/>
                                              <button class="btn btn-success crop_image">Crop & Upload Image</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

<script type="application/javascript">
    $("#file").on('change', function () 
    {
        if (typeof (FileReader) != "undefined") 
        {
            var image_holder = $("#image-holder");
            image_holder.empty();
            var reader = new FileReader();
            reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image"
            }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[0]);
        } 
        else 
        {
            alert("This browser does not support FileReader.");
        }});
</script>
<script type="application/javascript">  
$(document).ready(function()
{
    $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width:200,
        height:200,
        type:'square' //circle
    },
    boundary:{
        width:300,
        height:300
    }
    });
    $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
            url: event.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });
    $('.crop_image').click(function(event){
        event.preventDefault();
        $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
        }).then(function(response){

            
            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"uploadcrop",
            type: "post",
            data:{"image": response},
            success:function(data)
            {
                console.log("SOmething"+data);
                $('#uploadimageModal').modal('hide');
                $('#uploaded_image').html(data.split("~")[0]);
                
                $('#upload_image1').attr("value",data.split("~")[1]);
                $('#upload_image').attr("value",data.split("~")[0]);
                
            }
        });
        })
    });
});  
</script>
<script src="{{ asset('js/croppie.js') }}" type="application/javascript"></script>

@endsection