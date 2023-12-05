<?php

namespace App\Http\Controllers\Panel\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndonesiaController extends Controller
{
    public function index(Request $request, string $region){
        $region             = str($region ?? 'province')->lower()->plural();
        if(!in_array($region, ['provinces','cities','districts','villages'])){
            return response()->json(['data'=>[]], 404);
        }
        $region = "\\Laravolt\\Indonesia\\Models\\" . str($region)->singular()->studly();
        $region = $region::orderBy('name', 'asc');
        
        $filters   = $request->query('filters');
        if(!empty($filters)){
            $region->where($filters);
        }
        
        $with   = $request->query('with');
        if(!empty($with)){
            $region->with($with);
        }

        $search = $request->query('term') ?? $request->query('q');
        if(!empty($search)){
            $region->search($search);
        }
        return JsonResource::collection($region->paginate(50));
    }

    public function show(Request $request, string $region, string $code){
        $region             = str($region ?? 'province')->lower()->plural();
        if(!in_array($region, ['provinces','cities','districts','villages'])){
            return response()->json(['data'=>[]], 404);
        }
        $region = "\\Laravolt\\Indonesia\\Models\\" . str($region)->singular()->studly();
        $region = $region::where('code', $code);
        $with   = $request->query('with');
        if(!empty($with)){
            $region->with($with);
        }
        return new JsonResource($region->first());
    }
}
