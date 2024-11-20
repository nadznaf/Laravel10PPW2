@extends('auth.layout')

@section('content')
<div class="row justify-content-center">
    <h3 class="text-center">Kirim Email</h3>
    <div class="col-md-12 p-12">
        @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('post-email') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama">
            </div>
            <div class="form-group my-3">
                <label for="email">Email Tujuan</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Tujuan">
            </div>
            <div class="form-group my-3">
                <label for="subject">Subject</label>
                <input type="subject" class="form-control" id="subject" name="subject" placeholder="Subject">
            </div>
            <div class="form-group my-3">
                <label for="desc">Body Deskripsi</label>
                <textarea class="form-control" id="" name="body" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Kirim Email</button>
            </div>
        </form>
    </div>
</div>
@endsection