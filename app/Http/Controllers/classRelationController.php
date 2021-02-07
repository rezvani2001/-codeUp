<?php

namespace App\Http\Controllers;

use App\Models\classRelation;
use Illuminate\Http\Request;

class classRelationController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return works[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return classRelation::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return classRelation::create($request->all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return classRelation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        return classRelation::where('personId' , $id)->get();
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
        return classRelation::destroy($id);
    }
}
