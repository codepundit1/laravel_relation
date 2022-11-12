@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            <h3>Students List</h3>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('success') }}!</strong>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($students as $index => $student)
                                <tr>
                                    <td>{{ $index + $students->firstItem() }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td class='{{ $student->deleted_at != null ? 'text-danger' : 'text-success' }}'>
                                        {{ $student->deleted_at != null ? 'Inactive' : 'Active' }}
                                    </td>
                                    <td>
                                        <div class="btn-group" student="group" aria-label="Basic example">
                                            @if ($student->deleted_at != null)
                                                <a class="icon-margin" href="{{ route('students.restore', $student) }}"
                                                    data-toggle="tooltip" title="Restore"><i
                                                        class="text-primary fa-sharp fa-solid fa-trash-can-arrow-up"></i>
                                                </a>
                                                <a class="" href="{{ route('students.force-delete', $students) }}"
                                                    data-toggle="tooltip" title="Delete">
                                                    <i class="text-danger fa-solid fa-trash"></i>
                                                </a>
                                            @else
                                                <a class="icon-margin" href="{{ route('students.edit', $student) }}"
                                                    data-toggle="tooltip" title="Edit"><i
                                                        class="text-primary fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('students.destroy', $student) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-transparent btn shadow-none p-0 m-0"
                                                        data-toggle="tooltip" title="Delete"><i
                                                            class="text-warning fa-sharp fa-solid fa-trash-can-arrow-up"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
                <a type="button" href="{{ route('students.create') }}" class="btn btn-sm btn-dark float-end">Create</a>
            </div>
        </div>
    </div>
    </div>
@endsection
