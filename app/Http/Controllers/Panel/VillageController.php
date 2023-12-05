<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Village\StoreRequest;
use App\Http\Requests\Panel\Village\UpdateRequest;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Village;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Resources\Json\JsonResource;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $model = Village::with(['district.city.province']);
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.village.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.village.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $village = new Village;
        $input = $request->validated();
        foreach($input AS $field => $value){
            $village->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($village->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.villages.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Village $village)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Village $village)
    {
        return view('panel.pages.village.form', compact('village'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Village $village)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $village->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($village->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.villages.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Village $village) {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($village->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';

            if($request->ajax()){
                return new JsonResource($village);
            }
        }

        return redirect()->route('panel.villages.index')->with([
            'alert' => $alert
        ]);
    }
}
