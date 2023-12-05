<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CitizenController extends Controller
{

    public function index(Request $request)
    {
        if(request()->ajax()){
            $model = Citizen::query();
            $filters = $request->input('filters');
            foreach($filters AS $column => $value){
                if($value != ''){
                    $model->where($column, $value);
                }
            }
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.citizen.index');
    }

    public function show(Citizen $citizen)
    {
        return view('panel.pages.citizen.show', compact('citizen'));
    }
}
