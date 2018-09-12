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
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tr>
                            <td><a href="/user/{{$user->id}}"><i class="fas fa-pencil-alt"></i></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->age}}</td>
                            <td><a href="#"><i class="@if ($user->favorite)fas @else far @endif fa-heart toogle_favorite" id="{{$user->id}}"></i></a></td>
                            <td><a href="#"><i class="fas fa-trash-alt delete_button" user_id="{{$user->id}}"></i></a></td>
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
        
        var delete_button=$(this);
        
        bootbox.confirm({
            message: "{{__("Are you sure you want to delete this user? There's no undo")}}",
            buttons: {
                confirm: {
                    label: "{{__('Yes')}}",
                    className: 'btn-danger'
                },
                cancel: {
                    label: "{{__('No')}}",
                    className: 'btn-success'
                }
            },
            callback: function (answer) {
                if(answer){
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type:"DELETE",
                        url:"/user/"+delete_button.attr('user_id'),
                        success: function() {
                            delete_button.closest('tr').hide();
                        },
                        failure: function() {
                            alert("{{__('An error has occurred while deleting an user')}}");
                        }
                    });
                }
            }
        });        
    });
    $('.toogle_favorite').click(function() {
        
        if($(this).hasClass('fas'))
            var action='remove';
        else
            var action='add';
        

        $.ajax({
            type: "PUT",
            url: "/user/favorite",
            data: JSON.stringify({"action":action,"user_id":$(this).prop('id')}),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {
                var my_id=data.other_user_id;
                
                if(action=='add') {                
                    $('#'+my_id).removeClass('far');
                    $('#'+my_id).addClass('fas');
                } else {
                    $('#'+my_id).removeClass('fas');
                    $('#'+my_id).addClass('far');
                }
            },
            failure: function() {
                alert("{{__('An error has occurred setting favorites')}}");
            }
        });
    });
});
</script>
@endsection