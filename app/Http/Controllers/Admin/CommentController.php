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


    public function create()
    {


    }


    public function store(Request $request)
    {

        $parent_id = (isset($request->parent_id)) ? $request->parent_id : null;

        $model = app()->make($request->commentable_type);
        $object = $model->findOrFail($request->commentable_id);
        $comment = new Comment();
        $comment->message = $request->message;
        $comment->parent_id = $parent_id;
        $comment->user_id = auth()->user()->getKey();
        $object->comments()->save($comment);

        session()->flash('success', __('messages.created_success'));

        return back();


    }


    public function show(Comment $comment)
    {

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


    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->except(['_token', '_method']));
        session()->flash('success', trans('comment::messages.updatedMessage'));

        return redirect(route('admin.comments.index'));
    }


    public function destroy(Comment $comment)
    {
        if($comment->hasChildren()){
            return back()->with('error', __('messages.not_allowe_delete_child'));
        }else{
            $comment->delete();
            return back()->with('success', __('messages.deleted_success'));
        }
    }
}
