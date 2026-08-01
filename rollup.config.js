import terser from '@rollup/plugin-terser';

export default {
    input: './resources/js/index.js',
    output: {
        file: './resources/dist/mailbook.js',
        format: 'iife'
    },
    plugins: [terser()]
};
