<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Post\StoreRequest;
use App\Http\Requests\Panel\Post\UpdateRequest;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class PostTypePostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PostType $post_type)
    {
        if(request()->ajax()){
            $model = $post_type->posts();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.post-type.post.index', compact('post_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, PostType $post_type)
    {
        return view('panel.pages.post-type.post.form', compact('post_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, PostType $post_type)
    {
        $post   = new Post;
        $input = $request->validated();

        $uploading = $request->hasFile('image');
        $uploading = $uploading && $request->file('image')->isValid();
        if($uploading){
            $path   = $request->file('image')->storePublicly('posts', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(600, 400)->save();
            if(!empty($path)){
                $input['image'] = $path;
            }
        }
        foreach($input AS $field => $value){
            $post->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($post_type->posts()->save($post)){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.post-types.posts.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, PostType $post_type, Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, PostType $post_type, Post $post)
    {
        return view('panel.pages.post-type.post.form', compact('post_type','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, PostType $post_type, Post $post)
    {
        $input = $request->validated();

        $uploading = $request->hasFile('image');
        $uploading = $uploading && $request->file('image')->isValid();
        if($uploading){
            $path   = $request->file('image')->storePublicly('posts', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(600, 400)->save();
            if(!empty($path)){
                $input['image'] = $path;
                if (Storage::disk('public')->exists(str($post->image)->replace(asset('storage/'), ''))) {
                    Storage::disk('public')->delete(str($post->image)->replace(asset('storage/'), ''));
                }
            }
        }
        foreach($input AS $field => $value){
            $post->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($post->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.post-types.posts.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, PostType $post_type, Post $post)
    {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($post->delete()){
            if (Storage::disk('public')->exists(str($post->image)->replace(asset('storage/'), ''))) {
                Storage::disk('public')->delete(str($post->image)->replace(asset('storage/'), ''));
            }

            $alert->type = 'success';
            $alert->message = 'Data telah diubah';

            if($request->ajax()){
                return new JsonResource($post);
            }
        }

        return redirect()->route('panel.post-types.posts.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);

    }
}
