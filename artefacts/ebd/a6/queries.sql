-- Main page posts

DROP VIEW IF EXISTS post_aura_score CASCADE;
CREATE VIEW post_aura_score AS
SELECT id_post AS id, num_upvotes-num_downvotes AS aura_score FROM
    (SELECT id_post, count(*) AS num_upvotes FROM post_aura  WHERE upvote = 'true' GROUP BY post_aura.id_post) AS upvotes
	NATURAL JOIN
	(SELECT id_post, count(*) AS num_downvotes FROM post_aura post_aura WHERE upvote = 'false' GROUP BY post_aura.id_post) AS downvotes;


-- Select all news posts and respective aura score, sorted by recent
SELECT * 
FROM news_post 
NATURAL JOIN post_aura_score 
ORDER BY news_post.date_time DESC;


-- Select all comments from a post
SELECT * 
FROM comment 
WHERE id_post = $id_post;


-- Select the number of comments from post
SELECT count(*) 
FROM comment 
WHERE id_post = $id_post;


-- Select topics for a post
SELECT * 
FROM post_topic 
INNER JOIN topic ON topic.id = post_topic.id_topic
WHERE id_post = $id_post


-- Select member hall of fame
SELECT * 
FROM member
SORT BY aura DESC LIMIT 5;


--most popular topics
--(Notifications and trending topics missing)
SELECT id_topic, count(*) FROM topic_follow
GROUP BY id_topic;


-- Select all posts FROM a specific topic
SELECT * FROM news_post 
INNER JOIN post_topic ON news_post.id = post_topic.id_post
INNER JOIN topic ON post_topic.id_topic = topic.id
WHERE name = $name_topic;


-- Select user password
SELECT password FROM member WHERE username = $username;