@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            @if (isset($category))
                <h3>Update Category</h3>
            @else
                <h3>Create Category</h3>
            @endif
        </div>
        <div class="card" style="width: 30rem; margin: 0 auto;">
            <div class="card-body">
                @if (isset($category))
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                @endif

                @if (isset($category))
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $category->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @else
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') }}" name="name"
                            class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                <a href="{{ route('categories.index') }}" class="btn btn-success">Back</a>
                @if (isset($category))
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                @else
                    <button type="submit" class="btn btn-primary float-right">Create</button>
                @endif
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
