@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif

                        <form action="{{ route('edit_profile') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <input type="role" class="form-control"
                                    value="{{ $user->is_admin ? 'Admin' : 'Member' }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Change profile details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif

    <p>Name : {{ $user->name }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Role : {{ $user->is_admin ? 'Admin' : 'Member' }}</p>

    <form action="{{ route('edit_profile') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}"><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>
        <label for="password_confirm">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirm"><br>
        <button type="submit">Change Profile Details</button>
    </form>
</body> --}}
