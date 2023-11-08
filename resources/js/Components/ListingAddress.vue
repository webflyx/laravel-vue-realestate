<template>
  <div class="text-gray-500">
    {{ listing.street }} {{ listing.street_nr }}, {{ listing.city }}
  </div>
</template>
    
<script setup>
defineProps({
  listing: Object,
})
</script>
  