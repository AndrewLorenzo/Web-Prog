@extends('layout.master')
@section('title', 'Update Page')

@section('content')
    <h1 class="p-2">Update Page</h1>
    <div class="p-2">
        <form action="{{ route('update', $book->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title_book" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $book->title }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author_book" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $book->author }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publisher_book" class="form-label">Publisher</label>
                <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ $book->publisher }}">
                @error('publisher')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year_book" class="form-label">Year</label>
                <input type="year" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $book->year }}">
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category_id" required>
                    <option value="{{$categories}}" disabled>Choose...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
    
        </form>
    </div>
@endsection
