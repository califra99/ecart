<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
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
					<div v-for="product in products.data" :key="product.id" class="flex flex-col justify-between">
						<div class="relative">
							<div class="relative w-full overflow-hidden rounded-lg h-72">
								<img src="https://placehold.co/400x400" alt="image_alt" class="object-cover object-center w-full h-full" />
							</div>
							<div class="relative mt-4 ">
								<h3 class="text-sm font-semibold text-gray-900">
									{{ product.name }}
								</h3>
								<h3 class="text-sm font-medium text-gray-900">
									{{ product.description }}
								</h3>
							</div>
							<div class="absolute inset-x-0 top-0 flex items-end justify-end p-4 overflow-hidden rounded-lg h-72">
								<div aria-hidden="true" class="absolute inset-x-0 bottom-0 opacity-50 h-36 bg-gradient-to-t from-black" />
								<p class="relative text-lg font-semibold text-white">
									€ {{ product.price }}
								</p>
							</div>
						</div>
						<div class="mt-6">
							<a
								href="#"
								class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200"
							>Add<span class="sr-only">, {{ product.name }}</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>