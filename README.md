<!-- breakdown -->
1. Requirement Analysis
2. Basic UI setup
3. Fetch data from API
4. Cached response data
5. Display data in UI in W3C Standard
6. Unit Test 

<!-- Basic setup for running project -->
1. After cloning of the project run following command for laravel framework setup
    >>> composer install

2. Environment Setup
    If there is no .env file after project clone then create a file name .env in the root folder and copy the content of .env.example to the newly created .env file.
    Rename DB_DATABASE, DB_USERNAME and DB_PASSWORD with one's local database information. Leave DB_PASSWORD blank if one does not have database password
    Note: For database I have use MySQL

3. Migration
    For migration run following command after database setup in .env file
    >>> php artisan migrate
    After migration run following command to add testing data in section table
    >>> php artisan db:seed --class=SectionsTableDataSeeder

4. Cache
    For caching of the api response I have used laravel file cache.

5. Unit test
    I have done two tests i.e success test and failure test for two different scenarios.
    i. Route Test
        For success case, I tested route which exist in application
        For failure case, I tested route which does not exist in application
   
    ii. Slug Test
        The slug test is done to check if incoming slug meets slug requirements or not.
        For the success case, I tested by passing a slug which meets the requirement.
        For the failure case, I tested by passing a slug which does not meet the requirement.

    For running the test case, run the following command
    >>>  ./vendor/bin/phpunit

6. To run the application run following command
    >>> php artisan serve

7. After running the application, you can see there are five different categories where three categories (Movies, Politics, Lifestyle) have proper slug value which will then render data by fetching from Api whereas remaining two categories (Sports,Entertainment) have slug that does not meet requirement and hence will receive invalid request response.

8. For testing slug validation I have created a trait file inside App\Http\Traits which will return whether the slug is valid or not.

9. Api url and Api key details are mentioned in .env file
