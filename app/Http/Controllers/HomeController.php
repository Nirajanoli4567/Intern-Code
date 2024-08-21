<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs; 
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      return("nothing is here");
    }
    public function update(Request $request)
{
    $request->validate([
        'id' => 'required|exists:blogs,id',
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'description' => 'required|string',
        // Add validation rules for other fields as necessary
    ]);

    $blog = Blogs::findOrFail($request->id);

    $blog->title = $request->title;
    $blog->category = $request->category;
    $blog->description = $request->description;
    // Update other fields as necessary

    // Handle file uploads or other updates here if needed
    // For example, if you're handling a photo upload:
    // if ($request->hasFile('photo')) {
    //     $photoPath = $request->file('photo')->store('photos', 'public');
    //     $blog->photo = $photoPath;
    // }

    $blog->save(); // Save the updated blog

    return redirect()->route('')->with('success', 'Blog updated successfully!');
    // return view('admin.home');
}

}

