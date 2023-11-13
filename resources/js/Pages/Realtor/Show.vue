<template>
  <Link :href="route('realtor.listing.index')"> &#8592; Go back to Listings</Link>

  <div class="grid grid-cols-2 gap-4 mt-8">
    <div v-if="listing.offers.length">
      <Offer v-for="(offer, index) in listing.offers" :key="index" :index="index+1" :offer="offer" :listing-price="listing.price" />
    </div>
    <div v-else>Dont have offers</div>
    <div>
      <Box>
        <template #header>
          Basic Info
        </template>
        <Link :href="route('listing.show', {listing: listing.id})">
          <div class="flex gap-4 items-center">
            <Price :price="listing.price" /> 
          </div> 
          <ListingSpace :listing="listing" />  
          <ListingAddress :listing="listing" />  
        </Link>
      </Box>
    </div>
  </div>
</template>

<script setup>
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
import Offer from './Components/Offer.vue'

defineProps({
  listing: Object,
})

</script>