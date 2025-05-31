<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    //
    public function index()
    {
        $posts = Note::latest()->paginate(10);
        Log::info('posts', ['posts'=>$posts]);
        return view('note.index', compact('posts'));
    }

    public function create()
    {
        return view('note.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'description' => 'nullable',
        'photo' => 'nullable|file|mimetypes:image/jpeg,image/png',
    ]);

    $data = $request->only('content', 'description', 'title');

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('uploads', 'public');
        $filename = basename($photoPath);
        $data['photo'] = $filename;  // Assuming your Note model has a 'photo' column
    }

    Note::create($data);

    return redirect()->route('dashboard')
        ->with('success', 'Note created successfully.');
}


    public function show(Note $post)
    {
        return view('note.show', compact('post'));
    }

    public function edit(Note $post)
    {
        return view('note.edit', compact('post'));
    }

    public function update(Request $request, Note $post)
    {
        $request->validate([
        'title' => 'required',
        'content' => 'required',
        'description' => 'nullable',
        ]);
        $post->update($request->all());
        return redirect()->route('dashboard')
        ->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $post)
    {
        $post->delete();
        return redirect()->route('dashboard')
        ->with('success', 'Post deleted successfully.');
    }

}
