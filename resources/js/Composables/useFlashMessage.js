import { usePage } from '@inertiajs/vue3'
import { watch, computed } from "vue";

export function useFlashMessage() {
    let message = computed(() => usePage().props.flash.message)

    let setMessage = (message) => {
        usePage().props.flash.message = message
    }

    setTimeout(() => {
        usePage().props.flash.message = ''
    }, 5000)

    watch(message, () => {
        if (message.value) {
            setTimeout(() => {
                usePage().props.flash.message = ''
            }, 5000)
        }
    })

    return {
        message,
        setMessage
    }
}