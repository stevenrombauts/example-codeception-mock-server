## Example: Codeception with Mock HTTP server

This repository contains the sample code used in my blog post [Mock API requests in Codeception Acceptance tests](https://stevenrombauts.be/2018/03/mock-api-requests-in-codeception-acceptance-tests/)

### Installation

1. Clone this repository and go the directory:

    ```shell
    git clone https://github.com/stevenrombauts/example-codeception-mock-server.git
    cd example-codeception-mock-server
    ```

1. Run Composer install

    ```shell
    composer install
    ```

1. Copy `config.php-example` to `config.php`.
1. Start PHP's standalone webserver:

    ```shell
    php -S localhost:8080
    ```

1. Browse to http://localhost:8080 to see it in action.

### Running the tests

1. Change the `API_URL` in `config.php` to point to the mock HTTP server:

    ```php
    <?php
    return [
    	'API_URL' => 'http://localhost:8001/wp-json/posts'
    ];
    ```

1. Run Codeception:

    ```shell
    codecept run acceptance --steps
    ```
