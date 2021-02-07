<?php

namespace App\Http\Controllers;

use App\Models\solution;
use Illuminate\Http\Request;

class solutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return solution::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        //
        return solution::create($request->all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('filePath');
        $input = $request->all();


        if (!empty($file)) {
            $fileUploadName = $this->uploadFile($file);
            $input['filePath'] = $fileUploadName;
        } else {
            return ["failed"];
        }


        return solution::create($input);

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
        return solution::where("workId" , $id)->get();
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
        $answers = solution::find($id);

        $answers->update($request->all());
        return $answers;
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
        $answers = solution::find($id);

        $answers->update($request->all());
        return $answers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\solution  $solution
     * @return int
     */
    public function destroy($id)
    {
        //
        return solution::destroy($id);
    }

    public function uploadFile($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = public_path() . '/solutions';
        $uplaod = $file->move($path, $fileName);
        return $fileName;
    }

    public function getFile($fileName)
    {
        if (!is_null($fileName)) {
            return asset(public_path() . '/solutions' . $fileName);
        } else return null;
    }
}
