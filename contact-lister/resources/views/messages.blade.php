@extends('layouts.app')

@section('content')
    <h1>Messages</h1>
    @if(count($messages) > 0)
        @foreach($messages as $message)
            <section class="search-result-item">
                <span class="image-link"><img class="image" src="{{ asset('images/'.$message->avatar) }}"></span>
                <div class="search-result-item-body">
                    <div class="row">
                        <div class="col-sm-9">
                            <h4 class="search-result-item-heading">{{$message->name}}</h4>
                            <p class="info">{{$message->email}}</p>
                            <p class="description">{{$message->message}}</p>
                        </div>
                        <div class="col-sm-3 text-align-center">
                            <form action="{{ URL::route('destroy-message', $message->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <div class="center-block">Sorry no message yet</div>
    @endif
@endsection

@section('sidebar')
    @parent
    <p>This is appended to the sidebar</p>
@endsection
