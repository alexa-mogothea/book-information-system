@extends('layouts.app')

@section('content')
    <h3>I-edit ang Libro</h3>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="form-control @error('isbn') is-invalid @enderror">
            @error('isbn') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Pamagat</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control @error('title') is-invalid @enderror">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>May-akda</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control @error('author') is-invalid @enderror">
            @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Kategorya</label>
            <input type="text" name="category" value="{{ old('category', $book->category) }}" class="form-control @error('category') is-invalid @enderror">
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Taon ng Publikasyon</label>
            <input type="number" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" class="form-control @error('publication_year') is-invalid @enderror">
            @error('publication_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label>Shelf Status</label>
            <select name="shelf_status" class="form-control @error('shelf_status') is-invalid @enderror">
                @foreach (['Available', 'Borrowed', 'Lost'] as $status)
                    <option value="{{ $status }}" {{ old('shelf_status', $book->shelf_status) == $status ? 'selected' : '' }}>{{ $status }}</option>
                @endforeach
            </select>
            @error('shelf_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-success">I-update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Kanselahin</a>
    </form>
@endsection