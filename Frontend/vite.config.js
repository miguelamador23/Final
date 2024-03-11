import react from '@vitejs/plugin-react';
import { defineConfig } from 'vite';

export default defineConfig({
  plugins: [
    react()
  ],
  resolve: {
    alias: {
      '@mui/material': '@mui/material',
      '@mui/styled-engine': '@mui/styled-engine',
      '@emotion/react': 'react',
      '@emotion/styled': '@emotion/styled'
    },
  },
});
