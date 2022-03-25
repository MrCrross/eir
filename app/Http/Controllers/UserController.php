<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('name')->get();
        return view('users.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User::getRoles();

        return view('users.create',[
            'roles'=>$roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name'=>'required|string|max:255',
            'first_name'=>'required|string|max:255',
            'father_name'=>'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'email'=>'required|email|max:255',
            'phone'=>'required|string|max:16|min:16',
            'password' => 'same:password_confirmation',
            'role' => 'required|numeric|min:1|max:3'
        ]);

        return DB::transaction(function () use($request){
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            User::create($input);

            return redirect()->route('users.index')
                ->with('success','Пользователь добавлен успешно');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = User::getRoles();
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
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
            'role' => 'required|numeric|min:1|max:3'
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
            return redirect()->route('users.index')
                ->with('success','Пользователь изменен успешно');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id){
            User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success','Пользователь удален успешно');
        });
    }
}
