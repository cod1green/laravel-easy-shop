@extends('frontend.main_master')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path)) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}" width="100%" height="100%"><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>

                <div class="col-md-2">

                </div>

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name }}</strong> Update Your Profile</h3>

                        <div class="card-body">
                            <form method="POST"  action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="name">Name <span style="color: red">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span style="color: red">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="phone">Phone <span style="color: red">*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="profile_photo_path">User Image</label>
                                    <input type="file" id="profile_photo_path" name="profile_photo_path" class="form-control">

                                    @error('profile_photo_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
