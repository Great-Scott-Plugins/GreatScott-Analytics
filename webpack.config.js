const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        "admin-settings": [
            path.resolve(process.cwd(), 'assets/src/admin/settings', 'main.tsx'),
            path.resolve(process.cwd(), 'assets/src/admin/settings', 'main.css'),
        ],
        "main": path.resolve(process.cwd(), 'assets/src', 'main')
    },
    resolve: {
        ...defaultConfig.resolve,
        alias: {
            ...defaultConfig.resolve.alias,
            '@/components': path.resolve(__dirname, 'components'),
            '@': path.resolve(__dirname, 'assets/src/')
        },
    },
};