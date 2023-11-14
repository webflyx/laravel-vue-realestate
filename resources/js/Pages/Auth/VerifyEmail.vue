<template>
  <div>You need to verify your email.</div>
  <div>
    <Link class="text-blue-600 text-lg" as="button" method="post" :href="route('verification.send')">Resend verification email</Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

</script>