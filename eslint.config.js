const js = require("@eslint/js");

module.exports = [
  {
    ignores: [
      "**/node_modules/**",
      "wp-admin/**",
      "wp-includes/**",
      "wp-content/uploads/**",
      "**/js/build-garbage.js",
      "**/style.css",
    ],
  },

  js.configs.recommended,

  {
    files: ["webpack.config.js", "eslint.config.js"],
    languageOptions: {
      sourceType: "commonjs",
      globals: {
        require: "readonly",
        module: "readonly",
        __dirname: "readonly",
        process: "readonly",
      },
    },
  },

  {
    files: [
      "wp-content/themes/keyo_test/**/*.js",
      "wp-content/themes/keyo_test-child/**/*.js",
    ],
    languageOptions: {
      ecmaVersion: 2022,
      sourceType: "module",
      globals: {
        window: "readonly",
        document: "readonly",
        jQuery: "readonly",
        $: "readonly",
        wp: "readonly",
        console: "readonly",
      },
    },
    rules: {
      "no-unused-vars": "warn",
      "no-console": "off",
      eqeqeq: "error",
      curly: ["error", "multi-line"],
    },
  },
];