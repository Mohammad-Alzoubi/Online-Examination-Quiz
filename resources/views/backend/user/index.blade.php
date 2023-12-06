@extends('backend.layouts.master')
@section('title','All users')

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
                    <h3>All Users</h3>
                </div>
                <div class="module-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->visible_password}}</td>
                                <td>{{$user->occupation}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->phone}}</td>

                                <td>
                                    <a href="{{route('user.show',[$user->id])}}">
                                        <button class="btn btn-info">View</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('user.edit',[$user->id])}}">
                                        <button class="btn btn-primary">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <form id="delete-form{{$user->id}}" action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
                                        {{method_field('DELETE')}}
                                    </form>
                                    <a href="#" onclick="if(confirm('Do you want to Delete?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form{{$user->id}}').submit();
                                }else {
                                    event.preventDefault();
                                }">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </a>

                                </td>
                            </tr>
                        @empty
                            <p>No Users to display</p>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="pagination pagination-centered">
                        {{$users->links()}}
                    </div>
                </div>
            </div>

        </div><!--/.content-->
    </div>

@endsection
