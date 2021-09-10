@extends('layout')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper">
    <div class="card-header">
        Add a category.
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

        <form method="post" action="{{route('Categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name"> category title.</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="picture" class="form-control" placeholder="picture">
            </div>



            <button type="submit" class="btn btn-primary"> Add. </button>

        </form>
    </div>
</div>
@endsection