<template>
  <h1 class="text-3xl font-medium mb-4">Your Listings</h1>
  <Filters :filters="filters" />
  <section v-if="listings.data.length" class="mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
  </section>
  <EmptyBox v-else class="mt-6">You don't have published listings</EmptyBox>
  <div
    v-if="listings.data.length && listings.links.length > 3" 
    class="my-6 flex gap-1 justify-center"
  >
    <Paginate :links="listings.links" />
  </div>
</template>

<script setup>
import Paginate from '@/Components/UI/Paginate.vue'
import Listing from '../Realtor/Components/Listing.vue'
import Filters from './Components/Filters.vue'
import EmptyBox from '@/Components/UI/EmptyBox.vue'

defineProps({
  listings: Object, 
  filters: Array,
})
</script>