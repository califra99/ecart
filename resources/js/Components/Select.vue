<script setup>
const props = defineProps({
    modelValue: {
        type: String,
        required: true,
    },
    options: {
        type: Object
    }
});

defineEmits(['update:modelValue']);
</script>

<template>
    <select @change="$emit('update:modelValue', $event.target.value)" class="block w-full py-2 pl-3 pr-10 mt-1 text-gray-900 border-0 rounded-md ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
        <option v-for="(option, index) in options" :key="index" :value="index">{{ option }}</option>
    </select>
</template>
