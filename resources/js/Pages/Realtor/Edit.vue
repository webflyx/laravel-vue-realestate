<template>
  <form class="grid grid-cols-12 gap-4" @submit.prevent="update">
    <div class="col-span-4">
      <label for="">Beds</label>
      <input v-model.number="form.beds" type="text" />
      <InputError :error="form.errors.beds" />
    </div>
    <div class="col-span-4">
      <label for="">Baths</label>
      <input v-model.number="form.baths" type="text" />
      <InputError :error="form.errors.baths" />
    </div>
    <div class="col-span-4">
      <label for="">Area</label>
      <input v-model.number="form.area" type="text" />
      <InputError :error="form.errors.area" />
    </div>
    <div class="col-span-6">
      <label for="">City</label>
      <input v-model="form.city" type="text" />
      <InputError :error="form.errors.city" />
    </div>
    <div class="col-span-6">
      <label for="">Code</label>
      <input v-model="form.code" type="text" />
      <InputError :error="form.errors.code" />
    </div>
    <div class="col-span-6">
      <label for="">Street</label>
      <input v-model="form.street" type="text" />
      <InputError :error="form.errors.street" />
    </div>
    <div class="col-span-6">
      <label for="">Street Number</label>
      <input v-model="form.street_nr" type="text" />
      <InputError :error="form.errors.street_nr" />
    </div>
    <div class="col-span-12">
      <label for="">Price</label>
      <input v-model.number="form.price" type="text" />
      <InputError :error="form.errors.price" />
    </div>
    <div class="col-span-12">
      <button type="submit" class="btn-primary w-full">Edit</button>
    </div>
  </form>
</template>

<script setup>
import InputError from '@/Components/UI/InputError.vue';
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  listing: Object,
})

const form = useForm({
  beds: props.listing.beds,
  baths: props.listing.baths,
  area: props.listing.area,
  city: props.listing.city,
  street: props.listing.street,
  street_nr: props.listing.street_nr,
  code: props.listing.code,
  price: props.listing.price,
})

const update = () => form.put(route('listing.update', {listing: props.listing.id}))
</script>

<style scoped>
label{
    margin-right: 8px;
}
input{
    margin-bottom: 8px;
}
</style>