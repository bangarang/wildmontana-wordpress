# Wild Montana Theme

## Description

This repository started as a [Flynt](https://flyntwp.com/) WordPress theme builder and has been customized for Wild Montana. It incorporates a standalone Elebase map application in the `hike/` directory, which is maintained as a separate git repository.

## Repository Structure

- **WordPress Theme**: Based on the Flynt framework for component-based development
- **Elebase Map Application**: Located in the `hike/` directory, this is a standalone application that provides interactive mapping functionality

## Flynt WordPress Theme

[Flynt](https://flyntwp.com/) is a WordPress theme for component-based development using [Timber](#page-templates) and [Advanced Custom Fields](#advanced-custom-fields).

### Install

1. Clone this repo to `<your-project>/wp-content/themes`.
2. Change the host variable in `flynt/build-config.js` to match your host URL: `const host = 'your-project.test'`
3. Navigate to the theme folder and run the following command in your terminal:

```
# wp-content/themes/flynt
composer install
npm i
npm run build
```

4. Open the WordPress back-end and activate the Flynt theme.
5. Run `npm run start` and start developing. Your local server is available at `localhost:3000`.

### Dependencies

* [WordPress](https://wordpress.org/) >= 5.0
- [Node](https://nodejs.org/en/) = 12
- [Composer](https://getcomposer.org/download/) >= 1.8
- [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) >= 5.7

### Usage

In your terminal, navigate to `<your-project>/wp-content/themes/flynt` and run `npm start`. This will start a local server at `localhost:3000`.

All files in `assets` and `Components` will now be watched for changes and compiled to the `dist` folder. Happy coding!

Flynt comes with a ready to use Base Style built according to our best practices for building simple, maintainable components. Go to `localhost:3000/BaseStyle` to see it in action.

## Elebase Map Application

The Elebase map application is located in the `hike/` directory and is maintained as a separate git repository. This integration allows for a seamless mapping experience within the Wild Montana website.

### Features

- Interactive maps for displaying hiking trails and points of interest
- Integration with Elebase content management system
- Standalone functionality that can be embedded within the WordPress site

### Setup

Since the `hike/` directory is a separate git repository, you'll need to initialize it separately:

```
git submodule update --init --recursive
```

Or if it's not set up as a submodule, you may need to clone it directly:

```
git clone [elebase-repo-url] hike
```

Refer to the README in the `hike/` directory for specific setup instructions for the map application.

## Troubleshooting

For Flynt theme troubleshooting, refer to the [original Flynt documentation](#troubleshooting).

For issues with the Elebase map application, please refer to the documentation within the `hike/` directory.
