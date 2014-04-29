XShop
=====

XShop is shop System based on Phalcon Framework

环境配置
========

安装 Phalcon Framework
----------------------

获取源码
```shell
sudo apt-get install php5-dev libpcre3-dev gcc make
git clone https://github.com/dreamsxin/cphalcon.git
cd cphalcon/ext
```

编译
```shell
phpize
./configure
make
sudo make install
```

配置php.ini
```shell
sudo vi /etc/php5/apache2/php.ini
extension=phalcon.so
```
