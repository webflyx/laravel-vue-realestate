<template>
  <Box>
    <form method="POST" :action="route('realtor.listing.image.store', listing.id)">
      <input type="file" multiple />
      <button type="submit" class="btn-primary">Save</button>
    </form>
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'

defineProps({
  listing: Object,
})
</script>