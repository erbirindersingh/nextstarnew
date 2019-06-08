@extends('layouts.app')
@section('content')
    <div id="player">
        <audio controls id="myAudio">
            <source>   
            
        </audio>    
            
            <button onclick="pauseAudio()" type="button">Pause Audio</button>
    </div>
    
    
    <script type="application/javascript">
    var x = document.getElementById("myAudio"); 
    function pauseAudio() { 
    x.pause(); 
    } 
    </script>
    
 
@endsection