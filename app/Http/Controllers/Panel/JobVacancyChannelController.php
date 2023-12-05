<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

use App\Models\JobVacancyChannel;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\JobVacancyChannel\StoreRequest;
use App\Http\Requests\Panel\JobVacancyChannel\UpdateRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class JobVacancyChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $model = JobVacancyChannel::query();
            return DataTables::of($model)->toJson();
        }
        return view('panel.pages.job-vacancy-channel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.pages.job-vacancy-channel.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $job_vacancy_channel   = new JobVacancyChannel;
        $input = $request->validated();

        $uploading = $request->hasFile('image');
        $uploading = $uploading && $request->file('image')->isValid();
        if($uploading){
            $path   = $request->file('image')->storePublicly('job-vacancy-channels', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(200)->save();
            if(!empty($path)){
                $input['image'] = $path;
            }
        }
        foreach($input AS $field => $value){
            $job_vacancy_channel->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($job_vacancy_channel->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.job-vacancy-channels.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobVacancyChannel $job_vacancy_channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobVacancyChannel $job_vacancy_channel)
    {
        return view('panel.pages.job-vacancy-channel.form', compact('job_vacancy_channel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, JobVacancyChannel $job_vacancy_channel)
    {
        $input = $request->validated();

        $uploading = $request->hasFile('image');
        $uploading = $uploading && $request->file('image')->isValid();
        if($uploading){
            $path   = $request->file('image')->storePublicly('job-vacancy-channels', 'public');
            Image::make(storage_path('app/public/' . $path))->fit(200)->save();
            if(!empty($path)){
                $input['image'] = $path;
                if (Storage::disk('public')->exists(str($job_vacancy_channel->image)->replace(asset('storage/'), ''))) {
                    Storage::disk('public')->delete(str($job_vacancy_channel->image)->replace(asset('storage/'), ''));
                }
            }
        }
        foreach($input AS $field => $value){
            $job_vacancy_channel->{$field} = $value;
        }
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menambah data'
        ];
        if($job_vacancy_channel->save()){
            $alert->type = 'success';
            $alert->message = 'Data telah ditambahkan';
        }
        return redirect()->route('panel.job-vacancy-channels.index')->with([
            'alert' => $alert
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, JobVacancyChannel $job_vacancy_channel)
    {
        $alert = (object)[
            'type' => 'danger', 
            'message'=>'Gagal menghapus data'
        ];

        if($job_vacancy_channel->delete()){
            $alert->type = 'success';
            $alert->message = 'Data telah dihapus';

            if (Storage::disk('public')->exists(str($job_vacancy_channel->image)->replace(asset('storage/'), ''))) {
                Storage::disk('public')->delete(str($job_vacancy_channel->image)->replace(asset('storage/'), ''));
            }

            if($request->ajax()){
                return new JsonResource($job_vacancy_channel);
            }
        }

        return redirect()->route('panel.job-vacancy-channels.index')->with([
            'alert' => $alert
        ]);
    }
}
