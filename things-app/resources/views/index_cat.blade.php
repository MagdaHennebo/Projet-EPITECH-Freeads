@extends('catalogues.layout')

@section('content')

<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="uper">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    <table class="table table-striped">

        <thead>
            <tr>
                <td>ID</td>
                <td>category title.</td>
                <td>Image.</td>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><img src="picture/{{ $category->picture }}" width="100px"></td>

                <td><a href="{{ route('Categories.create', $category->id)}}" class="btn btn-info">create.</a></td>
                <td><a href="{{ route('Categories.edit', $category->id)}}" class="btn btn-primary">update.</a></td>
                <td>
                    <form action="{{ route('Categories.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">delete.</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        @endsection