<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Content;
use App\User;
use App\Widget;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // uploads dir size
        $file_size = 0;
        foreach (Storage::disk('public')->allFiles('uploads') as $file) {
            $file_size += Storage::disk('public')->size($file);
        }
        $uploads_size = number_format($file_size / 1048576, 1) . ' MB';

        $users_count = User::all()->count();
        $files_count = count(Storage::disk('public')->allFiles('uploads/.cache'));
        $widgets_count = Widget::lang()->active()->get()->count();
        $contacts_count = Contact::whereNull('archived_at')->count();

        $contents = Content::latest()->lang()->limit(10)->get();

        return view('admin.dashboards.dashboard',
            compact(
                'users_count',
                'files_count',
                'widgets_count',
                'contacts_count',
                'uploads_size',
                'contents'
            )
        );
    }
}
