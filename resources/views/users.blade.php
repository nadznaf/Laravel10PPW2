@extends('auth.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">User List</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userss as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    @if ($user->photo)
                    <img src="{{ asset('storage/'.$user->photo) }}" width="100px" class="img-thumbnail">
                    @else
                    <img src="{{ asset('noimage.jpg') }}" width="100px" class="img-thumbnail">
                    @endif
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
