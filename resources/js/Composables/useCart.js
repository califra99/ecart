import { router } from '@inertiajs/vue3'

export function useCart() {
    const add = (product) => {
        router.post(product.paths.addToCart, {}, { preserveScroll: true });
    }

    const remove = (product) => {
        router.delete(product.paths.deleteFromCart, { preserveScroll: true });
    }

    return {
        add,
        remove
    }
}