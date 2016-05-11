This is my first Hello World E-shop
===================================

Project build with Symfony 3 framework

### Project installation steps

1. Install composer dependencies

    ```
        composer install
    ```

2. Install bower dependencies

    ```
        bower i
    ```

3. Install npm dependencies

    ```
        npm i
    ```

4. Build front-end

    ```
        gulp
    ```
    
5. Run database migrations
    ```
        php bin/console doctrine:migrations:migrate -n
    ```
    
6. Optionally load data fixtures
    ```
        php bin/console doctrine:fixtures:load
    ```
    
    