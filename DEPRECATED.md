# ⚠️ DEPRECATED — This Plugin Has Been Merged Into the Theme

As of version 2.5.0, all custom blocks from this plugin have been merged into
the **dublin-painter-gutenberg** theme. This plugin is no longer needed.

## Migration

1. Deactivate this plugin in WordPress admin
2. Ensure the **dublin-painter-gutenberg** theme (v2.5.0+) is active
3. The theme's `functions.php` registers all blocks with render callbacks and ACF fields
4. Delete this plugin if desired

All 12 blocks, ACF field groups, CPTs, and JS/CSS assets are now in the theme at:
- `blocks/{block-name}/block.json` — Block registration
- `blocks/{block-name}/render.php` — Frontend rendering with ACF fallbacks
- `blocks/{block-name}/style.css` — Block styles
- `blocks/{block-name}/acf-register.php` — ACF field group registration
- `includes/cpt.php` — Custom post types (Projects, Testimonials)
- `assets/js/main.js` — Global frontend JS (dark mode, mobile nav, scroll)
- `assets/js/utils.js` — Shared utilities

The canonical repo is now: **camster91/dublin-painter-gutenberg**
