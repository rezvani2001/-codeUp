<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\classRelation;
use Illuminate\Http\Request;

class classesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return classes[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return classes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return classes::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $validator = \Validator::make($request->all(),[
            "creatorID" => "required",
            "creatorName" => "required",
            "title" => "required",
            "classKey" => "required|unique:classes",
            "password" => "required"
        ]);

        if ($validator->fails()){
            return $validator->getMessageBag();
        }

       $temp = classes::create($request->all());

       classRelation::create([
           "personId" => $temp->creatorID,
           "classId" => $temp->id,
           "className" => $temp->title,
           "creatorName" => $temp->creatorName
       ]);
       return $temp;
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return classes[]|\Illuminate\Database\Eloquent\Collection|void
     */
    public function show($id)
    {
        //
        return classes::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        //
        $classes = classes::find($id);
        $classes->update($request->all());

        return $classes;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $classes = classes::find($id);
        $classes->update($request->all());

        return $classes;

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
        return classes::destroy($id);
    }


}
