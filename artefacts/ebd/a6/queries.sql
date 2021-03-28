-- Select member profile image
DROP VIEW IF EXISTS member_profile_image CASCADE;
CREATE VIEW member_profile_image AS
SELECT id AS pid, file AS p_image
FROM member_image;

-- Select member banner image
DROP VIEW IF EXISTS member_banner_image CASCADE;
CREATE VIEW member_banner_image AS
SELECT id AS bid, file AS b_image
FROM member_image;


-- Select member information
SELECT *
FROM member
INNER JOIN member_profile_image ON profile_image=pid
INNER JOIN member_banner_image ON banner_image=bid
WHERE member.id = $id_member;

-- Select member password
SELECT password 
FROM member 
WHERE username = $username;


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


-- Select the number of comments from post
SELECT count(*) 
FROM comment 
WHERE id_post = $id_post;

-- Select all "parent" comments from a post
SELECT id, body, date_time, aura, id_member, id_post
FROM comment
WHERE id_post = $id_post 
AND id NOT IN (SELECT id_comment as id FROM reply WHERE id_post = $id_post);

-- Select all replies to a comment
SELECT *
FROM reply
INNER JOIN comment ON id_comment = id
WHERE id_parent = $id_comment;


-- Select topics for a post
SELECT * 
FROM post_topic 
INNER JOIN topic ON topic.id = post_topic.id_topic
WHERE id_post = $id_post;


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
