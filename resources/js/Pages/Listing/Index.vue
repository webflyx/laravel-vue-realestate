<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
  </div>
  <div
    v-if="listings.data.length && listings.links.length > 3" 
    class="my-6 flex gap-1 justify-center"
  >
    <Paginate :links="listings.links" />
  </div>
</template>

<script setup>
import Listing from './Components/Listing.vue'
import Paginate from '@/Components/UI/Paginate.vue'

defineProps({
  listings: Object,
})
</script>