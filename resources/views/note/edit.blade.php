@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/note" class="btn btn-default">Go Back</a><br><br>
            @include('note.partials.message')
            <div class="panel panel-default">
                <div class="panel-heading">Edit Note
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/note/{{ $note->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="title" placeholder="Note Title" value="{{ ucfirst($note->title) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" rows="6" name="body" placeholder="Body">{{ ucfirst($note->body) }}</textarea>
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
