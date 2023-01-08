<script setup>

import Card from "@/Components/Cards/Card.vue";
import CardCreate from "@/Components/Cards/CardCreate.vue";
import ColumnDelete from "@/Components/Columns/ColumnDelete.vue";
import draggable from "vuedraggable";
import {defineComponent} from "vue";

defineComponent(
    {
        components: {
            draggable,
        }
    }
)
defineProps({
    'column': Object,
    'columns': Array,
})
</script>
<script>
export default {
    data() {
        return {
            columnsUpdateForm: this.$inertia.form({
                columns: this.columns,
            }),
        }
    },
    methods: {
        handleChange() {
            this.columnsUpdateForm.post('/columns/update', {
                preserveScroll: true,
                errorBag: 'updateCards',
            });
        },
        getComponentData() {
            return {
                on: {
                    end: this.handleChange,
                },
            };
        }
    },
}
</script>
<template>
    <div class="max-w-lg mx-auto shadow-xl p-2">
        <div class="p-2">
            <div class="justify-between flex">
                <div>
                    <h1 class="text-bold">{{ column.title }}</h1>
                </div>
                <div>
                    <column-delete :column_id="column.id"></column-delete>
                </div>
            </div>

        </div>
        <div v-if="columnsUpdateForm.errors.columns">{{ columnsUpdateForm.errors.columns }}</div>
        <draggable v-model="column.cards"
                   group="cards"
                   :component-data="getComponentData()"
        >
            <card v-for="card in column.cards"
                  :key="card.id"
                  :card="card"
            >
            </card>
        </draggable>
        <div class="p-2">
            <card-create :column-id="column.id"></card-create>
        </div>
    </div>

</template>

