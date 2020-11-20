
@extends('layouts.app')

@section('content')
  <h1>Contact</h1>
  <form action="{{ route('submit-contact') }}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="email">E-Mail</label>
        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter E-Mail">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea class="form-control" type="text" name="message" value="{{ old('message') }}" placeholder="Enter Message"></textarea>
    </div>
      <div class="form-group">
          <label for="avatar">Avatar</label>
          <input class="form-control" type="file" name="avatar" onchange="readURL(this);" />
          <div class='imgContainer'>
              <img id="avatar" src="https://image.freepik.com/free-vector/profile-icon-male-avatar-hipster-man-wear-headphones_48369-8728.jpg" alt="your image" />
          </div>
      </div>
    <div>
        <input class="btn btn-primary" type="submit">
    </div>
  </form>
@endsection
