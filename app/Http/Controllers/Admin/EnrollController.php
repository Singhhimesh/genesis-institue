<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;

class EnrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrolls = Enroll::orderBy('id', 'desc')->paginate(10);

        return view("admin.enrolls.index", compact('enrolls'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enroll = Enroll::findOrFail($id);

        return view('admin.enrolls.edit', compact('enroll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $enroll = Enroll::findOrFail($id);

        $enroll->status = $request->status;

        $enroll->save();

        session()->flash('success', 'Enroll status is updated successfully.');

        return redirect()->route('enrolls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
