<script setup>
import { useCart } from "@/Composables/useCart.js";

const props = defineProps({
    product: Object
})

const { add, remove } = useCart();
</script>

<template>
	<div class="flex gap-x-2">
		<button type="button" class="w-6 px-2 py-0 text-sm font-medium text-white bg-indigo-500 border border-transparent rounded-full shadow-sm cursor-pointer hover:bg-indigo-400 focus:outline-none" @click="remove(product)">
			-
		</button>
		
		<div>{{ product.pivot.qty }}</div>
				
		<button type="button" class="w-6 px-2 py-0 text-sm font-medium text-white bg-indigo-500 border border-transparent rounded-full shadow-sm cursor-pointer hover:bg-indigo-400 focus:outline-none" @click="add(product)">
			+
		</button>
	</div>
</template>