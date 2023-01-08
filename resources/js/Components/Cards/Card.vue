<script setup>
import CardDelete from "@/Components/Cards/CardDelete.vue";
import CardEdit from "@/Components/Cards/CardEdit.vue";
defineProps({
    'card': Object,
})
</script>
<script>

import vuemodal from "vue-js-modal";


export default {
    data() {
        return {
            showModal: false,
        }
    },
    components: {
        vuemodal,
    },
    methods: {
        modalOpen() {
            this.$modal.show('edit-card');
        },
        modalClose() {
            this.$modal.hide('edit-card');
        },
        openCardModal(card) {
            this.$modal.show('edit-card', {
                title: 'Edit Card',
                component: CardEdit,
                componentProps: {
                    card: card,
                },
            });
        },
    },
}
</script>
<template>
    <div class="bg-white">
        <div class="p-1">
            <div class="border-2 p-1">
                <div class="justify-between flex" @click="openCardModal(card)">
                    <div>
                        {{ card.title }}
                    </div>
                    <div>
                        <card-delete :card_id="card.id"></card-delete>
                    </div>
                </div>
            </div>
        </div>
        <modal name="edit-card"
                :resizable="true"
                :adaptive="true">
            <card-edit :title="card.title" :description="card.description" :card="card"></card-edit>
        </modal>
    </div>

</template>
