<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function readArticle() {

        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function show($id) {

        $article = Article::find($id);
        return view('articles.show', compact('article'));
    }


    public function createArticle() {
        return view('articles.create');
    }

    public function create_article_traitement(Request $request) {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_de_creation' => 'required|date',
            'a_la_une' => 'required|boolean',
            'image' => 'required|url',
        ]);
        $article = new Article();
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_de_creation = $request->date_de_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;

        $article->save();

        return redirect('/create')->with('status', 'L\'article a été ajouter avec succès.');

    }

    public function updateArticle($id) {

        $articles = Article::find($id);
        return view('/articles.update', compact('articles'));
    }

    public function update_article_traitement(Request $request) {

        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'date_de_creation' => 'required|date',
            'a_la_une' => 'required|boolean',
            'image' => 'required|url',
        ]);
        $article = Article::find($request->id);
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_de_creation = $request->date_de_creation;
        $article->a_la_une = $request->a_la_une;
        $article->image = $request->image;

        $article->update();
        return redirect('/create')->with('status', 'L\'article a été modifier avec succès.');

    }

    public function delete_article($id) {
        $article = Article::find($id);
        $article->delete();

        return redirect('/article')->with('status', 'L\'article a été supprimer avec succès.');
    }

}
