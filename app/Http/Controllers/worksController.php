<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\works;
use Dotenv\Validator;
use Faker\Provider\File;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class worksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return works[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //
        return works::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $validator = \Validator::make($request->all(),[
            "explainWork" => "required",
            "relatedClassId" => "required",
            "title" => "required"
        ]);

        if ($validator->fails()){
            return $validator->getMessageBag();
        }else {
            $file = $request->file('filePath');
            $input = $request->all();
            if (!empty($file)) {
                $fileUploadName = $this->uploadFile($file);
                $input['filePath'] = $fileUploadName;
            } else {
                $input['filePath'] = null;
            }

            return works::create($input);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        return works::where( "relatedClassId" , $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return void
     */
    public function edit(Request $request,$id)
    {
        //
        $work = works::find($id);
        $work->update($request->all());
        return $work;
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
        $work = works::find($id);
        $work->update($request->all());
        return $work;
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
        return works::destroy($id);
    }


    public function uploadFile($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = public_path() . '/works';
        $uplaod = $file->move($path, $fileName);
        return $fileName;
    }

    public function getFile($fileName)
    {
        if (!is_null($fileName)) {
            return asset(public_path() . '/works' . $fileName);
        } else return null;
    }
}
