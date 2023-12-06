@extends('backend.layouts.master')
@section('title','assign exam')

@section('content')

    <div class="span9">
        <div class="content">

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            <form method="POST" action="{{route('exam.assign')}}">@csrf
                <div class="module">

                    <div class="module-head">
                        <h3>Assign Quiz</h3>
                    </div>

                    <div class="module-body">

                        <div class="control-group">
                            <label for="" class="control-label">Select Quiz</label>
                            <div class="controls">
                                <select name="quiz_id" class="span8">
                                    <option selected disabled>Select Quiz</option>
                                    @foreach(App\Models\Quiz::all() as $quiz)
                                    <option value="{{$quiz->id}}">{{$quiz->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('quiz_id')
                            <p class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>


                        <div class="control-group">
                            <label for="" class="control-label">Select User</label>
                            <div class="controls">
                                <select name="user_id" class="span8">
                                    <option selected disabled>Select User</option>
                                    @foreach(App\Models\User::where('is_admin',0)->get() as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('user_id')
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
