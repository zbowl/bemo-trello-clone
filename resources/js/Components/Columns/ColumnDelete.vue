<script setup>
defineProps({
    'column_id': Number,
})
</script>
<script>
export default {
    data() {
        return {
            columnDeleteForm: this.$inertia.form({
                column_id: this.column_id,
            }),
        }
    },
    methods: {
        destroy() {
            this.columnDeleteForm.delete('/columns/' + this.column_id, {
                preserveScroll: true,
                errorBag: 'deleteColumn',
                onSuccess: () => this.columnDeleteForm.reset(),
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

        <div v-if="columnDeleteForm.errors.column_id">{{ columnDeleteForm.errors.column_id }}</div>


    </form>

</template>
