@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Your Profile</div>
            <div class="panel-body">
                <div class="col-md-2">
                    <img src="../../img/default.png" alt="{{ Auth::user()->name }}" class="img-rounded img-responsive">
                </div>
                <div class="col-md-5">
                    <form class="form-horizontal" action="/user/{{ Auth::user()->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group">
                        <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
