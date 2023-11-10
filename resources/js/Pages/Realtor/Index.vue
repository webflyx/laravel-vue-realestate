<template>
  <h1 class="text-3xl font-medium mb-4">Your Listings</h1>
  <section>Filters</section>
  <section class="mt-4 grid grid-cols-1 lg:grid-cols-2 gap-4">
    <Listing v-for="listing in listings" :key="listing.id" :listing="listing" />
  </section>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import Listing from '../Realtor/Components/Listing.vue'

defineProps({
  listings: Array,
})
</script>