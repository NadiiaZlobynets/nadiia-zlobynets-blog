DROP TABLE IF EXISTS `daily_statistics`;
#---
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
   `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date',
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
     `url` varchar(127) DEFAULT NULL COMMENT 'URL',
     `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
     PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Entity';
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
INSERT INTO `author` (`firstname`, `lastname`, `url`, `description`)
VALUES ('Anastasia', 'Blick', 'anastasia-blick', 'Lorem ipsum dolor sit amet'),
       ('Maude', 'Walter', 'maude-walter', 'Lorem ipsum dolor sit amet'),
       ('Jonas', 'Towne', 'jonas-towne', 'Lorem ipsum dolor sit amet'),
       ('Delpha', 'Gulgowski', 'delpha-guldowski', 'Lorem ipsum dolor sit amet'),
       ('Rae', 'Heathcote', 'rae-heathcote', 'Lorem ipsum dolor sit amet'),
       ('Joelle', 'Steuber', 'joelle-steuber', 'Lorem ipsum dolor sit amet'),
       ('Domingo', 'Derick', 'domigo-derick', 'Lorem ipsum dolor sit amet'),
       ('Myra', 'Paucek', 'myra-paucek', 'Lorem ipsum dolor sit amet'),
       ('Werner', 'Crona', 'werner-crona', 'Lorem ipsum dolor sit amet'),
       ('Daphnee', 'Schamberger', 'daphnee-schamberger', 'Lorem ipsum dolor sit amet'),
       ('Violette', 'Gutmann', 'violette-gutmann', 'Lorem ipsum dolor sit amet'),
       ('Ramon', 'Hoppe', 'ramon-hoppe', 'Lorem ipsum dolor sit amet'),
       ('Sigrid', 'Morissette', 'sigrid-morissette', 'Lorem ipsum dolor sit amet'),
       ('Claudia', 'Koelpin', 'claudia-koelpin', 'Lorem ipsum dolor sit amet'),
       ('Kraig', 'Schimmel', 'kraig-schimmel', 'Lorem ipsum dolor sit amet');
#---
CREATE TABLE `category_post` (
    `category_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Post';
#---
ALTER TABLE `category_post`
    ADD CONSTRAINT `FK_CATEGORY_POST_CATEGORY0_ID` FOREIGN KEY `category` (`category_id`)
    REFERENCES `category` (`category_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_CATEGORY0_POST_POST_ID` FOREIGN KEY `post` (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `category_post` (`category_id`, `post_id`)
VALUES (1, 1), (1, 2), (1, 3), (1, 4),
       (2, 2), (2, 3), (2, 4), (2, 5),
       (3, 9), (3, 4), (3, 5), (3, 6),
       (4, 13), (4, 12), (4, 11), (4, 10),
       (5, 9), (6, 4), (7, 5), (8, 6),
       (9, 9), (10, 4), (11, 5), (12, 6),
       (14, 15), (15, 4), (5, 6);
#---
CREATE TABLE `author_post` (
    `author_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `author_id` int unsigned DEFAULT NULL COMMENT 'Author ID',
    `post_id` int unsigned DEFAULT NULL COMMENT 'Post ID',
    PRIMARY KEY (`author_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Post';
#---
ALTER TABLE `author_post`
    ADD CONSTRAINT `FK_AUTHOR0_POST_AUTHOR_ID` FOREIGN KEY `author` (`author_id`)
        REFERENCES `author` (`author_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_AUTHOR0_POST_POST_ID` FOREIGN KEY `post `(`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `author_post` (`author_id`, `post_id`)
VALUES (1, 1), (1, 2), (1, 3), (1, 4),
       (2, 2), (2, 3), (2, 4), (2, 5),
       (3, 9), (3, 4), (3, 5), (3, 6),
       (4, 13), (4, 12), (4, 11), (4, 10),
       (5, 9), (6, 4), (7, 5), (8, 6),
       (9, 9), (10, 4), (11, 5), (12, 6),
       (14, 15), (15, 4), (5, 6);
#---
CREATE TABLE `daily_statistics` (
    `daily_statistics_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned DEFAULT NULL COMMENT 'Post ID',
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date',
    `views` smallint DEFAULT NULL COMMENT 'Views',
    PRIMARY KEY (`daily_statistics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Daily Statistics';
#---
ALTER TABLE `daily_statistics`
    ADD CONSTRAINT `FK_DAILY_STATISTICS0_POST_ID` FOREIGN KEY `post `(`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `daily_statistics` (`post_id`, `date`, `views`)
VALUES (1, 1636126765, 21),
       (2, 1526729821, 15);

