<template>
  <Box>
    <template #header>Upload new images</template>
    <form @submit.prevent="upload">
      <input type="file" multiple @input="addFiles" />
      <div class="mt-4 flex gap-2">
        <button type="submit" class="btn-primary">Upload</button>
        <button type="reset" class="btn-second" @click="reset">Reset</button>
      </div>
    </form>
  </Box>
</template>

<script setup>
import Box from '@/Components/UI/Box.vue'
import { useForm } from '@inertiajs/vue3'

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