<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalaInstantaneaRequest;
use App\Http\Requests\StoreSalaProgramadaRequest;
use App\Models\Sala;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PortalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function instantanea(StoreSalaInstantaneaRequest $request)
    {
        $ulid = Str::random();
        $collect = collect($request->validated());
        $collect->prepend($ulid, 'codigo');
        $collect->prepend(Carbon::now(), 'fecha_programada');
        $sala = Sala::create($collect->toArray());
        return response()->json(['sala' => $sala]);
    }

    public function programada(StoreSalaProgramadaRequest $request)
    {
        $codigo = Str::ulid();
        $sala = Sala::create([]);
        return response()->json(['sala' => $sala]);
    }
}
