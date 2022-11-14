@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            @if (isset($subCategory))
                <h3>Update Sub Category</h3>
            @else
                <h3>Add Sub Category</h3>
            @endif
        </div>
        <div class="card" style="width: 30rem; margin: 0 auto;">
            <div class="card-body">
                @if (isset($subCategory))
                    <form action="{{ route('sub-categories.update', $subCategory) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('sub-categories.store') }}" method="POST">
                            @csrf
                @endif
                @if (isset($subCategory))
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-select form-control mb-3" name="category_id" id="category_id">
                            <option selected>Select Category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-select form-control mb-3" name="category_id" id="category_id">
                            <option selected>Select Category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if (isset($subCategory))
                    <div class="mb-3">
                        <label for="subcat_name" class="form-label">Sub Category</label>
                        <input type="text" value="{{ $subCategory->subcat_name }}" name="subcat_name"
                            class="form-control @error('subcat_name') is-invalid @enderror">
                        @error('subcat_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @else
                    <div class="mb-3">
                        <label for="subcat_name" class="form-label">Sub Category</label>
                        <input type="text" value="{{ old('subcat_name') }}" name="subcat_name"
                            class="form-control @error('subcat_name') is-invalid @enderror">
                        @error('subcat_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                <a href="{{ route('sub-categories.index') }}" class="btn btn-success">Back</a>
                @if (isset($subCategory))
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
