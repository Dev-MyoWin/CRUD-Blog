<?php

namespace App\Http\Controllers;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $data=Article::latest()->paginate(5);

        return view ('articles.index',[
            'articles'=>$data
        ]);

    }
    public function detail($id){
        $data=Article::find($id);

        return view ('articles.detail',[
            'article'=>$data
        ]);
    }
    public function add() {
        $data = [
        [ "id" => 1, "name" => "News" ],
        [ "id" => 2, "name" => "Tech" ], ];
        return view('articles.add', [
        'categories' => $data ]);
        }
        public function create() {
            $validator = validator(request()->all(), [
                'title' => 'required', 'body' => 'required', 'category_id' => 'required',
                 
                ]);
                if($validator->fails ()) {
                    return back()-> withErrors($validator);
                    }
                    
                    $article = new Article;
                    $article->title = request()->title; $article->body = request()->body; $article->category_id = request()->category_id; $article->save();
                    return redirect('/articles'); 
        }
        public function delete($id){
            $article=Article::find($id);
            $article->delete();
            return redirect("/articles")->with('info','Articles Deleted');

        }
        public function edit($id){
            $data=Article::find($id);

            return view ('articles.edit',
            [
                'article'=>$data
            ],
            [
                'categories'=>Category::All()
            ]
        );
        }
        public function update(Request $request, $id){
           
            Article::where('id',$id)->update(['title'=>$request->title,'body'=>$request->body,'category_id'=>$request->category_id]);
             
            return redirect('/articles');
        }

        public function __construct() {
            $this->middleware('auth')->except(['index', 'detail']); 
        }
}
