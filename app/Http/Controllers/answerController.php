<?php

namespace App\Http\Controllers;

use App\Models\answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class answerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return answer::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return answer::create();
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
        $validator = \Validator::make($request->all(),[
           "answeredBy"=>"required|integer",
           "answerText"=> "required",
            "questionId"=>"required|integer"
        ]);

        if ($validator->fails()) {
            return $validator->getMessageBag();
        }

        return answer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        //
//        $ans = answer::find($id);
        $ans = answer::where('questionId',$id);
        return $ans->get();
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
        $answer = answer::find($id);
        $answer->update($request->all());
        return $answer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
        $answer = answer::find($id);
        $answer->update($request->all());
        return $answer;
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
        return answer::destroy($id);
    }
}
