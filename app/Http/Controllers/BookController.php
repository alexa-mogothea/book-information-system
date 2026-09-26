<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'publication_year' => 'required|integer|min:1500|max:' . date('Y'),
            'shelf_status' => 'required|in:Available,Borrowed,Lost',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Matagumpay na naidagdag ang bagong libro!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $book->id,
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'publication_year' => 'required|integer|min:1500|max:' . date('Y'),
            'shelf_status' => 'required|in:Available,Borrowed,Lost',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Matagumpay na na-update ang detalye ng libro!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Natanggal na ang libro sa listahan.');
    }
}