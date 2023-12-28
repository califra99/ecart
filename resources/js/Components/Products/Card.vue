<script setup>
import { useCart } from "@/Composables/useCart.js";

const props = defineProps({
	product: Object
})

const { add } = useCart();
</script>

<template>
	<div class="flex flex-col justify-between">
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
			<button
				v-if="product.stock_qty"
				type="button"
				class="relative flex items-center justify-center w-full px-8 py-2 text-sm font-medium text-gray-900 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200"
				@click="add(product)"
			>
				Add
			</button>
			
			<div v-else class="text-sm text-gray-400">
				Product currently unavailable
			</div>
		</div>
	</div>
</template>