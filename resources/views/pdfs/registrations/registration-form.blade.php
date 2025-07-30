<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form - {{ $registration->applicant_name }}</title>
    <style>
        @page {
            size: A4;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #111;
            margin: 0;
            counter-reset: page;
        }

        h3.section-title {
            background-color: #f5f5f5;
            padding: 8px;
            font-size: 16px;
            border-left: 5px solid #007BFF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px 10px;
            border: 1px solid #ccc;
            text-align: left;
            vertical-align: top;
        }

        th {
            width: 40%;
            background-color: #fafafa;
        }

        .page-break {
            break-after: page;
        }
    </style>
</head>
<body>

    <div style="display: flex; justify-content: space-between; align-items: center;">
        <h2 style="text-align: center;" >Online Registration Form</h2>
        <span>{{ $registration->created_at->format('d-m-Y-H:i:s') }}</span>
    </div>

    {{-- Student Info --}}
    <h3 class="section-title">Student’s Information</h3>
    <table>
        <tr><th>Admission No</th><td>{{ $registration->admission_no ?? '' }}</td></tr>
        <tr><th>Registration ID</th><td>{{ $registration->id ?? '' }}</td></tr>
        @foreach ([
            'Admission For' => $registration->admission_for,
            'Applicant Name' => $registration->applicant_name,
            'Date of Birth' => $registration->dob,
            'Gender' => $registration->gender,
            'Blood Group' => $registration->blood_group,
            'Only Child' => $registration->only_child,
            'Social Category' => $registration->social_category,
            'Nationality' => $registration->nationality,
            'BPL Beneficiary' => $registration->bpl,
            'CWSN' => $registration->cwsn,
            'Aadhaar Number' => $registration->aadhaar_no,
            'UDISE No' => $registration->udise_no,
            'PEN No' => $registration->pen_no,
            'Email' => $registration->email,
            'Present Class' => $registration->present_class,
            'Present School Name' => $registration->present_school_name,
            'Present School Address' => $registration->present_school_address,
            'Admission Sought For Class' => $registration->admission_sought_for_class,
            'Admission Sought Date' => $registration->admission_sought_date,
        ] as $label => $value)
            <tr>
                <th>{{ $label }}</th>
                <td>{{ $value ?: '-' }}</td>
            </tr>
        @endforeach
    </table>

    <div class="page-break"></div>

    {{-- Academic Info --}}
    <h3 class="section-title">Academic Information</h3>
    <table>
        @foreach ([
            ['Subject 1', $registration->subject_1, $registration->subject_1_marks],
            ['Subject 2', $registration->subject_2, $registration->subject_2_marks],
            ['Subject 3', $registration->subject_3, $registration->subject_3_marks],
            ['Subject 4', $registration->subject_4, $registration->subject_4_marks],
            ['Subject 5', $registration->subject_5, $registration->subject_5_marks],
            ['Subject 6', $registration->subject_6, $registration->subject_6_marks],
            ['Subject 7', $registration->subject_7, $registration->subject_7_marks],
        ] as [$label, $subject, $marks])
            <tr>
                <th>{{ $label }}</th>
                <td>{{ $subject ?: '-' }}</td>
                <td style="text-align: right;">{{ $marks ?: '-' }}</td>
            </tr>
        @endforeach
        <tr>
            <th>Last Exam %</th>
            <td>{{ $registration->last_exam_percentage ?? '-' }}%</td>
            <td>
                {{-- Calculate total marks --}}
                @php
                    $totalMarks = 0;
                    $subjects = [
                        $registration->subject_1_marks,
                        $registration->subject_2_marks,
                        $registration->subject_3_marks,
                        $registration->subject_4_marks,
                        $registration->subject_5_marks,
                        $registration->subject_6_marks,
                        $registration->subject_7_marks,
                    ];
                    foreach ($subjects as $marks) {
                        if (is_numeric($marks)) {
                            $totalMarks += $marks;
                        }
                    }
                @endphp
                <div style="display: flex; justify-content: space-between;"><strong>Total:</strong> <span>{{ $totalMarks }}</span></div>
            </td>
        </tr>
    </table>

    {{-- Parent Info --}}
    <h3 class="section-title">Parent’s Information</h3>
    <table>
        @foreach ([
            'Father\'s Name' => $registration->father_name,
            'Father\'s Occupation' => $registration->father_occupation,
            'Father\'s Phone' => $registration->father_phone,
            'Mother\'s Name' => $registration->mother_name,
            'Mother\'s Occupation' => $registration->mother_occupation,
            'Mother\'s Phone' => $registration->mother_phone,
            'Annual Income' => '₹ ' . number_format($registration->annual_income),
        ] as $label => $value)
            <tr>
                <th>{{ $label }}</th>
                <td>{{ $value ?: '-' }}</td>
            </tr>
        @endforeach
    </table>

    <div class="page-break"></div>

    {{-- Current Address --}}
    <h3 class="section-title">Current Address</h3>
    <table>
        @foreach ([
            'Street / Area / Locality' => $registration->c_street_area_locality,
            'Village / Town' => $registration->c_village_town,
            'House No' => $registration->c_house_no,
            'Post Office' => $registration->c_post_office,
            'Pin Code' => $registration->c_pin_code,
            'District' => $registration->c_district,
            'State' => $registration->c_state,
        ] as $label => $value)
            <tr>
                <th>{{ $label }}</th>
                <td>{{ $value ?: '-' }}</td>
            </tr>
        @endforeach
    </table>

    {{-- Permanent Address --}}
    <h3 class="section-title">Permanent Address</h3>
    <table>
        @foreach ([
            'Street / Area / Locality' => $registration->p_street_area_locality,
            'Village / Town' => $registration->p_village_town,
            'House No' => $registration->p_house_no,
            'Post Office' => $registration->p_post_office,
            'Pin Code' => $registration->p_pin_code,
            'District' => $registration->p_district,
            'State' => $registration->p_state,
        ] as $label => $value)
            <tr>
                <th>{{ $label }}</th>
                <td>{{ $value ?: '-' }}</td>
            </tr>
        @endforeach
    </table>
    <p style="margin-top: 40px;">
        [ ✓ ] I CERTIFY THAT THE INFORMATION GIVEN ABOVE IS TRUE TO THE BEST OF MY KNOWLEDGE.
        <br>
        I HAVE STUDIED THE PROSPECTUS OF THE SCHOOL AND HAVE UNDERSTOOD THE RULES AND REGULATIONS.
    </p>

    <p style="margin-top: 80px; text-align: right;">
        Signature : _________________________________________
    </p>
</body>
</html>
