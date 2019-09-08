@extends('layouts.master')

@section('title', 'To Do List : Edit')

@section('content')

    <div class="panel panel-default">
        <!-- Display Validation Errors -->
        {{--@include('common.errors')--}}
 
        <!-- New Task Form -->
		@auth
        <form action="{{ route('todolist.update', ['id' => $post->id] ) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
 
            <!-- Task Name and Text -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Todo Task Title</label> 
                <div class="col-sm-4">
                    <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ $post->title ?? '' }}">
					    @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                </div>
				<label for="content" class="col-sm-3 control-label">Todo Task Content</label> 
                <div class="col-sm-8">
					<textarea name="content" id="content" rows="3" class="form-control form-control-sm {{ $errors->has('content') ? ' is-invalid' : '' }}" style="resize: vertical;">{{ $post->content ?? '' }}</textarea>
					    @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                </div>
				<div class="col-sm-8 col-md-8">
                    <button type="submit" class="btn btn-sm btn-success ml-2 float-right">
                        <i class="fa fa-plus"></i> Modify Task
                    </button>
					
                </div></br>
            </div>
        </form>
		@else </br></br><h1>Please login to access Todo list! </h1></br></br></br>
		@endauth

	</div>
@stop