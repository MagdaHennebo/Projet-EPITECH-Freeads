@extends('layout')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        Update things.
    </div>

    <div class="card-body">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif

        <form method="post" action="{{ route('Categories.update', $categories->id ) }}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">category title.</label>
                <input type="text" class="form-control" name="name" value="{{ $categories->name }}" />
            </div>
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="picture" class="form-control" placeholder="picture">
                <img src="picture/{{ $categories->picture }}" width="200px">
            </div>

            <button type="submit" class="btn btn-primary">update.</button>

        </form>
    </div>
</div>
@endsection