<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Throwable;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $rooms = Room::orderBy('name')->get();
        return response()->view('rooms.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return response()->view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            Room::create([
                'name'=>$request->name
            ]);
            DB::commit();
            return redirect()->route('rooms.index')->with('success', 'Комната успешно добавлено');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('rooms.index')->with('danger', 'Произошла ошибка' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $room = Room::where('id',$id)->orderBy('name')->first();
        return response()->view('rooms.show', [
            'room' => $room
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $room = Room::where('id',$id)->orderBy('name')->first();
        return response()->view('rooms.edit', [
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required|string|max:255'
            ]);
            Room::where('id',$id)->update([
                'name'=>$request->name
            ]);
            DB::commit();
            return redirect()->route('rooms.index')->with('success', 'Комната успешно изменена');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('rooms.index')->with('danger', 'Произошла ошибка' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        return DB::transaction(function () use ($id){
            Room::find($id)->delete();
            return redirect()->route('rooms.index')
                ->with('success','Комната удалена успешно');
        });
    }
}
