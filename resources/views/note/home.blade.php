@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="/home">Home</a></li>
                <li class="active">Note</li>
            </ol>        
            @if(Auth::check())
            <a href="note/create" class="btn btn-primary">Add New</a><br><br>
            @endif
            @include('note.partials.message')
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(Auth::check())
                    Your Notes
                    @else
                    Notes
                    @endif
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover table-bordered table-condensed">
                    <thead class="thead-inverse">
                        <tr>
                            <th class="text-center" bgcolor="e5e5e5">#</th>
                            <th bgcolor="e5e5e5">Title</th>
                            @if(Auth::check())
                            <th bgcolor="e5e5e5">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($notes) == 0)
                            No records found
                        @else
                            @foreach ($notes as $note) 
                            <tr>
                                <td class="text-center">{{ $note->id }}</td>
                                <td><a href="note/{{ $note->id }}"><strong>{{ ucfirst($note->title) }}</strong></a><span class="badge badge-default pull-right">{{ $note->created_at->diffForHumans() }}</span><br></td>
                                @if(Auth::check())
                                <td class="text-center" style="white-space:nowrap;">
                                    <a href="note/{{ $note->id }}/edit" class="btn btn-primary btn-xs pull-left">Edit</a>
                                    <form action="note/{{ $note->id }}" method="post" class="pull-left">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" value="delete" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        @endif                    
                    </tbody>
                </table>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
