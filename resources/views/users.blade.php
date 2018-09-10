@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Users')}}</div>
                <a href="user/new"><button id="create_btn" class="btn btn-primary card-img-top">{{__('Create User')}}</button></a>
                <div class="card-body">  
                    <table class='table table-striped table-bordered table-hover'>
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Age')}}</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td><a href="/user/{{$user->id}}"><i class="fas fa-pencil-alt"></i></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->age}}</td>
                            <td><i class="fas fa-trash-alt delete_button" id="{{$user->id}}"></i></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$('#document').ready(function(){
    $('.delete_button').click(function(){
        
    });
});
</script>
@endsection