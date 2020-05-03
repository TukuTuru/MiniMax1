# Minima X

A minimalistic, dynamic theme that integrates [Toolset](https://toolset.com/), best used with Toolset Layouts.

## Description

Minima X Theme is built to be used with Toolset Layouts or Toolste Views, but not Toolset Blocks or other Gutenberg oriented page builders.
Minima X is as minimalistic as possible and explicitely built to be used with a Paid Software (Toolset), as a consequence it cannot be stored on the official WordPress repository.

With Minima X and Toolset you woll design everything you see on the website with Cells, using Toolset Layouts.
Or, you can use HTML, with ShortCodes in Content Templates.

If you don't use Toolset, Minima X Theme still renders the Content and Title of the posts.
You could hence also use this Theme as a boilerplate to build your own Custom WordPress Theme.

In that case however please enqueue Bootstrap manually, because the Minima X Theme traditionally relies on Toolset delivering the Bootstrap Scripts and Styles.

## Usage

1. Upload to your WordPress Theme Folder and install like any other WordPress Theme.
2. Make sure to load Bootstrap 3 or above in WordPress Dashboard > Toolset > Settings or enqueue it manually in the Theme. 
3. Design your Website with Toolset Layouts or Content Templates.
4. You can, but do not have to, design separate mobile Templates using Toolset Layouts. You will need new, unassigned Layouts with naming syntax as follows: 
    1. `{archive-name}-archive-mobile` for archives 
    2. `{assigned-layout-slug}-mobile` for post types, single posts or pages  
    3. `404-mobile` for the Error 404 template. 
    4. Then design your mobile appearance using these unassigned layouts. Header and Footer will still be the same and the Theme will ensure to load your Mobile Templates when required. 
    5. Note, it only recognizes what `wp_is_mobile()` can. If no Layout exists as specified, it will fall back to the assigned Layout.
5. **Update the Theme in Dashboard > Updates or Dashboard > Themes whenever the notifications reccommend to do so. This works both on Multisites and Single Sites. The updates are stored externally on a private host.**

## Notes

- No WooCommerce Support is inbuilt, see here how to add it: https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes.
- The Theme features a 404 file, this allows you to style that template with Toolset Layouts.
- There is only one Menu registetred, no Sidebar, no Widget areas, you can add them if needed manually with code.
- Study the Code Comments, they are extensive for educational purpose.
- Please report issues to https://github.com/TukuToi/Minima-X/issues
- Plase delete the `CODE_OF_CONDUCT` File and `.github` folder from the Theme when using.
- This is an experimental product, please use at your own risk.
- Even if this Theme is made with Toolset in mind, it is not a Toolset product and is not subject to Toolset Support, or else connected to those products. 
