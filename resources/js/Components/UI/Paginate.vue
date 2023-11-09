<template>
  <Link
    v-for="(link, index) in links" :key="index" 
    :href="link.url"
    class="border border-gray-500 px-2 rounded-md"
    :class="{'bg-indigo-500 border-indigo-500': link.active, 'border-none': index === 0 || index === links.length - 1}"
    v-html="link.label"
  />
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({ 
  links: Array,
})
</script>