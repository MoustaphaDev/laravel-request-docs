<p align="center">
  <a href="https://github.com/rakutentech/laravel-request-docs">
    <img alt="Laravel Request Docs" src="https://imgur.com/2NvLKn2.png">
  </a>
</p>

<p align="center">
  The Hassle-Free automatic API documentation generation for Laravel. <br>
  A Swagger alernative. <br>
  Supports Open API 3.0.0
</p>

**Fast:** Install on any Laravel Project

**Hassle Free:** Auto Generate API Documentation for request rules and parameters

**Analyze:** In built SQL query time analyzer, response time and headers output.

**Supports:** Postman and OpenAPI 3.0.0 exports.

## Features

- Light and Dark mode
- Automatic rules fetching from injected Request and by regexp
- Automatic routes fetching from Laravel Routes
- Support for Laravel logs
- Support for SQL query and query time
- Support for HTTP response time and memory consumption
- Support for Authorization Headers
- Display extra documentation using markdown
- Saves history previous requests
- Added filters to sort, group and filter routes by methods, controllers, middlewares, routes (also see Roadmap 2.x)
- Export laravel API, routes, rules and documentation to Postman and OpenAPI 3.0.0

# Read on Medium

Automatically generate api documentation for Laravel without writing annotations.

Read more: https://medium.com/web-developer/laravel-automatically-generate-api-documentation-without-annotations-a-swagger-alternative-e0699409a59e

## Requirements

| Lang    | Versions                  |
| :------ |:--------------------------|
| PHP     | 7.4 or 8.0 or 8.1 or 8.2  |
| Laravel | 6.* or 8.* or 9.* or 10.* |

# Installation

You can install the package via composer:

```bash
composer require rakutentech/laravel-request-docs --dev
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag=request-docs-config
php artisan route:cache
```

# Usage

## Dashboard

View in the browser on ``/request-docs/``

# Design pattern

In order for this plugin to work, you need to follow the design pattern by injecting the request class inside the controller.
For extra documentation you can use markdown inside your controller method as well.

![Design pattern](https://imgur.com/yXjq3jp.png)

# Screenshots

**Light and Dark Modes**

Light mode
![Preview](https://imgur.com/2s1SrKm.png)

Dark mode
![Preview](https://imgur.com/76sk7Lq.png)

**Try API**

Uses localstorage to save history of previous requests and request headers

![Preview](https://imgur.com/q3d7pw2.png)

**SQL query profile**

![Preview](https://imgur.com/8PLLlHv.png)

**Response profile**

![Preview](https://imgur.com/fd09jw1.png)

**Settings to sort, group and filter**

![Preview](https://imgur.com/qHq1pjr.png)


# Extra

You write extra documentation in markdown which will be rendered as HTML on the dashboard.
Example of using it in controller

```php
    /**
     * @lrd:start
     * Hello markdown
     * Free `code` or *text* to write documentation in markdown
     * @lrd:end
     */
    public function index(MyIndexRequest $request): Resource
    {
```

# Params not in rules

You write extra params with rules with @LRDparam in comment line as one line

```php
    /**
     * @LRDparam username string|max:32
     * // either space or pipe
     * @LRDparam nickaname string|nullable|max:32
     * // override the default response codes
     * @LRDparam responses 200,422
     */
    public function index(MyIndexRequest $request): Resource
    {
```

# Testing

```bash
./vendor/bin/phpunit
```

# Linting

```bash
./vendor/bin/phpcs --standard=phpcs.xml --extensions=php --ignore=tests/migrations config/ src/
```

Fixing lints

```bash
./vendor/bin/php-cs-fixer fix src/
./vendor/bin/php-cs-fixer fix config/
```

# Roadmap for v2.x

- [DONE] UI renewal
- [WIP] Introduce groupby controller names, routes, middlewares
- [WIP] Introduce fetch rules from PHP doc annotations

# Changelog

- Initial Release
- v1.9 Added improvements such as status code, response headers, custom request headers and fixed issues reported by users
- v1.10 Show PHP memory usage, gzip encoding fix
- v1.12 Bug Fix of id, and Laravel 9 support
- v1.13 Laravel 9 support
- v1.15 Adds Filter and fall back to regexp upon Exception
- v1.17 Donot restrict to FormRequest
- v1.18 Fix where prism had fixed height. Allow text area resize.
- v1.18 Updated UI and pushed unit tests
- v1.19 Exception -> Throwable for type error
- v1.20 Feature support open api 3.0.0 #10
- v1.21 Abililty to add custom params
- v1.22 Boolean|File|Image support
- v1.22 Boolean|File|Image support
- v1.23 Bug fix for lrd doc block #76
- v1.27 A few fixes on width and added request_methods
- v2.0 UI Renewal to React static
    - `@QAParam` is now `@LRDparam`
    - No special changes for users, upgrade to v2.x as usual
- v2.1 UI - adds search bar and few aligment fixes on table
