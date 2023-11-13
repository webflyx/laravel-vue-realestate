<template>
  <Box>
    <template #header>Offer #{{ index }}</template>
    <div class="flex items-center justify-between">
      <div>
        <Price :price="props.offer.amount" />
        <div class="text-gray-500">Difference {{ difference }}</div>
        <div>Made by {{offer.user.name}}</div>
        <div>Made on {{ createdAt }}</div>
      </div>
      <div>
        <Link :href="route('realtor.listing.index')" class="btn-second">Accept</Link>
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
</script>