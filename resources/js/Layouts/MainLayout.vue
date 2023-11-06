<template>
    <Link href="/">Index</Link>
    <Link href="/show">Show</Link>

    <div>This is a timer {{ timer }}</div>

    <div>
        <slot>Default</slot>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const timer = ref(0)
setInterval(() => timer.value++, 1000)

</script>