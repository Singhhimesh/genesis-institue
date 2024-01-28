<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name'        => 'required',
            'profile'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'social'      => 'array',
            'status'      => 'required|in:0,1'
        ]);

        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $profileImageName = $request->input('name') . '-' . time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('profile_images', $profileImageName, 'public');
        } else {
            $profileImageName = null;
        }

        $validated['profile'] = 'profile_images/' . $profileImageName;
    
        Testimonial::create($validated);
    
        session()->flash('success', __('Testimonial created successfully.'));

        return redirect()->route('testimonials.index');
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
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'name'        => 'required',
            'profile'     => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'social'      => 'array',
            'status'      => 'required|in:0,1',
        ]);
    
        $testimonial = Testimonial::findOrFail($id);
    
        if ($request->hasFile('profile')) {
            $profileImage = $request->file('profile');
            $profileImageName = $request->input('name') . '-' . time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->storeAs('profile_images', $profileImageName, 'public');
    
            // Delete the old profile image if it exists
            if ($testimonial->profile) {
                Storage::disk('public')->delete($testimonial->profile);
            }
    
            $validated['profile'] = 'profile_images/' . $profileImageName;
        }
    
        // Update testimonial data
        $testimonial->update($validated);
    
        session()->flash('success', __('Testimonial updated successfully.'));
    
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
    
        // Delete the profile image if it exists
        if ($testimonial->profile) {
            Storage::disk('public')->delete($testimonial->profile);
        }
    
        // Delete the testimonial
        $testimonial->delete();
    
        session()->flash('success', __('Testimonial deleted successfully.'));
    
        return redirect()->route('testimonials.index');
    }
}
