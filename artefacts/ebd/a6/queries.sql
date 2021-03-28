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


DROP VIEW IF EXISTS post_num_comments;
CREATE VIEW post_num_comments AS 
SELECT id_post AS id, count(*) AS num_comments from comment group by id_post;

-- Select all news posts and respective aura score, sorted by recent
SELECT * 
FROM news_post 
NATURAL JOIN post_aura_score 
NATURAL JOIN post_num_comments
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


--Main page trending posts - posts from last 2 weeks with the most amount of aura score
SELECT * FROM news_post
WHERE date_time BETWEEN NOW()::DATE-EXTRACT(DOW FROM NOW())::INTEGER - 30 
AND NOW()::DATE-EXTRACT(DOW from NOW())::INTEGER + 1
ORDER BY aura DESC;


--select all posts from a user 
SELECT * FROM news_post 
WHERE owner = $id_user;


--select all comments from a user
SELECT * FROM comment
WHERE id_member = $id_user;


--get most reported users
DROP VIEW IF EXISTS reported_users CASCADE;
CREATE VIEW reported_users AS
SELECT id_reported AS id, COUNT(*) AS num_reports FROM member_report 
GROUP BY id_reported;

SELECT * FROM member
NATURAL JOIN reported_users
ORDER BY num_reports DESC;


--get most reported posts
DROP VIEW IF EXISTS reported_posts CASCADE;
CREATE VIEW reported_posts AS
SELECT id_post AS id, COUNT(*) AS num_reports FROM post_report 
GROUP BY id_post;

SELECT * FROM news_post
NATURAL JOIN reported_posts
ORDER BY num_reports DESC;


--get most reported topics
DROP VIEW IF EXISTS reported_topics CASCADE;
CREATE VIEW reported_topics AS
SELECT id_topic AS id, COUNT(*) AS num_reports FROM topic_report 
GROUP BY id_topic;

SELECT * FROM topic
NATURAL JOIN reported_topics
ORDER BY num_reports DESC;

--get most reported comments
DROP VIEW IF EXISTS reported_comments CASCADE;
CREATE VIEW reported_comments AS
SELECT id_comment AS id, COUNT(*) AS num_reports FROM comment_report 
GROUP BY id_comment;

SELECT * FROM comment
NATURAL JOIN reported_comments
ORDER BY num_reports DESC;


--search a news_post 
SELECT * FROM news_post
WHERE title LIKE '%$search%'
OR body LIKE '%$search%';



    -- *UPDATES* --

--UPDATE member informations (Edit profile page)
UPDATE member SET full_name = $full_name, bio = $bio
WHERE id = $id_member;


--account settings page
UPDATE member SET password = $password_hash, email = $email
WHERE id = $id_member; 


--Edit post
UPDATE news_post SET title = $title, body = $body
WHERE id = $id_post;


    --*INSERTS*--

insert into member_image (id, file) values ($id, $file));

insert into member (id, username, full_name, email, password, bio, profile_image, banner_image) values ($id, $username, $full_name, $email, $password, $bio, $profile_image, $banner_image)

insert into administrator (id) values ($id);

insert into member_follow (id_followed, id_follower) values ($id_followed, $id_follower);

insert into news_post (id, title, body, date_time, owner) values ($id, $title, $body, $date_time, $owner)

insert into topic (id, name) values ($id, $name);

insert into topic_follow (id_topic, id_member) values ($id_topic, $id_member);

insert into post_topic (id_topic,id_post) values ($id_topic, $id_post);

insert into comment (id, body, date_time, id_member, id_post) values ($id, $body, $date_time, $id_member, $id_post);

insert into reply (id_comment, id_parent) values ($id_comment, $id_parent);

insert into post_image (id, id_post, file) values ($id, $id_post, $file);

insert into post_aura (id_post, id_voter, upvote) values ($id_post, $id_voter, $upvote);

insert into comment_aura (id_comment, id_voter, upvote) values ($id_comment, $id_voter, $upvote);

insert into follow_notification (id_notified, id_follower, date_time) values ($id_notified, $id_follower, $date_time)

insert into comment_notification (id_notified, id_comment, date_time) values ($id_notified, $id_comment, $date_time)

insert into reply_notification (id_notified, id_reply, date_time) values ($id_notified, $id_reply, $date_time)

insert into post_report (id_reporter, id_post, body, date_time) values ($id_reporter, $id_post, $body, $date_time)

insert into comment_report (id_reporter, id_comment, body, date_time) values ($id_reporter, $id_comment, $body, $date_time)

insert into topic_report (id_reporter, id_topic, body, date_time) values ($id_reporter, $id_topic, $body, $date_time)

insert into member_report (id_reporter, id_reported, body, date_time) values ($id_reporter, $id_reported, $body, $date_time) 




    --*DELETES*--

--Deletes a member (delete account) from the DBMS
DELETE FROM member WHERE id = $id_member;

--Delete from member_follow when a member unfollows another member
DELETE FROM member_follow WHERE
id_follower = $id_follower AND
id_followed = $id_followed;

--Delete from topic_follow when a member unfollows a topic
DELETE FROM topic_follow WHERE
id_member = $id_member AND
id_topic = $id_topic;




 --*INDEXES*

CREATE INDEX IF NOT EXISTS username_member ON member USING hash (username);

CREATE INDEX IF NOT EXISTS member_id ON member USING hash (id);

CREATE INDEX IF NOT EXISTS topic_name ON topic USING gin (name);

CREATE INDEX IF NOT EXISTS search_posts ON news_post USING gist (to_tsvector('english', title));

CREATE INDEX IF NOT EXISTS search_member_comments ON comment USING hash (id_member);

CREATE INDEX IF NOT EXISTS search_post_comments ON comment USING hash (id_post);

CREATE INDEX IF NOT EXISTS post_votes ON post_aura USING hash (id_post);

CREATE INDEX IF NOT EXISTS post_votes ON comment_aura USING hash (id_comment);

CREATE INDEX IF NOT EXISTS post_date ON news_post USING btree (date_time);



    --*Transactions*

--inserting members into the DBMS
--concurrent transactions cannot read uncommited data (and data cannot change)
--isolation level: REPEATABLE READ

BEGIN TRANSACTION
SET TRANSACTION ISOLATION LEVEL REPEATABLE READ

    insert into member (id, username, full_name, email, password, bio, profile_image, banner_image) 
    values ($id, $username, $full_name, $email, $password, $bio, $profile_image, $banner_image);

COMMIT;




