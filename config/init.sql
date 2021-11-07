DROP DATABASE IF EXISTS nadiiaz_blog;

DROP USER IF EXISTS 'nadiiaz_blog_user'@'%';

CREATE DATABASE nadiiaz_blog;

CREATE USER 'nadiiaz_blog_user'@'%' IDENTIFIED BY '45Ya!$""sT&P*C%RNSEhr';

GRANT ALL ON nadiiaz_blog.* TO 'nadiiaz_blog_user'@'%';