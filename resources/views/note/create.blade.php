@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/note" class="btn btn-default">Go Back</a><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">Create New Note
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/note" method="post">
                        {{ csrf_field() }}
                        @include('note.partials.errors')
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="title" placeholder="Note Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" rows="6" name="body" placeholder="Body"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
