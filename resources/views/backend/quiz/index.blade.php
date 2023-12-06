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

            <div class="module">
                <div class="module-head">
                    <h3>All Quiz</h3>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Minutes</th>
                            <th>Action</th>
{{--                            <th> <!-- Question--></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($quizzes as $key=>$quiz)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$quiz->name}}</td>
                            <td>{{$quiz->description}}</td>
                            <td>{{$quiz->minutes}}</td>
                            <td>
                                <a href="{{route('quiz.question',[$quiz->id])}}">
                                    <button class="btn btn-inverse">View Question</button>
                                </a>
{{--                            </td>--}}
{{--                            <td>--}}
                                <a href="{{route('quiz.edit',[$quiz->id])}}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
{{--                            </td>--}}
{{--                            <td>--}}
                                <form style="display: inline" id="delete-form{{$quiz->id}}" action="{{route('quiz.destroy',[$quiz->id])}}" method="post">@csrf
                                    {{method_field('DELETE')}}
                                </form>
                                <a href="#" onclick="if(confirm('Do you want to Delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$quiz->id}}').submit();
                                }else {
                                    event.preventDefault();
                                }">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </a>

                            </td>
                        </tr>
                        @empty
                            <p>No quiz to display..</p>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>


        </div><!--/.content-->
    </div>

@endsection
