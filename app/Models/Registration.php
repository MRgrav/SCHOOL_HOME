<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // app/Models/Registration.php
    protected $fillable = [
        // Student Info
        'admission_for', 'applicant_name', 'dob', 'gender', 'blood_group', 'only_child', 'social_category', 'nationality',
        'bpl', 'cwsn', 'aadhaar_no', 'udise_no', 'pen_no', 'email', 'present_class', 'present_school_name',
        'present_school_address', 'admission_sought_for_class', 'admission_sought_date',

        // Academic Info
        'subject_1', 'subject_1_marks', 'subject_2', 'subject_2_marks', 'subject_3', 'subject_3_marks',
        'subject_4', 'subject_4_marks', 'subject_5', 'subject_5_marks', 'subject_6', 'subject_6_marks',
        'subject_7', 'subject_7_marks', 'last_exam_percentage',

        // Parent Info
        'parents_category', 'father_name', 'father_occupation', 'father_phone', 'mother_name', 'mother_occupation', 'mother_phone',
        'annual_income',

        // Current Address
        'c_street_area_locality', 'c_village_town', 'c_post_office', 'c_pin_code', 'c_house_no', 'c_state', 'c_district',

        // Permanent Address
        'p_street_area_locality', 'p_village_town', 'p_post_office', 'p_pin_code', 'p_house_no', 'p_state', 'p_district',

        // File Uploads (UUID filenames only)
        'passport_photo', 'marksheet', 'tc_certificate', 'payment_screenshot',
    ];

}
