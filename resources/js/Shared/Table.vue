<script setup>
import { DocumentIcon } from '@heroicons/vue/24/outline';

let props = defineProps({
	actions: { type: Array, default: () => [] },
	headers: { type: Array, default: () => [] },
	rows: { type: Object, default: () => {} },
	structure: { type: Array, default: () => [] },
})

</script>

<template>
	<div class="overflow-x-auto md:overflow-x-visible col-span-full">
		<div class="inline-block min-w-full align-middle">
			<div class="relative">
				<table class="min-w-full">
					<thead class="top-0 z-10 bg-indigo-200 sm:sticky">
						<tr>
							<th
								v-for="(header, index) in props.headers"
								:key="index"
								scope="col"
								:class="[structure[index].class ? structure[index].class : '', ' px-3 py-3.5 text-left text-base font-semibold text-gray-900']"
							>
								{{ header }}
							</th>

							<th v-if="actions.length"></th>
						</tr>
					</thead>
					<tbody class="bg-gray-100 divide-y divide-gray-200 ">
						<tr v-if="!rows">
							<td :colspan="(headers.length + actions.length)">
								<div class="py-5 text-center">
									<h3 class="mt-2 text-sm font-medium text-gray-900">
										No data found
									</h3>
								</div>
							</td>
						</tr>

						<template v-else>
							<tr v-for="row in props.rows" :key="row.id" class="transition-colors group hover:bg-gray-50">
								<td v-for="(field, fieldIndex) in props.structure" :key="fieldIndex">
									<div class="px-3 py-4 text-sm text-gray-500"> 
										{{ row[field.label] }}
									</div>
								</td>
							
								<td class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
									<div class="flex items-center justify-end gap-x-2">
										<a
											title="Generate Invoice"
											class="text-indigo-500 hover:text-indigo-400"
											:href="row.paths.generateInvoice"
										>
											<DocumentIcon class="w-5 h-5" />
										</a>
									</div>
								</td>
							</tr>
						</template>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</template>