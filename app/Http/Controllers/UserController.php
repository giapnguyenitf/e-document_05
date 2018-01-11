<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Auth;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile');
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
    public function store(UpdateProfileRequest $request)
    {
        try
        {
            $id = Auth::user()->id;
            $data = $request->only([
                'name',
                'email',
                'firstname',
                'lastname',
                'address',
                'phone',
                'gender',
            ]);
            $data['date_of_birth'] = $request->date;

            if ($request->has('avatar') && $request->hasFile('avatar')) {
                $avatar = explode('/', $request->avatar->store('public/avatars'))[2];
                $data['avatar'] = $avatar;
            }
            User::where('id', $id)->update($data);
            Session::flash('update_profile_success', trans('messages.update_profile_success'));

            return redirect()->route('profile.index');
        } catch(\Exception $e) {
            Session::flash('update_profile_fail', trans('messages.update_profile_fail'));
            
            return back();
        }
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
