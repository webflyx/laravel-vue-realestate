<template>
  <form class="flex gap-4">
    <div class="flex gap-1 items-center">
      <input id="deleted" v-model="filterForm.deleted" class="rounded" type="checkbox" @click="filter" />
      <label class="mb-0 " for="deleted">Deleted</label>
    </div>
    <div class="flex gap-2 w-full">
      <select v-model="filterForm.by" class="!w-32">
        <option value="created_at">Added</option>
        <option value="price">Price</option>
      </select>
      <select v-model="filterForm.order" class="!w-32">
        <option v-for="option in sortOptions" :key="option.value" :value="option.value">
          {{ option.label }}
        </option>
      </select>
    </div>
  </form>
</template>

<script setup>
import { router } from '@inertiajs/core'
import { computed, reactive, watch } from 'vue'
import {debounce} from 'lodash'

const props = defineProps({
  filters: Array,
})

const sortLabels = {
  'created_at': [
    {
      label: 'Latest',
      value: 'desc',
    },
    {
      label: 'Oldest',
      value: 'asc',
    },
  ],
  'price': [
    {
      label: 'Pricey',
      value: 'desc',
    },
    {
      label: 'Cheapest',
      value: 'asc',
    },
  ],
}

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
  by: props.filters.by ?? 'created_at',
  order: props.filters.order ?? 'desc',
})

const sortOptions = computed(() => sortLabels[filterForm.by])

watch(
  filterForm,
  debounce(() => router.get(
    route('realtor.listing.index'),
    filterForm,
    {
      preserveScroll: true,
      preserveState: true,
    },
  ), 500),
)

</script>