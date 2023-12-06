@extends('backend.layouts.master')
@section('title','create quiz')

@section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            <form method="POST" action="{{route('quiz.store')}}">@csrf
                <div class="module">
                    <div class="module-head">
                        <h3>Create quiz</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <label for="" class="control-label">Quiz name</label>
                            <div class="controls">
                                <input id="name" type="text" name="name" class="span8 @error('name') border-info @enderror" placeholder="name of a quiz" value="{{old('name')}}">
                                @error('name')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                                @enderror
                            </div>

                            <label for="description" class="control-label">Quiz Description</label>
                            <div class="controls">
                                <textarea id="description" name="description" class="span8 @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                                @enderror
                            </div>

                            <label for="minutes" class="control-label">Quiz minutes</label>
                            <div class="controls">
                                <input id="minutes" type="text" name="minutes" class="span8 @error('minutes') is-invalid @enderror" placeholder="minutes of a quiz" value="{{old('name')}}">
                                @error('minutes')
                                <p class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </p>
                                @enderror
                            </div>

                            <div class="controls">
                                <button type="submit" class="btn btn-success">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
