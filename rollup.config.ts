import swc from '@rollup/plugin-swc';
import terser from '@rollup/plugin-terser';

export default {
    input: './resources/js/index.ts',
    output: {
        file: './resources/dist/mailbook.js',
        format: 'iife'
    },
    plugins: [
        swc(),
        terser()
    ]
};
