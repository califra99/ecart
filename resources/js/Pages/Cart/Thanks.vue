<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

</script>
  
<template>
	<Head title="Thanks" />
	<AuthenticatedLayout>
		<div class="bg-white">
			<div class="max-w-3xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:px-8">
				<div class="max-w-xl">
					<h1 class="text-base font-medium text-indigo-600">
						Payment successful
					</h1>
					<p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">
						Thanks for ordering
					</p>
					<p class="mt-2 text-base text-gray-500">
						We appreciate your order, we're currently processing it. So hang tight and we’ll send you confirmation very soon!
					</p>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>