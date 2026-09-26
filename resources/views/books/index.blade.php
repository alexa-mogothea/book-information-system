@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Listahan ng mga Libro</h3>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Magdagdag ng Libro</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Pamagat</th>
                <th>May-akda</th>
                <th>Kategorya</th>
                <th>Taon</th>
                <th>Status</th>
                <th>Aksyon</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>{{ $book->shelf_status }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Sigurado ka bang gusto mong tanggalin ang libro na ito?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Walang naitalang libro.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection