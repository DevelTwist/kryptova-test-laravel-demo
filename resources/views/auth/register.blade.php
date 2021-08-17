@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Register') }}</h1></div>

                <div class="card-body">

                    <form action="{{route('auth.register')}}" class="container-center" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h2>Signup</h2>
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth">Date of birth:</label>
                            <input class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date" type="date" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input class="form-control" type="text" id="address" name="address" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label for="role" required>Role:</label>
                            <select name="role" class="form-control" id="role">
                                <option value="admin">Admin</option>
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profile_thumbnail">Thumbnail:</label>
                            <input type="file" id="picture" name="profile_thumbnail" value="Subir imagen"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection