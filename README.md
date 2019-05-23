# Blank Wordpress theme

V1.0 - May 23 2019


## Installing

Run `npm-install` to install all depencies. After that make sure to edit line 8 of the `gulpfile`.

## Gulp

`npm start` runs `gulp` wich starts a developments server.
`npm build` runs `gulp build --prod` wich makes a zip file of the theme ready for production.

### Gulp features
* Start development server
* Watch for changes
* Compress images
* Auto prefix
* Minify (in production mode)

## File Structure
All the files in `src` will be moved to a new `dist` folder wich contains the compressed and minified files.