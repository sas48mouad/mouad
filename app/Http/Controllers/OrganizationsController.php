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

    public function firstsignin($id) {
        $region = \DB::table('oman_region')
                ->get(['id', 'name']);
        $state = \DB::table('oman_state')
                ->get(['id', 'name']);
        $type = \DB::table('organization_type')
                ->get(['id', 'title']);
        $org = \DB::table('organization_account')
                ->where('organization_account.id', '=', $id)
                ->get();

        return view("pages.organizations.details.firstsignin")
                        ->with('regions', $region)
                        ->with('types', $type)
                        ->with('org', $org[0])
                        ->with('states', $state);
    }

    public function workdays($id) {
        $days = \DB::table('day')
                ->get(['id', 'name']);
        $org = \DB::table('organization_account')
                ->where('organization_account.id', '=', $id)
                ->get();

        return view("pages.organizations.details.workdays")
                        ->with('days', $days)
                        ->with('org', $org[0]);
    }

    public function workdaysstore(Request $request) {
        $days = [];
        $days = $request->input("org-work-days");
        foreach ($days as $daysid) {
            $add = new \App\WorkDay;
            $add->organization = $request->input("id");
            $add->day = $daysid;
            $add->save();
        }
        return redirect('organizations/first-signin/rest-times/' . $request->input('id'));
    }

    public function storeresttimes(Request $request) {

        $add = new \App\Rest;
        $add->timefrom = $request->input("timefrom");
        $add->timeto = $request->input("timeto");
        $add->organization = $request->input("id");
        $add->save();
        return redirect('organizations/first-signin/rest-times/' . $request->input('id'));
    }

    public function backgroundstore(Request $request) {

        $file = $request->file('background');
        $rules = array('background' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
        $validator = \Illuminate\Support\Facades\Validator::make(array('background' => $file), $rules);
        if ($validator->passes()) {
            
            
            $destinationPath = 'orgbackground';
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $now = \DateTime::createFromFormat('U.u', microtime(true));

            $filename = $now->format("mdYHisu") . '.' . $extension;

            $upload_success = $file->move($destinationPath, $filename);
            
            $background = new \App\OrgBackground;
            $background->organization = $request->input('id');
            $background->title = $filename;
            $background->path = $destinationPath;
            $background->save();
            return "done";
//            return redirect('organizations/first-signin/rest-times/' . $request->input('id'));
        } else {
            return redirect()->back()->withErrors($validator);
        }

        
    }

    public function background($id) {

        $org = \DB::table('organization_account')
                ->where('organization_account.id', '=', $id)
                ->get();

        return view("pages.organizations.details.setbackground")
                        ->with('org', $org[0]);
    }

    public function resttimes($id) {
        $rest = \DB::table('rest')
                ->where('rest.organization', '=', $id)
                ->get(['id', 'timefrom', 'timeto']);

        $org = \DB::table('organization_account')
                ->where('organization_account.id', '=', $id)
                ->get();

        return view("pages.organizations.details.rest")
                        ->with('rests', $rest)
                        ->with('org', $org[0]);
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
                    return "here";
//                    return redirect()->intended('home');
                } else {
                    return redirect()->intended('organizations/first-signin/' . \Auth::organization()->get()->id);
                }

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
            'email' => 'required|email|unique:organization_account',
            'password' => 'required|min:6'
        ];
        $nicename = [
            'username' => 'userame',
            'email' => 'email',
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
        $add->email = $request->input('email');
        $add->password = bcrypt($request->input('password'));
        $add->save();

        return redirect()->back()->with('forminserted', 'true');
    }

    public function storeorgdetails(Request $request) {
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'region' => 'required',
            'state' => 'required',
            'lat' => 'required',
            'lan' => 'required',
            'desc' => 'required',
            'duration' => 'required',
            'phone' => 'required',
            'rest' => 'required',
        ];
        $nicename = [
            'name' => 'organization name',
            'type' => 'organization type',
            'region' => 'organization region address',
            'state' => 'organization state address',
            'lat' => 'organization location',
            'lan' => 'organization location',
            'desc' => 'description',
            'duration' => 'duration time',
            'phone' => 'phone number',
            'rest' => 'rest time',
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        $validator->setAttributeNames($nicename);
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $add = new \App\OrganizationDetails;
        $add->name = $request->input('name');
        $add->type = $request->input('type');
        $add->address_state = $request->input('state');
        $add->address_region = $request->input('region');
        $add->location_cordinate_lat = $request->input('lat');
        $add->location_cordinate_lan = $request->input('lan');
        $add->description = $request->input('desc');
        $add->organization = $request->input('id');
        $add->appointment_duration = $request->input('duration');
        $add->phone = $request->input('phone');
        $add->appointment_rest = $request->input('rest');
        $add->save();

        return redirect('organizations/first-signin/work-days/' . $request->input('id'));
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
