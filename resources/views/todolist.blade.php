@extends('layouts.master')

@section('title', 'To Do List')

@section('content')

    <div class="panel panel-default">
        <!-- Display Validation Errors -->
        {{--@include('common.errors')--}}
 
        <!-- New Task Form -->
		@auth
        <form action="{{ route('todolist.store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
 
            <!-- Task Name and Text -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Todo Task Title</label> 
                <div class="col-sm-4">
                    <input type="text" name="title" id="title" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}">
					    @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                </div>
				<label for="content" class="col-sm-3 control-label">Todo Task Content</label> 
                <div class="col-sm-8">
					<textarea name="content" id="content" rows="3" class="form-control form-control-sm {{ $errors->has('content') ? ' is-invalid' : '' }}" style="resize: vertical;"></textarea>
					    @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                </div>  
				<div class="col-sm-8 col-md-8">
                    <button type="submit" class="btn btn-sm btn-success ml-2 float-right">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
					
                </div></br>
            </div>
        </form>
		@else </br></br><h1>Please login to access Todo list! </h1></br></br></br>
		@endauth

	</div>
	<!-- Display Current Tasks -->
    @if (count($posts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks : </br></br>
            </div>
        @foreach ($posts as $post)							
		    <div class="card mb-3 col-md-12">
                <div class="card-body col-md-12">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title">{{ $post->title }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <!--Created at : {{ $post->created_at->toDateString() }}--}} -->
								Created at : {{ $post->created_at}}  By {{$post->user->name}}
                            </div>
                        </div>
                        <hr class="my-0 mx-0">
                        <div class="row">
                            <div class="col-md-12" style="height: 100px; overflow: hidden;">
                                <p class="card-text" style="white-space: pre-line;">
                                    {{ $post->content }}
                                </p> 
                            </div>
                        </div>
                        <div class="row mt-2">
						  @auth
						    @if(Auth::id() == $post->user_id)
                              <div class="col-md-12">
                                <form action="{{ route('todolist.destroy', ['id' => $post->id]) }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="_method" value="DELETE">
								  <div class="col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-sm btn-danger float-right">
                                      <i class="fas fa-trash"></i>
                                      <span class="pl-1">  Delete Task</span>
                                    </button>
								    <a href="{{ route('todolist.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-primary float-right">
                                      <i class="fas fa-pencil-alt"></i>
                                      <span class="pl-1">Edit Task</span>
                                    </a>
								  </div>
                                </form>
                              </div>
							@endif
						  @endauth
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
					
        </div>
    @endif
    <div class="row pt-2">
        <div class="col-md-8">
            @isset($keyword)
                {{ $posts->appends(['keyword' => $keyword])->render() }}
            @else
                {{ $posts->render() }}
            @endisset
        </div>
    </div>
    
@stop