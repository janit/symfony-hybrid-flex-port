A Symfony Flex hybrid app sharing state object with Twig, React and Vue
==========

<strong>NOTE</strong>: This is a port of <a href="https://symfony.fi/entry/sharing-state-in-a-symfony-hybrid-app-with-twig-react-etc">the original app</a> from <a href="https://symfony.fi/entry/porting-a-symfony-3-application-to-flex">Symfony 3 to Symfony Flex</a>. Details in article: <a href="https://symfony.fi/entry/porting-a-symfony-3-application-to-flex">Porting a Symfony 3 application to Flex</a>

This is a sample app that provides a working  example concept of simply
sharing a state object between the Twig template rendering engine
as well as JavaScript view layers Vue and React.

This introduces no complexity of server side rendering for decent
performance, but SSR can be done as an enhancement for improved
performance and SEO: <a href="https://www.symfony.fi/entry/introduction-to-react-js-components-and-server-side-rendering-in-php">Introduction to React.js Components and Server Side Rendering in PHP</a>, <a href="https://www.symfony.fi/entry/testing-react-js-isomorphic-rendering-with-php-v8js-and-the-symfony-microkernel">Testing React.js isomorphic rendering with php-v8js and the Symfony Microkernel</a>

This will just handle the sharing of initial state on page load
and you'll need to then take over your state management in your
front end using some kind of tools for that, e.g. MobX, Redux.
There is also a simple API backend that also returns the same
object and keeps things predictable for developers.

The application comes complete with an SQLite database and built
JavaScript clients to keep overhead of installation minimal. The
application itself is simple enough to figure out with basic
understanding of OO PHP and Symfony, so it's better just to take
a look for yourself to see if this feels like a good idea or not.

## Installation

Clone app:

```
git clone git@github.com:janit/symfony-hybrid-flex-port.git
```

Install dependencies:

```
composer install
```

Set local environment variables

```
cp .env.dist .env
```

Install front end build tools (You'll need to have Node, NPM and <a href="https://yarnpkg.com/lang/en/docs/install/">Yarn</a> installed)

```
yarn
```

Build Stylesheets and the TypeScript app with <a href="https://symfony.com/blog/introducing-webpack-encore-for-asset-management">Symfony Encore</a>:

```
./node_modules/.bin/encore production
```

Run:

```
make serve
```

Open app in browser: http://localhost:8000

## JavaScript builds

There are three separate client implementations included, React, Vue.js and Vanilla JavaScript (via TypeScript). If you want to try modifications to the behaviour of the clients you'll need to do some build setup:

### Vue.js

No Vue there is build process, just start editing `src/AppBundle/Resources/public/js/vue/app.js`. Note that example uses some the ES6+ syntax is not supported natively everywhere, so you'll need an up-to-date browser.

### React

The React app is built using <a href="https://github.com/insin/nwb">nwb</a>, a fast way to get started with contemporary (as of February 2017) JavaScript builds.

Install nwb globally:

```
npm install -g nwb
```

Enter directory and run build:

```
cd src/AppBundle/Resources/public/js/react
react build app.js
```

The built filename changes by default, so unless you tweak config, you'll need to edit `app/Resources/views/base.html.twig` to the current one.

### JavaScript / TypeScript

The vanilla JavaScript app is written in <a href="http://typescriptlang.org">TypeScript</a>, which adds type information and some other syntax on top of the JavaScript language.

The build of the TypeSCript app is now done using <a href="http://symfony.com/doc/current/frontend.html#webpack-encore">Symfony Encore</a>. You can use the dev mode with watch for automatic builds when developing:

```
./node_modules/.bin/encore dev --watch
```

Note: You can also use Encore to run Webpack dev server for live reloads, etc. More information in the Symfony documentation:
<a href="http://symfony.com/doc/current/frontend/encore/dev-server.html">Using webpack-dev-server and HMR</a>