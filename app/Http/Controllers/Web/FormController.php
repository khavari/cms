<?php

namespace App\Http\Controllers\Web;

use App\Comment;
use App\Events\ContactUs;
use App\Contact;
use App\Http\Requests\ContactRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{

    // submit contact form from contact_form widgets
    public function contact(ContactRequest $request)
    {
        $request->merge(['ip' => $request->ip()]);
        $contact = Contact::create($request->all());
        session()->flash('success', __('messages.message_sent_successfully'));
        event(new ContactUs($contact));
        return back();
    }


    public function comment(Request $request)
    {

        $parent_id = (isset($request->parent_id)) ? $request->parent_id : null;

        $model = app()->make($request->commentable_type);
        $object = $model->findOrFail($request->commentable_id);
        $comment = new Comment();
        $comment->user_id = auth()->user()->getKey();
        $comment->parent_id = $parent_id;
        $comment->message = $request->message;
        $comment->approved_at = Carbon::now();
        $object->comments()->save($comment);

        session()->flash('success', __('messages.created_success'));

        return back();

    }

}
