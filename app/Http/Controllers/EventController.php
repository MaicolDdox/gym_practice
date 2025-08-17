<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function home()
    {
        $usName = Auth::user()->name;
        return view('events.dashboard', compact('usName'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Event::with('instructor')->get();
        return view('events.list', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Listar solo usuarios con rol instructor
        $instructors = User::role('instructor')->get();
        return view('events.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'type_class'    => ['required', 'string', 'max:255'],
            'date_hour'     => ['required', 'date'],
            'instructor_id' => ['required', 'exists:users,id'],
        ]);

        // Ajustar formato datetime
        $validated['date_hour'] = date('Y-m-d H:i:s', strtotime($validated['date_hour']));

        // Reemplazar instructor_id por user_id
        $validated['user_id'] = $validated['instructor_id'];
        unset($validated['instructor_id']);

        // Crear evento
        $event = Event::create($validated);

        // Registrar al instructor también como asistente (opcional)
        $event->users()->attach($validated['user_id']);

        return redirect()->route('events.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $instructors = User::role('instructor')->get();
        return view('events.edit', compact('event', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'user_id'    => ['required', 'exists:users,id'],
            'title'      => ['required', 'string', 'max:255'],
            'type_class' => ['required', 'string', 'max:255'],
            'date_hour'  => ['required', 'date']
        ]);

        $validated['date_hour'] = \Carbon\Carbon::parse($validated['date_hour'])->format('Y-m-d H:i:s');

        $event->update($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'El evento se actualizó correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Eliminar el evento
        $event->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('events.index');
    }
}
