<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SystemUserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("pages.users.create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login() {
        return view("pages.users.signin");
    }

    public function userslist() {
        $users = \DB::table('user')
                ->join('system_user', 'system_user.user', '=', 'user.id')
                ->join('user_role', 'user_role.id', '=', 'system_user.role')
                ->orderBy('user.created_at', 'DESC')
                ->select(
                        'user.email', 'user.created_at as user_created_at', 'user.username', 'user_role.title as user_role'
                )
                ->paginate(25);
        $users->setPath('');
        return view("pages.users.list")->with("users", $users);
    }

    public function loginuser(Request $request) {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $nicename = [
            'email' => 'emile',
            'password' => 'password'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nicename);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        if ($request->has('password') && $request->has('email')) {
            if (\Auth::attempt(['email' => $request->input('email'),
                        'password' => $request->input('password')])) {

                //                 Authentication passed...
                if (\Auth::user()->type == 0) {
                    $userinfo = \DB::table('system_user')
                            ->where('system_user.user', '=', \Auth::user()->id)
                            ->get();
                    session()->put('userinfo', $userinfo);
                    return redirect()->intended('home');
                } else {
                    Auth::logout();
                    return redirect()->back();
                }
            } else {
                $request->flash();
                return redirect()->back()->withErrors(['loginwrong' => 'check your access info']);
            }
        }
    }

    public function create() {
        $roles = \DB::table('user_role')->get(['id', 'title']);
        return view("pages.users.create")
                        ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6',
            'userrole' => 'required',
        ];
        $nicename = [
            'username' => 'userame',
            'email' => 'email',
            'password' => 'password',
            'userrole' => 'role',
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nicename);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $adduser = new \App\User;
        $adduser->username = $request->input('username');
        $adduser->type = $request->input('usertype');
        $adduser->email = $request->input('email');
        $adduser->password = bcrypt($request->input('password'));
        $adduser->save();

        $adduserdetials = new \App\SystemUser;
        $adduserdetials->role = $request->input('userrole');
        $adduserdetials->user = $adduser->id;
        $adduserdetials->save();

        return redirect()->back()->with('forminserted', 'true');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
