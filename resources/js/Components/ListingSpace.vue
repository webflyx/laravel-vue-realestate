<template>
  <div class="text-lg">
    <span class="font-semibold">{{ listing.beds }}</span> bds | <span class="font-semibold">{{ listing.baths }}</span> ba | <span class="font-semibold">{{ listing.area }}</span>㎡
  </div>
</template>
      
<script setup>
defineProps({
  listing: Object,
})
</script>
    