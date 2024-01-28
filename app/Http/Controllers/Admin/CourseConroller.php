<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title'            => 'required',
            'bg'               => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'      => 'required',
            'sort_description' => 'required',
            'social'           => 'array',
            'duration'         => 'required',
            'status'           => 'required|in:0,1',
        ]);

        if ($request->hasFile('bg')) {
            $bgImage = $request->file('bg');
            $bgImageName = $request->input('name') . '-' . time() . '_' . $bgImage->getClientOriginalName();
            $bgImage->storeAs('bg', $bgImageName, 'public');
        } else {
            $bgImageName = null;
        }

        $validated['bg'] = 'bg/' . $bgImageName;
    
        Course::create($validated);
    
        session()->flash('success', __('Course created successfully.'));

        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validate($request, [
            'title'       => 'required',
            'bg'          => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'social'      => 'array',
            'duration'    => 'required',
            'status'      => 'required|in:0,1',
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('bg')) {
            $bgImage = $request->file('bg');
            $bgImageName = $request->input('name') . '-' . time() . '_' . $bgImage->getClientOriginalName();
            $bgImage->storeAs('bg', $bgImageName, 'public');

            // Delete the old background image if it exists
            if ($course->bg) {
                Storage::disk('public')->delete($course->bg);
            }

            $validated['bg'] = 'bg/' . $bgImageName;
        }

        $course->update($validated);

        session()->flash('success', __('Course updated successfully.'));

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the course by ID
        $course = Course::findOrFail($id);
    
        // Delete the background image if it exists
        if ($course->bg) {
            Storage::disk('public')->delete($course->bg);
        }
    
        // Delete the course
        $course->delete();
    
        // Flash a success message to the session
        session()->flash('success', __('Course deleted successfully.'));
    
        // Redirect back to the courses index page
        return redirect()->route('courses.index');
    }
}
