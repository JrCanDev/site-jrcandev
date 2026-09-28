import js from '@eslint/js'
import vue from 'eslint-plugin-vue'
import vuejsAccessibility from 'eslint-plugin-vuejs-accessibility'
import prettier from '@vue/eslint-config-prettier'

export default [
  js.configs.recommended,
  ...vue.configs['flat/recommended'],
  ...vuejsAccessibility.configs['flat/recommended'],
  prettier,
  {
    languageOptions: {
      ecmaVersion: 'latest',
      sourceType: 'module',
      globals: { window: 'readonly', document: 'readonly' },
    },
    rules: {
      // Many existing page files are named after a single-word route segment
      // (Vr.vue, Ecv.vue, Charte.vue). Renaming them is out of scope here.
      'vue/multi-word-component-names': 'off',
    },
  },
  {
    ignores: ['dist/**', 'node_modules/**'],
  },
]
