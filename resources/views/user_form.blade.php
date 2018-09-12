@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($edit)
                <div class="card-header">{{__('Edit User')}}</div>
                @else
                <div class="card-header">{{__('Create User')}}</div>
                @endif
                <div class="card-body">
                    @if ($edit)
                    <form method="post" action="/user/{{$user->id}}">
                    @else
                    <form method="post" action="/user/">
                    @endif
                    @csrf
                        <div class="form-group">
                            <label>{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control" required @if ($edit) value="{{ old('name',$user->name) }}" @else value="{{old('name')}}" @endif>
                            @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div> 
                         <div class="form-group">
                            <label>{{__('Email')}}</label>
                            <input type="email" name="email" class="form-control" required @if ($edit) value="{{ old('email',$user->email) }}" @else value="{{ old('email')}}" @endif >
                            @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Age')}}</label>
                            <input type="numeric" name="age" class="form-control" required @if ($edit) value="{{ old('age',$user->age) }}" @else value="{{ old('age')}}" @endif>
                            @if ($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Password')}}</label>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{__('Confirm Password')}}</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                            <a href="/users"><button type="button" class="btn btn-secondary">{{__('Cancel')}}</button></a>                                
                        </div>
                    </form>            
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