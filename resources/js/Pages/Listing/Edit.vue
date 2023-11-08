<template>
  <form @submit.prevent="update">
    <div>
      <label for="">Beds</label>
      <input v-model.number="form.beds" type="text" />
      <div v-if="form.errors.beds">{{ form.errors.beds }}</div>
    </div>
    <div>
      <label for="">Baths</label>
      <input v-model.number="form.baths" type="text" />
      <div v-if="form.errors.baths">{{ form.errors.baths }}</div>
    </div>
    <div>
      <label for="">Area</label>
      <input v-model.number="form.area" type="text" />
      <div v-if="form.errors.area">{{ form.errors.area }}</div>
    </div>
    <div>
      <label for="">City</label>
      <input v-model="form.city" type="text" />
      <div v-if="form.errors.city">{{ form.errors.city }}</div>
    </div>
    <div>
      <label for="">Code</label>
      <input v-model="form.code" type="text" />
      <div v-if="form.errors.code">{{ form.errors.code }}</div>
    </div>
    <div>
      <label for="">Street</label>
      <input v-model="form.street" type="text" />
      <div v-if="form.errors.street">{{ form.errors.street }}</div>
    </div>
    <div>
      <label for="">Street Number</label>
      <input v-model="form.street_nr" type="text" />
      <div v-if="form.errors.street_nr">{{ form.errors.street_nr }}</div>
    </div>
    <div>
      <label for="">Price</label>
      <input v-model.number="form.price" type="text" />
      <div v-if="form.errors.price">{{ form.errors.price }}</div>
    </div>
    <div>
      <button type="submit">Edit</button>
    </div>
  </form>
</template>

<script setup>
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