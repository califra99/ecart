<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Card from '@/Components/Products/Card.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
	products: Object
})
</script>

<template>
	<Head title="Products" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="text-xl font-semibold leading-tight text-gray-800">
				Products
			</h2>
		</template>

		<div class="bg-white">
			<div class="max-w-2xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 ">
				<div class="grid grid-cols-1 mt-8 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
					<Card v-for="product in products.data" :key="product.id" :product="product" />
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>