<template>
  <div class="text-2xl">{{ formattedPrice }}</div>
</template>
      
<script setup>
const props = defineProps({
  price: [Number, String],
})

const formattedPrice = Number(props.price).toLocaleString('en-US', {
  style: 'currency',
  currency: 'USD',
})
</script>
    