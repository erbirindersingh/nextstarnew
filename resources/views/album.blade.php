@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>Upload A New Song</h1>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <fieldset class="scheduler-border">
        			    <legend class="scheduler-border">Select one of {{$user->name}}'s Albums</legend>
        			    <div class="row control-group">
                            <div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 album' id="0" style='background-image:url("/images/add.png");'>
                                
                            </div>
                            @foreach ($albums as $album)
                                    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 album' style='background-image:url("/images/albums/{{$album->id}}.jpg");' id="{{$album->id}}">
                                        
                                        <div class='albumtext'> 
                                            <div>{{ $album->albumname }}</div>
                                            <div><a href="/albumdel"><img src="{{URL::asset('/images/bin.png')}}" class='del'></a></div>
                                            <div><a href="/albumedit"><img src="{{URL::asset('/images/edit.png')}}" class='edit'></a></div>
                                        </div>
                                        
                                    </div>
                            @endforeach
                            
        			    </div>
        			</fieldset>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Songs in </legend>
                        <div class="row control-group">
                            <div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 song' id="0" style='background-image:url("/images/add.png");'>
                        </div>
                    </fieldset>
                </div>
                
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function(){
        $(".album").click(function(){
            if(this.id==0){
                $(location).attr('href', '/addalbum');
            }
        });
        $(".song").click(function(){
            if(this.id==0){
                $(location).attr('href', '/addsong');
            }
        });
    });
</script>
@endsection


