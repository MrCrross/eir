<?php

namespace App\Http\Controllers;

use App\Mail\Account;
use App\Models\Client;
use App\Models\Record;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Throwable;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $records = Record::with('client.user', 'worker.post', 'worker.user','seance')
            ->whereHas('worker.user',function ($query) {
                return $query->where('id',Auth::user()->id);
            })->orderBy('day', 'desc')->get();
        return response()->view('records.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
                'worker_id' => 'required|numeric',
                'day' => 'required|date',
                'seance_id' => 'required|numeric',
                'last_name' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'father_name' => 'nullable|string|max:255',
                'phone' => 'required|string|max:16|min:16',
                'email' => 'required|email',
                'birthday' => 'nullable|date'
            ]);
            $password = $this->gen_password();
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'father_name' => $request->father_name,
                    'role' => 3,
                    'phone' => $request->phone,
                    'name' => $request->last_name . ucfirst(mb_substr($request->first_name, 0, 1)) . ucfirst(mb_substr($request->father_name, 0, 1)),
                    'email' => $request->email,
                    'password' => Hash::make($password),
                ]);
                $client = Client::create([
                    'user_id' => $user->id,
                    'birthday' => $request->birthday
                ]);

                Record::create([
                    'worker_id' => $request->worker_id,
                    'client_id' => $client->id,
                    'day' => $request->day,
                    'seance_id' => $request->seance_id
                ]);
                $mailData = (object)[
                    'email' => $request->email,
                    'login' => $request->last_name . ucfirst(mb_substr($request->first_name, 0, 1)) . ucfirst(mb_substr($request->father_name, 0, 1)),
                    'password' => $password,
                    'day'=>$request->day,
                    'seance' => Seance::where('id', $request->seance_id)->pluck('name')->first(),
                ];
                Mail::to($request->email)->send(new Account($mailData));
            }else{
                $client = Client::where('user_id',$user->id)->first();
                Record::create([
                    'worker_id' => $request->worker_id,
                    'client_id' => $client->id,
                    'day' => $request->day,
                    'seance_id' => $request->seance_id
                ]);
            }


            DB::commit();
            return redirect()->route('main')->with('success', 'Запись произведена успешно!');
        } catch (Throwable $e) {
            DB::rollBack();
            if (mb_strpos($e->getMessage(), 'invalid')) {
                return redirect()->route('main')->with('danger', 'Произошла ошибка: Неверные данные.');
            }
            return redirect()->route('main')->with('danger', 'Произошла ошибка' . $e->getMessage());
        }
    }

    public function my($id){
        $records = Record::with('client.user', 'worker.post', 'worker.user','seance')
            ->whereHas('client.user',function ($query) use ($id) {
                return $query->where('id',$id);
            })
            ->orderBy('day', 'desc')->get();
        return response()->view('records.index', compact('records'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $client = Client::where('id',$id)->first();
        return response()->view('records.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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


    public function seances(Request $request)
    {
//        $seances = Seance::with('workers', 'records')
//            ->whereHas('workers', function ($q) use ($request) {
//                return $q->where('id', $request->worker_id);
//            })
//            ->whereDoesntHave('records')
//            ->get();
//        $seances = Worker::with('seances')->whereDoesntHave('records')->where('id',$request->worker_id)->first();
        $seances = Seance::with('workers')
            ->whereHas('workers', function ($q) use ($request) {
                return $q->where('id', $request->worker_id);
            })->get();
        return response()->json([
            'seances' => $seances
        ]);
    }

    private function gen_password()
    {
        $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
        $size = strlen($chars) - 1;
        $password = '';
        $length = 8;
        while ($length--) {
            $password .= $chars[random_int(0, $size)];
        }
        return $password;
    }

}
