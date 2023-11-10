<template>
  <Box class="flex items-center justify-between">
    <div>
      <Link :href="route('listing.show', {listing: listing.id})">
        <div class="flex gap-4 items-center">
          <Price :price="listing.price" /> 
        </div> 
        <ListingSpace :listing="listing" />  
        <ListingAddress :listing="listing" />  
      </Link>
    </div>
    <div class="flex gap-2">
      <Link class="btn-second" :href="route('listing.show', {listing: listing.id})">Preview</Link>
      <Link class="btn-second" :href="route('listing.edit', {listing: listing.id})">Edit</Link>
      <Link class="btn-second" :href="route('realtor.listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
    </div>
  </Box>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
import Box from '@/Components/UI/Box.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'

defineProps({
  listing: Object,
})

</script>