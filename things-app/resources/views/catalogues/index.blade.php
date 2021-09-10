@extends('catalogues.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>CRUD Catalogue</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('catalogues.create') }}"> Create New catalogue</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Details</th>
        <th>Price</th>
        <th>Category</th>
        <th>Location</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($catalogues as $catalogue)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="/image/{{ $catalogue->image }}" width="100px"></td>
        <td>{{ $catalogue->title }}</td>
        <td>{{ $catalogue->detail }}</td>
        <td>{{ $catalogue->price }}</td>
        <td>{{ $catalogue->category }}</td>
        <td>{{ $catalogue->location }}</td>
        <td>
            <form action="{{ route('catalogues.destroy',$catalogue->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('catalogues.show',$catalogue->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('catalogues.edit',$catalogue->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $catalogues->links() !!}

@endsection