@extends('layouts.app')

@section('content')
    <div class="container table-responsive py-5">
        <div class="text-center mb-3">
            <h3>Student Mobile No List</h3>
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
                                <th>Student</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($phones as $index => $phone)
                                <tr>
                                    <td>{{ $index + $phones->firstItem() }}</td>
                                    <td>{{ $phone->student->name }}</td>
                                    <td>{{ $phone->phn_no }}</td>
                                    <td class='{{ $phone->deleted_at != null ? 'text-danger' : 'text-success' }}'>
                                        {{ $phone->deleted_at != null ? 'Inactive' : 'Active' }}
                                    </td>
                                    <td>
                                        <div class="btn-group" phone="group" aria-label="Basic example">
                                            @if ($phone->deleted_at != null)
                                                <a class="icon-margin" href="{{ route('phones.restore', $phone) }}"
                                                    data-toggle="tooltip" title="Restore"><i
                                                        class="text-primary fa-sharp fa-solid fa-trash-can-arrow-up"></i>
                                                </a>
                                            @else
                                                <a class="icon-margin" href="{{ route('phones.edit', $phone) }}"
                                                    data-toggle="tooltip" title="Edit"><i
                                                        class="text-primary fa-solid fa-pen-to-square"></i></a>
                                                <form action="{{ route('phones.destroy', $phone) }}" method="POST">
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
                <a type="button" href="{{ route('phones.create') }}" class="btn btn-sm btn-dark float-end">Create</a>
            </div>
        </div>
    </div>
    </div>
@endsection
