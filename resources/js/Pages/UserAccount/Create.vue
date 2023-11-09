<template>
  <form class="w-1/2 mx-auto" @submit.prevent="create">
    <div class="mb-2">
      <label for="name">Name</label>
      <input id="name" v-model="form.name" type="text" name="name" />
      <InputError :error="form.errors.name" />
    </div>
    <div class="mb-2">
      <label for="email">E-mail</label>
      <input id="email" v-model="form.email" type="email" name="email" />
      <InputError :error="form.errors.email" />
    </div>
    <div class="mb-2">
      <label for="password">Password</label>
      <input id="password" v-model="form.password" type="password" name="password" />
      <InputError :error="form.errors.password" />
    </div>
    <div class="mb-2">
      <label for="password_confirmation">Confirm Password</label>
      <input id="password_confirmation" v-model="form.password_confirmation" type="password" name="password_confirmation" />
    </div>
    <div class="mt-4">
      <button class="btn-primary w-full" type="submit">Create Account</button>
    </div>
  </form>
</template>

<script setup>
import InputError from '@/Components/UI/InputError.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  'name': null,
  'email': null,
  'password': null,
  'password_confirmation': null,
})

const create = () => form.post(route('user-account.store'))

</script>