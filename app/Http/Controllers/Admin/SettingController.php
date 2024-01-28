<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accounts.settings.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        foreach ($data as $key => $value) {
            if ($value instanceof \Illuminate\Http\UploadedFile) {
                $path = $value->store('uploads', 'public');
        
                // Get the previous setting value from the database
                $previousSetting = Setting::where('key', $key)->first();
        
                if ($previousSetting && $previousSetting->value) {
                    Storage::delete($previousSetting->value);
                }
        
                Setting::updateOrCreate(['key' => $key], [
                    'value' => $path,
                ]);
            } else {
                Setting::updateOrCreate(['key' => $key], [
                    'value' => $value,
                ]);
            }
        }
        
        session()->flash('success', 'Setting updated successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
