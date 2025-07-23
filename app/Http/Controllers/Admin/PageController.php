<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create(){
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable',
        ]);

        $title = $request->title;
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $i = 1;

        while (Page::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $i++;
        }

        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable'
        ]);

        if($page->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $i = 1;

            while (Page::where('slug', $slug)->where('id', '!=', $page->id)->exists()) {
                $slug = $originalSlug . '-' . $i++;
            }

            $page->slug = $slug;
        }
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function status($id)
    {
        $user = Page::findOrFail($id);

        $user->status = $user->status ? 0 : 1;
        $user->save();
        return response()->json([
            'status'  => 200,
            'message' => 'Status updated successfully'
        ]);
    }

    public function delete(Request $request){
        $user = Page::find($request->id); 
    
        if (!$user) {
            return response()->json([
                'status'    => 404,
                'message'   => 'Page not found.',
            ]);
        }
    
        $user->delete(); 
        return response()->json([
            'status'    => 200,
            'message'   => 'Page deleted successfully.',
        ]);
    }
}
