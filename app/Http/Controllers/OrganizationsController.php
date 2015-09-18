<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrganizationsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("pages.organizations.create");
    }

    public function firstsignin() {
        return view("pages.organizations.firstsignin");
    }

    public function login() {
        return view("pages.organizations.users.signin");
    }

    public function loginuser(Request $request) {

        $rules = [
            'email' => 'required|string',
            'password' => 'required'
        ];

        $nicename = [
            'email' => 'username',
            'password' => 'password'
        ];

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nicename);

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        if ($request->has('password') && $request->has('email')) {
            if (\Auth::organization()->attempt(['email' => $request->input('email'),
                        'password' => $request->input('password')])) {

                $org = \DB::table('organization_details')
                        ->where('organization_details.organization', '=', \Auth::organization()->get()->id)
                        ->get(['id']);
                if ($org != null) {
                    return redirect()->intended('home');
                } else {
                    return redirect()->intended('organizations/first-signin');
                }
                return "";

                //                 Authentication passed...
            } else {
                $request->flash();
                return redirect()->back()->withErrors(['loginwrong' => 'check your access info']);
            }
        }
    }

    public function organizationlist() {
        $org = \DB::table('organization_account')
                ->join('organization_details', 'organization_details.organization', '=', 'organization_account.id')
                ->join('user', 'user.id', '=', 'organization_account.creator_admin')
                ->orderBy('organization_account.created_at', 'DESC')
                ->select(
                        'organization_account.username', 'user.username as creator', 'organization_account.created_at as orge_created_at', 'organization_details.email', 'organization_details.phone', 'organization_details.name'
                )
                ->paginate(25);
        $org->setPath('');
        return view("pages.organizations.list")->with("organizations", $org);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [
            'username' => 'required|string|unique:organization_account',
            'password' => 'required|min:6'
        ];
        $nicename = [
            'username' => 'userame',
            'password' => 'password'
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nicename);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $add = new \App\OrganizationAccount;
        $add->creator_admin = \Auth::user()->get()->id;
        $add->username = $request->input('username');
        $add->password = bcrypt($request->input('password'));
        $add->save();

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
