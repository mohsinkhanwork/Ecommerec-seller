<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Review;
use Validator;
use Response;
use DB;


class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = $request->all();
        
        Review::create($input);

        return response()->json();
        // return redirect()->back()->with('message', 'Thanks for Review');
    }

    public function rating_reviews(Request $request)
    {
        $input = $request->all();
        // dd($input);
        Review::create($input);
        
        // $email = $request->email;
        // // dd($email);
       
        // $rated_already_users = Review::where('email', $email)->get();


        
        // foreach($rated_already_users as $users) {

        // // dd($users->email);

        //  if($users->email == $email) {

        //         abort('404');

        // } else {

        // Review::create($input);

        // }   

        // }

        // return response()->json();
        // return redirect()->back()->with('message', 'Thanks for Review');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
