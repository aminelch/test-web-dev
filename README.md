  
# Test Web dev  
  
  #### How it works

 1. 
 
 ```bash
    $- git clone https://github.com/aminelch/test-web-dev.git
    $- cd test-web-dev
    $- composer install  
```
 
 2. you should look at **.env** and change the **b_user** and  **db_password** as your config 
 
 3.  
 ```bash
    $- symfony console doctrine:database:create #create the database based on *.env* file 
    $- symfony console d:m:m  #apply migrations
    $- symfony console d:f:l --no-interaction # apply fixtures
    $- symfony serve -d #launch dev server
```

##### environment  

- PHPStorm 
- Firefox 
- Ubuntu 20.4

#### Screenshots

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/1.png)

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/2.png)

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/3.png)

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/4.png)

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/5.png)

![](https://github.com/aminelch/test-web-dev/blob/master/screenshots/6.png)
