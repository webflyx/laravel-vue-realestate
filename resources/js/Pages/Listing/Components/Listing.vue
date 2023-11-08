<template>
  <Box>
    <div>
      <Link :href="route('listing.show', {listing: listing.id})">
        <div class="flex gap-4 items-center">
          <Price :price="listing.price" /> 
          <div class="text-gray-500 text-sm">
            <Price :price="monthlyPayment" class="text-gray-500 text-sm inline" />
            <span> / mo</span>
          </div>
        </div> 
        <ListingSpace :listing="listing" />  
        <ListingAddress :listing="listing" />  
      </Link>
    </div>
    <div>
      <Link :href="route('listing.edit', {listing: listing.id})">Edit</Link>
      <Link :href="route('listing.destroy', {listing: listing.id})" method="DELETE" as="button">Delete</Link>
    </div>
  </Box>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue'
import Box from '@/Components/UI/Box.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import { ref } from 'vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'

const props = defineProps({
  listing: Object,
})

const interestRate = ref('2.5')
const duration = ref('25')

const {monthlyPayment} = useMonthlyPayment(props.listing.price, interestRate, duration)


</script>