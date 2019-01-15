<?php

namespace App\Http\Controllers;

use App\word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Word::all();
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
        Word::create($request->all());
        
        return (['message' => 'success']);
        this.$forceUpdate();
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
 
   $data =Word::where('id', $id)->first();
		$data->title = $request->get('val_1');
		$data->second_title = $request->get('val_2');
		$data->status = $request->get('val_3');
		$data->save();
		return $data;
}
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Word::find($id);
        $user->delete();
        
        
    }
}
