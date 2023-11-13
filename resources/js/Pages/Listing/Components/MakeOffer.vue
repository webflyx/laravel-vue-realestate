<template>
  <Box>
    <template #header>Make an Offer</template>
    <form @submit.prevent="makeOffer">
      <input v-model.number="form.amount" type="number" />
      <input v-model.number="form.amount" step="1000" :min="minPrice" :max="maxPrice" type="range" class="w-full mt-4" />
      <InputError :error="form.errors.amount" />
      <button type="submit" class="btn-second w-full mt-4">Make an Offer</button>
    </form>
    <div class="mt-6 flex items-center justify-between">
      <span>Difference</span>
      <Price :price="difference" />
    </div>
  </Box>
</template>

<script setup>
import Price from '@/Components/Price.vue'
import Box from '@/Components/UI/Box.vue'
import InputError from '@/Components/UI/InputError.vue'
import { useForm } from '@inertiajs/vue3'
import { computed, watch } from 'vue'
import {debounce} from 'lodash'

const props = defineProps({
  price: Number,
  listing: Object,
})

const form = useForm({
  'amount': props.price,
})

const makeOffer = () => form.post(route('listing.offers.store', props.listing),{
  preserveScroll: true,
  preserveState: true,
})

const minPrice = computed(() => Math.round(props.price / 2))
const maxPrice = computed(() => Math.round(props.price * 2))
const difference = computed(() => form.amount - props.price)

const emit = defineEmits(['newOffer'])


watch(
  () => form.amount,
  debounce((value) => emit('newOffer', value), 200),
)

</script>