<?php

namespace App\Http\Controllers\API;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index( int $portfolioID) : object
    {
        return response(
            Comment::with('user:id,name')
                ->with('portfolio:id,title')
                ->where('portfolio_id', $portfolioID)
                ->orderBy('rating', 'desc')
                ->get()
        );
    }

    public function store(StoreCommentRequest $request, int $portfolioID) : object
    {
        $request->merge([
            'user_id' => auth()->user()->id,
            'portfolio_id' => $portfolioID
        ]);
        dd($request->all());
        Comment::create($request->all());
        return response()->json([ "created" => true]);
    }

    /**
     * Метод возвращает топовый коментарий к портфолио
     * @param int $portfolioID
     * @return object
     */
    public function getTopComment(int $portfolioID) : object
    {
        return response()->json(
            Comment::with('portfolio.user:name,id')
                ->where('portfolio_id', $portfolioID)
                ->orderBy('rating', 'desc')
                ->first());
    }

    public function show(int $portfolioID, int $commentID) : object
    {
        return response()->json(
            Comment::with('user:id,name')
                ->where('portfolio_id', $portfolioID)
                ->where('id', $commentID)
                ->get()
        );
    }

    public function update(StoreCommentRequest $request, int $portfolioID, Comment $comment) : object
    {
        $comment->update($request->all());
        return response()->json(['updated', true]);
    }

    public function destroy(int $portfolioID, Comment $comment)
    {
        $comment->delete();
        return response()->json(["deleted" => true]);
    }

    /**
     * Метод увеличивает или уменшает рейтинг на 1 единицу
     * в зависимости от поля rate -
     * true увеличивает, false уменьшает
     * @param Request $request
     * @param Comment $comment
     * @return object
     */
    public function rate(Request $request, Comment $comment) : object
    {
        if ((bool)$request->input('rate')) {
            $comment->increment('rating');
        } else {
            $comment->decrement('rating');
        }
        return response()->json(["rating" => $comment->rating]);
    }
}
