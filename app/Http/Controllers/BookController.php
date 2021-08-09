<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakutenRws_Client;
use App\Models\Book;

class BookController extends Controller
{
    public function bookSearch(Request $request){
        $client = new RakutenRws_Client();
        
        //定数化
        define("RAKUTEN_APPLICATION_ID"     , config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);

        $search_word = $request->input('keyword');
        // $search_word = "うどん";
        
        if(isset($search_word)){
            $response = $client->execute('BooksTotalSearch', array(
                'keyword' => $search_word,
            ));
        } else {
            return view('books.book-search');
        }

        // 該当するデータをbooks配列に格納
        if ($response->isOK()){
            foreach ($response as $data) {
                $books[] = array(
                    'title' => $data['title'],
                    'author' => $data['author'],
                    'isbn' => $data['isbn'],
                    'image_url' => $data['mediumImageUrl'],
                    'item_caption' => $data['itemCaption'],
                );
            }
        }

        // 既存のデータが入っているか判定用に用意
        $all_books = Book::all();
        $all_isbn = [];
        foreach ($all_books as $t_book){
            array_push($all_isbn, $t_book['isbn']);
        }

        // データの格納
        foreach($books as $rakuten_book) {
            if(in_array($rakuten_book['isbn'], $all_isbn)) {
                continue;
            } elseif(empty($rakuten_book['isbn'])) {
                continue;
            } else {
                $book = new Book();
                $book->isbn = $rakuten_book['isbn'];
                $book->title = $rakuten_book['title'];
                $book->author = $rakuten_book['author'];
                $book->image_url = $rakuten_book['image_url'];
                $book->item_caption = $rakuten_book['item_caption'];
                $book->save();
            }
        }

        return view('books.book-search',compact('books','search_word'));
    }

    public function bookShowDetail(Book $book){
        return view('books.book', compact('book'));
    }
}
