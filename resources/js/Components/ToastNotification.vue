<script setup>
import { ref } from 'vue';
import toast from '@/Stores/toast';
import ToastComponent from './ToastComponent.vue';
import { usePage } from '@inertiajs/vue3';

// const page = usePage();

// let removeFinshEventListener = Inertia.on("finish", () => {
//   if (page.props.value.toast) {
//     toast.add({
//       message: page.props.value.toast,
//     });
//   }
// });

// onUnmounted(() => removeFinshEventListener());

function remove(index){
    toast.remove(index);
}
</script>
<template>
    <TransitionGroup
    tag="div"
    enter-from-class="translate-x-full opacity-0"
    enter-active-class="duration-500"
    leave-active-class="duration-500"
    leave-to-class="translate-x-full opacity-0"
    class="fixed top-4 right-4 z-50  w-full max-w-xs space-y-4">

    <ToastComponent v-for="(item, index) in toast.items" :key="item.key" :item="item"></ToastComponent>
    </TransitionGroup>
</template>
