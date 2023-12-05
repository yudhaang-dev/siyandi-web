<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use App\Models\PostType;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\PostType\StoreRequest;
use App\Http\Requests\Panel\PostType\UpdateRequest;
use Yajra\DataTables\DataTables;

class PostTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $model = PostType::query();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.post-type.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.post-type.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PostType $post_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostType $post_type)
    {
        return view('panel.pages.post-type.form', compact('post_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, PostType $post_type)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $post_type->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($post_type->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.post-types.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostType $post_type)
    {
        //
    }
}
