@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            @if (isset($phone))
                <h3>Update Phone Number</h3>
            @else
                <h3>Add Phone Number</h3>
            @endif
        </div>
        <div class="card" style="width: 30rem; margin: 0 auto;">
            <div class="card-body">
                @if (isset($phone))
                    <form action="{{ route('phones.update', $phone) }}" method="POST">
                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('phones.store') }}" method="POST">
                            @csrf
                @endif
                @if (isset($phone))
                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select class="form-select form-control mb-3" name="student_id" id="student_id">
                            <option selected>Select Student...</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ $student->id == $phone->student_id ? 'selected' : '' }}>{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="student_id">Student</label>
                        <select class="form-select form-control mb-3" name="student_id" id="student_id">
                            <option selected>Select Student...</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if (isset($phone))
                    <div class="mb-3">
                        <label for="phn_no" class="form-label">Phone Number</label>
                        <input type="text" value="{{ $phone->phn_no }}" name="phn_no"
                            class="form-control @error('phn_no') is-invalid @enderror">
                        @error('phn_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @else
                    <div class="mb-3">
                        <label for="phn_no" class="form-label">Phone Number</label>
                        <input type="text" value="{{ old('phn_no') }}" name="phn_no"
                            class="form-control @error('phn_no') is-invalid @enderror">
                        @error('phn_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                <a href="{{ route('phones.index') }}" class="btn btn-success">Back</a>
                @if (isset($phone))
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
