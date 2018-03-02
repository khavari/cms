<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Http\Requests\FileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    private $per_page = 20;
    protected $types;

    public function __construct()
    {
        $this->types = ['صفحات استاندارد', 'اخبار', 'مقالات', 'دانلودها', 'سایر موارد'];
    }

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $files = File::
            where('title', 'like', '%' . $search . '%')
                ->orWhere('file', 'like', '%' . $search . '%')
                ->orWhere('extension', 'like', '%' . $search . '%')
                ->latest()->paginate($this->per_page);
        } elseif (Request('type') && is_numeric(Request('type'))) {
            $type = Request('type');
            $files = File::where('user_id', $type)->latest()->paginate($this->per_page);
        } else {
            $files = File::latest()->paginate($this->per_page);
        }
        $types = $this->types;

        return view('admin.files.index', compact('files', 'types'));
    }

    public function create()
    {
        $types = $this->types;

        return view('admin.files.create', compact('types'));
    }

    public function store(FileRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file("file");
            $directory = 'uploads/files/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $size = $file->getSize();
            $file_path = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
        }

        File::create([
            'user_id'   => auth()->user()->id,
            'title'     => $request->title,
            'file'      => $file_path,
            'extension' => $extension,
            //'type' => $request->type,
            'size'      => $size,
        ]);
        session()->flash('success', __('messages.created_success'));
        return back();
    }

    public function show(File $file)
    {
        return $file;
    }

    public function edit(File $file)
    {
        $types = $this->types;

        return view('admin.files.edit', compact('file', 'types'));
    }

    public function update(FileRequest $request, File $file)
    {
        $file->update([
            'title'   => $request->title,
        ]);

        session()->flash('success', __('messages.updated_success'));
        return back();
    }

    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->file);
        $file->delete();

        return back()->with('success', __('messages.deleted_success'));
    }

}
