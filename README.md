# MinimaX1

A minimalistic, dynamic theme that integrates [Toolset](https://toolset.com/), best used with Toolset Layouts.

## Description

MinimaX1 Theme is built to be used with Toolset Layouts or Toolste Views, but not Toolset Blocks or other Gutenberg oriented page builders.
MinimaX1 is as minimalistic as possible and explicitely built to be used with a Paid Software (Toolset), as a consequence it cannot be stored on the official WordPress repository.

With MinimaX1 and Toolset you woll design everything you see on the website with Cells, using Toolset Layouts.
Or, you can use HTML, with ShortCodes in Content Templates.

If you don't use Toolset, MinimaX1 Theme still renders the Content and Title of the posts.
You could hence also use this Theme as a boilerplate to build your own Custom WordPress Theme.

In that case however please enqueue Bootstrap manually, because the MinimaX1 Theme traditionally relies on Toolset delivering the Bootstrap Scripts and Styles.

## Usage

- Upload to your WordPress Theme Folder and install like any other WordPress Theme.
- Make sure to load Bootstrap 3 or above in WordPress Dashboard > Toolset > Settings or enqueue it manually in the Theme. 
- Design your Website with Toolset Layouts or Content Templates.
- You can, but do not have to, design separate mobile Templates using Toolset Layouts. You will need new, unassigned Layouts as follows: 
-- `{archive-name}-archive-mobile` for archives 
-- `{assigned-layout-slug}-mobile` for post types, single posts or pages  
-- `404-mobile` for the Error 404 template. 
  Then design your mobile appearance using these unassigned layouts. Header and Footer will still be the same and the Theme will ensure to load your Mobile Templates when required. Note, it only recognizes what `wp_is_mobile()` can. If no Layout exists as specified, it will fall back to the assigned Layout.

## Notes

- No WooCommerce Support is inbuilt, see here how to add it: https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes.
- The Theme features a 404 file, this allows you to style that template with Toolset Layouts.
- There is only one Menu registetred, no Sidebar, no Widget areas, you can add them if needed manually with code.
- Study the Code Comments, they are extensive for educational purpose.
- Please report issues to https://github.com/TukuToi/MinimaX1/issues
- Plase delete the `CODE_OF_CONDUCT` File and `.github` folder from the Theme when using.
- This is an experimental product, please use at your own risk.
- Even if this Theme is made with Toolset in mind, it is not a Toolset product and is not subject to Toolset Support, or else connected to those products. 
