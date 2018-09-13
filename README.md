# MinimaX1

## Description

MinimaX1 is the minimalistic version of a dynamic theme that integrates with Toolset

When you install it you are presented with a blank slate, and a TopBar Menu (Read Below how to remove that).

If you don't use Toolset, you can still see your Content and Titles.
If you use Toolset Views, you'll design the contents (from edge to edge of the screen) with either Layouts, Content Templates or native WordPresss editors.

## Usage

Study the Code Comments, they are extensive for educational purpose
Download and unzip to your FTP.
Activate in WordPress > Themes.
The Menu can be removed in the header.php file, just remove the lines 64 to 71:
```<?php 
        /**
         * The main navigation
         * Edit in bootstrap-nav.php
         *
         * @link https://developer.wordpress.org/reference/functions/get_template_part/
         */
        get_template_part( 'bootstrap-nav'); ?>
