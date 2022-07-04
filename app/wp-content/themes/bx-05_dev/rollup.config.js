import { terser } from 'rollup-plugin-terser';
import commonjs from '@rollup/plugin-commonjs';
import { nodeResolve } from '@rollup/plugin-node-resolve';
import css from 'rollup-plugin-import-css';

export default {
  input: 'src/js/app.mjs',
  output: {
    file: 'dist/js/lib.js',
    format: 'umd',
    name: 'MyModule',
  },
  plugins: [commonjs(), nodeResolve(), terser(), css()],
};
