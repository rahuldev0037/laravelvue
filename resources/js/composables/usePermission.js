import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export default function usePermission() {

    const page = usePage()

    const permissions = computed(() =>
        page.props.auth.permissions || []
    )

    const hasPermission = (permission) => {
        return permissions.value.includes(permission)
    }

    const hasRole = (role) => {
        return page.props.auth.roles.includes(role)
    }

    return {
        hasPermission,
        hasRole,
    }
}