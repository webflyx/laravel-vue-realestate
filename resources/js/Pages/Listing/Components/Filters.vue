<template>
  <form class="my-4 flex gap-2" @submit.prevent="filter">
    <div class="flex">
      <input v-model.number="filterForm.priceFrom" placeholder="Price from" class="!w-24" type="number" />
      <input v-model.number="filterForm.priceTo" placeholder="Price to" class="!w-24" type="number" />
    </div>
    <div class="flex">
      <select v-model="filterForm.beds" class="!w-24">
        <option :value="null">Beds</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
        <option value="6">6+</option>
      </select>
      <select v-model="filterForm.baths" class="!w-24">
        <option :value="null">Baths</option>
        <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
        <option value="6">6+</option>
      </select>
    </div>
    <div class="flex">
      <input v-model.number="filterForm.areaFrom" placeholder="Area from" class="!w-24" type="number" />
      <input v-model.number="filterForm.areaTo" placeholder="Area to" class="!w-24" type="number" />
    </div>
    <div class="flex gap-2">
      <button class="btn-primary" type="submit">Filter</button>
      <button type="reset" @click="reset">Reset</button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  filters: Object,
})

const filterForm = useForm({
  'priceFrom': props.filters.priceFrom ?? null,
  'priceTo': props.filters.priceTo ?? null,
  'beds': props.filters.beds ?? null,
  'baths': props.filters.baths ?? null,
  'areaFrom': props.filters.areaFrom ?? null,
  'areaTo': props.filters.areaTo ?? null,
})

const filter = () => filterForm.get(
  route('listing.index'), 
  {
    preserveState: true,
    preserveScroll:true,
  })

const reset = () => {
  filterForm.priceFrom = null
  filterForm.priceTo = null
  filterForm.beds = null
  filterForm.baths = null
  filterForm.areaFrom = null
  filterForm.areaTo = null

  filter()
}

</script>