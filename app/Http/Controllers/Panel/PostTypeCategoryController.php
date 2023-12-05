<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\PostType;
use App\Http\Requests\Panel\PostCategory\StoreRequest;
use App\Http\Requests\Panel\PostCategory\UpdateRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\DataTables;

class PostTypeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PostType $post_type)
    {
        if(request()->ajax()){
            $model = $post_type->categories();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.post-type.category.index', compact('post_type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, PostType $post_type)
    {
        return view('panel.pages.post-type.category.form', compact('post_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, PostType $post_type)
    {
        $category   = new PostCategory;
        $input = $request->validated();
        foreach($input AS $field => $value){
            $category->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($post_type->categories()->save($category)){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.post-types.categories.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, PostType $post_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, PostType $post_type, PostCategory $category)
    {
        return view('panel.pages.post-type.category.form', compact('post_type','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, PostType $post_type, PostCategory $category)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $category->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($category->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.post-types.categories.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, PostType $post_type, PostCategory $category)
    {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($category->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah dihapus';

            if($request->ajax()){
                return new JsonResource($category);
            }
        }

        return redirect()->route('panel.post-types.categories.index', ['post_type'=>$post_type])->with([
            'alert' => $alert
        ]);
    }

    public function select2(Request $request, PostType $post_type){
        $model = $post_type->categories()->select('id', 'name as text');

        $search = $request->input('q') ?? $request->input('term') ?? null;
        if(!empty($search)){
            $model->where('name', 'LIKE', '%'.$search.'%');
        }
        $paginator = $model->paginate();
        return response()->json([
            'results' => $paginator->items(),
            'pagination' => [
                'more' => $paginator->hasMorePages()
            ]
        ]);
    }
}
