<template>
  <Box class="mb-4">
    <template #header>
      Offer #{{ index }}
      <span v-if="offer.accepted_at" class="px-2 py-1 bg-green-700 text-white rounded-md text-sm ml-2">ACCEPTED</span>
    </template>
    <div class="flex items-center justify-between">
      <div>
        <Price :price="props.offer.amount" />
        <div class="text-gray-500">Difference {{ difference }}</div>
        <div>Made by {{ offer.user.name }}</div>
        <div>Made on {{ createdAt }}</div>
      </div>
      <div>
        <Link v-if="notSold" as="button" :href="route('realtor.offer.accept', props.offer.id)" class="btn-second" method="PUT">Accept</Link>
      </div>
    </div>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  offer: Object,
  index: Number,
  listingPrice: Number,
})

const difference = computed(() => props.offer.amount - props.listingPrice  )
const createdAt = computed(() => new Date(props.offer.created_at).toLocaleDateString())
const notSold = computed(() => !props.offer.accepted_at && !props.offer.rejected_at)
</script>