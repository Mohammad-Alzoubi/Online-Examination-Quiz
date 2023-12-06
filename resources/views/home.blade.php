@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">

            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">All Exam</div>
                @if($isExamAssigned)
                @foreach($quizzes as $quiz)
                <div class="card-body">
                    <h3>{{$quiz->name}}</h3>
                    <p>About Exam: {{$quiz->description}}</p>
                    <p>Time allocated: {{$quiz->minutes}}</p>
                    <p>Number of Questions: {{$quiz->questions->count()}}</p>
                    <p>
                        @if(!in_array($quiz->id, $wasQuizCompleted))
                            <a href="user/quiz/{{$quiz->id}}">
                                <button class="btn btn-success">Start Quiz</button>
                            </a>
                        @else
                            <a href="result/user/{{auth()->user()->id}}/quiz/{{$quiz->id}}">View Result</a>
                            <span class="float-right">Completed</span>
                        @endif
                    </p>
                </div>
                @endforeach
                @else
                    <p>You have not assigned any exam</p>
                @endif
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User profile</div>
                <div class="card-body">
                    <p>Email: {{auth()->user()->email}}</p>
                    <p>Occupation: {{auth()->user()->occupation}}</p>
                    <p>Address: {{auth()->user()->address}}</p>
                    <p>Phone: {{auth()->user()->phone}}</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
