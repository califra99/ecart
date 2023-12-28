<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import QuantityManager from '@/Components/Products/QuantityManager.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
	cart: Object
})
</script>

<template>
	<Head title="Your Cart" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="text-xl font-semibold leading-tight text-gray-800">
				Your Cart
			</h2>
		</template>

		<div class="bg-white">
			<div class="max-w-2xl px-4 pt-4 mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
				<form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
					<section class="lg:col-span-7">
						<ul class="border-t border-b border-gray-200 divide-y divide-gray-200">
							<li v-for="product in cart.data.items" :key="product.id" class="flex py-6 sm:py-10">
								<div class="flex-shrink-0">
									<img src="https://placehold.co/400x400" alt="image_alt" class="object-cover object-center w-24 h-24 rounded-md sm:h-48 sm:w-48" />
								</div>

								<div class="flex flex-col justify-between flex-1 ml-4 sm:ml-6">
									<div>
										<h3 class="text-sm">
											<span class="font-medium text-gray-700 hover:text-gray-800">{{ product.name }}</span>
										</h3>

										<QuantityManager :product="product" class="py-4" />
											
										<p class="mt-1 text-sm font-bold text-gray-900">
											€ {{ Math.round((product.price * product.pivot.qty + Number.EPSILON) * 100) / 100 }}
										</p>
									</div>
								</div>
							</li>
						</ul>
					</section>

					<!-- Order summary -->
					<section class="sticky top-0 px-4 py-6 mt-16 rounded-lg bg-gray-50 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
						<h2 class="text-lg font-medium text-gray-900">
							Order summary
						</h2>

						<div class="mt-6">
							<div class="flex items-center justify-between pt-4 border-t border-gray-200">
								<dt class="text-base font-medium text-gray-900">
									Total
								</dt>
								<dd class="text-base font-medium text-gray-900">
									$112.32
								</dd>
							</div>
						</div>

						<div class="mt-6">
							<button type="submit" class="w-full px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">
								Checkout
							</button>
						</div>
					</section>
				</form>
			</div>
		</div>
	</AuthenticatedLayout>
</template>