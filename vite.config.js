import { defineConfig, loadEnv } from 'vite';
import flynt from './vite-plugin-flynt';
import globImporter from 'node-sass-glob-importer';
import FullReload from 'vite-plugin-full-reload';
import fs from 'fs';

const path = require('path');

const wordpressHost = 'http://fleexy.loc';

const dest = './dist';
const entries = [
  './src/assets/scss/app.scss',
  './src/assets/js/app.js'
  // './assets/admin.scss',
  // './assets/main.js',
  // './assets/main.scss',
  // './assets/print.scss',
  // './assets/editor-style.scss'
];
const watchFiles = [
  '**/*.php',
  '**/*.twig'
];

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '')
  const host = env.VITE_DEV_SERVER_HOST || wordpressHost
  const isSecure = host.indexOf('https://') === 0 && (env.VITE_DEV_SERVER_KEY || env.VITE_DEV_SERVER_CERT)

  return {
    base: './',
    css: {
      devSourcemap: true,
      preprocessorOptions: {
        scss: {
          importer: globImporter()
        }
      },
    },
    resolve: {
      alias: {
        '@': __dirname,
        '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      }
    },
    plugins: [
      flynt({ dest, host }),
      FullReload(watchFiles),
    ],
    server: {
      https: isSecure
        ? {
            key: fs.readFileSync(env.VITE_DEV_SERVER_KEY),
            cert: fs.readFileSync(env.VITE_DEV_SERVER_CERT)
          }
        : false,
      host: 'localhost' // preserve conflicts with IpV6
    },
    build: {
      // generate manifest.json in outDir
      manifest: true,
      outDir: dest,
      rollupOptions: {
        // overwrite default .html entry
        input: entries
      }
    }
  }
})
