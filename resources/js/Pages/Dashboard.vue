<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Column from '@/Components/Columns/Column.vue';
import ColumnCreate from "@/Components/Columns/ColumnCreate.vue";
import {InertiaLink} from "@inertiajs/inertia-vue";

defineProps({
    'columns': Array,
})

</script>

<template>
    <main-layout>
        <template #header>

            <div class="justify-between flex">
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Columns
                    </h2>
                </div>
                <div>
                    <inertia-link href="/database-dump">DatabaseDump</inertia-link>
                </div>
            </div>
            <div>
                <column-create></column-create>
            </div>

        </template>

        <section class="py-12">
            <div class="flex flex-auto gap-3">
                <column v-model="columns"
                        v-for="column in columns"
                        :columns="columns"
                        :key="column.id"
                        :column="column">
                </column>
            </div>
        </section>
    </main-layout>
</template>
