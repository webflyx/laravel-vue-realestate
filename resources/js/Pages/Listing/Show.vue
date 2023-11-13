<template>
  <div class="flex flex-col-reverse gap-4 md:grid md:grid-cols-12">
    <Box class="md:col-span-7 flex items-center justify-center ">
      <div v-if="listing.images.length" class="grid grid-cols-1 md:grid-cols-2 gap-1">
        <img v-for="image in listing.images" :key="image.id" :src="image.src" />
      </div>
      <div v-else class="text-gray-500">No images</div>
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
          Monthly Payment
        </template>
        
        <div>
          <label for="">Interest rate ({{ interestRate }}%)</label>
          <input
            v-model.number="interestRate" type="range" min="0.1" max="100" step="0.1"
            class="w-full"
          />
        </div>

        <div>
          <label for="">Duration {{ duration }} years</label>
          <input
            v-model.number="duration" type="range" min="3" max="35" step="1"
            class="w-full"
          />
        </div>

        <div>
          <div class="text-gray-500">Your monthly payment</div>
          <Price :price="monthlyPayment" class="text-3xl" />

          <div class="flex justify-between items-center mt-4">
            <div>Total Paid</div>
            <Price class="text-md" :price="totalPaid" />
          </div>
          <div class="flex justify-between items-center">
            <div>Principal Paid</div>
            <Price class="text-md" :price="listing.price" />
          </div>
          <div class="flex justify-between items-center">
            <div>Interest Paid</div>
            <Price class="text-md" :price="totalInterest" />
          </div>
        </div>
      </Box>
      <MakeOffer v-if="!props.madeOffer" :listing="listing" :price="listing.price" @new-offer="offer = $event" />
      <MadeOffer v-if="props.madeOffer" :amount="madeOffer.amount" :created="madeOffer.created_at" />
    </div>
  </div>
</template>
  
<script setup>
// import ListingAddress from '@/Components/ListingAddress.vue'
import ListingAddress from '@/Components/ListingAddress.vue'
import ListingSpace from '@/Components/ListingSpace.vue'
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment'
import { ref } from 'vue'
import MakeOffer from './Components/MakeOffer.vue'
import MadeOffer from './Components/MadeOffer.vue'

const props = defineProps({
  listing: Object,
  madeOffer: Object,
})

const offer = ref(props.listing.price).value

const interestRate = ref('2.5')
const duration = ref('25')

const {monthlyPayment, totalPaid, totalInterest} = useMonthlyPayment(offer, interestRate, duration)

</script>
