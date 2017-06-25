#slim-api

基于`Slim` PHP 微框架，以`Laravel` orm `illuminate/database`为数据库操作组件，结合`Guzzle`,`PHPUnit`实现Api 单元测试。

下载

    git clone https://github.com/zhujp/slim-api.git

执行
    
    composer update

如果单个项目使用phpunit
    
    chmod a+x vendor/bin/phpunit
    chmod a+x vendor/phpunit/phpunit/phpunit
    sh vendor/bin/phpunit app/tests/UserTest.php

如果系统环境变量有phpunit
    
    phpunit app/tests/UserTest.php

单元测试代码写在`app/tests`目录下