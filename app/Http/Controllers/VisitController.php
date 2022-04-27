<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;
use Throwable;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse|Response
     */
    public function index()
    {
        $visits = Visit::with('client.user', 'worker.post', 'worker.user')->orderBy('seance', 'desc')->get();
        return response()->view('visits.index', compact('visits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::with('user')->get();
        return response()->view('visits.create', [
            'clients' => $clients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'client_id' => 'required|numeric',
                'description' => 'required|string'
            ]);

            $worker_id = Auth::user()->workers[0]->id;
            $seance = date('Y-m-d H:i:s');
            $date = date('d.m.Y H:i:s');
            Visit::create([
                'worker_id' => $worker_id,
                'client_id' => $request->client_id,
                'seance' => $seance,
                'description' => $request->description
            ]);
            DB::commit();
            return redirect()->route('visits.create')->with('success', 'Прием завершен. Время: ' . $date);
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('visits.create')->with('danger', 'Error: ' . $e->getMessage());
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
        $visit = Visit::with('client.user', 'worker.post', 'worker.user')->where('id', $id)->first();
        return response()->view('visits.show', compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $visit = Visit::with('client.user', 'worker.post', 'worker.user')->where('id', $id)->first();
        return response()->view('visits.edit', compact('visit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'description' => 'required|string'
            ]);
            Visit::where('id',$id)->update([
                'description'=>$request->description
            ]);
            DB::commit();
            return redirect()->route('visits.edit',$id)->with('success', 'Прием изменен. ');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('visits.edit',$id)->with('danger', 'Error: ' . $e->getMessage());
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
        //
    }
}
