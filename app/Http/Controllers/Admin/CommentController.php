<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Content;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{


    private $per_page = 20;

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $comments = Comment::where('commentable_id', 'like', '%' . $search . '%')
                ->orWhere('commentable_type', 'like', '%' . $search . '%')
                ->orWhere('message', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('commentable_id')) {
            $commentable_id = Request('commentable_id');
            $comments = Comment::Where('commentable_id', $commentable_id)->latest()->paginate(15);
        } else {
            $comments = Comment::latest()->paginate($this->per_page);
        }

        return view('admin.comments.index', compact('comments'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = Content::first();

        $comment = new Comment();
        $comment->message = str_random(500);
        $comment->user_id = auth()->user()->getKey();
        $content->comments()->save($comment);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        // approve comment
        if (request('active') && request('active') === 'toggle') {
            if ($comment->approved_at === null) {
                $comment->update(['approved_at' => Carbon::now()]);
            } else {
                $comment->update(['approved_at' => null]);
            }

            return back()->with('success', __('messages.toggled_success'));
        }

        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Comment             $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->except(['_token', '_method']));
        session()->flash('success', trans('comment::messages.updatedMessage'));

        return redirect(route('admin.comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success', __('messages.deleted_success'));
    }
}
