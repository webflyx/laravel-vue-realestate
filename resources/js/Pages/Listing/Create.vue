<template>
  <form class="grid grid-cols-12 gap-4" @submit.prevent="create">
    <div class="col-span-4">
      <label for="">Beds</label>
      <input v-model.number="form.beds" type="text" />
      <div v-if="form.errors.beds">{{ form.errors.beds }}</div>
    </div>
    <div class="col-span-4">
      <label for="">Baths</label>
      <input v-model.number="form.baths" type="text" />
      <div v-if="form.errors.baths">{{ form.errors.baths }}</div>
    </div>
    <div class="col-span-4">
      <label for="">Area</label>
      <input v-model.number="form.area" type="text" />
      <div v-if="form.errors.area">{{ form.errors.area }}</div>
    </div>
    <div class="col-span-6">
      <label for="">City</label>
      <input v-model="form.city" type="text" />
      <div v-if="form.errors.city">{{ form.errors.city }}</div>
    </div>
    <div class="col-span-6">
      <label for="">Code</label>
      <input v-model="form.code" type="text" />
      <div v-if="form.errors.code">{{ form.errors.code }}</div>
    </div>
    <div class="col-span-6">
      <label for="">Street</label>
      <input v-model="form.street" type="text" />
      <div v-if="form.errors.street">{{ form.errors.street }}</div>
    </div>
    <div class="col-span-6">
      <label for="">Street Number</label>
      <input v-model="form.street_nr" type="text" />
      <div v-if="form.errors.street_nr">{{ form.errors.street_nr }}</div>
    </div>
    <div class="col-span-12">
      <label for="">Price</label>
      <input v-model.number="form.price" type="text" />
      <div v-if="form.errors.price">{{ form.errors.price }}</div>
    </div>
    <div class="col-span-12">
      <button type="submit" class="primary-btn w-full">Create</button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  beds: 0,
  baths: 0,
  area: 0,
  city: null,
  street: null,
  street_nr: null,
  code: null,
  price: 0,
})

const create = () => form.post(route('listing.store'))
</script>

<style scoped>
label{
    margin-right: 8px;
}
input{
    margin-bottom: 8px;
}
</style>