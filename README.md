# Starter Theme

Custom Wordpress starter theme built for a easier start of new custom themes.

Starter Theme is based on Underscores https://underscores.me/ by Automattic.

## Why this theme makes the building of new custom theme easier
- Theme has installed SASS and default SASS styles
- Theme has installed webpack to import javascript files from packages and bundle all of the javascript files in one minified
- Theme has implemented logic to add a static data in the database like pages, menus or custom fields on activation of the theme
- Theme has code for custom post types, custom taxonomies and custom fields
- Theme has page builder template and example section in it
- Theme has code to disable gutenberg or classis editor for templates you want
- Theme has a custom fields for socials and template part to include the socials wherever you want
- Theme has a custom css file named "admin-login.css" that you can change the look of the login page
- Theme has a default header with logo and navigation that are responsive with expandable menu on mobile
- Theme logo can be changed from the default settings in WordPress - Admin Panel -> Appearance -> Customize -> Site Identity -> Logo
- Theme has a default footer with logo, menu and copyright

## Table of contents
- [Technologies used](#technologies-used)
- [Theme Functionalities](#theme-functionalities)
  - [Header](#header) 
  - [Footer](#footer)
  - [Page Templates](#page-templates)
  - [Shortcodes](#shortcodes)
- [Installation](#installation)
- [Desgin Images](#design-images)

## Technologies used
- WordPress
- PHP
- JavaScript
- CSS3
- HTML5
- SASS
- jQuery
- Carbon Fields (Custom fields like ACF plugin but specifically for developers)
- MySQL
- Webpack

## Theme Functionalities

### Header

Header description.\
Logo can be changed from Admin Panel -> Appearance -> Customize -> Site Identity -> Logo.

---------------------

### Footer

Footer description.\
Logo can be changed from Admin Panel -> Appearance -> Customize -> Site Identity -> Logo.

---------------------

### Page Templates

#### Page Builder

Page Builder template contains several sections that can be added and ordered as you wish.

---------------------

### Shortcodes

`[year]`

Use this shortcode to display the current year.

---------------------

## Installation

### Requirements

`starter-theme` requires the following dependencies:

- [Yarn](https://yarnpkg.com/)
- [Composer](https://getcomposer.org/)

### Setup

To use this theme you need to install the Composer and Yarn packages:

```sh
$ composer install
$ yarn install
```

### Available CLI commands

- `yarn compile:css` : compiles SASS files to CSS.
- `yarn compile:js` : compiles JavaScript files to one bundle file.
- `yarn compile` : compiles both SASS and JavaScript files to one CSS and one JavaScript file.
- `yarn watch:css` : watches all SASS files and recompiles them to CSS when they change.
- `yarn watch:js` : watches all JavaScript files and recompiles them to one bundle file when they change.
- `yarn bundle` : generates a .zip archive for distribution, excluding development and system files.

## Design Images
![home](https://user-images.githubusercontent.com/22518317/136269429-1e15c8b9-db52-4beb-bb22-d12a2779b504.png)
![sample-page](https://user-images.githubusercontent.com/22518317/136269444-6f1b89b9-4181-4b2d-a96c-b5b19b216da3.png)


