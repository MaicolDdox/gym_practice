<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function home()
    {
        return view('container.dashboard');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Event::all();
        return view('container.list', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('container.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'instructor_name' => ['required', 'string', 'max:255'],
            'type_class'      => ['required', 'string', 'max:255'],
            'date_hour'       => ['required', 'date']
        ]);

        // Ajustar formato para MySQL DATETIME
        $validated['date_hour'] = date('Y-m-d H:i:s', strtotime($validated['date_hour']));

        Event::create($validated);

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
        
        return view('container.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'instructor_name' => ['required', 'string', 'max:255'],
            'type_class'      => ['required', 'string', 'max:255'],
            'date_hour'       => ['required', 'date']
        ]);

        $validated['date_hour'] = date('Y-m-d H:i:s', strtotime($validated['date_hour']));

        $event->update($validated);

        return redirect()->route('events.index');
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
