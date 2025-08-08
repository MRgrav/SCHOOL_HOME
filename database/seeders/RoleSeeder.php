<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'principal',
                'display_name' => 'Principal',
                'description' => 'Head of the school, responsible for overall management.',
            ],
            [
                'name' => 'vice_principal',
                'display_name' => 'Vice Principal',
                'description' => 'Assists the principal in school operations and administration.',
            ],
            [
                'name' => 'coordinator',
                'display_name' => 'Coordinator',
                'description' => 'Manages and coordinates specific school programs or activities'
            ],
            [
                'name' => 'teacher',
                'display_name' => 'Teacher',
                'description' => 'Responsible for teaching and guiding students in specific subjects.',
            ],
            [
                'name' => 'assistant_teacher',
                'display_name' => 'Assistant Teacher',
                'description' => 'Supports lead teachers in classroom activities and student management.',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Handles system or backend administration for the institution.',
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'General support staff assisting in various school functions.',
            ],
            [
                'name' => 'clerk',
                'display_name' => 'Clerk',
                'description' => 'Handles office paperwork, record-keeping, and documentation.',
            ],
            [
                'name' => 'librarian',
                'display_name' => 'Librarian',
                'description' => 'Manages the library and assists students in finding reading materials.',
            ],
            [
                'name' => 'lab_assistant',
                'display_name' => 'Lab Assistant',
                'description' => 'Assists in preparing and maintaining science lab equipment and materials.',
            ],
            [
                'name' => 'counselor',
                'display_name' => 'Counselor',
                'description' => 'Provides guidance and emotional support to students.',
            ],
            [
                'name' => 'sports_coach',
                'display_name' => 'Sports Coach',
                'description' => 'Trains and mentors students in sports and physical activities.',
            ],
            [
                'name' => 'nurse',
                'display_name' => 'Nurse',
                'description' => 'Provides medical care and first aid to students and staff.',
            ],
            [
                'name' => 'it_support',
                'display_name' => 'IT Support',
                'description' => 'Handles technical issues, devices, and school IT infrastructure.',
            ],
            [
                'name' => 'transport_incharge',
                'display_name' => 'Transport In-charge',
                'description' => 'Manages school transport including buses and routes.',
            ],
            [
                'name' => 'accountant',
                'display_name' => 'Accountant',
                'description' => 'Manages financial records, fees, and budgeting.',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']], $role);
        }
    }
}
