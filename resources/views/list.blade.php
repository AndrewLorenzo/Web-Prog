@extends('layout.master')
@section('title', ' Book List Page')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Year</th>
                <th scope="col">Category</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
            @foreach ($books as $b)
                <tr>
                    <!-- <th scope="row">{{ $b->id }}</th> -->
                    <th scope="row"> {{ $i++ }} </th>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->author }}</td>
                    <td>{{ $b->publisher }}</td>
                    <td>{{ $b->year }}</td>
                    <td>{{ $b->category->name }}</td>
                    <td>
                        <a href="{{ route('edit', $b->id) }}" class="btn btn-success">Update</a>
                        <form action="{{ route('delete', $b->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
@endsection
