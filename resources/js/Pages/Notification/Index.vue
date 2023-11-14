<template>
  <div v-for="(notification, index) in props.notifications.data" :key="index">
    <div 
      v-if="notification.type === 'App\\Notifications\\OfferMade'"
      class="flex justify-between items-center border-b border-gray-500 py-4 mb"
    >
      <div class="flex gap-2 items-center">
        Offer 
        <Price class="text-base" :price="notification.data.amount" />
        for
        <Link class="text-blue-600" :href="route('realtor.listing.show', notification.data.listing)">listing</Link>
        was made
      </div>
      <button class="btn-second font-medium uppercase">Mark as read</button>
    </div>
  </div>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
  notifications: Object,
})
</script>