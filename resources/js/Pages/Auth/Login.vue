<template>
  <form class="w-1/2 mx-auto" @submit.prevent="login">
    <div class="mb-2">
      <label for="email">E-mail</label>
      <input id="email" v-model="form.email" type="email" name="email" />
      <InputError :error="form.errors.email" />
    </div>
    <div>
      <label for="password">Password</label>
      <input id="password" v-model="form.password" type="password" name="password" />
      <InputError :error="form.errors.password" />
    </div>
    <div class="mt-4">
      <button class="btn-primary w-full" type="submit">Login</button>
    </div>
    <Link class="block mt-4 text-gray-600 dark:text-gray-400 text-center" :href="route('user-account.create')">Don't have an account? Click here</Link>
  </form>
</template>

<script setup>
import InputError from '@/Components/UI/InputError.vue'
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  'email': null,
  'password': null,
})

const login = () => form.post(route('login.store'))

</script>