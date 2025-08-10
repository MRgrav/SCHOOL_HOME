<script setup lang="ts">
import { AlertDialog, AlertDialogContent, AlertDialogHeader, AlertDialogTitle, AlertDialogDescription } from "../ui/alert-dialog";

const props = defineProps<{
    open: boolean
}>();
</script>
<template>
    <AlertDialog :open="props.open">
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogDescription class="flex justify-center py-10">
                    <div class="loader-dot"></div>
                </AlertDialogDescription>
                <AlertDialogTitle class="flex justify-center">
                    <div class="loader"></div>
                </AlertDialogTitle>
            </AlertDialogHeader>
        </AlertDialogContent>
    </AlertDialog>
</template>

<style>
.loader-dot {
  width: 28px;
  aspect-ratio: 1;
  border-radius: 50%;
  background: #F10C49;
  animation: l2 1.5s infinite;
}
@keyframes l2 {
  0%,
  100%{transform:translate(-35px);box-shadow:  0     0 #F4DD51, 0     0 #E3AAD6}
  40% {transform:translate( 35px);box-shadow: -15px  0 #F4DD51,-30px  0 #E3AAD6}
  50% {transform:translate( 35px);box-shadow:  0     0 #F4DD51, 0     0 #E3AAD6}
  90% {transform:translate(-35px);box-shadow:  15px  0 #F4DD51, 30px  0 #E3AAD6}
}

.loader {
  width: fit-content;
  font-weight: bold;
  font-family: monospace;
  font-size: 30px;
  clip-path: inset(0 3ch 0 0);
  animation: l4 1s steps(4) infinite;
}
.loader:before {
  content:"Submitting...."
}
@keyframes l4 {to{clip-path: inset(0 -1ch 0 0)}}
</style>