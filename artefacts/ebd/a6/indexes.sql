-----------------------------------------
-- Indexes
-----------------------------------------

DROP INDEX IF EXISTS search_post_member;
CREATE INDEX search_post_member ON news_post USING hash (id_owner);

DROP INDEX IF EXISTS search_comment_owner;
CREATE INDEX search_comment_owner ON comment USING hash (id_owner);

DROP INDEX IF EXISTS search_comment_post;
CREATE INDEX search_comment_post ON comment USING hash (id_post);

DROP INDEX IF EXISTS post_aura_id_post;
CREATE INDEX post_aura_id_post ON post_aura USING hash (id_post);

DROP INDEX IF EXISTS topic_follow_member;
CREATE INDEX topic_follow_member ON topic_follow USING hash (id_member);

DROP INDEX IF EXISTS member_id_follower;
CREATE INDEX member_id_follower ON member_follow USING hash (id_follower);

DROP INDEX IF EXISTS member_id_followed;
CREATE INDEX member_id_followed ON member_follow USING hash (id_followed);

DROP INDEX IF EXISTS comment_aura_id_comment;
CREATE INDEX comment_aura_id_comment ON comment_aura USING hash (id_comment);

DROP INDEX IF EXISTS news_post_date;
CREATE INDEX news_post_date ON news_post USING btree (date_time);

DROP INDEX IF EXISTS topic_name;
CREATE INDEX topic_name ON topic USING gin (to_tsvector('english', name));

DROP INDEX IF EXISTS member_username;
CREATE INDEX IF NOT EXISTS member_username ON member USING gist (to_tsvector('english', username));

DROP INDEX IF EXISTS search_posts;
CREATE INDEX search_posts ON news_post USING gist (to_tsvector('english', title));

DROP INDEX IF EXISTS unique_lowercase_username;
CREATE INDEX unique_lowercase_username ON member (lower(username));

DROP INDEX IF EXISTS unique_lowercase_email;
CREATE INDEX unique_lowercase_email ON member (lower(email));

DROP INDEX IF EXISTS unique_lowercase_topic;
CREATE INDEX unique_lowercase_topic ON topic (lower(name));

