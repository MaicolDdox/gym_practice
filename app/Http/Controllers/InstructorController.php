<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Listar solo usuarios con rol instructor
        $instructors = User::role('instructor')->get();
        return view('instructores.list', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $instructor = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // asignar rol instructor
        $instructor->assignRole('instructor');

        return redirect()->route('instructors.index')->with('success', 'Instructor creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $instructor)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $instructor)
    {
        return view('instructores.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $instructor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$instructor->id}",
        ]);

        $instructor->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('instructors.index')->with('success', 'Instructor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $instructor)
    {
        $instructor->delete();
        return redirect()->route('instructors.index')->with('success', 'Instructor eliminado correctamente.');
    }
}
