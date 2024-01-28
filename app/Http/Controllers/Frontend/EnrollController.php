<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnrollController extends Controller
{
    /**
     * Store newly created enrolls
     */
    public function store(Request $request, $courseId)
    {
        $validator = Validator::make($request->all(),  [
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:15',
            'email'   => 'required|email|max:255',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->withFragment('enroll');
        }

        $data = $validator->getData();

        $data['course_id'] = $courseId;

        Enroll::create($data);

        return redirect()->back();
    }
}
