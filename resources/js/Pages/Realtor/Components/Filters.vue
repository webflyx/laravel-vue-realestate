<template>
  <form>
    <div class="flex gap-1 items-center">
      <input id="deleted" v-model="filterForm.deleted" class="rounded" type="checkbox" @click="filter" />
      <label class="mb-0 " for="deleted">Deleted</label>
    </div>
  </form>
</template>

<script setup>
import { router } from '@inertiajs/core'
import { reactive, watch } from 'vue'
import {debounce} from 'lodash'

const props = defineProps({
  filters: Array,
})

const filterForm = reactive({
  deleted: props.filters.deleted ?? false,
})

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