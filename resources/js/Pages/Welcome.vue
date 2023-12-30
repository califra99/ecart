<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
	<Head title="Welcome" />

	<div
		class="min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
	>
		<div v-if="canLogin">
			<Link
				v-if="$page.props.auth.user"
				:href="route('dashboard')"
				class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
			>
				Dashboard
			</Link>

			<template v-else>
				<Link
					:href="route('login')"
					class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
				>
					Log in
				</Link>

				<Link
					v-if="canRegister"
					:href="route('register')"
					class="font-semibold text-gray-600 ms-4 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
				>
					Register
				</Link>
			</template>
		</div>
	</div>
</template>