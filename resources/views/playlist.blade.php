@extends('layouts.app')
@section('content')
<div class="row">
<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
    <h1>Your Playlist</h1>
</div>    
<div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
    <audio controls autoplay id="player">
      <source id="playersrc" src="" type="audio/mpeg">
    </audio>
</div> 
</div>
<table class='table table-striped'>
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Aritst</th>
        <th>Album</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php $n=1; ?>
        @foreach ($playlist as $song)
            <?php $path = $song->albumid."/".$song->songid; ?>
            <tr>
                <td>{{$n++}}</td>
                <td>{{$song->songtitle}}</td>
                <td>{{$song->artist}}</td>
                <td>{{$song->albumname}}</td>
                <td><button class='btn btn-success playbtn' id='{{$path}}'>Play</button></td>
            </tr>
        @endforeach
    </tbody>
</table>


<script type="application/javascript">
    $(document).ready(function()
    {
        $(document).on('click', '.playbtn', function() {
            event.stopPropagation();
            event.stopImmediatePropagation();
            $("#playersrc").attr('src','/songs/'+this.id+'.mp3');
            $("#player")[0].load();
            $("#player")[0].play();    
        });
    });
</script>

@endsection
