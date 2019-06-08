@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1>List of Albums</h1>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <fieldset class="scheduler-border">
        			    <div class="row control-group">
                            @foreach ($albums as $album)
                                    <div class='col-lg-3 col-md-4 col-sm-6 col-xs-6 album' style='background-image:url("/images/albums/{{$album->id}}.jpg");' id="{{$album->id}}">
                                        
                                        <div class='albumtext'> 
                                            <div>{{ $album->albumname }}</div>
                                        </div>
                                        
                                    </div>
                            @endforeach
        			    </div>
        			</fieldset>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Songs in </legend>
                        <div class="row control-group">
                            
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


