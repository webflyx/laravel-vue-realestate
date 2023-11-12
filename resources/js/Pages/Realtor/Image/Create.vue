<template>
  <Box>
    <template #header>Upload new images</template>
    <form @submit.prevent="upload">
      <div class="mt-4 flex gap-2">
        <input type="file" multiple class="border rounded-md file:px-4 file:py-2 border-gray-200 dark:border-gray-700 file:text-gray-700 file:dark:text-gray-400 file:border-0 file:bg-gray-100 file:dark:bg-gray-800 file:font-medium file:hover:bg-gray-200 file:dark:hover:bg-gray-700 file:hover:cursor-pointer file:mr-4 file:h-full mr-4" @input="addFiles" />
        <button type="submit" class="btn-primary" :class="{'opacity-25':!canUpload}" :disabled="!canUpload">Upload</button>
        <button type="reset" class="btn-second" @click="reset">Reset</button>
      </div>
    </form>
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'
import { computed } from 'vue'

router.on('progress', (event) => {
  if (event.detail.progress.percentage) {
    NProgress.set((event.detail.progress.percentage / 100) * 0.9)
  }
})

const canUpload = computed( () => form.images.length )

const props = defineProps({
  listing: Object,
})

const form =  useForm({
  images: [],
})

const upload = () => {
  form.post(
    route('realtor.listing.image.store', props.listing.id),
    {
      onSuccess: () => form.reset('images'),
    },
  )
}

const addFiles = (event) => {
  for (const image of event.target.files){
    form.images.push(image)
  }
}

const reset = () => form.reset('images')
 

</script>