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

            <form method="POST" action="{{route('question.store')}}">@csrf
                <div class="module">

                    <div class="module-head">
                        <h3>Create Question</h3>
                    </div>

                    <div class="module-body">
                        <div class="control-group">

                            <label for="" class="control-label">Choose Quiz</label>
                            <div class="controls">
                                <select name="quiz" class="span8">
                                @foreach(App\Models\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                @endforeach
                                </select>
                            </div>

                            @error('quiz')
                            <p class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label for="Question name" class="control-label">Question name</label>
                            <div class="controls">
                                <input id="Question name" type="text" name="question" class="span8 @error('name') border-red @enderror" placeholder="name of a Question" value="{{old('question')}}">
                            </div>
                            @error('question')
                            <p class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>

                        <div class="control-group">
                            <label for="options" class="control-label">Options</label>
                            <div class="controls">
                                @for($i=0;$i<4;$i++)
                                <input id="options" type="text" name="options[]" class="span7 @error('options') border-red @enderror" placeholder="options {{$i+1}}" required="">
                                <input type="radio" name="correct_answer" value="{{$i}}">
                                <span>Is Correct Answer</span>
                                @endfor
                            </div>
                            @error('options')
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
            </form>
        </div>
    </div>

@endsection
