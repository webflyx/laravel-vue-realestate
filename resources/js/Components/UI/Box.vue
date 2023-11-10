<template>
  <div class="border rounded-md border-gray-400 p-4">
    <div v-if="slots.header" class="font-semibold text-gray-500 mb-2">
      <slot name="header" />
    </div>
    <slot />
  </div>
</template>

<script setup>
import { useSlots } from 'vue'

const slots = useSlots()
</script>