<?php

namespace App\Http\Controllers;

use App\Models\Registration;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class OnlineRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('OnlineRegistration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            // Student’s Info
            "admission_for" => "required|in:Day Scholar,Boarding",
            "applicant_name" => "required|string|max:255",
            "dob" => "required|date|before:today",
            "gender" => "required|in:Male,Female,Others",
            "blood_group" => "nullable|in:A+,A-,B+,B-,AB+,AB-,O+,O-,",
            "only_child" => "required|in:Yes,No",
            "social_category" => "required|in:GENERAL,SC,ST,OBC-A,OBC-B",
            "nationality" => "required|in:INDIAN,OTHER",
            "bpl" => "required|in:Yes,No",
            "cwsn" => "required|in:Yes,No",
            "aadhaar_no" => "required|integer|digits:12",
            "udise_no" => "nullable|string",
            "pen_no" => "nullable|string",
            "email" => "required|email|max:255",
            "present_class" => "required|string|max:20",
            "present_school_name" => "required|string|max:255",
            "present_school_address" => "required|string|max:255",
            "admission_sought_for_class" => "required|in:Nursery,LKG,UKG,CLASS I,CLASS II,CLASS III,CLASS IV,CLASS V,CLASS VI,CLASS VII,CLASS VIII,CLASS IX,CLASS X,CLASS XI,CLASS XII",
            "admission_sought_date" => "required|date|afterOrEqual:today",

            // ACADEMIC INFORMATION
            "subject_1" => "required|string|max:255",
            "subject_1_marks" => "required|integer|min:0|max:100",
            "subject_2" => "required|string|max:255",
            "subject_2_marks" => "required|integer|min:0|max:100",
            "subject_3" => "required|string|max:255",
            "subject_3_marks" => "required|integer|min:0|max:100",
            "subject_4" => "required|string|max:255",
            "subject_4_marks" => "required|integer|min:0|max:100",
            "subject_5" => "required|string|max:255",
            "subject_5_marks" => "required|integer|min:0|max:100",
            "subject_6" => "nullable|string|max:255",
            "subject_6_marks" => "nullable|integer|min:0|max:100",
            "subject_7" => "nullable|string|max:255",
            "subject_7_marks" => "nullable|integer|min:0|max:100",
            "last_exam_percentage" => "required|integer|min:0|max:100",

            // PARENT’S INFORMATION
            "father_name" => "required|string|max:255",
            "father_occupation" => "required|string|max:255",
            "father_phone" => "required|integer|digits:10",
            "mother_name" => "required|string|max:255",
            "mother_occupation" => "required|string|max:255",
            "mother_phone" => "required|integer|digits:10",
            "annual_income" => "required|integer|min:1",

            // CURRENT ADDRESS DETAILS
            "c_street_area_locality" => "required|string|max:255",
            "c_village_town" => "required|string|max:255",
            "c_post_office" => "required|string|max:255",
            "c_pin_code" => "required|integer|digits:6",
            "c_house_no" => "nullable|string|max:255",
            "c_state" => "required|string|max:255",
            "c_district" => "required|string|max:255",

            // PERMANENT ADDRESS DETAILS
            "p_street_area_locality" => "required|string|max:255",
            "p_village_town" => "required|string|max:255",
            "p_post_office" => "required|string|max:255",
            "p_pin_code" => "required|integer|digits:6",
            "p_house_no" => "nullable|string|max:255",
            "p_state" => "required|string|max:255",
            "p_district" => "required|string|max:255",

            // Files (PDFs/Images under 2MB)
            "passport_photo" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048",
            "marksheet" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048",
            "tc_certificate" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048",
            "payment_screenshot" => "required|file|mimes:pdf,jpg,jpeg,png|max:2048"
        ]);


        $fileFields = ['passport_photo', 'marksheet', 'tc_certificate', 'payment_screenshot'];
        $uuidFilenames = [];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $ext = $file->getClientOriginalExtension();
                $uuid = Str::uuid()->toString();
                $filename = $uuid . '.' . $ext;

                // Store file in storage/app/public/online-registration/uploads/
                $file->storeAs('online-registration/uploads', $filename, 'public');

                // Save only the filename in DB
                $uuidFilenames[$field] = $filename;
            }
        }

        // Merge file names into the validated data
        $validated = array_merge($validated, $uuidFilenames);

        // Save to database
        $registration = Registration::create($validated);

        // Reload the page with success message
        return redirect()->back()->with('success', '...');
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
