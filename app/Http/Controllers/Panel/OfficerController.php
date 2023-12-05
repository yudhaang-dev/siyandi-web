<?php

namespace App\Http\Controllers\Panel;
use App\Http\Controllers\Controller;

use App\Models\Officer;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\Officer\StoreRequest;
use App\Http\Requests\Panel\Officer\UpdateRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $model = Officer::query();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.officer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.officer.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $officer   = new Officer;
        $input = $request->validated();

        $uploading = $request->hasFile('photo');
        $uploading = $uploading && $request->file('photo')->isValid();
        if($uploading){
            $path   = $request->file('photo')->storePublicly('officers', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(200)->save();
            if(!empty($path)){
                $input['photo'] = $path;
            }
        }
        foreach($input AS $field => $value){
            $officer->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($officer->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.officers.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officer $officer)
    {
        return view('panel.pages.officer.form', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Officer $officer)
    {
        $input = $request->validated();
        $uploading = $request->hasFile('photo');
        $uploading = $uploading && $request->file('photo')->isValid();
        if($uploading){
            $path   = $request->file('photo')->storePublicly('officers', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(200)->save();
            if(!empty($path)){
                $input['photo'] = $path;
                if (Storage::disk('public')->exists(str($officer->photo)->replace(asset('storage/'), ''))) {
                    Storage::disk('public')->delete(str($officer->photo)->replace(asset('storage/'), ''));
                }
            }
        }
        foreach($input AS $field => $value){
            $officer->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($officer->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.officers.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Officer $officer)
    {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($officer->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah dihapus';

            if (Storage::disk('public')->exists(str($officer->photo)->replace(asset('storage/'), ''))) {
                Storage::disk('public')->delete(str($officer->photo)->replace(asset('storage/'), ''));
            }

            if($request->ajax()){
                return new JsonResource($officer);
            }
        }

        return redirect()->route('panel.officers.index')->with([
            'alert' => $alert
        ]);
    }
}
