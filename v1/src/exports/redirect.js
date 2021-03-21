import baseUrl from '@/exports/baseUrl'

const redirect = (domain) => {
        domain = domain ? domain : ''
        return window.location.replace(baseUrl() + '/' + domain)
}

export default redirect