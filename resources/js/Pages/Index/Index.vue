<template>
  <div>Hello vue</div>
  <Link href="/show">Link to show</Link>
  <div>{{ message }}</div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
  message: String,
})
</script>
