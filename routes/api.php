<?php

use App\Http\Controllers\answerController;
use App\Http\Controllers\classesController;
use App\Http\Controllers\classRelationController;
use App\Http\Controllers\solutionController;
use App\Http\Controllers\userController;
use App\Http\Controllers\worksController;
use App\Models\classes;
use App\Models\classRelation;
use App\Models\solution;
use App\Models\User;
use App\Models\works;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\questionControl;
use phpDocumentor\Reflection\Types\Integer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('question', questionControl::class);


Route::resource('answer', answerController::class);


Route::resource('user', userController::class);


Route::resource('works', worksController::class);


Route::resource('classes', classesController::class);


Route::resource('solution', solutionController::class);


Route::resource('classes/relation', classRelationController::class);

Route::get('classes/relation/reverse/{id}',function ($id){
    return classRelation::where('classId',$id)->get();
});

Route::get('classes/find/{classKey}', function ($classKey){
    $temp = classes::where('classKey', $classKey)->first();
    if ($temp == null) return [];
    return $temp;
});

Route::get('works/get/{id}',function ($id) {
    $temp = works::find($id);
    if ($temp == null) return [];
    return $temp;
});

/*
 * login api
 */
Route::get('user/{email}/{pass}', function (string $email, $pass) {
    $user = User::where('email', $email)->first();
    if ($user == null) return ['not found'];
    if ($user->password == $pass) return $user;
    else return ['wrong password'];
});


Route::get('works/file/{id}',function ($id){
    $fileName = works::find($id)->filePath;
    if (!is_null($fileName)) {
        return [asset( '/works/' . $fileName)];
    } else return null;
});


Route::get(/**
 * @param $id
 * @param Integer $personId
 * @param $pass
 * @return string[]
 */ 'classes/join/{id}/{personId}/{pass}',function ($id, $personId, $pass) {
    $cl = classes::find($id);


    if ($pass == $cl->password){

        classRelation::create([
            'personId' => $personId,
            'classId' =>  $id,
            'className' => $cl->title,
            'creatorName' => $cl->creatorName
        ]);
        return ['done'];
    } else {
        return ["wrong pass"];
    }
});



Route::get('solution/file/{id}',function ($id){
    $fileName = solution::find($id);

    if ($fileName != null) $fileName = $fileName->filePath;
    else return [];

    if (!is_null($fileName)) {
        return [asset( '/solutions/' . $fileName)];
    } else return [];
});
