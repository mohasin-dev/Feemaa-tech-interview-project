<?php

namespace App\Http\Controllers;

use App\ServiceMeta;
use Illuminate\Http\Request;

class ServiceMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceMeta::with('service')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'service_id' => 'required',
        ]);

        $service = new ServiceMeta();
        $service->name = $request->name;
        $service->service_id = $request->service_id;
        $service->save();

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceMeta  $serviceMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service_meta = ServiceMeta::findOrFail($id);
        $service_meta->delete();
        return response()->json(['success' => 'success'], 200);
    }
}
