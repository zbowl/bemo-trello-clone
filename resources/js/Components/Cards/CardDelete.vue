<script setup>
defineProps({
    'card_id': Number,
})
</script>
<script>
export default {
    data() {
        return {
            cardDeleteForm: this.$inertia.form({
                card_id: this.card_id,
            }),
        }
    },
    methods: {
        destroy() {
            this.cardDeleteForm.delete('/cards/' + this.card_id, {
                preserveScroll: true,
                errorBag: 'deleteCard',
                onSuccess: () => this.cardDeleteForm.reset(),
            });
        },
    },
}
</script>
<template>
    <form @submit.prevent="destroy">
            <button type="submit" class="bg-red-600 hover:bg-red-500 rounded p-2">
                X
            </button>

        <div v-if="cardDeleteForm.errors.card_id">{{ cardDeleteForm.errors.card_id }}</div>


    </form>

</template>
