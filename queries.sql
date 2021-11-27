# 1. get categories with posts;
SELECT c.name, p.name
FROM post as p
     INNER JOIN category_post AS cp
        ON p.post_id = cp.post_id
     INNER JOIN category AS c
        ON cp.category_id = c.category_id;

# 2. get authors with posts;
SELECT a.lastname, a.firstname, p.name
FROM post as p
     INNER JOIN author_post AS ap
        ON p.post_id = ap.post_id
     INNER JOIN author AS a
        ON ap.author_id = a.author_id;

# 3. get Author by ID;
SELECT author_id, firstname, lastname
FROM author
WHERE author_id = 16;

# 4. get Category by URL;
SELECT *
FROM category
WHERE category.url LIKE "s%";

# 5. get Posts by Category;
SELECT c.name, p.name
FROM post as p
     INNER JOIN category_post AS cp
        ON p.post_id = cp.post_id
     INNER JOIN category AS c
        ON cp.category_id = c.category_id
WHERE c.name LIKE "%s";;

# 6. authors sorted by number of posts (highest to lowest);
SELECT COUNT(DISTINCT ap.post_id) AS posts_num,
   a.firstname, a.lastname
FROM `author_post` AS ap
     INNER JOIN author AS a
        ON ap.author_id = a.author_id
GROUP BY a.author_id
ORDER BY posts_num DESC;

# 7. categories with the highest number of authors;
# *not sure it works right
SELECT c.name,
   COUNT(DISTINCT a.author_id) as auth_num
FROM post as p
     INNER JOIN category_post AS cp
        ON p.post_id = cp.post_id
     INNER JOIN category AS c
        ON cp.category_id = c.category_id
     INNER JOIN author_post AS ap
        ON ap.post_id = p.post_id
     INNER JOIN author AS a
        ON ap.author_id = a.author_id
GROUP BY c.category_id
ORDER BY auth_num DESC;

# 8. * get authors without namesakes (using subquery with grouping and using left
# join to the same table).

SELECT DISTINCT a2.firstname
FROM author as a
LEFT JOIN author AS a2
    ON a.author_id = a2.author_id
GROUP BY a2.firstname
ORDER BY a2.firstname;
