<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    // -------------------- POSTS --------------------
    public function addpost()
    {
        return view('admin.addpost');
    }

    public function createpost(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
        }

        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $filename
        ]);

        return redirect()->route('admin.allpost')->with('status', 'Post created successfully!');
    }

    public function allpost()
    {
        $posts = Post::latest()->get();
        return view('admin.allpost', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.updatepost', compact('post'));
    }

    public function postupdate(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $post->image = $filename;
        }

        $post->title = $data['title'];
        $post->description = $data['description'];
        $post->save();

        return redirect()->route('admin.allpost')->with('status', 'Post updated successfully!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.allpost')->with('status', 'Post deleted successfully!');
    }

    public function showContactMessages()
    {
        $messages = Contact::latest()->get();
        return view('admin.contact-messages', compact('messages'));
    }

    // -------------------- PROJECTS --------------------
    public function allProjects()
    {
        $projects = Project::latest()->get();
        return view('admin.allprojects', compact('projects'));
    }

    public function addProject()
    {
        return view('admin.addproject');
    }

    public function createProject(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|file|max:10240' // max 10MB
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
        }

        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
        }

        Project::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $filename,
            'file' => $fileName,
        ]);

        return redirect()->route('admin.allprojects')->with('status', 'Project added successfully!');
    }

    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.updateproject', compact('project'));
    }

    public function updateProject(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'file' => 'nullable|file|max:10240'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $project->image = $filename;
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('files'), $fileName);
            $project->file = $fileName;
        }

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->save();

        return redirect()->route('admin.allprojects')->with('status', 'Project updated successfully!');
    }

    public function deleteProject($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.allprojects')->with('status', 'Project deleted successfully!');
    }
}
