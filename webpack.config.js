const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

module.exports = {
    ...defaultConfig,
    entry: {
        "admin-settings": [
            path.resolve(process.cwd(), 'assets/src/admin/settings', 'main'),
        ],
        "main": path.resolve(process.cwd(), 'assets/src', 'main')
    },
}