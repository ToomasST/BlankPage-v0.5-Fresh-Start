import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig(({ command }) => {
  const isBuild = command === "build";

  return {
    base: isBuild ? "/wp-content/themes/blankpage_tailpress_theme/dist/" : "/",
    server: {
      port: 3000,
      cors: true,
      origin: "http://localhost/wordpress",
    },
    build: {
      manifest: true,
      outDir: "dist",
      rollupOptions: {
        input: [
          "resources/js/app.js",
          "resources/css/app.css",
          "resources/css/editor-style.css",
        ],
      },
    },
    plugins: [tailwindcss()],
  };
});
