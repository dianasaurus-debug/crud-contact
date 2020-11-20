@extends('layouts.app')

@section('content')
  <h1>About</h1>
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-sm-6 col-md-3">
                          <img class="img-rounded img-responsive" src="{{ asset('profile_picture/'.$user->photo) }}">
                      </div>
                      <div class="col-sm-6 col-md-8">
                          <h4>{{$user->name}}</h4>
                          <p>
                              <i class="glyphicon glyphicon-envelope"></i>{{$user->email}}
                              <br />
                      </div>
                      <div class="col-sm-6 col-md-8">
                          <a class="btn btn-success" href="{{ route('edit-profile', $user->id) }}">Update</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
