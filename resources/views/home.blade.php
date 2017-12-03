@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            {{-- <ol class="breadcrumb">
                <li class="active">Home</li>
            </ol> --}}
            <h4>Welcome, {{ Auth::user()->name }}!</h4>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="">
                        <h4>You currently have {{ $notesCount }} note(s).</h4>
                    </div>
                    <div class="">
                        <a href="/note" class="btn btn-default">View Notes</a>
                    </div>                  
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Recent five notes</div>
                <div class="panel-body">
                    <div class="list-group">
                        @if(count($notes) == 0)
                            No records found
                        @else
                            @foreach ($notes as $note)
                            <a href="note/{{ $note->id }}" class="list-group-item">
                                {{ $note->title }}
                                <span class="badge badge-default pull-right">{{ $note->created_at->diffForHumans() }}</span>
                            </a>
                            @endforeach
                        @endif
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
