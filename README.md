<img src="https://openclipart.org/image/2400px/svg_to_png/272339/angular.png" width="150px"><img src="https://s.w.org/about/images/logos/wordpress-logo-notext-rgb.png" width="150px">

# NgWpStarter Blank
***...work in process...***
<blockquote>Wordpress + Angular6 + Ionic4 simple blank starter template to build your own theme with SEO Friendly support.</blockquote>

## Overview

From long time have see many implementation of Angular with WordPress and I was not realy convinced by all the way to implement Angular with Wordpress. To many fails with SEO if Angular is only using as an AJAX requester... Many hard way to using Composer with Angular CLI to manage project propely... To expensive to host Angular Universal on node server + Wordpress host on Apache server for small projects... That why I was focus from long time to find a better way and simple way to implement Angular with Wordpress.

On day I've build small PWA... I realyse Angular only work with an DOM entry point call `<app-root></app-root>`... Keep this in mind!!

Cause any where you put `<app-root></app-root>` with the 3 bundle.js file + bundle.css file the angular application is runing!! Normal.. Is the way!! But imagine..... If I put all my index.php content (not header + footer) into `<app-root></app-root>` , it will be replace by the Angular application for all user using browser... but not for all others like spider engins. Spiders can read all the default wordpress source code directly from de server without js.

As I realize this thing... I've just find a new better and super simple way to implement Angular with Wordpress + SEO friendly support with simple host on standard Apache host server.

Hope this project will help others like me to build efficiance Angular template for Wordpress.

Enjoy, Star, Fork and Share if you like.

### Developpement folder structure
This project need to be install into standard Wordpress `./wp-content/themes` folder.
First create new folder `dev` and install this project into the created folder `dev`. Finaly, you will have this following files structure project:

    .
    ├── wp-content
        ├──themes
            ├── (ng-wp-starter)               # Distribution Template folder (generate by Gulp)
            ├── dev                           # Wordpress General Template Development folder
                ├── ng-wp-starter             # ng-wp-starter developpement template folder (working directory)
                    ├── e2e                   # Angular e2e
                    ├── src                   # Angular client template files
                    ├── wordpress             # Wordpress default server template files
                    ├── .angular-cli.json
                    ├── .editorconfig
                    ├── .gitignore
                    ├── gulpfile.js
                    ├── karma.conf.js
                    ├── packages.json
                    ├── protractor.conf.js
                    ├── proxy.conf.js
                    ├── README.md
                    ├── tsconfig.json
                    └── tslint.json

> `ng-wp-starter` template dist folder directory will automatically be generate by Gulp into `./wp-content/themes`.


## Installation
This project only working with the latest version of WordPress and Angular. Check you have the latest Angular CLI in global install and go to download the latest WordPress .zip install files from https://wordpress.org

This project was generated with [Angular CLI](https://github.com/angular/angular-cli) version 1.5.0. and use a default simplified template for server reading powered by [_s](https://underscores.me/) (underscores) Simple blank Starter Theme for WordPress.


### Step 1: WordPress install
- Unzip Default WordPress into your favorite folder to create a new WordPress site.
- Run Apache server from the root folder of the default wordpress unziped folder.
- Install with default setting a new WordPress.


### Step 2: Angular template install
- First create a `dev` folder into your Wordpress themes folder `./wp-content/themes`
- Clone this repository into the `dev` folder you've juste create.
- update `./proxy.conf.json` + `./src/environments/environment.ts` + `src/environments/environment.prod.ts` with your own configuration server endpoint
- Run the following cmd

```
$ nmv use 7
$ npm install
$ npm run build  // see "Build Template files" section form more build process details
```

### Step 3: Wordpress Configuration:
- go `admin panel > settings > Reading` to set Front page displays a static page and set Blog display static page: 
  - In the drop down menu for Front Page select a page
  - In the drop down menu for Posts page select other page (have to create one call `Blog`), or leave it blank if you will not feature posts on the site
- go `admin panel > settings > permalinks`
  - update post url by select the latest option.
  - update category prefix with simple `.` if you don't want category name in the post url.
- add Yoast SEO plugin
  - go to admin page Yoast SEO plugin setting for permalinks: http://YOUR_SITE_URL/wp-admin/admin.php?page=wpseo_advanced&tab=permalinks
  - set `remove category prefix` if you don't want category name in the post url.
- add [TinyPNG plugin](https://fr.wordpress.org/plugins/tiny-compress-images/) to compress images files
  - Install and compress all your images.


### Step 4: Add Ng Wp Starter template to Wordpress
- go admin panel and add Ng Wp Starter template to your standard Wordpress installation (you will see into the template list).


### Step 5: Check Wordpress Angular Template blank
- open browser `localhost/:YOUR_APACHE_SERVER_PORT`
- you have angular wordpress template seo friendly ready!! Open browser source files and reload page... See magic in action.. Server side reading working!! you are 100% SEO friendly 🎉🎉🎉🎉🎉


## Run Development
- Run Apache server (MAMP/WAMP/XAMP) from your wordpress root folder to run wordpress dev server.
- Run `npm start` from this root project for a angular dev server. Navigate to `http://localhost:4200/` to work in dev mode.
- <b>!!! DO NO USE `ng serve` !!!</b>

The app will automatically reload if you change any of the source files (wordpress php files too).

<u>N.B:</u> You need to run wordpress server to have access to the WP API endpoint from your Angular dev project. Do remember: when you are as dev mode, you build an default Angular project with access to WP API. You not build the real template files cause you're in dev mode. The real build prod themplate folder <b>will only be builded when you runing `npm run build` cmd.</b>


## Build production Template files
Run `npm run build` to build production project as a Wordpress template. The build artifacts will be stored in the `ng-wp-starter` distribution directory create into `./wp-content/themes`. DO NOT USE the `-prod` flag for a production build cause it already incuded into the build cmd `npm run build`.

<b>!!! DO NO USE `ng build` or `ng build -prod`!!!</b>

You can also build a simple Angular Front interface with access to wp api without seo support by runing the cmd `ng build -prod`. This build artifacts will be stored in the `dist` distribution directory as an default Angular CLI project.

N.B: Remember use `npm run build` to build the Wordpress template distribution folder (seo friendly). `ng build -prod` will only build a simple font application with access to the wp api with ajax (no-seo friendly).


## Production Installation
- When you're ready to deploy your template, be shure you have the production template folder uptodate by runing the cmd `npm run build`.

- <i>Only for WP first install: Go install new default wordpress website as you've do the step 1 but on your production server interface manager (ex: infomaniak, ovh, kreativemedia etc...).</i>

- Configure you're new wordpress as describe on the step 3.
- Upload into `./wp-content/themes` the builded template folder (default name `ng-wp-starter`) from your computer to server.
- And finally following the step 4 to install ng-wp-starter template.
- Enjoy


## Angular Code scaffolding
Run `ng g component component-name` to generate a new component. You can also use `ng g directive|pipe|service|class|guard|interface|enum|module`.


## Running Angular unit tests
Run `ng test` to execute the unit tests via [Karma](https://karma-runner.github.io).


## Running Angular end-to-end tests
Run `ng e2e` to execute the end-to-end tests via [Protractor](http://www.protractortest.org/).


## Contribution
Feel free to contrib to this project.
- clone/fork project
- `$ git checkout -b YOUR_BRANCH`
- do your work...
- pass test...
- pull request with your branch on the `dev` branch / or submit small fix on the `master` branch.
- i will merge it and upd project version soon as possible.


## About author
Hi, i'm a Front-end developper living in Geneva Switzerland and i build hybrid mobile & web applications for almost 15 years. You can follow me on Twitter @FazioNico or checkout my own website https://nicolasfazio.ch
