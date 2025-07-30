<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;

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


        // Reload the page with success flash data
        return redirect()
            ->back()
            ->with('data',  [
                'message' => 'Registration successful!',
                'id' => $registration->id,
            ]);
    }

    /**
     * Display the specified registration details.
     *
     * @param  string  $id  The ID of the registration to retrieve.
     * @return \Inertia\Response  Inertia response that renders the RegistrationShow Vue component.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the registration is not found.
     */
    public function show(string $id)
    {
        $registration = Registration::findOrFail($id);

        return Inertia::render('school-admin/Registrations/RegistrationShow', [
            'registration' => $registration,
        ]);
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

    /**
     * school-admin Index
     */
    public function schoolAdminIndex(Request $request)
    {
        $registrations = Registration::latest()->get();
        return Inertia::render('school-admin/Registrations', compact('registrations'));
    }

    /**
     * Download or preview registration PDF using Browsershot.
     * 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf(string $id)
    {
        //query registration from database
        $registration = Registration::findOrFail($id);

        // Generate PDF using Browsershot
        $pdf = $this->generatePdf($registration);

        // If 'preview' query parameter is present, return inline PDF
        if (request()->query('preview')) {
            return new Response($pdf, 200, [
                'Content-Type' => 'application/pdf',
                // 'inline' will display PDF in browser
                'Content-Disposition' => 'inline; filename="ARPS-' . $registration->id . '.pdf"',
            ]);
        }

        // Otherwise, return as downloadable file
        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            // 'attachment' will prompt download
            'Content-Disposition' => 'attachment; filename="ARPS-' . $registration->id . '.pdf"',
            'Content-Length' => strlen($pdf),
        ]);
    }

    /**
     * Generate PDF using Spatie Browsershot.
     * Uses Blade views: pdfs.registrations.registration-form, _header, _footer
     *
     * @param Registration $registration
     * @return string
     */
    public function generatePdf(Registration $registration)
    {
        // Render the Blade templates to HTML
        $template = view('pdfs.registrations.registration-form', ['registration' => $registration])->render();
        // Render header and footer templates
        $header = view('pdfs.registrations._header')->render();
        $footer = view('pdfs.registrations._footer')->render();

        // Generate PDF using Browsershot as a string
        $pdf = Browsershot::html($template)
            ->setIncludePath(config('services.browsershot.include_path')) // Required for Linux installs
            ->format('A4')
            ->showBrowserHeaderAndFooter()
            ->headerHtml($header)
            ->footerHtml($footer)
            ->margins(40, 20, 10, 20)
            ->showBackground()
            ->pdf();

        return $pdf;
    }

}
