import { computed, ref } from 'vue'

// Reproduit GETPOST() de lib/common.php : lit les paramètres de query string
// (?page=...&sub=...&annee=...), rien de plus. Se met à jour sur navigation
// back/forward (popstate) et sur les clics de liens internes.
const search = ref(window.location.search)

function refresh() {
  search.value = window.location.search
}

window.addEventListener('popstate', refresh)

export function useQueryRoute() {
  const params = computed(() => new URLSearchParams(search.value))

  function get(name) {
    const value = params.value.get(name)
    return value === null || value === '' ? null : value
  }

  return {
    page: computed(() => get('page')),
    sub: computed(() => get('sub')),
    annee: computed(() => get('annee')),
  }
}
