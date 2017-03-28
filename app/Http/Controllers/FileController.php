<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\lengthAwarePaginator;
use App\Http\Requests;
use App\FileModel;
use Auth;
use Illuminate\Support\Facades\Input;

use Session;
use DB;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = FileModel::paginate(6);
        return view('/home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Input::hasFile('files')){
            if(Input::hasfile('files'))
            {
                $files = Input::file('files');
                $uploads_dir = public_path('/upload');
                foreach ($_FILES["files"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["files"]["tmp_name"][$key];
                        $name = $_FILES["files"]["name"][$key];
                        move_uploaded_file($tmp_name, "$uploads_dir/$name");
                    }
                }
                foreach($files as $file)
                {
                    $name = $file->getClientOriginalName();
                    $filepath = '/upload/'.$name;
                    $size = $file->getsize();
                    $post = new FileModel;
                    $post->user_id = $request->user()->id;
                    $post->filename = $name;
                    $post->filepath = $filepath;
                    $post->size = $size;
                    $post->save();
                }    
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //
        $posts = FileModel::paginate(6);
        return view('/welcome', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts = DB::table('file')->where('id', $id)->get();
    
        foreach($posts as $post)
        {
            if(Auth::user()->id != $post->user_id)
            {
                return redirect('post');
            }
        }
         return view('upload.edit')->with('post',$post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = FileModel::find($id);
        $post->filename = $request->input('filename');
        $post->filepath = $request->input('filepath');
        $post->save();

        Session::flash('success', 'This post was successfully save.');
        return redirect()->route('post.index', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = FileModel::find($id);
        $post->delete();


        Session::flash('success', 'the post has been successfully deleted');
        return redirect()->route('post.index');
    }
}
