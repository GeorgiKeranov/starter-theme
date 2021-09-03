# Starter Theme

Custom WordPress theme built for the easier start of new projects

Starter Theme is based on Underscores https://underscores.me/ by Automattic.

## Table of contents
- [Technologies used](#technologies-used)
- [Theme Functionalities](#theme-functionalities)
  - [Header](#header) 
  - [Footer](#footer)
  - [Page Templates](#page-templates)
  - [Shortcodes](#shortcodes)
- [Installation](#installation)

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

Header description.

---------------------

### Footer

Footer description.

---------------------

### Page Templates

#### Template Name

Template description.

---------------------

### Shortcodes

`[year]`

Use this shortcode to display the current year.

---------------------

## Installation

### Requirements

`starter-theme` requires the following dependencies:

- [Yarn](https://yarnpkg.com/) or [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Setup

To use this theme you need to install the necessary Node.js and Composer dependencies :

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
