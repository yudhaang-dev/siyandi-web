<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\District\StoreRequest;
use App\Http\Requests\Panel\District\UpdateRequest;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\District;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $model = District::with(['city.province']);
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.district.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.district.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $district = new District;
        $input = $request->validated();
        foreach($input AS $field => $value){
            $district->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($district->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.districts.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, District $district)
    {
        return view('panel.pages.district.form', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, District $district)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $district->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($district->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.districts.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, District $district) {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($district->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';

            if($request->ajax()){
                return new JsonResource($district);
            }
        }

        return redirect()->route('panel.districts.index')->with([
            'alert' => $alert
        ]);
    }
}
