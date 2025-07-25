<template>
  <div v-if="show" class="bg-green-100 border border-green-400 text-green-700 p-4 rounded relative m-8" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ message }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="$emit('close')">
      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <title>Close</title>
        <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/>
      </svg>
    </span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  show: Boolean,
  message: {
    type: String,
    default: 'Your form was submitted successfully!'
  }
})
</script>
