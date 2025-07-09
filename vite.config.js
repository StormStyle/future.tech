import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: '.', // текущая директория как корень
  base: '/wp-content/themes/future-tech/', // путь для корректной генерации ссылок
  build: {
    manifest: true,
    outDir: 'dist', // куда складываются собранные файлы
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'src/main.js'), // твоя точка входа
      },
      output: {
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`,
      },
    },
  },
});
