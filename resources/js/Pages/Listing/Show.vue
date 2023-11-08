<template>
  <div class="flex flex-col-reverse gap-4 md:grid md:grid-cols-12">
    <Box class="md:col-span-7 flex items-center justify-center ">
      <div class="text-gray-500">No images</div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>
          Basic info
        </template>
        <Price :price="listing.price" />  
        <ListingSpace :listing="listing" />  
        <ListingAddress :listing="listing" /> 
      </Box>
      <Box>
        <template #header>
          Offer
        </template>
        Make an offer
      </Box>
    </div>
  </div>
</template>
  
<script setup>
// import ListingAddress from '@/Components/ListingAddress.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'

defineProps({
  listing: Object,
})
</script>
