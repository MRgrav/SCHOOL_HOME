<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue'
import SchoolAdminLayout from '@/layouts/SchoolAdminLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref, onMounted, onBeforeUnmount } from 'vue'

/**
 * Props definition: Expects a registration object with arbitrary keys/values.
 */
interface Props {
  registration: Record<string, any>
}
const props = defineProps<Props>()

/**
 * Breadcrumb navigation.
 */
const breadcrumbs = [
  { title: 'Dashboard', href: '/school-admin/dashboard' },
  { title: 'Registrations', href: '/school-admin/registrations' },
  {
    title: props.registration.id.toString(),
    href: `/school-admin/registrations/${props.registration.id}`,
  },
]

/**
 * Categories: groups field keys for organized display.
 */
const categories: Record<string, string[]> = {
  "Student’s Info": [
    'admission_for', 'applicant_name', 'dob', 'gender', 'blood_group', 'only_child',
    'social_category', 'nationality', 'bpl', 'cwsn', 'aadhaar_no', 'udise_no', 'pen_no',
    'email', 'present_class', 'present_school_name', 'present_school_address',
    'admission_sought_for_class', 'admission_sought_date'
  ],
  "Academic Information": [
    'subject_1', 'subject_1_marks', 'subject_2', 'subject_2_marks', 'subject_3', 'subject_3_marks',
    'subject_4', 'subject_4_marks', 'subject_5', 'subject_5_marks', 'subject_6', 'subject_6_marks',
    'subject_7', 'subject_7_marks', 'last_exam_percentage'
  ],
  "Parent’s Information": [
    'parents_category', 'father_name', 'father_occupation', 'father_phone',
    'mother_name', 'mother_occupation', 'mother_phone', 'annual_income'
  ],
  "Current Address": [
    'c_street_area_locality', 'c_village_town', 'c_post_office', 'c_pin_code',
    'c_house_no', 'c_state', 'c_district'
  ],
  "Permanent Address": [
    'p_street_area_locality', 'p_village_town', 'p_post_office', 'p_pin_code',
    'p_house_no', 'p_state', 'p_district'
  ],
  "Uploaded Files": ['passport_photo', 'marksheet', 'tc_certificate', 'payment_screenshot'],
  "System": ['created_at']
}

/**
 * List of fields that are file uploads.
 */
const fileFields = ['passport_photo', 'marksheet', 'tc_certificate', 'payment_screenshot']

/**
 * Converts field names to readable labels.
 * removes c_ and p_ prefix
 */
function getLabel(key: string): string {
  let label = key.replace(/_/g, ' ')
  label = label.replace(/^c /i, '').replace(/^p /i, '')
  label = label.replace(/\b\w/g, c => c.toUpperCase())
  return label
}

/**
 * Checks if a field is a file field.
 */
function isFileField(key: string): boolean {
  return fileFields.includes(key)
}

/**
 * Modal state for image preview.
 */
const showModal = ref(false)
const modalImage = ref("")

function openImage(src: string) {
  modalImage.value = src
  showModal.value = true
}

function closeModal() {
  showModal.value = false
  modalImage.value = ""
}

/**
 * Add ESC key handler for accessibility.
 */
function handleKeydown(event: KeyboardEvent) {
  if (event.key === 'Escape' && showModal.value) {
    closeModal()
  }
}

onMounted(() => {
  window.addEventListener('keydown', handleKeydown)
})

onBeforeUnmount(() => {
  window.removeEventListener('keydown', handleKeydown)
})
</script>

<template>
  <Head title="Registration Details" />
  <SchoolAdminLayout :breadcrumbs="breadcrumbs">
    <div class="p-4">
      <!-- Header with title and download button -->
      <div class="flex justify-between">
        <h2 class="text-2xl font-bold mb-6">Registration Details</h2>
        <a
          :href="`/online-registration/${props.registration.id}/pdf`"
          target="_blank"
          rel="noopener noreferrer"
          class="h-min w-min"
        >
          <Button class="w-min ms-auto cursor-pointer">Download Application</Button>
        </a>
      </div>

      <!-- Category Sections -->
      <div v-for="(fields, category) in categories" :key="category" class="mb-8">
        <h3 class="text-xl font-semibold mb-3 border-b pb-1">{{ category }}</h3>
        <table class="min-w-full border border-gray-300">
          <tbody>
            <tr v-for="field in fields" :key="field">
              <td class="border px-4 py-2 font-medium w-1/3">
                {{ getLabel(field) }}
              </td>
              <td class="border px-4 py-2">
                <!-- File fields -->
                <template v-if="isFileField(field)">
                  <template v-if="props.registration[field]">
                    <template v-if="props.registration[field].toLowerCase().endsWith('.pdf')">
                      <a
                        :href="`/storage/online-registration/uploads/${props.registration[field]}`"
                        target="_blank"
                        class="text-blue-600 underline"
                      >
                        View PDF
                      </a>
                    </template>
                    <template v-else>
                      <img
                        :src="`/storage/online-registration/uploads/${props.registration[field]}`"
                        class="h-24 rounded border cursor-pointer hover:opacity-80"
                        :alt="getLabel(field)"
                        @click="openImage(`/storage/online-registration/uploads/${props.registration[field]}`)"
                      />
                    </template>
                  </template>
                </template>

                <!-- Date fields -->
                <template v-else-if="field.includes('_at')">
                  {{ new Date(props.registration[field]).toLocaleString('en-CA', { dateStyle: 'medium', timeStyle: 'short' }) }}
                </template>

                <!-- Normal fields -->
                <template v-else>
                  {{ props.registration[field] || '-' }}
                </template>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!--Image Modal -->
    <div
      v-if="showModal"
      class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
    >
      <img
        :src="modalImage"
        class="max-h-[90vh] max-w-[90vw] rounded shadow-lg"
        alt="Preview"
      />
      <button
        @click="closeModal"
        class="absolute top-4 right-4 text-white text-5xl"
        aria-label="Close image preview"
      >
        ×
      </button>
    </div>
  </SchoolAdminLayout>
</template>

<style>
/** 
 * Adds a smooth fade-in effect to the modal overlay.
 */
.fixed {
  animation: fadeIn 0.2s ease-in-out;
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>