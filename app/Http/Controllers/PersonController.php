<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use \App\Person;
use Gate;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $organizations = DB::table('organizations')
        ->where('user_id', Auth::id())
        ->where('id', $request->organization)->get();

        if(count($organizations)>=1){
            $people = DB::table('people')->where('organization_id',$request->organization)->paginate(5);
        }else{
            $people = array();
        }
        
        return view('person.index',['people'=>$people,'organizations'=>$organizations]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('avatar')) 
        { 
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('images/avatars/', $filename);
        }
        
        Person::create([

        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'organization_id' => $request->organization_id,
        'avatar' => $filename

        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $people = Person::findOrFail($request->person_id);

        $people->update($request->all());
       
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $people = Person::findOrFail($request->person_id);
        $people->delete();

        return back();
    }
}
