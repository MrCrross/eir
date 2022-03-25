<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('clients')->find(Auth::user()->id);
        return response()->view('lk.index',[
           'user'=>$user
        ]);
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
        $user=User::with('clients')->find($id);
        return response()->view('lk.edit',[
            'user'=>$user
        ]);
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
        $request->validate([
            'last_name'=>'nullable|string|max:255',
            'first_name'=>'nullable|string|max:255',
            'father_name'=>'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email'=>'nullable|email|max:255',
            'phone'=>'nullable|string|max:16|min:16',
            'password' => 'same:password_confirmation',
            'role' => 'required|numeric|min:1|max:3',
            'birthday'=>'nullable|date'
        ]);

        return DB::transaction(function () use($request,$id){
            $data = [
                'name'=>$request->name,
                'role'=>$request->role
            ];
            if(!empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }
            if(!empty($request->last_name)){
                $data['last_name'] = $request->last_name;
            }
            if(!empty($request->first_name)){
                $data['first_name'] = $request->first_name;
            }
            if(!empty($request->father_name)){
                $data['father_name'] = $request->father_name;
            }
            if(!empty($request->email)){
                $data['email'] = $request->email;
            }
            if(!empty($request->phone)){
                $data['phone'] = $request->phone;
            }
            User::where('id',$id)->update($data);
            if(!empty($request->birthday)){
                Client::where('user_id',$id)->update([
                    'birthday'=>$request->birthday
                ]);
            }

            return redirect()->route('lk.index')
                ->with('success','Личные данные изменены
                 успешно');
        });
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
