<script setup>
import { inject } from 'vue'

let message = inject('message');
</script>

<template>
	<div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6" style="z-index: 51">
		<div class="flex flex-col items-center w-full space-y-4 sm:items-end">
			<transition
				enter-active-class="transition ease-out transform duration-400"
				enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
				enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
				leave-active-class="transition duration-200 ease-in"
				leave-from-class="opacity-100"
				leave-to-class="opacity-0"
			>
				<div v-show="!!message" class="flex w-full max-w-md bg-indigo-400 rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
					<div class="flex-1 w-0 p-4">
						<div class="flex items-start">
							<div class="flex-1 w-0 ml-3">
								<p class="text-sm font-medium text-white">
									{{ message }}
								</p>
							</div>
						</div>
					</div>
				</div>
			</transition>
		</div>
	</div>
</template>
  
