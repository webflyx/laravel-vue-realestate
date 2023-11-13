<template>
  <Box>
    <template #header>
      Offer Made
    </template>
    <Price :price="amount" />
    <div class="mt-4 flex items-center justify-between">
      <div>Made on</div>
      <div>{{ created_at }}</div>
    </div>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'

const props = defineProps({
  amount: Number,
  created: String,
})

const created_at = new Date(props.created).toDateString()



</script>