<script setup>
defineProps({
    'column-id': Number,
})
</script>
<script>
export default {
    data() {
        return {
            cardForm: this.$inertia.form({
                title: null,
                column_id: this.columnId,
            }),
        }
    },
}
</script>


<template>
    <form @submit.prevent="cardForm.post('/cards', {preserveScroll: true,errorBag: 'addCard',onSuccess: () => cardForm.reset(),});">
        <div class="basis-3/4 border border-gray-600 rounded text-black">
            <input type="text" v-model="cardForm.title">
            <button type="submit"
                    class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 border-l"
                    :class="{ 'opacity-25': cardForm.processing }" :disabled="cardForm.processing">Add
            </button>
        </div>
        <div v-if="cardForm.errors.title">{{ cardForm.errors.title }}</div>
        <div v-if="cardForm.errors.description">{{ cardForm.errors.description }}</div>

    </form>
</template>
