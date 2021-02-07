<?php

namespace App\Http\Controllers;

use App\Models\question;
use Illuminate\Http\Request;

class questionControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return question[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return question::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return question::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = \Validator::make($request->all() , [
            'questionText' => "required",
            'askedBy'=> "required|integer",
            'title'=>"required|string"
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag();
        }
        return question::create($request->all());
    }



    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return json
     */
    public function show($id)
    {
            return question::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $q = question::find($id);
        $q->update($request->all());
        return $q;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $q = question::find($id);
        $q->update($request->all());
        return $q;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        //
        return question::destroy($id);
    }
}
