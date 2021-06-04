-----------------------------------------
-- Triggers and UDFs
-----------------------------------------

DROP FUNCTION IF EXISTS update_post_aura CASCADE;
CREATE FUNCTION update_post_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF NEW.upvote AND NOT OLD.upvote THEN
      UPDATE news_post
        SET aura = aura + 2
        WHERE NEW.id_post = news_post.id;
      UPDATE member
        SET aura = aura + 2
        WHERE (SELECT id_owner FROM news_post WHERE NEW.id_post = news_post.id) = member.id;
    ELSIF NOT NEW.upvote AND OLD.upvote THEN
      UPDATE news_post
        SET aura = aura - 2
        WHERE NEW.id_post = news_post.id;
      UPDATE member
        SET aura = aura - 2
        WHERE (SELECT id_owner FROM news_post WHERE NEW.id_post = news_post.id) = member.id;
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS update_post_aura ON post_aura CASCADE;
CREATE TRIGGER update_post_aura
	BEFORE UPDATE ON post_aura
	FOR EACH ROW EXECUTE PROCEDURE update_post_aura();


DROP FUNCTION IF EXISTS insert_post_aura CASCADE;
CREATE FUNCTION insert_post_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF NEW.upvote THEN
      UPDATE news_post
        SET aura = aura + 1
        WHERE NEW.id_post = news_post.id;
      UPDATE member
        SET aura = aura + 1
        WHERE (SELECT id_owner FROM news_post WHERE NEW.id_post = news_post.id) = member.id;
    ELSIF NOT NEW.upvote THEN
      UPDATE news_post
        SET aura = aura - 1
        WHERE NEW.id_post = news_post.id;
      UPDATE member
        SET aura = aura - 1
        WHERE (SELECT id_owner FROM news_post WHERE NEW.id_post = news_post.id) = member.id;
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS insert_post_aura ON post_aura CASCADE;
CREATE TRIGGER insert_post_aura
  BEFORE INSERT ON post_aura
  FOR EACH ROW EXECUTE PROCEDURE insert_post_aura();


DROP FUNCTION IF EXISTS delete_post_aura CASCADE;
CREATE FUNCTION delete_post_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF OLD.upvote THEN
      UPDATE news_post
        SET aura = aura - 1
        WHERE OLD.id_post = news_post.id;
      UPDATE member
        SET aura = aura - 1
        WHERE (SELECT id_owner FROM news_post WHERE OLD.id_post = news_post.id) = member.id;
    ELSIF NOT OLD.upvote THEN
      UPDATE news_post
        SET aura = aura + 1
        WHERE OLD.id_post = news_post.id;
      UPDATE member
        SET aura = aura + 1
        WHERE (SELECT id_owner FROM news_post WHERE OLD.id_post = news_post.id) = member.id;
    END IF;
    RETURN OLD;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS delete_post_aura ON post_aura CASCADE;
CREATE TRIGGER delete_post_aura
    BEFORE DELETE ON post_aura
    FOR EACH ROW EXECUTE PROCEDURE delete_post_aura();


DROP FUNCTION IF EXISTS update_comment_aura CASCADE;
CREATE FUNCTION update_comment_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF NEW.upvote AND NOT OLD.upvote THEN
      UPDATE comment
        SET aura = aura + 2
        WHERE NEW.id_comment = comment.id;
      UPDATE member
        SET aura = aura + 2
        WHERE (SELECT id_owner FROM comment WHERE NEW.id_comment = comment.id) = member.id;
    ELSIF NOT NEW.upvote AND OLD.upvote THEN
      UPDATE comment
        SET aura = aura - 2
        WHERE NEW.id_comment = comment.id;
      UPDATE member
        SET aura = aura - 2
        WHERE (SELECT id_owner FROM comment WHERE NEW.id_comment = comment.id) = member.id;
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS update_comment_aura ON comment_aura CASCADE;
CREATE TRIGGER update_comment_aura
	BEFORE UPDATE ON comment_aura
	FOR EACH ROW EXECUTE PROCEDURE update_comment_aura();


DROP FUNCTION IF EXISTS insert_comment_aura CASCADE;
CREATE FUNCTION insert_comment_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF NEW.upvote THEN
      UPDATE comment
        SET aura = aura + 1
        WHERE NEW.id_comment = comment.id;
      UPDATE member
        SET aura = aura + 1
        WHERE (SELECT id_owner FROM comment WHERE NEW.id_comment = comment.id) = member.id;
    ELSIF NOT NEW.upvote THEN
      UPDATE comment
        SET aura = aura - 1
        WHERE NEW.id_comment = comment.id;
      UPDATE member
        SET aura = aura - 1
        WHERE (SELECT id_owner FROM comment WHERE NEW.id_comment = comment.id) = member.id;
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS insert_comment_aura ON comment_aura CASCADE;
CREATE TRIGGER insert_comment_aura
  BEFORE INSERT ON comment_aura
  FOR EACH ROW EXECUTE PROCEDURE insert_comment_aura();


DROP FUNCTION IF EXISTS delete_comment_aura CASCADE;
CREATE FUNCTION delete_comment_aura() RETURNS TRIGGER AS $$
  BEGIN
    IF OLD.upvote THEN
      UPDATE comment
        SET aura = aura - 1
        WHERE OLD.id_comment = comment.id;
      UPDATE member
        SET aura = aura - 1
        WHERE (SELECT id_owner FROM comment WHERE OLD.id_comment = comment.id) = member.id;
    ELSIF NOT OLD.upvote THEN
      UPDATE comment
        SET aura = aura + 1
        WHERE OLD.id_comment = comment.id;
      UPDATE member
        SET aura = aura + 1
        WHERE (SELECT id_owner FROM comment WHERE OLD.id_comment = comment.id) = member.id;
    END IF;
    RETURN OLD;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS delete_comment_aura ON comment_aura CASCADE;
CREATE TRIGGER delete_comment_aura
  BEFORE DELETE ON comment_aura
  FOR EACH ROW EXECUTE PROCEDURE delete_comment_aura();


DROP FUNCTION IF EXISTS check_date_post CASCADE;
CREATE FUNCTION check_date_post() RETURNS TRIGGER AS $$
  BEGIN
    IF EXISTS (SELECT news_post.date_time FROM comment INNER JOIN news_post
      ON comment.id_post = news_post.id
      WHERE comment.date_time < news_post.date_time)
      THEN
        RAISE EXCEPTION 'A comment can only be posted after the post it refers to.';
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS check_date_post ON comment CASCADE;
CREATE TRIGGER check_date_post
  BEFORE INSERT ON comment
  FOR EACH ROW
  EXECUTE PROCEDURE check_date_post();


DROP FUNCTION IF EXISTS check_date_comment CASCADE;
CREATE FUNCTION check_date_comment() RETURNS TRIGGER AS $$
  BEGIN
    IF EXISTS (SELECT C1.date_time FROM comment C1 INNER JOIN reply
      ON C1.id = reply.id_parent
      INNER JOIN comment C2
      ON C2.id = reply.id_comment
      WHERE C2.date_time < C1.date_time)
      THEN
        RAISE EXCEPTION 'A reply can only be posted after the comment it refers to.';
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS check_date_comment ON comment CASCADE;
CREATE TRIGGER check_date_comment
  BEFORE INSERT ON comment
  FOR EACH ROW
  EXECUTE PROCEDURE check_date_comment();


DROP FUNCTION IF EXISTS create_follow_notification CASCADE;
CREATE FUNCTION create_follow_notification() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO follow_notification (id_notified, id_follower, date_time) VALUES (NEW.id_followed, NEW.id_follower, now());
    RETURN NULL;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS create_follow_notification ON member_follow CASCADE;
CREATE TRIGGER create_follow_notification
  AFTER INSERT ON member_follow
  FOR EACH ROW EXECUTE PROCEDURE create_follow_notification();


DROP FUNCTION IF EXISTS create_comment_notification CASCADE;
CREATE FUNCTION create_comment_notification() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO comment_notification (id_notified, id_comment, date_time) VALUES ((SELECT id_owner FROM news_post WHERE news_post.id=NEW.id_post), NEW.id, now());
    RETURN NULL;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS create_comment_notification ON comment CASCADE;
CREATE TRIGGER create_comment_notification
  AFTER INSERT ON comment
  FOR EACH ROW EXECUTE PROCEDURE create_comment_notification();


DROP FUNCTION IF EXISTS create_reply_notification CASCADE;
CREATE FUNCTION create_reply_notification() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO reply_notification (id_notified, id_reply, date_time) VALUES ((SELECT id_owner FROM comment WHERE comment.id=NEW.id_parent), NEW.id_comment, now());
    RETURN NULL;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS create_reply_notification ON reply CASCADE;
CREATE TRIGGER create_reply_notification
  AFTER INSERT ON reply
  FOR EACH ROW EXECUTE PROCEDURE create_reply_notification();

DROP FUNCTION IF EXISTS auto_post_upvote CASCADE;
CREATE FUNCTION auto_post_upvote() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO post_aura(id_post, id_voter, upvote) VALUES(NEW.id, NEW.id_owner, 'true');
    RETURN NULL;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS auto_post_upvote ON news_post CASCADE;
CREATE TRIGGER auto_post_upvote
  AFTER INSERT ON news_post
  FOR EACH ROW EXECUTE PROCEDURE auto_post_upvote();

DROP FUNCTION IF EXISTS auto_comment_upvote CASCADE;
CREATE FUNCTION auto_comment_upvote() RETURNS TRIGGER AS $$
  BEGIN
    INSERT INTO comment_aura(id_comment, id_voter, upvote) VALUES(NEW.id, NEW.id_owner, 'true');
    RETURN NULL;
  END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS auto_comment_upvote ON comment CASCADE;
CREATE TRIGGER auto_comment_upvote
  AFTER INSERT ON comment
  FOR EACH ROW EXECUTE PROCEDURE auto_comment_upvote();


DROP FUNCTION IF EXISTS search_member CASCADE;
CREATE FUNCTION search_member() RETURNS TRIGGER AS $$
    BEGIN
        IF (TG_OP = 'INSERT') THEN
            NEW.search = (SELECT setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.full_name), 'B'));
        ELSIF (TG_OP = 'UPDATE' AND (NEW.username <> OLD.username OR NEW.full_name <> OLD.full_name)) THEN
            NEW.search = (SELECT setweight(to_tsvector('english', NEW.username), 'A') || setweight(to_tsvector('english', NEW.full_name), 'B'));
        END IF;
    RETURN NEW;
    END;
    $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS search_member ON member CASCADE;
CREATE TRIGGER search_member
    BEFORE INSERT OR UPDATE ON member
    FOR EACH ROW EXECUTE PROCEDURE search_member();


DROP FUNCTION IF EXISTS search_post CASCADE;
CREATE FUNCTION search_post() RETURNS TRIGGER AS $$
    BEGIN
        IF (TG_OP = 'INSERT') THEN
            NEW.search = (SELECT setweight(to_tsvector('english', NEW.title), 'A') || setweight(to_tsvector('english', coalesce(NEW.body, '')), 'B'));
        ELSIF (TG_OP = 'UPDATE' AND (NEW.title <> OLD.title OR NEW.body <> OLD.body)) THEN
            NEW.search = (SELECT setweight(to_tsvector('english', NEW.title), 'A') || setweight(to_tsvector('english', coalesce(NEW.body, '')), 'B'));
    END IF;
    RETURN NEW;
    END;
    $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS search_post ON news_post CASCADE;
CREATE TRIGGER search_post
    BEFORE INSERT OR UPDATE ON news_post
     FOR EACH ROW EXECUTE PROCEDURE search_post();


DROP FUNCTION IF EXISTS search_topic CASCADE;
CREATE FUNCTION search_topic() RETURNS TRIGGER AS $$
    BEGIN
        IF (TG_OP = 'INSERT') THEN
            NEW.search = (SELECT to_tsvector('english', NEW.name));
        ELSIF (TG_OP = 'UPDATE' AND NEW.title <> OLD.title) THEN
            NEW.search = (SELECT to_tsvector('english', NEW.name));
    END IF;
    RETURN NEW;
    END;
    $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS search_topic ON post CASCADE;
CREATE TRIGGER search_topic
    BEFORE INSERT OR UPDATE ON topic
     FOR EACH ROW EXECUTE PROCEDURE search_topic();