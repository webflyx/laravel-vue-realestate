<template>
  <h1 class="text-3xl font-medium mb-4">Your Listings</h1>
  <Filters :filters="filters" />
  <section class="mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <Listing v-for="listing in listings" :key="listing.id" :listing="listing" />
  </section>
</template>

<script setup>
import Listing from '../Realtor/Components/Listing.vue'
import Filters from './Components/Filters.vue'

defineProps({
  listings: Array, 
  filters: Array,
})
</script>