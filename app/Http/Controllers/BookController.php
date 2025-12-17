<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Category;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function create(Request $req)
    {

        $validated = $req->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|digits:4|integer|max:'.date('Y'),
            'category_id' => 'required',
        ], [
            'year.digits' => 'Year must be 4 digits',
            'year.integer' => 'Year must be a valid number',
            'year.max' => 'Year cannot exceed the current year',
            'category_id.required' => 'The category field is required',
        ]);

        if ($validated) {
            Book::create([
                'title' => $req->title,
                'author' => $req->author,
                'publisher' => $req->publisher,
                'year' => $req->year,
                'category_id' => $req->category_id,
            ]);
        }

        return back();
    }

    public function show()
    {
        // $books = DB::table('books')->join('categories', 'books.category_id', '=', 'categories.id')->get();
        $books = Book::paginate(10);
        return view('list', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('update', compact('book', 'categories'));
    }

    public function update($id, Request $req)
    {
        $req->validate([
        'title' => 'required',
        'author' => 'required',
        'publisher' => 'required',
        'year' => 'required',
        'category_id' => 'required|exists:categories,id'
        ]);

        Book::findOrFail($id)->update([
            'title' => $req->title,
            'author' => $req->author,
            'publisher' => $req->publisher,
            'year' => $req->year,
            'category_id' => $req->category_id,
        ]);

        // $books = Book::all();
        $books = Book::paginate(10);
        // return view('list', compact('books'));

        return redirect()->route('show');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return back();
    }
}
