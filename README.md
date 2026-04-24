# Dublin Painter Blocks

A collection of high-performance, conversion-focused custom Gutenberg blocks for WordPress, specifically designed for professional painting and decorating businesses. Built with **Advanced Custom Fields (ACF) PRO**, these blocks provide a seamless editing experience while maintaining a premium frontend aesthetic.

## 🚀 Tech Stack

- **WordPress**: Core CMS platform.
- **ACF PRO**: Powering the block fields and data structure.
- **PHP**: Server-side rendering for blocks.
- **JavaScript (Vanilla)**: For interactive block components (sliders, accordions, quote forms).
- **CSS**: Scoped styling for each block to ensure performance and prevent style bleeding.

## ✨ Included Blocks

- **Hero**: High-impact entrance sections with customizable backgrounds and CTAs.
- **Before/After Slider**: Interactive visual comparison tool to showcase project quality.
- **Quote Form**: A multi-step lead generation form integrated with the service business logic.
- **Service Features**: Highlights specific services with icons and descriptions.
- **Process Timeline**: Visual guide to the business's workflow or project steps.
- **FAQ Accordion**: Modern, accessible FAQ sections.
- **Testimonials**: Social proof display for client reviews.
- **Trust Badges**: Showcase certifications, insurance, and partner logos.
- **Service Areas**: Map-integrated or list-based service area displays.
- **Stats Bar**: Highlight key business metrics (projects completed, years in business).
- **Pricing**: Clear, conversion-focused pricing tables.

## 🛠️ Installation

### Prerequisites
- WordPress 6.0+
- **Advanced Custom Fields PRO** (Active)

### Setup

1. **Clone/Download**: Clone this repository into your WordPress `wp-content/plugins` directory.
   ```bash
   git clone https://github.com/camster91/dublin-painter-blocks.git
   ```
2. **Activate**: Activate the plugin through the 'Plugins' menu in your WordPress dashboard.
3. **Usage**: The blocks will appear in the Gutenberg editor under the "Dublin Painter" category.

## ⚙️ Development

Each block is self-contained in the `blocks/` directory:
- `block.json`: Block metadata and registration.
- `render.php`: Frontend and editor rendering logic.
- `acf-register.php`: Field definitions for the block.
- `style.css` / `editor.css`: Scoped styling.
- `view.js`: Frontend interactivity logic.

## ⚖️ License

This project is licensed under the MIT License - see the LICENSE file for details.
