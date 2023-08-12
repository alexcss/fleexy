import 'vite/modulepreload-polyfill'

// import '../scss/test.scss';

if (import.meta.env.DEV) {
  import('@vite/client')
}

console.log('yos');
