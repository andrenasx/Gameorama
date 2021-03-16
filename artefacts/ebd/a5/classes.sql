DROP TABLE IF EXISTS member CASCADE;
DROP TABLE IF EXISTS memberFollow CASCADE;
DROP TABLE IF EXISTS administrator CASCADE;
DROP TABLE IF EXISTS newsPost CASCADE;
DROP TABLE IF EXISTS topic CASCADE;
DROP TABLE IF EXISTS topicFollow CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS reply CASCADE;
DROP TABLE IF EXISTS postImages CASCADE;
DROP TABLE IF EXISTS postAura CASCADE;
DROP TABLE IF EXISTS commentAura CASCADE;
DROP TABLE IF EXISTS followNotification CASCADE;
DROP TABLE IF EXISTS commentNotification CASCADE;
DROP TABLE IF EXISTS postReport CASCADE;
DROP TABLE IF EXISTS topicReport CASCADE;
DROP TABLE IF EXISTS memberReport CASCADE;


CREATE TABLE member (
    id integer PRIMARY KEY,
    username text NOT NULL UNIQUE,
    fullName text NOT NULL,
    email text NOT NULL UNIQUE,
    password text NOT NULL,
    bio text,
    profileImage blob,
    bannerImage blob,
    aura integer DEFAULT 0 NOT NULL
);

CREATE TABLE memberFollow (
    idMemberFollower integer REFERENCES member(id) ON DELETE CASCADE,
    idMemberFollows integer REFERENCES member(id) ON DELETE CASCADE,
    PRIMARY KEY(idMemberFollower, idMemberFollows)
);

CREATE TABLE administrator (
    id integer PRIMARY KEY REFERENCES member(id)
);

CREATE TABLE newsPost (
    id integer PRIMARY KEY,
    title text NOT NULL,
    body text,
    postDate timestamp NOT NULL,
    aura integer DEFAULT 0 NOT NULL,
    owner integer NOT NULL REFERENCES member(id) ON DELETE CASCADE,
);

CREATE TABLE topic (
    id integer PRIMARY KEY,
    name text NOT NULL UNQUE
);

CREATE TABLE topicFollow (
    idTopic integer REFERENCES topic(id) ON DELETE CASCADE,
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    PRIMARY KEY(idTopic, idMember)
);

CREATE TABLE comment (
    id integer PRIMARY KEY,
    body text NOT NULL,
    commentDate timestamp NOT NULL,
    aura integer DEFAULT 0 NOT NULL,
    idPost integer NOT NULL REFERENCES newsPost(id) ON DELETE CASCADE
);

CREATE TABLE reply (
    idComment integer REFERENCES comment(id) ON DELETE CASCADE,
    idParent integer REFERENCES comment(id) ON DELETE CASCADE,
    PRIMARY KEY(idComment, idParent)
);

CREATE TABLE postImages (
    idPost integer REFERENCES newsPost(id) ON DELETE CASCADE,
    file blob,
    PRIMARY KEY(idPost, file)
);

CREATE TABLE postAura (
    idPost integer REFERENCES newsPost(id) ON DELETE CASCADE,
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    upvote boolean NOT NULL,
    PRIMARY KEY(idPost, idMember)
);

CREATE TABLE commentAura (
    idComment integer REFERENCES comment(id) ON DELETE CASCADE,
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    upvote boolean NOT NULL,
    PRIMARY KEY(idComment, idMember)
);

CREATE TABLE followNotification (
    idFollower integer REFERENCES member(id) ON DELETE CASCADE,
    idFollowed integer REFERENCES member(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idFollower, idFollowed)
);

CREATE TABLE commentNotification (
    idComment integer REFERENCES comment(id) ON DELETE CASCADE,
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idComment, idMember)
);

CREATE TABLE postReport (
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    idPost integer REFERENCES newsPost(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idMember, idPost)
);

CREATE TABLE commentReport (
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    idComment integer REFERENCES comment(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idMember, idComment)
);

CREATE TABLE topicReport (
    idMember integer REFERENCES member(id) ON DELETE CASCADE,
    idTopic integer REFERENCES topic(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idMember, idTopic)
);

CREATE TABLE memberReport (
    idReporter integer REFERENCES member(id) ON DELETE CASCADE,
    idReported integer REFERENCES member(id) ON DELETE CASCADE,
    body text NOT NULL,
    PRIMARY KEY(idReporter, idReported)
);
