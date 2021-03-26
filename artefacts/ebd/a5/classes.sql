DROP TABLE IF EXISTS member CASCADE;
DROP TABLE IF EXISTS member_image CASCADE;
DROP TABLE IF EXISTS member_follow CASCADE;
DROP TABLE IF EXISTS administrator CASCADE;
DROP TABLE IF EXISTS news_post CASCADE;
DROP TABLE IF EXISTS topic CASCADE;
DROP TABLE IF EXISTS topic_follow CASCADE;
DROP TABLE IF EXISTS post_topic CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS reply CASCADE;
DROP TABLE IF EXISTS post_image CASCADE;
DROP TABLE IF EXISTS post_aura CASCADE;
DROP TABLE IF EXISTS comment_aura CASCADE;
DROP TABLE IF EXISTS follow_notification CASCADE;
DROP TABLE IF EXISTS comment_notification CASCADE;
DROP TABLE IF EXISTS reply_notification CASCADE;
DROP TABLE IF EXISTS post_report CASCADE;
DROP TABLE IF EXISTS comment_report CASCADE;
DROP TABLE IF EXISTS topic_report CASCADE;
DROP TABLE IF EXISTS member_report CASCADE;

CREATE TABLE member_image (
    id serial PRIMARY KEY,
    file bytea NOT NULL
);

CREATE TABLE member (
    id serial PRIMARY KEY,
    username text NOT NULL UNIQUE,
    full_name text NOT NULL,
    email text NOT NULL UNIQUE,
    password text NOT NULL,
    bio text,
    profile_image integer NOT NULL REFERENCES member_image(id),
    banner_image integer NOT NULL REFERENCES member_image(id),
    aura integer DEFAULT 0 NOT NULL
);

CREATE TABLE member_follow (
    id_follower integer REFERENCES member(id) ON DELETE CASCADE,
    id_followed integer REFERENCES member(id) ON DELETE CASCADE,
    PRIMARY KEY(id_follower, id_followed)
);

CREATE TABLE administrator (
    id integer PRIMARY KEY REFERENCES member(id)
);

CREATE TABLE news_post (
    id serial PRIMARY KEY,
    title text NOT NULL,
    body text,
    date_time timestamp NOT NULL DEFAULT now(),
    aura integer DEFAULT 0 NOT NULL,
    owner integer NOT NULL REFERENCES member(id) ON DELETE CASCADE
);

CREATE TABLE topic (
    id serial PRIMARY KEY,
    name text NOT NULL UNIQUE
);

CREATE TABLE topic_follow (
    id_topic integer REFERENCES topic(id) ON DELETE CASCADE,
    id_member integer REFERENCES member(id) ON DELETE CASCADE,
    PRIMARY KEY(id_topic, id_member)
);

CREATE TABLE post_topic (
    id_post integer REFERENCES news_post(id) ON DELETE CASCADE,
    id_topic integer REFERENCES topic(id) ON DELETE CASCADE,
    PRIMARY KEY(id_post, id_topic)
);

CREATE TABLE comment (
    id serial PRIMARY KEY,
    body text NOT NULL,
    date_time timestamp NOT NULL DEFAULT now(),
    aura integer DEFAULT 0 NOT NULL,
    id_post integer NOT NULL REFERENCES news_post(id) ON DELETE CASCADE
);

CREATE TABLE reply (
    id_comment integer PRIMARY KEY REFERENCES comment(id) ON DELETE CASCADE,
    id_parent integer NOT NULL REFERENCES comment(id) ON DELETE CASCADE,
    CONSTRAINT reply_ids CHECK (id_comment <> id_parent)
);

CREATE TABLE post_image (
    id serial PRIMARY KEY,
    id_post integer NOT NULL REFERENCES news_post(id) ON DELETE CASCADE,
    file bytea NOT NULL
);

CREATE TABLE post_aura (
    id_post integer REFERENCES news_post(id) ON DELETE CASCADE,
    id_voter integer REFERENCES member(id) ON DELETE CASCADE,
    upvote boolean NOT NULL,
    PRIMARY KEY(id_post, id_voter)
);

CREATE TABLE comment_aura (
    id_comment integer REFERENCES comment(id) ON DELETE CASCADE,
    id_voter integer REFERENCES member(id) ON DELETE CASCADE,
    upvote boolean NOT NULL,
    PRIMARY KEY(id_comment, id_voter)
);

CREATE TABLE follow_notification (
    id_notified integer REFERENCES member(id) ON DELETE CASCADE,
    id_follower integer REFERENCES member(id) ON DELETE CASCADE,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_notified, id_follower),
    CONSTRAINT follow_notification_ids CHECK (id_follower <> id_notified)
);

CREATE TABLE comment_notification (
    id_notified integer REFERENCES member(id) ON DELETE CASCADE,
    id_comment integer REFERENCES comment(id) ON DELETE CASCADE,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_notified, id_comment)
);

CREATE TABLE reply_notification (
    id_notified integer REFERENCES member(id) ON DELETE CASCADE,
    id_reply integer REFERENCES reply(id_comment) ON DELETE CASCADE,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_notified, id_reply)
);

CREATE TABLE post_report (
    id_reporter integer REFERENCES member(id) ON DELETE SET NULL,
    id_post integer REFERENCES news_post(id) ON DELETE CASCADE,
    body text NOT NULL,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_reporter, id_post)
);

CREATE TABLE comment_report (
    id_reporter integer REFERENCES member(id) ON DELETE SET NULL,
    id_comment integer REFERENCES comment(id) ON DELETE CASCADE,
    body text NOT NULL,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_reporter, id_comment)
);

CREATE TABLE topic_report (
    id_reporter integer REFERENCES member(id) ON DELETE SET NULL,
    id_topic integer REFERENCES topic(id) ON DELETE CASCADE,
    body text NOT NULL,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_reporter, id_topic)
);

CREATE TABLE member_report (
    id_reporter integer REFERENCES member(id) ON DELETE SET NULL,
    id_reported integer REFERENCES member(id) ON DELETE CASCADE,
    body text NOT NULL,
    date_time timestamp NOT NULL DEFAULT now(),
    PRIMARY KEY(id_reporter, id_reported),
    CONSTRAINT member_report_ids CHECK (id_reporter <> id_reported)
);