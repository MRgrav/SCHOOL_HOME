<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            
            // Student Info
            $table->enum('admission_for', ['Day Scholar', 'Boarding']);
            $table->string('applicant_name');
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->enum('only_child', ['Yes', 'No']);
            $table->enum('social_category', ['GENERAL', 'SC', 'ST', 'OBC-A', 'OBC-B']);
            $table->enum('nationality', ['INDIAN', 'OTHER']);
            $table->enum('bpl', ['Yes', 'No']);
            $table->enum('cwsn', ['Yes', 'No']);
            $table->string('aadhaar_no', 12);
            $table->string('udise_no')->nullable();
            $table->string('pen_no')->nullable();
            $table->string('email');
            $table->string('present_class');
            $table->string('present_school_name');
            $table->string('present_school_address');
            $table->enum('admission_sought_for_class', [
                'Nursery', 'LKG', 'UKG', 'CLASS I', 'CLASS II', 'CLASS III', 'CLASS IV',
                'CLASS V', 'CLASS VI', 'CLASS VII', 'CLASS VIII', 'CLASS IX',
                'CLASS X', 'CLASS XI', 'CLASS XII'
            ]);
            $table->date('admission_sought_date');

            // Academic
            $table->string('subject_1');
            $table->unsignedTinyInteger('subject_1_marks');
            $table->string('subject_2');
            $table->unsignedTinyInteger('subject_2_marks');
            $table->string('subject_3');
            $table->unsignedTinyInteger('subject_3_marks');
            $table->string('subject_4');
            $table->unsignedTinyInteger('subject_4_marks');
            $table->string('subject_5');
            $table->unsignedTinyInteger('subject_5_marks');
            $table->string('subject_6')->nullable();
            $table->unsignedTinyInteger('subject_6_marks')->nullable();
            $table->string('subject_7')->nullable();
            $table->unsignedTinyInteger('subject_7_marks')->nullable();
            $table->unsignedTinyInteger('last_exam_percentage');

            // Parent Info
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('father_phone', 10);
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('mother_phone', 10);
            $table->unsignedInteger('annual_income');

            // Current Address
            $table->string('c_street_area_locality');
            $table->string('c_village_town');
            $table->string('c_post_office');
            $table->string('c_pin_code', 6);
            $table->string('c_house_no')->nullable();
            $table->string('c_state');
            $table->string('c_district');

            // Permanent Address
            $table->string('p_street_area_locality');
            $table->string('p_village_town');
            $table->string('p_post_office');
            $table->string('p_pin_code', 6);
            $table->string('p_house_no')->nullable();
            $table->string('p_state');
            $table->string('p_district');

            // File Uploads (UUID filenames only)
            $table->string('passport_photo');
            $table->string('marksheet');
            $table->string('tc_certificate');
            $table->string('payment_screenshot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
