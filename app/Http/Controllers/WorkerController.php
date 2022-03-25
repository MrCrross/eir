<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Room;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::with('workers.post','workers.room')->whereHas('workers')->orderBy('name')->get();
        return response()->view('workers.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::orderBy('name')->get();
        $rooms = Room::with('workers')->orderBy('name')->get();
        return response()->view('workers.create',[
            'posts'=>$posts,
            'rooms'=>$rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request->validate([
                'last_name'=>'required|string|max:255',
                'first_name'=>'required|string|max:255',
                'father_name'=>'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'email'=>'required|email|max:255',
                'phone'=>'required|string|max:16|min:16',
                'password' => 'same:password_confirmation',
                'post' => 'required|numeric',
                'room' => 'required|numeric',
            ]);

            $user = User::create([
                'last_name'=>$request->last_name,
                'first_name'=>$request->first_name,
                'father_name'=>$request->father_name,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'password'=>Hash::make($request->password),
                'role'=>2,
            ]);

            Worker::create([
                'user_id'=>$user->id,
                'post_id'=>$request->post,
                'room_id'=>$request->room,
            ]);

            DB::commit();
            return redirect()->route('workers.index')->with('success','Работник успешно создан');
        }catch (Throwable $e){
            DB::rollBack();
            return redirect()->route('workers.index')->with('danger','Произошла ошибка'.$e->getMessage());
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
        $data = User::with('workers.post','workers.room')->where('id',$id)->orderBy('name')->first();
        return response()->view('workers.index',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::with('workers')->where('id',$id)->orderBy('name')->first();
        $posts = Post::orderBy('name')->get();
        $rooms = Room::with('workers')->orderBy('name')->get();
        return response()->view('workers.edit',[
            'user'=>$user,
            'posts'=>$posts,
            'rooms'=>$rooms
            ]);
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
        DB::beginTransaction();
        try{
            $request->validate([
                'last_name'=>'required|string|max:255',
                'first_name'=>'required|string|max:255',
                'father_name'=>'nullable|string|max:255',
                'name' => 'required|string|max:255',
                'email'=>'required|email|max:255',
                'phone'=>'required|string|max:16|min:16',
                'password' => 'same:password_confirmation',
                'post' => 'required|numeric',
                'room' => 'required|numeric',
            ]);
            $data = [
                'name'=>$request->name,
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

            Worker::where('user_id',$id)->update([
                'post_id'=>$request->post,
                'room_id'=>$request->room,
            ]);

            DB::commit();
            return redirect()->route('workers.index')->with('success','Работник успешно изменен');
        }catch (Throwable $e){
            DB::rollBack();
            return redirect()->route('workers.index')->with('danger','Произошла ошибка'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id){
            Worker::where('user_id',$id)->delete();
            User::find($id)->delete();
            return redirect()->route('workers.index')
                ->with('success','Работник удален успешно');
        });
    }
}
