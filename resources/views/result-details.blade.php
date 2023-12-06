@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center">Your Result</h2>

            @foreach($results as $key=>$result)
            <div class="card">
                <div class="card-header">{{$key+1}}</div>

                <div class="card-body">
                    <h5>
                       {{$result->question->question}}
                    </h5>
                    @php
                        $i=1;
                        $answers = DB::table('answers')->where('question_id', $result->question_id)->get();
                        foreach ($answers as $ans){
                            echo '<p>'.$i++.') '.$ans->answer.'</p>';
                        }
                    @endphp

                    <p>
                        <mark>
                        Your answer: {{$result->answer->answer}}
                        </mark>
                    </p>
                    @php
                    $correctAnswers = DB::table('answers')->where('question_id', $result->question_id)->where('is_correct', 1)->get();
                    foreach ($correctAnswers as $ans){
                        echo 'Correct Answer: '.$ans->answer;
                    }
                    @endphp
                    @if($result->answer->is_correct)
                        <p>
                            <span class="badge badge-success pull-right">Result:Correct</span>
                        </p>
                    @else
                        <p>
                            <span class="badge badge-danger pull-right">Result: InCorrect</span>
                        </p>
                    @endif
                </div>
            </div>
            <br>
            @endforeach

        </div>
    </div>
</div>
@stop
