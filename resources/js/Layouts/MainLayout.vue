<template>
  <header class="border-b border-gray-400 px-4 py-2 mb-4">
    <div class="flex items-center justify-between container mx-auto">
      <div>
        <nav class="text-lg">
          <Link :href="route('listing.index')">All Listings</Link>
        </nav>
      </div>
      <Link class="text-2xl font-medium text-blue-500 dark:text-blue-400" :href="route('listing.index')">LaraZillow</Link>
      <div v-if="user" class="flex items-center gap-4">
        <div class="relative">
          🔔
          <div v-if="notificationCount" class="absolute -top-2 -right-2 bg-red-600 text-sm rounded-full w-5 h-5 font-semibold flex items-center justify-center">
            {{ notificationCount }}
          </div>
        </div>
        <Link :href="route('realtor.listing.index')">{{ user.name }}</Link>
        <Link class="btn-primary" :href="route('realtor.listing.create')">+ New Listing</Link>
        <Link method="DELETE" as="button" :href="route('logout')">Logout</Link>
      </div>
      <div v-else class="flex gap-4">
        <Link class="btn-primary" :href="route('user-account.create')">Register</Link>
        <Link class="btn-primary" :href="route('login')">Sign-In</Link>
      </div>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="my-6 rounded-sm bg-green-600 px-4 py-2 text-white">
      {{ flashSuccess }}
    </div>

    <div>
      <slot>Default</slot>
    </div>
  </main>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)

const user = computed( () => page.props.user)

const notificationCount = computed( () => page.props.user.notificationCount )

</script>
