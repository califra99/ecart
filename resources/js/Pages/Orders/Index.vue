<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Table from '@/Shared/Table.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
	orders: Object
})
</script>

<template>
	<Head title="Orders" />

	<AuthenticatedLayout>
		<template #header>
			<h2 class="text-xl font-semibold leading-tight text-gray-800">
				Your Orders
			</h2>
		</template>

		<div class="max-w-2xl px-4 py-8 mx-auto sm:px-6 sm:py-12 lg:max-w-7xl lg:px-8 ">
			<Table
				:rows="orders.data"
				:actions="['edit']"
				:headers="['N°']"
				:structure="[
					{
						label: 'title'
					}
				]"
			/>
		</div>
	</AuthenticatedLayout>
</template>