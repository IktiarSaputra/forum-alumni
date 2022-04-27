<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Comment;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination  = 4;
        $forum    = Forum::when($request->keyword, function ($query) use ($request) {
            $query
            ->where('title', 'like', "%{$request->keyword}%")
            ->orWhere('content', 'like', "%{$request->keyword}%");
        })->orderBy('created_at', 'desc')->simplePaginate($pagination);

        $forum->appends($request->only('keyword'));

        return view('forum.index', [
            'title'    => 'forum',
            'forum' => $forum,
        ])->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $forum = Forum::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('add', 'Berhasil Menambahkan Forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = Forum::findOrFail($id);
        $comment = $forum->comment()->orderBy('created_at', 'DESC')->simplePaginate(5);
        views($forum)->record();
        return view('forum.show', compact('forum','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->comment()->delete();
        $forum->delete();

        return redirect()->back();
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $comment = Comment::create([
            'forum_id' => $request->forum_id,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
        ]);

        return redirect()->back();

    }
}
