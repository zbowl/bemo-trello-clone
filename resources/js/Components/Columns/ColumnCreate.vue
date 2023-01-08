<script>
export default {
    data() {
        return {
            columnForm: this.$inertia.form({
                title: null,
            }),
        }
    },
}

</script>


<template>
    <form @submit.prevent="columnForm.post('/columns', {preserveScroll: true,errorBag: 'addColumn',onSuccess: () => columnForm.reset(),});">
        <div>
        <input class="basis-3/4 border border-gray-600 rounded text-black" type="text" v-model="columnForm.title">
        </div>
        <div v-if="columnForm.errors.title">{{ columnForm.errors.title }}</div>
        <button type="submit"
                class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 border-l"
                :class="{ 'opacity-25': columnForm.processing }" :disabled="columnForm.processing">Add
        </button>
    </form>
</template>
