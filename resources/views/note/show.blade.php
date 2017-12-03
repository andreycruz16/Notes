@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/note" class="btn btn-default">Go Back</a><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ ucfirst($note->title) }}
                </div>
                <div class="panel-body">
                    {{ ucfirst($note->body) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
