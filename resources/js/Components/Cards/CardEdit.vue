<script setup>

defineProps({
    'card': Object,
})
</script>
<script>
export default {
    data() {
        return {
            cardUpdateForm: this.$inertia.form({
                _method: 'PUT',
                title: this.card.title,
                description: this.card.description,
            }),
        }
    },
}
</script>
<template>
    <div class="p-4 bg-gray-300">
    <form @submit.prevent="cardUpdateForm.post('/cards' + this.card.id, {preserveScroll: true,errorBag: 'addCard',onSuccess: () => cardUpdateForm.reset(),});">
        <div class="relative w-full mb-3">
            <label class="block uppercase text-black-600 text-xs font-bold mb-2"
                   for="title">Title</label>
            <input
                :id="'card-edit-modal-title-' +  card.id"
                name="title"
                type="text"
                class="border-0 px-3 py-3 text-black-600 bg-white rounded text-sm shadow focus:ring w-full"
                v-model="cardUpdateForm.title">
        </div>
        <div v-if="cardUpdateForm.errors.title">{{ cardUpdateForm.errors.title }}</div>

        <div class="relative w-full mb-3">
            <label class="block uppercase text-black-600 text-xs font-bold mb-2"
                   for="title">Description</label>
            <input
                :id="'card-edit-modal-description-' + card.id"
                name="title"
                type="text"
                class="border-0 px-3 py-3 text-black-600 bg-white rounded text-sm shadow focus:ring w-full"
                v-model="cardUpdateForm.description">
        </div>

        <div v-if="cardUpdateForm.errors.description">{{ cardUpdateForm.errors.description }}</div>

        <button type="submit"
                class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 border-l"
                :class="{ 'opacity-25': cardUpdateForm.processing }" :disabled="cardUpdateForm.processing">Update
        </button>
    </form>
    </div>
</template>
