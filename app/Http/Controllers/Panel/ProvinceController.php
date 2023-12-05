<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Province\StoreRequest;
use App\Http\Requests\Panel\Province\UpdateRequest;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $model = Province::query();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.province.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.province.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $province = new Province;
        $input = $request->validated();
        foreach($input AS $field => $value){
            $province->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($province->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.provinces.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Province $province)
    {
        return view('panel.pages.province.form', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Province $province)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $province->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($province->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.provinces.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Province $province) {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($province->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';

            if($request->ajax()){
                return new JsonResource($province);
            }
        }

        return redirect()->route('panel.provinces.index')->with([
            'alert' => $alert
        ]);
    }
}
