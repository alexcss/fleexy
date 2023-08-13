import 'vite/modulepreload-polyfill'

if (import.meta.env.DEV) {
  import('@vite/client')
}

import './vendors/_bootstrap'
