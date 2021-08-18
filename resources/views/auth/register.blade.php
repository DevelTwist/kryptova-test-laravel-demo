@extends('layouts.main')

@section('content')
<div class="container">

    @if(isset($message))
        <h1> {{ $message }} </h1>
    @endif

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    
    <div class="row justify-content-center">
        

        <div class="col-md-12">
            <div class>
                <div class="card-header"><h1>{{ __('Signup') }}</h1></div>
                <div class="card-body">

                    <form action="{{route('auth.register')}}" class="container-center" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
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

        <div>
            <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Login</a>
            <br>
        </div>
    </div>
</div>
@endsection