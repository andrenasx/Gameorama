-----------------------------------------
-- Frequent Queries
-----------------------------------------

-- Select member information
SELECT *
FROM member
NATURAL JOIN 
(SELECT id AS id_profile_image, file AS profile_image FROM member_image) AS member_profile_image
NATURAL JOIN 
(SELECT id AS id_banner_image, file AS banner_image FROM member_image) AS member_banner_image
WHERE member.id = $id_member;

-- Select member password
SELECT password 
FROM member 
WHERE username = $username;


-- Select all news posts and respective aura score and number of comments, sorted by recent
SELECT * 
FROM news_post
NATURAL JOIN 
(SELECT id_post AS id, COUNT(*) AS num_comments FROM comment GROUP BY id_post) AS post_num_comments
ORDER BY news_post.date_time DESC;

-- Select main page trending posts - posts from last 2 weeks with the most amount of aura score
SELECT * FROM news_post
WHERE date_time BETWEEN NOW()::DATE-EXTRACT(DOW FROM NOW())::INTEGER - 14 
AND NOW()::DATE-EXTRACT(DOW from NOW())::INTEGER + 1
ORDER BY aura DESC;

-- Select all news_posts for a member
SELECT * FROM news_post WHERE id IN
(
    SELECT DISTINCT news_post.id FROM news_post 
    INNER JOIN post_topic ON news_post.id = post_topic.id_post
    INNER JOIN topic ON post_topic.id_topic = topic.id
    INNER JOIN member_follow ON member_follow.id_follower = $id_user
    WHERE topic.name IN
    (
        SELECT name FROM topic
        INNER JOIN topic_follow ON topic.id = topic_follow.id_topic
        WHERE topic_follow.id_member = $id_user
    )
	OR 
	member_follow.id_followed IN
	(
		SELECT id FROM news_post
		WHERE news_post.id_owner = $id_user
	)
) ORDER BY date_time DESC;

-- Select topics for a post
SELECT * 
FROM post_topic 
INNER JOIN topic ON topic.id = post_topic.id_topic
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


-- Select member hall of fame (5 users with the most aura)
SELECT * 
FROM member
ORDER BY aura DESC LIMIT 5;

-- Select most popular topics (5 topics with the most amount of followers)
SELECT * FROM topic
NATURAL JOIN 
(SELECT id_topic AS id, COUNT(*) AS num_followers FROM topic_follow GROUP BY id_topic) AS num_followers_topics
ORDER BY num_followers DESC
LIMIT 5;


-- Select all posts FROM a specific topic
SELECT * FROM news_post 
INNER JOIN post_topic ON news_post.id = post_topic.id_post
INNER JOIN topic ON post_topic.id_topic = topic.id
WHERE name = $name_topic;

-- Select all posts from a user 
SELECT * FROM news_post 
WHERE id_owner = $id_user;


-- Select all comments from a user
SELECT * FROM comment
WHERE id_member = $id_user;


-- Select most reported members
SELECT * FROM member
NATURAL JOIN (SELECT id_reported AS id, COUNT(*) AS num_reports FROM member_report GROUP BY id_reported) AS reported_members
ORDER BY num_reports DESC;


-- Select most reported posts
SELECT * FROM news_post
NATURAL JOIN (SELECT id_post AS id, COUNT(*) AS num_reports FROM post_report GROUP BY id_post) AS reported_posts
ORDER BY num_reports DESC;


-- Select most reported topics
SELECT * FROM topic
NATURAL JOIN (SELECT id_topic AS id, COUNT(*) AS num_reports FROM topic_report GROUP BY id_topic) AS reported_topics
ORDER BY num_reports DESC;

-- Select most reported comments
SELECT * FROM comment
NATURAL JOIN (SELECT id_comment AS id, COUNT(*) AS num_reports FROM comment_report GROUP BY id_comment) AS reported_comments
ORDER BY num_reports DESC;


-- Search a news_post 
SELECT * 
FROM news_post 
WHERE title @@ plainto_tsquery('english', $search);

-- Search for a member by searching his username
SELECT * 
FROM member 
WHERE username @@ plainto_tsquery('english', $search);

-- Search for a topic by searching its name
SELECT * 
FROM topic 
WHERE name @@ plainto_tsquery('english', $search);


-----------------------------------------
-- Frequent Updates
-----------------------------------------

    --*UPDATES*--

--UPDATE member informations (Edit profile page)
UPDATE member SET full_name = $full_name, bio = $bio
WHERE id = $id_member;

--account settings page
UPDATE member SET password = $password_hash, email = $email
WHERE id = $id_member; 

--Edit post
UPDATE news_post SET title = $title, body = $body
WHERE id = $id_post;

--Update a vote from a post
UPDATE post_aura SET upvote = $upvote
WHERE id_post = $id_post
AND id_voter = $id_voter

--Update a vote from a comment
UPDATE comment_aura SET upvote = $upvote
WHERE id_comment = $id_comment
AND id_voter = $id_voter


    --*INSERTS*--

INSERT INTO member_image (file) VALUES ($file));

INSERT INTO member (username, full_name, email, password, bio, id_profile_image, id_banner_image) VALUES ($username, $full_name, $email, $password, $bio, $id_profile_image, $id_banner_image);

INSERT INTO administrator (id) VALUES ($id);

INSERT INTO member_follow (id_followed, id_follower) VALUES ($id_followed, $id_follower);

INSERT INTO news_post (title, body, id_owner) VALUES ($title, $body, $id_owner);

INSERT INTO topic (name) VALUES ($name) ON CONFLICT DO NOTHING;

INSERT INTO topic_follow (id_topic, id_member) VALUES ($id_topic, $id_member);

INSERT INTO post_topic (id_topic,id_post) VALUES ($id_topic, $id_post);

INSERT INTO comment (body, id_member, id_post) VALUES ($body, $id_member, $id_post);

INSERT INTO reply (id_comment, id_parent) VALUES ($id_comment, $id_parent);

INSERT INTO post_image (id_post, file) VALUES ($id_post, $file);

INSERT INTO post_aura (id_post, id_voter, upvote) VALUES ($id_post, $id_voter, $upvote);

INSERT INTO comment_aura (id_comment, id_voter, upvote) VALUES ($id_comment, $id_voter, $upvote);

INSERT INTO follow_notification (id_followed, id_follower) VALUES ($id_followed, $id_follower);

INSERT INTO comment_notification (id_notified, id_comment) VALUES ($id_notified, $id_comment);

INSERT INTO reply_notification (id_notified, id_comment) VALUES ($id_notified, $id_comment);

INSERT INTO post_report (id_reporter, id_post, body) VALUES ($id_reporter, $id_post, $body);

INSERT INTO comment_report (id_reporter, id_comment, body) VALUES ($id_reporter, $id_comment, $body);

INSERT INTO topic_report (id_reporter, id_topic, body) VALUES ($id_reporter, $id_topic, $body);

INSERT INTO member_report (id_reporter, id_reported, body) VALUES ($id_reporter, $id_reported, $body);


    --*DELETES*--

--Deletes a member (delete account) from the DBMS
DELETE FROM member WHERE id = $id_member;

--Deletes a member image
DELETE FROM member_image WHERE id = $id_image;

--Delete from member_follow when a member unfollows another member
DELETE FROM member_follow
WHERE id_follower = $id_follower
AND id_followed = $id_followed;

--Delete from topic_follow when a member unfollows a topic
DELETE FROM topic_follow
WHERE id_member = $id_member
AND id_topic = $id_topic;

--Delete a post
DELETE FROM news_post WHERE id = $id_post;

--Delete a comment
DELETE FROM comment WHERE id = $id_comment;

--Delete a vote from a post
DELETE FROM post_aura
WHERE id_post = $id_post
AND id_voter = $id_voter

--Delete a vote from a comment
DELETE FROM comment_aura
WHERE id_comment = $id_comment
AND id_voter = $id_voter



-----------------------------------------
-- Indexes
-----------------------------------------

DROP INDEX IF EXISTS search_comment_member;
CREATE INDEX search_comment_member ON comment USING hash (id_member);

DROP INDEX IF EXISTS search_comment_post;
CREATE INDEX search_comment_post ON comment USING hash (id_post);

DROP INDEX IF EXISTS post_aura_id_post;
CREATE INDEX post_aura_id_post ON post_aura USING hash (id_post);

DROP INDEX IF EXISTS comment_aura_id_comment;
CREATE INDEX comment_aura_id_comment ON comment_aura USING hash (id_comment);

DROP INDEX IF EXISTS news_post_date;
CREATE INDEX post_date ON news_post USING btree (date_time);


DROP INDEX IF EXISTS topic_name;
CREATE INDEX topic_name ON topic USING gin (to_tsvector('english', name));

DROP INDEX IF EXISTS member_username;
CREATE INDEX IF NOT EXISTS member_username ON member USING gist (to_tsvector('english', username));

DROP INDEX IF EXISTS search_posts;
CREATE INDEX search_posts ON news_post USING gist (to_tsvector('english', title));

