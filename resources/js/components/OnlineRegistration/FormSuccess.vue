<script setup lang="ts">
// Props passed from the parent component
defineProps({
  // Whether the alert should be visible
  show: Boolean,

  // Success message text
  message: {
    type: String,
    default: 'Your form was submitted successfully!'
  },

  // Registration ID to construct the PDF download URL
  id: {
    type: Number,
    default: 0
  }
})
</script>

<template>
  <!-- Alert box shown only if 'show' is true -->
  <div v-if="show" class="bg-green-100 border border-green-400 text-green-700 p-4 rounded relative m-8" role="alert">
    
    <!-- Bold heading -->
    <strong class="font-bold">Success!</strong>
    
    <!-- The success message -->
    <span class="block sm:inline m-2">{{ message }}</span>

    <!-- Registration ID for reference -->
    <span class="block sm:inline m-2"> Your Registration ID is: <strong>{{ id }}</strong></span>

    <!-- Close icon to emit 'close' event to parent -->
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="$emit('close')">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <title>Close</title>
        <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/>
      </svg>
    </span>

    <!-- PDF download link -->
    <a 
      :href="`/online-registration/${id}/pdf`" 
      target="_blank" 
      rel="noopener noreferrer" 
      class="text-blue-500 hover:underline block mt-2"
    >
      Download Form
    </a>
  </div>
</template>
