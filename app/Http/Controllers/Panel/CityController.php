<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\City\StoreRequest;
use App\Http\Requests\Panel\City\UpdateRequest;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Resources\Json\JsonResource;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $model = City::with(['province']);
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.city.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.city.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $city = new City;
        $input = $request->validated();
        foreach($input AS $field => $value){
            $city->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($city->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.cities.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, City $city)
    {
        return view('panel.pages.city.form', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, City $city)
    {
        $input = $request->validated();
        foreach($input AS $field => $value){
            $city->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal mengubah data'
        ];
        if($city->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';
        }
        return redirect()->route('panel.cities.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, City $city) {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($city->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah diubah';

            if($request->ajax()){
                return new JsonResource($city);
            }
        }

        return redirect()->route('panel.cities.index')->with([
            'alert' => $alert
        ]);
    }
}
