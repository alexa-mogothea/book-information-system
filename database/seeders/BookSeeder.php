<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'isbn' => '978-0-13-468599-1',
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'category' => 'Programming',
                'publication_year' => 2008,
                'shelf_status' => 'Available',
            ],
            [
                'isbn' => '978-0-596-00712-6',
                'title' => 'Head First Design Patterns',
                'author' => 'Eric Freeman',
                'category' => 'Programming',
                'publication_year' => 2004,
                'shelf_status' => 'Borrowed',
            ],
            [
                'isbn' => '978-1-59327-584-6',
                'title' => 'Eloquent JavaScript',
                'author' => 'Marijn Haverbeke',
                'category' => 'Programming',
                'publication_year' => 2018,
                'shelf_status' => 'Available',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
