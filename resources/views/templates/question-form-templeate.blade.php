@extends('backend.layouts.master')
@section('title','create quiz')

@section('content')
    <div class="span9">
        <div class="content">

            <div class="module">

                <div class="module-head">
                    {{--                    <h3>All Question</h3>--}}
                </div>

                <div class="module-body">

                    <p> <h3 class="heading">question</h3> </p>

                    <div class="module-body table">
                        <table class="table table-message">
                            {{--                            <thead>--}}
                            {{--                            <tr>--}}
                            {{--                                <th scope="col">#</th>--}}
                            {{--                                <th scope="col">Question</th>--}}
                            {{--                                <th scope="col">Quiz</th>--}}
                            {{--                                <th scope="col">Created</th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th></th>--}}
                            {{--                                <th></th>--}}
                            {{--                            </tr>--}}
                            {{--                            </thead>--}}

                            <tbody>

                            <tr class="read">
                                <td class="call-author hidden-phone hidden-tablet">
                                    options <span class="badge badge-success pull-right">Correct</span>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="module-foot">
                        <button class="btn btn-primary">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </div>




                </div>
            </div>

        </div><!--/.content-->
    </div>

@endsection
