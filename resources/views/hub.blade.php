@extends('layouts.app')
@section('content')
<div class="row">
<div class='col-lg-9 col-md-9 col-sm-9 col-xs-9'>
    <audio controls autoplay id="player">
      <source id="playersrc" src="" type="audio/mpeg">
    </audio>
</div> 
</div>
<table class='table table-striped'>
    <thead>
        <th>#</th>
        <th>Title</th>
        <th>Genre</th>
        <th colspan='2'>Action</th>
    </thead>
    <tbody>
        <?php $n=1; ?>
        @foreach ($songs as $song)
            <?php $path = $song->albumid."/".$song->id; ?>
            <tr>
                <td>{{$n++}}</td>
                <td>{{$song->title}}</td>
                <td>{{$song->genre}}</td>
                <td><button class='btn btn-success playbtn' id='{{$path}}'>Play</button></td>
                <td><button class='btn btn-primary playlistbtn' id='{{$song->id}}'>Add To Playlist</button></td>
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
