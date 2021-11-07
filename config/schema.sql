DROP TABLE IF EXISTS `category_post`;
#---
DROP TABLE IF EXISTS `author_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `author`;
#---
CREATE TABLE `post` (
   `post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
   `name` varchar(127) NOT NULL COMMENT 'Name',
   `url` varchar(127) NOT NULL COMMENT 'URL',
   `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
   `date` int unsigned NOT NULL COMMENT 'Date',
   PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Post Entity';
#---
CREATE TABLE `category` (
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Entity';
#---
CREATE TABLE `author` (
     `author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
     `firstname` varchar(127) DEFAULT NULL COMMENT 'First Name',
     `lastname` varchar(127) DEFAULT NULL COMMENT 'Last Name',
     `url` varchar(127) NOT NULL COMMENT 'URL',
     `image` varchar(127) NOT NULL COMMENT 'IMG',
     `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
     PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Order Entity';
#---
CREATE TABLE `author_post` (
    `author_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `author_id` int unsigned NOT NULL COMMENT 'Author ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    PRIMARY KEY (`author_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Post';
#---
CREATE TABLE `category_post` (
    `category_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Post';
#---
INSERT INTO `post` (`name`, `url`, `description`, `date`)
VALUES ('Post 1', 'post-1', 'Lorem ipsum dolor sit amet', 1636126765),
       ('Post 2', 'post-2', 'Lorem ipsum dolor sit amet', 1572968365),
       ('Post 3', 'post-3', 'Lorem ipsum dolor sit amet', 1551109165),
       ('Post 4', 'post-4', 'Lorem ipsum dolor sit amet', 1562859565),
       ('Post 5', 'post-5', 'Lorem ipsum dolor sit amet', 1577893154),
       ('Post 6', 'post-6', 'Lorem ipsum dolor sit amet', 1587896162),
       ('Post 7', 'post-7', 'Lorem ipsum dolor sit amet', 1577893154),
       ('Post 8', 'post-8', 'Lorem ipsum dolor sit amet', 1627816166),
       ('Post 9', 'post-9', 'Lorem ipsum dolor sit amet', 1587896162),
       ('Post 10', 'post-10', 'Lorem ipsum dolor sit amet', 1577893154),
       ('Post 11', 'post-11', 'Lorem ipsum dolor sit amet', 1627816166),
       ('Post 12', 'post-12', 'Lorem ipsum dolor sit amet', 1587896162),
       ('Post 13', 'post-13', 'Lorem ipsum dolor sit amet', 1677693154),
       ('Post 14', 'post-14', 'Lorem ipsum dolor sit amet', 1667916196),
       ('Post 15', 'post-15', 'Lorem ipsum dolor sit amet', 1577153177);
#---
INSERT INTO `category` (`name`, `url`)
VALUES ('Lifestyle', 'lifestyle'),
       ('Travelling', 'travelling'),
       ('Skills', 'skills'),
       ('Sports', 'sports'),
       ('DIY', 'diy'),
       ('Finance', 'finance'),
       ('Business', 'business'),
       ('Movie', 'movie'),
       ('News', 'news'),
       ('Business', 'business'),
       ('Gaming', 'gaming'),
       ('Health', 'health'),
       ('Book', 'book'),
       ('Art', 'art'),
       ('Music', 'music');
#---
INSERT INTO `author` (`firstname`, `lastname`)
VALUES ('Anastasia', 'Blick'),
       ('Maude', 'Walter'),
       ('Jonas', 'Towne'),
       ('Delpha', 'Gulgowski'),
       ('Rae', 'Heathcote'),
       ('Joelle', 'Steuber'),
       ('Domingo', 'Derick'),
       ('Myra', 'Paucek'),
       ('Werner', 'Crona'),
       ('Daphnee', 'Schamberger'),
       ('Violette', 'Gutmann'),
       ('Ramon', 'Hoppe'),
       ('Sigrid', 'Morissette'),
       ('Claudia', 'Koelpin'),
       ('Kraig', 'Schimmel');