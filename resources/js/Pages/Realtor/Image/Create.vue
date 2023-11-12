<template>
  <Box>
    <form method="POST" enctype="multipart/form-data" :action="route('realtor.listing.image.store', listing.id)">
      <input type="file" multiple name="images[]" />
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