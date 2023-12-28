<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: Object
})

const form = useForm({
    code: ''
});

const submit = () => {
    form.post(props.product.paths.applyCoupon, { preserveScroll: true });
};
</script>

<template>
	<form class="grid grid-cols-12" @submit.prevent="submit">
		<div class="sm:col-span-7 col-span-full">
			<InputLabel for="code" value="Apply Coupon" />

			<TextInput
				id="code"
				v-model="form.code"
				type="code"
				class="w-full p-1 mt-1 border border-indigo-400"
				required
			/>

			<InputError class="mt-2" :message="form.errors.code" />
		</div>

		<div class="flex items-end sm:col-span-5 col-span-full">
			<PrimaryButton class="mt-2 sm:ms-4 sm:mt-0" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
				apply
			</PrimaryButton>
		</div>
	</form>
</template>