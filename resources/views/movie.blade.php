@extends('layouts.master')

@section('title', 'My Google Map')

@section('content')
</br>
<h3>This is the movie to introduce Taiwan : </h3>
</br>
    <div class="row">
        <div class="col-md-12">
            <p>
              <iframe 
                id="ytplayer" width="1024" height="576"
                src="https://www.youtube.com/embed/djmAMBpSevo?&amp;html5-1&amp;enablejsapi=1&amp;autoplay=0"
                frameborder="0" allowfullscreen="">
              </iframe>
            </p>
        </div>
    </div>







@stop