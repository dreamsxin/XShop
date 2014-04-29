XShop
=====

XShop is shop System based on Phalcon Framework

安装 Phalcon Framework
----------------------

## 获取源码

```shell
sudo apt-get install php5-dev libpcre3-dev gcc make
git clone https://github.com/dreamsxin/cphalcon.git
cd cphalcon/ext
```

## 编译

```shell
phpize
./configure
make
sudo make install
```

## 配置php.ini

```shell
sudo vi /etc/php5/apache2/php.ini
extension=phalcon.so
```

安装XShop
---------

## 获取源码

```shell
git clone https://github.com/dreamsxin/XShop.git
```

贡献代码
--------

## 获取源码
```shell
git clone git@github.com:dreamsxin/XShop.git
cd XShop
git config --global user.name "your username"
git config --global user.email "your email"
git checkout -b 分支名
```

## 提交改动的文件
```shell
git add "改动的文件"
git commit -m "改动说明"
git push origin 分支名
```
