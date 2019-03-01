<?php

namespace App\Http\Controllers;
use App\Profile;
use Auth;
use Session;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.profile')->with('users', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $myprofile = Profile::all();
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $new_avatar = time().$avatar->getCLientOriginalName();
            $avatar->move('uploads/avatars' , $new_avatar);
            $url_send_avatar = 'uploads/avatars/'.$new_avatar;
            $to_send_avatar = asset($url_send_avatar);
            $user->profile->avatar = $to_send_avatar;
            if($user->profile){
                $user->profile->save();
                }
                else{
                    Profile::create([
                        'user_id'=>$id,
                        'avatar'=>$to_send_avatar
                    ]);
                }
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        if($user->profile){
            $user->profile->facebook = $request->facebook;
            $user->profile->youtube = $request->youtube;
            $user->profile->about = $request->about;
            $user->profile->save();
        }
        else{
            Profile::create([
                'user_id'=>$id,
                'youtube'=>$request->youtube,
                'facebook'=>$request->facebook,
                'about'=>$request->about
            ]);
        }
        
        if($request->has('password')){
            $user->password = bcrypt($request->password);
            $user->save();
        }
        Session::flash('success', 'Profile Updated!');
        return redirect()->back();

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
