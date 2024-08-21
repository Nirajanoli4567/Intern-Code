<?php
namespace App\Http\Controllers;

use App\Models\Blogs; 
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::where('status', 'approved')->get();
        
        // Pass the filtered blogs to the view
        return view('blog', [
            'blogs' => $blogs
        ]);
    //    return view('blog', [
    //     'blogs' => $blogs
    //    ]); 
 
    }
    // public function edit(Request $request);

    public function Save(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'photo' => 'nullable|image|max:2048',
            'description' => 'required',
        ]);

        $datas = Blogs::create($data);

        if ($datas) {
            return redirect()->route('dashboard'); 
        }
    }
    public function updateStatus(Request $request)
{
    $request->validate([
        'id' => 'required|exists:blogs,id',
        'status' => 'required|in:approved,notapproved', // Ensure 'not-approved' is valid
    ]);

    $blog = Blogs::find($request->id);
    $blog->status = $request->status;
    $blog->save();

    return redirect()->back()->with('status', 'Blog status updated successfully!');
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

    return redirect()->route('dashboard')->with('success', 'Blog updated successfully!');
}
// public function updateadmin(Request $request)
// {
//     $request->validate([
//         'id' => 'required|exists:blogs,id',
//         'title' => 'required|string|max:255',
//         'category' => 'required|string',
//         'description' => 'required|string',
//         // Add validation rules for other fields as necessary
//     ]);

//     $blog = Blogs::findOrFail($request->id);

//     $blog->title = $request->title;
//     $blog->category = $request->category;
//     $blog->description = $request->description;
//     // Update other fields as necessary

//     // Handle file uploads or other updates here if needed
//     // For example, if you're handling a photo upload:
//     // if ($request->hasFile('photo')) {
//     //     $photoPath = $request->file('photo')->store('photos', 'public');
//     //     $blog->photo = $photoPath;
//     // }

//     $blog->save(); // Save the updated blog

//     // return redirect()->route('admin.home')->with('success', 'Blog updated successfully!');
//     return view("admin.home");
// }



public function Delete($id)
{

Blogs::find($id)->delete();
//   return redirect(route("blog"))->with('message',"Data has been deleted successfully");
return view('dashboard')->with('successd','Blog is deleted successfully');

}
}
