<template>
  <Link :href="route('listing.index')">All Listing</Link>
  <Link :href="route('listing.create')">Create Listing</Link>

  <!-- <div>This is a timer {{ timer }}</div> -->
  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>

  <div>
    <slot>Default</slot>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

// import { ref } from 'vue'

const page = usePage()
const flashSuccess = computed(
  () => page.props.flash.success,
)


// const timer = ref(0)
// setInterval(() => timer.value++, 1000)

</script>

<style scoped>
.success{
  background: green;
  color: white;
}
</style>