@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>Album Directory</h1>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<input type='text' class='form-control' placeholder="Search">
                </div>
            </div>
                    
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<fieldset class="scheduler-border">
        			    <div class="row control-group">
                            @foreach ($albums as $album)
                                    <div class='col-lg-2 col-md-3 col-sm-4 col-xs-6 album' style='background-image:url("/images/albums/{{$album->id}}.jpg");' id="{{$album->id}}">
                                        
                                        <div class='albumtext'> 
                                            <div>{{ $album->albumname }}</div>
                                        </div>
                                        
                                    </div>
                            @endforeach
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

<!--
<div id="player">
    <audio controls id="myAudio">
        <source>  
    </audio>        
</div>


<script type="application/javascript">
var x = document.getElementById("myAudio"); 
function pauseAudio() { 
x.pause(); 
} 
</script>

-->

@endsection


