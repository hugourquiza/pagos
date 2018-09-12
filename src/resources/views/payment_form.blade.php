@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Add Payment')}}</div>
                
                <div class="card-body">
                    
                    <form method="post" action="/payment/">
                    
                    @csrf
                        <div class="form-group">
                            <label>{{__('Date Paid')}}</label>
                            <input type="date" name="date_paid" class="form-control" required value="{{ old('date_paid')}}">
                            @if ($errors->has('date_paid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_paid') }}</strong>
                                    </span>
                            @endif
                        </div> 
                         <div class="form-group">
                            <label>{{__('Amount')}}</label>
                            <input type="numeric" name="amount" class="form-control" required value="{{ old('amount')}}">
                            @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                            @endif
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