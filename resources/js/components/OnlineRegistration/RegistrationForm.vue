<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import Input from '../ui/input/Input.vue'
import Label from '../ui/label/Label.vue';
import { ref } from 'vue';
import FormSuccess from './FormSuccess.vue';
import {
  Select,
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from '../ui/select';
import Loader from './Loader.vue';

// Online Registration Form Object
const form = useForm({
  //student information
  admission_for: '',
  applicant_name: '',
  dob: '',
  gender: '',
  blood_group: '',
  only_child: '',
  social_category: '',
  nationality: '',
  bpl: '',
  cwsn: '',
  aadhaar_no: '',
  udise_no: '',
  pen_no: '',
  email: '',
  present_class: '',
  present_school_name: '',
  present_school_address: '',
  admission_sought_for_class: '',
  admission_sought_date: '',

  // academic results
  subject_1: '',
  subject_1_marks: '',
  subject_2: '',
  subject_2_marks: '',
  subject_3: '',
  subject_3_marks: '',
  subject_4: '',
  subject_4_marks: '',
  subject_5: '',
  subject_5_marks: '',
  subject_6: '',
  subject_6_marks: '',
  subject_7: '',
  subject_7_marks: '',
  last_exam_percentage: '',

  // parents infromation
  parents_category: '',
  father_name: '',
  father_occupation: '',
  father_phone: '',
  mother_name: '',
  mother_occupation: '',
  mother_phone: '',
  annual_income: '',

  // Current address
  c_street_area_locality: '',
  c_village_town: '',
  c_post_office: '',
  c_pin_code: '',
  c_house_no: '',
  c_state: '',
  c_district: '',

  // Permanent address
  p_street_area_locality: '',
  p_village_town: '',
  p_post_office: '',
  p_pin_code: '',
  p_house_no: '',
  p_state: '',
  p_district: '',

  passport_photo: null,
  marksheet: null,
  tc_certificate: null,
  payment_screenshot: null,
})

// initial value of form submit
const success = ref(false);
const submitting = ref(false);
// ID of the submitted form, used to download PDF
const submittedId = ref<number | null>(null);

// Submit the form using Inertia js Form helper
const submitForm = () => {
  submitting.value = true;
  form.post(route('online-registration.store'),{
    forceFormData: true,
    onSuccess: (data) => {
      success.value = true;
      form.reset();
      // Set the submitted ID from the flash data
      submittedId.value = (data.props.flash && (data.props.flash as any).data.id) ?? null;
    },
    onFinish: () => {
      submitting.value = false;
    },
  })
}
</script>
<template>
  <Loader :open="submitting"/>
  <!-- Show Success messsage after form submit with PDF download link -->
  <FormSuccess :show="success" @close="success = false" :id="submittedId ?? undefined"/>

  <form @submit.prevent="submitForm" class="space-y-8 p-8">
    <h1 class="text-xl font-bold text-gray-800">STUDENT REGISTRATION FORM</h1>

    <!-- STUDENT’S INFORMATION -->
    <div class="space-y-4">
      <p class="text-red-600">(FILL IN CAPITAL LETTERS ONLY)</p>
      <h3 class="text-lg font-semibold text-white bg-sky-400 p-2">STUDENT’S INFORMATION</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1">
          <Label for="admission_for">Admission For: *</Label>
          <Select id="admission_for" v-model="form.admission_for" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <!-- <SelectLabel>Fruits</SelectLabel> -->
                <SelectItem value="Day Scholar">Day Scholar</SelectItem>
                <SelectItem value="Boarding">Boarding</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.admission_for">{{ form.errors.admission_for }}</div>
        </div>
        <div class="space-y-1">
          <Label for="applicant_name">Applicant Name: *</Label>
          <Input id="applicant_name" v-model="form.applicant_name" placeholder="APPLICANT NAME" required/>
          <div class="text-sm text-red-500" v-if="form.errors.applicant_name">{{ form.errors.applicant_name }}</div>
        </div>
        <div class="space-y-1">
          <Label for="dob">Date of Birth ( MM-DD-YYYY ): *</Label>
          <Input type="date" id="dob" v-model="form.dob" required/>
          <div class="text-sm text-red-500" v-if="form.errors.dob">{{ form.errors.dob }}</div>
        </div>
        <div class="space-y-1">
          <Label for="gender">Gender: *</Label>
          <Select id="gender" v-model="form.gender" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="Male">Male</SelectItem>
                <SelectItem value="Female">Female</SelectItem>
                <SelectItem value="Others">Others</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.gender">{{ form.errors.gender }}</div>
        </div>
        <div class="space-y-1">
          <Label for="blood_group">Blood Group:</Label>
          <Select id="blood_group" v-model="form.blood_group">
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="A+">A+</SelectItem>
                <SelectItem value="A-">A-</SelectItem>
                <SelectItem value="B+">B+</SelectItem>
                <SelectItem value="B-">B-</SelectItem>
                <SelectItem value="AB+">AB+</SelectItem>
                <SelectItem value="AB-">AB-</SelectItem>
                <SelectItem value="O+">O+</SelectItem>
                <SelectItem value="O-">O-</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.blood_group">{{ form.errors.blood_group }}</div>
        </div>
        <div class="space-y-1">
          <Label for="only_child">Whether Only Child?: *</Label>
          <Select id="only_child" v-model="form.only_child" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="Yes">YES</SelectItem>
                <SelectItem value="No">NO</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.only_child">{{ form.errors.only_child }}</div>
        </div>
        <div class="space-y-1">
          <Label for="social_category">Social Category: *</Label>
          <Select id="social_category" v-model="form.social_category" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="GENERAL">GENERAL</SelectItem>
                <SelectItem value="SC">SC</SelectItem>
                <SelectItem value="ST">ST</SelectItem>
                <SelectItem value="OBC-A">OBC-A</SelectItem>
                <SelectItem value="OBC-B">OBC-B</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.social_category">{{ form.errors.social_category }}</div>
        </div>
        <div class="space-y-1">
          <Label for="nationality">Nationality: *</Label>
          <Select id="nationality" v-model="form.nationality" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="INDIAN">INDIAN</SelectItem>
                <SelectItem value="OTHER">OTHER</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.nationality">{{ form.errors.nationality }}</div>
        </div>
        <div class="space-y-1">
          <Label for="bpl">Whether BPL Beneficiary?: *</Label>
          <Select id="bpl" v-model="form.bpl" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="Yes">YES</SelectItem>
                <SelectItem value="No">NO</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.bpl">{{ form.errors.bpl }}</div>
        </div>
        <div class="space-y-1">
          <Label for="cwsn">Whether CWSN?: *</Label>
          <Select id="cwsn" v-model="form.cwsn" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="Yes">YES</SelectItem>
                <SelectItem value="No">NO</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.cwsn">{{ form.errors.cwsn }}</div>
        </div>
        <div class="space-y-1">
          <Label for="aadhaar_no">Aadhaar Number (12 Digit): *</Label>
          <Input id="aadhaar_no" v-model="form.aadhaar_no" placeholder="AADHAAR NUMBER" required/>
          <div class="text-sm text-red-500" v-if="form.errors.aadhaar_no">{{ form.errors.aadhaar_no }}</div>
        </div>
        <div class="space-y-1">
          <Label for="udise_no">UDISE NO: </Label>
          <Input id="udise_no" v-model="form.udise_no" placeholder="UDISE NUMBER" />
          <div class="text-sm text-red-500" v-if="form.errors.udise_no">{{ form.errors.udise_no }}</div>
        </div>
        <div class="space-y-1">
          <Label for="pen_no">PEN(Permanent Education Number) :</Label>
          <Input id="pen_no" v-model="form.pen_no" placeholder="Permanent Education Number" />
          <div class="text-sm text-red-500" v-if="form.errors.pen_no">{{ form.errors.pen_no }}</div>
        </div>
        <div class="space-y-1">
          <Label for="email">Email Address: *</Label>
          <Input id="email" v-model="form.email" placeholder="EMAIL ADDRESS" required/>
          <div class="text-sm text-red-500" v-if="form.errors.email">{{ form.errors.email }}</div>
        </div>
        <div class="space-y-1">
          <Label for="present_class">Present Class: *</Label>
          <Input id="present_class" v-model="form.present_class" placeholder="PRESENT CLASS" required/>
          <div class="text-sm text-red-500" v-if="form.errors.present_class">{{ form.errors.present_class }}</div>
        </div>
        <div class="space-y-1">
          <Label for="present_school_name">Present School Name: *</Label>
          <Input id="present_school_name" v-model="form.present_school_name" placeholder="PRESENT SCHOOL NAME" required/>
          <div class="text-sm text-red-500" v-if="form.errors.present_school_name">{{ form.errors.present_school_name }}</div>
        </div>
        <div class="space-y-1">
          <Label for="present_school_address">Present School Address: *</Label>
          <Input id="present_school_address" v-model="form.present_school_address" placeholder="PRESENT SCHOOL ADDRESS" required />
          <div class="text-sm text-red-500" v-if="form.errors.present_school_address">{{ form.errors.present_school_address }}</div>
        </div>
        <div class="space-y-1">
          <Label for="admission_sought_for_class">Admission sought for Class: *</Label>
          <Select id="admission_sought_for_class" v-model="form.admission_sought_for_class" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="Nursery">Nursery</SelectItem>
                <SelectItem value="LKG">LKG</SelectItem>
                <SelectItem value="UKG">UKG</SelectItem>
                <SelectItem value="CLASS I">CLASS I</SelectItem>
                <SelectItem value="CLASS II">CLASS II</SelectItem>
                <SelectItem value="CLASS III">CLASS III</SelectItem>
                <SelectItem value="CLASS IV">CLASS IV</SelectItem>
                <SelectItem value="CLASS V">CLASS V</SelectItem>
                <SelectItem value="CLASS VI">CLASS VI</SelectItem>
                <SelectItem value="CLASS VII">CLASS VII</SelectItem>
                <SelectItem value="CLASS VIII">CLASS VIII</SelectItem>
                <SelectItem value="CLASS IX">CLASS IX</SelectItem>
                <SelectItem value="CLASS X">CLASS X</SelectItem>
                <SelectItem value="CLASS XI">CLASS XI</SelectItem>
                <SelectItem value="CLASS XII">CLASS XII</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.admission_sought_for_class">{{ form.errors.admission_sought_for_class }}</div>
        </div>
        <div class="space-y-1">
          <Label for="admission_sought_date">Admission sought for the Year ( MM-DD-YYYY ): *</Label>
          <Input type="date" id="admission_sought_date" v-model="form.admission_sought_date" required/>
          <div class="text-sm text-red-500" v-if="form.errors.admission_sought_date">{{ form.errors.admission_sought_date }}</div>
        </div>
      </div>
    </div>

    <!-- ACADEMIC INFORMATION -->
    <div class="space-y-4">
      <h3  class="text-lg font-semibold text-white bg-sky-400 p-2">ACADEMIC INFORMATION</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1">
          <Label for="subject_1">First Subject: *</Label>
          <Input id="subject_1" v-model="form.subject_1" placeholder="SUBJECT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_1">{{ form.errors.subject_1 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_1_marks">First Subject Marks: *</Label>
          <Input type="number" id="subject_1_marks" v-model="form.subject_1_marks" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_1_marks">{{ form.errors.subject_1_marks }}</div>
        </div>
        
        <div class="space-y-1">
          <Label for="subject_2">Second Subject: *</Label>
          <Input id="subject_2" v-model="form.subject_2" placeholder="SUBJECT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_2">{{ form.errors.subject_2 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_2_marks">Second Subject Marks: *</Label>
          <Input type="number" id="subject_2_marks" v-model="form.subject_2_marks" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_2_marks">{{ form.errors.subject_2_marks }}</div>
        </div>

        <div class="space-y-1">
          <Label for="subject_3">Third Subject: *</Label>
          <Input id="subject_3" v-model="form.subject_3" placeholder="SUBJECT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_3">{{ form.errors.subject_3 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_3_marks">Third Subject Marks: *</Label>
          <Input type="number" id="subject_3_marks" v-model="form.subject_3_marks" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_3_marks">{{ form.errors.subject_3_marks }}</div>
        </div>

        <div class="space-y-1">
          <Label for="subject_4">Fourth Subject: *</Label>
          <Input id="subject_4" v-model="form.subject_4" placeholder="SUBJECT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_4">{{ form.errors.subject_4 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_4_marks">Fourth Subject Marks: *</Label>
          <Input type="number" id="subject_4_marks" v-model="form.subject_4_marks" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_4_marks">{{ form.errors.subject_4_marks }}</div>
        </div>

        <div class="space-y-1">
          <Label for="subject_5">Fifth Subject: *</Label>
          <Input id="subject_5" v-model="form.subject_5" placeholder="SUBJECT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_5">{{ form.errors.subject_5 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_5_marks">Fifth Subject Marks: *</Label>
          <Input type="number" id="subject_5_marks" v-model="form.subject_5_marks" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_5_marks">{{ form.errors.subject_5_marks }}</div>
        </div>

        <div class="space-y-1">
          <Label for="subject_6">Sixth Subject: </Label>
          <Input id="subject_6" v-model="form.subject_6" placeholder="SUBJECT"/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_6">{{ form.errors.subject_6 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_6_marks">Sixth Subject Marks: </Label>
          <Input type="number" id="subject_6_marks" v-model="form.subject_6_marks" placeholder="MARKS OUT OF 100"/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_6_marks">{{ form.errors.subject_6_marks }}</div>
        </div>

        <div class="space-y-1">
          <Label for="subject_7">Seventh Subject: </Label>
          <Input id="subject_7" v-model="form.subject_7" placeholder="SUBJECT"/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_7">{{ form.errors.subject_7 }}</div>
        </div>
        <div class="space-y-1">
          <Label for="subject_7_marks">Seventh Subject Marks: </Label>
          <Input type="number" id="subject_7_marks" v-model="form.subject_7_marks" placeholder="MARKS OUT OF 100"/>
          <div class="text-sm text-red-500" v-if="form.errors.subject_7_marks">{{ form.errors.subject_7_marks }}</div>
        </div>
        <div class="space-y-1">
          <Label for="last_exam_percentage">Overall Percentage in last exam: *  </Label>
          <Input type="number" id="last_exam_percentage" v-model="form.last_exam_percentage" placeholder="MARKS OUT OF 100" required/>
          <div class="text-sm text-red-500" v-if="form.errors.last_exam_percentage">{{ form.errors.last_exam_percentage }}</div>
        </div>
      </div>
    </div>

    <!-- PARENT’S INFORMATION -->
    <div class="space-y-4">
      <h3  class="text-lg font-semibold text-white bg-sky-400 p-2">PARENT’S INFORMATION</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1">
          <Label for="category">Category: *</Label>
            <Select id="category" v-model="form.parents_category" required>
            <SelectTrigger class="form-select w-full">
              <SelectValue placeholder="-- Select --" />
            </SelectTrigger>
            <SelectContent>
              <SelectGroup>
                <SelectItem value="CIVILIAN">Civilian</SelectItem>
                <SelectItem value="DEFENCE">Defence</SelectItem>
                <SelectItem value="RETIRED DEFENCE">Retired Defence</SelectItem>
              </SelectGroup>
            </SelectContent>
          </Select>
          <div class="text-sm text-red-500" v-if="form.errors.parents_category">{{ form.errors.parents_category }}</div>
        </div>
        <div class="space-y-1">
          <Label for="father_name">Father's Name: *</Label>
          <Input id="father_name" v-model="form.father_name" placeholder="FATHER'S NAME" required/>
          <div class="text-sm text-red-500" v-if="form.errors.father_name">{{ form.errors.father_name }}</div>
        </div>
        <div class="space-y-1">
          <Label for="father_occupation">Father's Occupation: *</Label>
          <Input id="father_occupation" v-model="form.father_occupation" placeholder="FATHER'S OCCUPATION" required/>
          <div class="text-sm text-red-500" v-if="form.errors.father_occupation">{{ form.errors.father_occupation }}</div>
        </div>
        <div class="space-y-1">
          <Label for="father_phone">Father's Phone: *</Label>
          <Input id="father_phone" v-model="form.father_phone" placeholder="FATHER'S PHONE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.father_phone">{{ form.errors.father_phone }}</div>
        </div>
        <div class="space-y-1">
          <Label for="mother_name">Mother's Name: *</Label>
          <Input id="mother_name" v-model="form.mother_name" placeholder="MOTHER'S NAME" required/>
          <div class="text-sm text-red-500" v-if="form.errors.mother_name">{{ form.errors.mother_name }}</div>
        </div>
        <div class="space-y-1">
          <Label for="mother_occupation">Mother's Occupation: *</Label>
          <Input id="mother_occupation" v-model="form.mother_occupation" placeholder="MOTHER'S OCCUPATION" required/>
          <div class="text-sm text-red-500" v-if="form.errors.mother_occupation">{{ form.errors.mother_occupation }}</div>
        </div>
        <div class="space-y-1">
          <Label for="mother_phone">Mother's Phone: *</Label>
          <Input id="mother_phone" v-model="form.mother_phone" placeholder="MOTHER'S PHONE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.mother_phone">{{ form.errors.mother_phone }}</div>
        </div>
        <div class="space-y-1">
          <Label for="annual_income">Annual Income: *</Label>
          <Input id="annual_income" v-model="form.annual_income" placeholder="ANNUAL INCOME" required/>
          <div class="text-sm text-red-500" v-if="form.errors.annual_income">{{ form.errors.annual_income }}</div>
        </div>
      </div>
    </div>

    <!--CURRENT ADDRESS -->
    <div class="space-y-4">
      <h3  class="text-base font-medium text-white bg-slate-400 p-1">CURRENT ADDRESS DETAILS</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1">
          <Label for="c_street_area_locality">Street/Area/Locality: *</Label>
          <Input id="c_street_area_locality" v-model="form.c_street_area_locality" placeholder="STREET/AREA/LOCALITY" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_street_area_locality">{{ form.errors.c_street_area_locality }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_village_town">Village/Town: *</Label>
          <Input id="c_village_town" v-model="form.c_village_town" placeholder="VILLAGE/TOWN" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_village_town">{{ form.errors.c_village_town }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_post_office">Post Office: *</Label>
          <Input id="c_post_office" v-model="form.c_post_office" placeholder="POST OFFICE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_post_office">{{ form.errors.c_post_office }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_pin_code">Pin Code: *</Label>
          <Input id="c_pin_code" v-model="form.c_pin_code" placeholder="PIN CODE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_pin_code">{{ form.errors.c_pin_code }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_house_no">House No:</Label>
          <Input id="c_house_no" v-model="form.c_house_no" placeholder="HOUSE NO" />
          <div class="text-sm text-red-500" v-if="form.errors.c_house_no">{{ form.errors.c_house_no }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_state">State: *</Label>
          <Input id="c_state" v-model="form.c_state" placeholder="STATE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_state">{{ form.errors.c_state }}</div>
        </div>
        <div class="space-y-1">
          <Label for="c_district">District: *</Label>
          <Input id="c_district" v-model="form.c_district" placeholder="DISTRICT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.c_district">{{ form.errors.c_district }}</div>
        </div>
      </div>
    </div>

    <!--PERMANENT ADDRESS -->
    <div class="space-y-4">
      <h3  class="text-base font-medium text-white bg-slate-400 p-1">PERMANENT ADDRESS DETAILS</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="space-y-1">
          <Label for="p_street_area_locality">Street/Area/Locality: *</Label>
          <Input id="p_street_area_locality" v-model="form.p_street_area_locality" placeholder="STREET/AREA/LOCALITY" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_street_area_locality">{{ form.errors.p_street_area_locality }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_village_town">Village/Town: *</Label>
          <Input id="p_village_town" v-model="form.p_village_town" placeholder="VILLAGE/TOWN" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_village_town">{{ form.errors.p_village_town }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_post_office">Post Office: *</Label>
          <Input id="p_post_office" v-model="form.p_post_office" placeholder="POST OFFICE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_post_office">{{ form.errors.p_post_office }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_pin_code">Pin Code: *</Label>
          <Input id="p_pin_code" v-model="form.p_pin_code" placeholder="PIN CODE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_pin_code">{{ form.errors.p_pin_code }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_house_no">House No:</Label>
          <Input id="p_house_no" v-model="form.p_house_no" placeholder="HOUSE NO"/>
          <div class="text-sm text-red-500" v-if="form.errors.p_house_no">{{ form.errors.p_house_no }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_state">State: *</Label>
          <Input id="p_state" v-model="form.p_state" placeholder="STATE" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_state">{{ form.errors.p_state }}</div>
        </div>
        <div class="space-y-1">
          <Label for="p_district">District: *</Label>
          <Input id="p_district" v-model="form.p_district" placeholder="DISTRICT" required/>
          <div class="text-sm text-red-500" v-if="form.errors.p_district">{{ form.errors.p_district }}</div>
        </div>
      </div>
    </div>

    <!-- DOCUMENTS -->
    <div class="space-y-4">
      <h3  class="text-lg font-semibold text-white bg-sky-400 p-2">UPLOAD DOCUMENTS</h3>
      <div class="grid grid-cols-1 gap-5">
        <div class="space-y-1">
          <Label for="passport_photo">Passport Photo: (Format - jpg,png,jpeg | Size - max 1 mb)* </Label>
          <Input id="passport_photo" type="file" @input="form.passport_photo = $event.target.files[0]" required/>
          <div class="text-sm text-red-500" v-if="form.errors.passport_photo">{{ form.errors.passport_photo }}</div>
        </div>
        <div class="space-y-1">
          <Label for="marksheet">Marksheet: (Format - jpg,png,jpeg,pdf | Size - max 1 mb)* </Label>
          <Input id="marksheet" type="file"  @input="form.marksheet = $event.target.files[0]" required/>
          <div class="text-sm text-red-500" v-if="form.errors.marksheet">{{ form.errors.marksheet }}</div>
        </div>
        <div class="space-y-1">
          <Label for="tc_certificate">TC Certificate: (Format - jpg,png,jpeg,pdf | Size - max 1 mb)* </Label>
          <Input id="tc_certificate" type="file"  @input="form.tc_certificate = $event.target.files[0]" required/>
          <div class="text-sm text-red-500" v-if="form.errors.tc_certificate">{{ form.errors.tc_certificate }}</div>
        </div>

      </div>
    </div>

    <!-- PAYMENT -->
    <div class="space-y-4">
      <h3  class="text-lg font-semibold text-white bg-sky-400 p-2">PAYMENT SCREENSHOT</h3>
      <Img src="storage/uploads/arps-upi-qr.jpg"></Img>
      <h4>Please pay Rs 200 by Scanning the QR code using any UPI Payments app</h4>
      <div class="space-y-1">
        <Label for="payment_screenshot">Upload Screenshot: (Format - jpg,png,jpeg,pdf | Size - max 1 mb)*</Label>
        <Input id="payment_screenshot" type="file"  @input="form.payment_screenshot = $event.target.files[0]" required/>
        <div class="text-sm text-red-500" v-if="form.errors.payment_screenshot">{{ form.errors.payment_screenshot }}</div>
      </div>
    </div>

    <!-- SUBMIT BUTTON -->
    <div class="flex justify-end mt-6">
      <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" :disabled="form.processing">
        Submit
      </button>
    </div>
  </form>

  <!-- Show Success messsage after form submit with PDF download link -->
  <FormSuccess :show="success" @close="success = false" :id="submittedId ?? undefined"/>
</template>
