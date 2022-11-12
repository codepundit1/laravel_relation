@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            @if (isset($student))
                <h3>Update Students</h3>
            @else
                <h3>Create Students</h3>
            @endif
        </div>
        <div class="card" style="width: 30rem; margin: 0 auto;">
            <div class="card-body">
                @if (isset($student))
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                @endif

                @if (isset($student))
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $student->name }}" name="name"
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
                <a href="{{ route('students.index') }}" class="btn btn-success">Back</a>
                @if (isset($student))
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
