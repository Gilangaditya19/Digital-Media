<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();   //maksud dari kode disamping adalah mengambil semua data dari tabel news di database dan menyimpannya dalam variabel $news

        return response()->json($news, 200); //untuk baris ini maksudnya adalah mengembalikan respons JSON yang berisi data berita dari variable $news dan status code 200 (OK)
    }

    public function store(Request $request) //ini untuk menerima parameter request yang berisi data yang ingin disimpan.
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->author = $request->input('author');
        $news->description = $request->input('description');
        $news->content = $request->input('content');
        $news->url = $request->input('url');
        $news->url_image = $request->input('url_image');
        $news->published_at = $request->input('published_at');
        $news->category = $request->input('category');

        $news->save(); //maksudnya adalah menyimpan objek news ke dalam database yang sudah ada

        return response()->json($news, 201); //kode ini bermaksud untuk mengembalikan respons JSON yang berisi data news yang baru disimpan dan status code 201 yang berarti berhasil disimpan
    }

    public function show($id) //untuk mengambil data berdasarkan id nya
    {
        $news = News::findOrFail($id);

        return response()->json($news, 200);
    }

    public function update(Request $request, $id) // fungsi kode ini untuk melakukan perubahan
    {
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->author = $request->input('author');
        $news->description = $request->input('description');
        $news->content = $request->input('content');
        $news->url = $request->input('url');
        $news->url_image = $request->input('url_image');
        $news->published_at = $request->input('published_at');
        $news->category = $request->input('category');

        $news->save();

        return response()->json($news, 200);
    }

    public function destroy($id) // fungsi kode ini untuk menghancurkan atau menghapus
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request) // fungsi kode ini adalah untuk mencari news berdasarkan kata kunci yang kalian berikan.
    {
        $keyword = $request->input('keyword');
        $news = News::where('title', 'like', '%' . $keyword . '%')->get();

        return response()->json($news, 200);
    }

    public function category($category) //fungsi kode ini adalah untuk mencari news berdasarkan category nyaa
    {
        $news = News::where('category', $category)->get();

        return response()->json($news, 200);
    }
}
