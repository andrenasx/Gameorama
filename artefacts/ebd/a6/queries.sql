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
SELECT news_post.id, title, body, date_time, news_post.aura, num_comments, id_owner, username
FROM news_post
NATURAL JOIN 
(SELECT id_post AS id, COUNT(*) AS num_comments FROM comment GROUP BY id_post) AS post_num_comments
INNER JOIN member ON id_owner = member.id
ORDER BY news_post.date_time DESC;

-- Select main page trending posts - posts from last 2 weeks with the most amount of aura score
SELECT news_post.id, title, body, date_time, news_post.aura, num_comments, id_owner, username
FROM news_post
NATURAL JOIN 
(SELECT id_post AS id, COUNT(*) AS num_comments FROM comment GROUP BY id_post) AS post_num_comments
INNER JOIN member ON id_owner = member.id
WHERE date_time BETWEEN NOW()::DATE-EXTRACT(DOW FROM NOW())::INTEGER - 14 
AND NOW()::DATE-EXTRACT(DOW from NOW())::INTEGER + 1
ORDER BY aura DESC;

-- Select all news_posts for a member feed
SELECT news_post.id, title, body, date_time, news_post.aura, num_comments, id_owner, username
FROM news_post
NATURAL JOIN 
(SELECT id_post AS id, COUNT(*) AS num_comments FROM comment GROUP BY id_post) AS post_num_comments
INNER JOIN member ON id_owner = member.id
WHERE news_post.id IN
(
    SELECT DISTINCT news_post.id FROM news_post 
    INNER JOIN post_topic ON news_post.id = post_topic.id_post
    INNER JOIN topic ON post_topic.id_topic = topic.id
    INNER JOIN member_follow ON member_follow.id_follower = $id_member
    WHERE topic.name IN
    (
        SELECT name FROM topic
        INNER JOIN topic_follow ON topic.id = topic_follow.id_topic
        WHERE topic_follow.id_member = $id_member
    )
	OR 
	member_follow.id_followed = id_owner
) ORDER BY date_time DESC;


-- Check if a post is bookmarked for a member
SELECT COUNT(*)
FROM post_bookmark
WHERE id_post = $id_post AND id_bookmarker = $id_member

-- Select all member's bookmarked posts
SELECT DISTINCT news_post.id, title, body, date_time, news_post.aura, num_comments, id_owner, username
FROM news_post
NATURAL JOIN 
(SELECT id_post AS id, COUNT(*) AS num_comments FROM comment GROUP BY id_post) AS post_num_comments
INNER JOIN member ON id_owner = member.id
INNER JOIN post_bookmark ON news_post.id = post_bookmark.id_post
WHERE id_bookmarker = $id_member
ORDER BY news_post.date_time DESC;


-- Select topics for a post
SELECT id, name
FROM post_topic 
INNER JOIN topic ON topic.id = post_topic.id_topic
WHERE id_post = $id_post;


-- Select all "parent" comments from a post
SELECT id, body, date_time, aura, id_owner, id_post
FROM comment
WHERE id_post = $id_post 
AND id NOT IN (SELECT id_comment as id FROM reply WHERE id_post = $id_post);

-- Select all replies to a comment
SELECT id, body, date_time, aura, id_owner, id_post
FROM reply
INNER JOIN comment ON id_comment = id
WHERE id_parent = $id_comment;


-- Select member hall of fame (5 users with the most aura)
SELECT id, username, aura 
FROM member
ORDER BY aura DESC LIMIT 5;

-- Select most popular topics (5 topics with the most amount of followers)
SELECT id, name, num_followers
FROM topic
NATURAL JOIN 
(SELECT id_topic AS id, COUNT(*) AS num_followers FROM topic_follow GROUP BY id_topic) AS num_followers_topics
ORDER BY num_followers DESC
LIMIT 5;


-- Select all posts FROM a specific topic
SELECT * FROM news_post 
INNER JOIN post_topic ON news_post.id = post_topic.id_post
INNER JOIN topic ON post_topic.id_topic = topic.id
WHERE name = $name_topic;

-- Select all posts from a member 
SELECT * FROM news_post 
WHERE id_owner = $id_member;


-- Select all comments from a member
SELECT * FROM comment
WHERE id_owner = $id_member;



-- Select topics followed by a member
SELECT id, name
FROM topic
INNER JOIN topic_follow
ON id_topic = id
WHERE id_member = $id_member;

-- Select members followed by a member
SELECT *
FROM member_follow
INNER JOIN member
ON id_followed = id
NATURAL JOIN
(
    SELECT id_followed AS id, COUNT(*) AS num_followers FROM member_follow GROUP BY id_followed
) AS num_followers
WHERE id_follower = $id_member;


-- Select members that follow a member
SELECT * 
FROM member_follow
INNER JOIN member
ON id_follower = id
NATURAL JOIN
(
    SELECT id_follower AS id, COUNT(*) AS num_followers FROM member_follow GROUP BY id_follower
) AS num_followers
WHERE id_followed = $id_member;

-- Select posts bookmarked by a member
SELECT * FROM post_bookmark
INNER JOIN news_post ON news_post.id = post_bookmark.id_post
INNER JOIN member M ON news_post.owner = M.id
WHERE post_bookmark.id_bookmarker = $id_member;

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

-- Search a news_post by its title
SELECT * 
FROM news_post 
WHERE title @@ plainto_tsquery('english', $search);

-- Search for a member by its username
SELECT * 
FROM member 
WHERE username @@ plainto_tsquery('english', $search);

-- Search for a topic by its name
SELECT id, name 
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

INSERT INTO post_topic (id_topic, id_post) VALUES ($id_topic, $id_post);

INSERT INTO comment (body, id_owner, id_post) VALUES ($body, $id_owner, $id_post);

INSERT INTO reply (id_comment, id_parent) VALUES ($id_comment, $id_parent);

INSERT INTO post_image (id_post, file) VALUES ($id_post, $file);

INSERT INTO post_bookmark(id_post, id_bookmarker) VALUES($id_post, $id_bookmarker);

INSERT INTO post_aura (id_post, id_voter, upvote) VALUES ($id_post, $id_voter, $upvote);

INSERT INTO comment_aura (id_comment, id_voter, upvote) VALUES ($id_comment, $id_voter, $upvote);

INSERT INTO follow_notification (id_followed, id_follower) VALUES ($id_followed, $id_follower);

INSERT INTO comment_notification (id_notified, id_comment) VALUES ($id_notified, $id_comment);

INSERT INTO reply_notification (id_notified, id_comment) VALUES ($id_notified, $id_comment);

INSERT INTO post_report (id_reporter, id_post, body) VALUES ($id_reporter, $id_post, $body);

INSERT INTO comment_report (id_reporter, id_comment, body) VALUES ($id_reporter, $id_comment, $body);

INSERT INTO topic_report (id_reporter, id_topic, body) VALUES ($id_reporter, $id_topic, $body);

INSERT INTO member_report (id_reporter, id_reported, body) VALUES ($id_reporter, $id_reported, $body);

insert into post_bookmark (id_post, id_bookmarker) values ($id_post, $id_bookmarker);


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
AND id_voter = $id_voter;

--Delete a vote from a comment
DELETE FROM comment_aura
WHERE id_comment = $id_comment
AND id_voter = $id_voter;

--Delete a bookmark from a post
DELETE FROM post_bookmark
WHERE id_post = $id_post
AND id_bookmarker = $id_bookmarker;
