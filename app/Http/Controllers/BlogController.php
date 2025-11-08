<?php

namespace App\Http\Controllers;

use App\Models\resume;
use App\Models\BlogPost;
use App\Models\BlogComment;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function home(resume $resume){
        $categories = BlogCategory::where('resume', $resume->id)->get();
        $posts = BlogPost::where('resume', $resume->id)->get();
        return view('blog.index', compact('resume', 'categories', 'posts'));
    }

    public function showByCategory(resume $resume, BlogCategory $id){
        $categories = BlogCategory::where('resume', $resume->id)->get();
        $posts = BlogPost::where('resume', $resume->id)->where('category', $id->id)->get();
        return view('blog.index', compact('resume', 'categories', 'posts'));
    }

    public function showBySearch(Request $request){
        $validate = $request->validate([
            'resume' => 'required|integer',
            'word' => 'required|string'
        ]);
        $resume = resume::findOrFail($request->resume);
        $s = $request->word;
        $categories = BlogCategory::where('resume', $resume->id)->get();
        $posts = BlogPost::where('resume', $resume->id)->where('title', 'LIKE', "%$s%")->orWhere('body', 'LIKE', "%$s%")->get();
        return view('blog.index', compact('resume', 'categories', 'posts'));
    }

    public function viewPost(resume $resume, BlogPost $post){
        if($post->resume == $resume->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            $comments = BlogComment::where('resume', $resume->id)->where('replay', null)->get();
            return view('blog.post', compact('resume', 'categories', 'post', 'comments'));
        }else{
            return abort(404);
        }
    }

    public function adminIndex(resume $resume){
        $categories = BlogCategory::where('resume', $resume->id)->get();
        return view('blog.admin.index', compact('resume', 'categories'));
    }

    public function insertPost(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'category' => 'required|integer',
            'image' => 'required|image',
            'desc' => 'required|string',
            'resume' => 'required|string'
        ]);

        if($request->hasFile('image')){
            $imageName = Carbon::now()->microsecond . '.' . $request->image->extension();
            $request->image->storeAs('images/blog/post', $imageName, 'public');
        }

        if(resume::findOrFail($request->resume)->user->id == auth()->user()->id){
            BlogPost::create([
                'title' => $request->title,
                'category' => $request->category,
                'image' => $request->hasFile('image') ? $imageName :  null,
                'body' => $request->desc,
                'resume' => $request->resume
            ]);
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }


    public function categories(resume $resume){
        if($resume->user->id == auth()->user()->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            return view('blog.admin.categories', compact('resume', 'categories'));
        }else{
            return abort(404);
        }
    }

    public function insertCategory(Request $request){
        $validate = $request->validate([
            'title' => 'required|string',
            'resume' => 'required|integer'
        ]);

        if(resume::findOrFail($request->resume)->user->id == auth()->user()->id){
            BlogCategory::create([
                'title' => $request->title,
                'resume' => $request->resume
            ]);
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function deleteCategory(resume $resume, BlogCategory $id){
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $id->delete();
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }
    public function EditCategory(resume $resume, BlogCategory $id){
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            return view('blog.admin.editCategory', compact('resume', 'id', 'categories'));
        }else{
            return redirect()->back()->with('error');
        }
    }

    
    public function updateCategory(Request $request){
        $validate = $request->validate([
            'resume' => 'required|integer',
            'id' => 'required|integer',
            'title' => 'required|string'
        ]);
        $resume = resume::findOrFail($request->resume);
        $id = BlogCategory::findOrFail($request->id);
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            BlogCategory::where('id', $request->id)->update([
                'title' => $request->title
            ]);
            return redirect(route('admin') . '/' . $resume->id . '/categories')->with('success');
        }else{
            return redirect(route('admin') . '/' . $resume->id . '/categories')->with('error');
        }
    }

    public function posts(resume $resume){
        if($resume->user->id == auth()->user()->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            $posts = BlogPost::where('resume', $resume->id)->get();
            return view('blog.admin.posts', compact('resume', 'categories', 'posts'));
        }else{
            return abort(404);
        }
    }

    public function deletePost(resume $resume, BlogPost $id){
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $id->delete();
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function EditPost(resume $resume, BlogPost $id){
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            return view('blog.admin.editPost', compact('resume', 'id', 'categories'));
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function updatePost(Request $request){
        $validate = $request->validate([
            'resume' => 'required|integer',
            'id' => 'required|integer',
            'title' => 'required|string',
            'category' => 'required|integer',
            'image' => 'nullable|image',
            'body' => 'required|string',
        ]);
        $resume = resume::findOrFail($request->resume);
        $id = BlogPost::findOrFail($request->id);
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            if($request->hasFile('image')){
                $imageName = Carbon::now()->microsecond . '.' . $request->image->extension();
                $request->image->storeAs('images/blog/post', $imageName, 'public');
            }
            BlogPost::where('id', $request->id)->update([
                'title' => $request->title,
                'category' => $request->category,
                'image' => $request->hasFile('image') ? $imageName : BlogPost::find($request->id)->image,
                'body' => $request->body
            ]);
            return redirect(route('admin') . '/' . $resume->id . '/posts')->with('success');
        }else{
            return redirect(route('admin') . '/' . $resume->id . '/posts')->with('error');
        }
    }

    public function comments(resume $resume){
        if($resume->user->id == auth()->user()->id){
            $categories = BlogCategory::where('resume', $resume->id)->get();
            $comments = BlogComment::where('resume', $resume->id)->withoutGlobalScope('status')->get();
            return view('blog.admin.comments', compact('resume', 'categories', 'comments'));
        }else{
            return abort(404);
        }
    }

    public function deleteComment(resume $resume, $id){
        $id = BlogComment::withoutGlobalScopes()->findOrFail($id);
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $id->delete();
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function statusComment(resume $resume, $id){
        $id = BlogComment::withoutGlobalScopes()->findOrFail($id);
        if($resume->user->id == auth()->user()->id && $id->resume == $resume->id){
            $id->update([
                'status' => $id->status == 0 ? 1 : 0
            ]);
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function insertComment(Request $request){
        $validate = $request->validate([
            'body' => 'required|string',
            'resume' => 'required|integer',
            'id' => 'required|integer'
        ]);

        if(resume::findOrFail($request->resume)->user->id == auth()->user()->id){
            BlogComment::create([
                'body' => $request->body,
                'resume' => $request->resume,
                'post_id' => $request->id,
                'user_id' => auth()->user()->id,
                'status' => resume::findOrFail($request->resume)->user->id == auth()->user()->id ? 1 : 0
            ]);
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }
}
