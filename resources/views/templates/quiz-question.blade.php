@extends('backend.layouts.master')
@section('title','quiz question')

@section('content')
    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h3>Quiz name</h3>
                </div>

                <div class="module-body">

                    <p> <h3 class="heading">question</h3> </p>

                    <div class="module-body table">
                        <table class="table table-message">

                            <tbody>

                            <tr class="read">
                                Question name

                                <td class="call-author hidden-phone hidden-tablet">
                                    <p>
                                        Answer <span class="badge badge-success"></span>
                                    </p>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="module-foot">
                        <td>
                            <a href="">
                                <button class="btn btn-inverse pull-center">Back</button>
                            </a>
                        </td>
                    </div>

                </div>
            </div>

        </div><!--/.content-->
    </div>

@endsection
