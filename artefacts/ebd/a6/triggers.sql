DROP FUNCTION IF EXISTS update_post_aura;
CREATE FUNCTION update_post_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF NEW.upvote AND NOT OLD.upvote THEN
        UPDATE news_post
          SET aura = aura + 2
          WHERE NEW.id_post = news_post.id;
        UPDATE member
          SET aura = aura + 2
          WHERE OLD.id_voter = member.id;
      ELSIF NOT NEW.upvote AND OLD.upvote THEN
        UPDATE news_post
          SET aura = aura - 2
          WHERE NEW.message_id = news_post.id;
        UPDATE member
          SET aura = aura - 2
          WHERE OLD.id_voter = member.id;
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS update_post_aura;
CREATE TRIGGER update_post_aura
	BEFORE UPDATE ON post_aura
	FOR EACH ROW EXECUTE PROCEDURE update_post_aura();

CREATE FUNCTION insert_post_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF NEW.upvote THEN
        UPDATE news_post
          SET aura = aura + 1
          WHERE NEW.id_post = news_post.id;
          
        UPDATE member
          SET aura = aura + 1
          WHERE OLD.id_voter = member.id;
      ELSIF NOT NEW.upvote THEN
        UPDATE news_post
          SET aura = aura - 1
          WHERE NEW.id_post = news_post.id;
          
        UPDATE member
          SET aura = aura - 1
          WHERE OLD.id_voter = member.id;
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER insert_post_aura
    BEFORE INSERT ON post_aura
    FOR EACH ROW EXECUTE PROCEDURE insert_post_aura();


CREATE FUNCTION delete_post_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF OLD.upvote THEN
        UPDATE news_post
          SET aura = aura - 1
          WHERE OLD.id_post = news_post.id;
          
        UPDATE member
          SET aura = aura - 1
          WHERE OLD.id_voter = member.id;
      ELSIF NOT OLD.upvote THEN
        UPDATE news_post
          SET aura = aura + 1
          WHERE OLD.id_post = news_post.id;
        
        UPDATE member
          SET aura = aura + 1
          WHERE OLD.id_voter = member.id;
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER delete_post_aura
    BEFORE DELETE ON post_aura
    FOR EACH ROW EXECUTE PROCEDURE delete_post_aura();






CREATE FUNCTION update_comment_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF NEW.upvote AND NOT OLD.upvote THEN
        UPDATE comment
          SET aura = aura + 2
          WHERE NEW.id_comment = comment.id;
          
        UPDATE member
          SET aura = aura + 2
          WHERE OLD.id_voter = member.id;
      ELSIF NOT NEW.upvote AND OLD.upvote THEN
        UPDATE comment
          SET aura = aura - 2
          WHERE NEW.message_id = comment.id;
          
        UPDATE member
          SET aura = aura - 2
          WHERE OLD.id_voter = member.id;
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER update_comment_aura
	BEFORE UPDATE ON comment_aura
	FOR EACH ROW EXECUTE PROCEDURE update_comment_aura();

CREATE FUNCTION insert_comment_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF NEW.upvote THEN
        UPDATE comment
          SET aura = aura + 1
          WHERE NEW.id_comment = comment.id;
         
        UPDATE member
          SET aura = aura + 1
          WHERE OLD.id_voter = member.id;
      ELSIF NOT NEW.upvote THEN
        UPDATE comment
          SET aura = aura - 1
          WHERE NEW.id_comment = comment.id;
        AND
        UPDATE member
          SET aura = aura - 1
          WHERE OLD.id_voter = member.id;
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER insert_comment_aura
    BEFORE INSERT ON comment_aura
    FOR EACH ROW EXECUTE PROCEDURE insert_comment_aura();


CREATE FUNCTION delete_comment_aura() RETURNS TRIGGER AS $$
    BEGIN
      IF OLD.upvote THEN
        UPDATE comment
          SET aura = aura - 1
          WHERE OLD.id_comment = comment.id;
        
        UPDATE member
          SET aura = aura - 1
          WHERE OLD.id_voter = member.id;
        
      ELSIF NOT OLD.upvote THEN
        UPDATE comment
          SET aura = aura + 1
          WHERE OLD.id_comment = comment.id;
        
        UPDATE member
          SET aura = aura + 1
          WHERE OLD.id_voter = member.id;

      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER delete_comment_aura
    BEFORE DELETE ON comment_aura
    FOR EACH ROW EXECUTE PROCEDURE delete_comment_aura();




CREATE FUNCTION check_topics() RETURNS TRIGGER AS $$
    DECLARE num_topics SMALLINT;
    DECLARE current RECORD;
    BEGIN
        IF TG_OP = 'INSERT' THEN
          current = NEW;
        ELSE
          current = OLD;
        END IF;
        SELECT INTO num_topics count(*)
        FROM post_topic
        WHERE current.id_post = post_topic.id_post;
      IF num_topics > 10 THEN
        RAISE EXCEPTION 'A post can only have a maximum of 10 topics';
      ELSIF num_topics < 1 THEN
        RAISE EXCEPTION 'A post must have at least 1 topic';
      END IF;
      RETURN NEW;
    END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER check_topics
    AFTER INSERT OR DELETE ON post_topic
    FOR EACH ROW EXECUTE PROCEDURE check_topics();


CREATE FUNCTION check_date_post() RETURNS TRIGGER AS $$
  BEGIN
    IF EXISTS (SELECT date_time FROM comment INNER JOIN news_post 
      ON comment.id_post = news_post.id
      WHERE comment.date_time < news_post.date_time)
      THEN
        RAISE EXCEPTION 'A comment can only be posted afer the post it refers to.';
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER check_date_post
  BEFORE INSERT ON comment
  FOR EACH ROW
  EXECUTE PROCEDURE check_date_post();


CREATE FUNCTION check_date_comment() RETURNS TRIGGER AS $$
  BEGIN
    IF EXISTS (SELECT date_time FROM comment C1 INNER JOIN reply 
      ON C1.id = reply.id_parent
      INNER JOIN comment C2 
      ON C2.id = reply.id_comment
      WHERE C2.date_time < C1.date_time)
      THEN
        RAISE EXCEPTION 'A reply can only be posted afer the comment it refers to.';
    END IF;
    RETURN NEW;
  END;
  $$ LANGUAGE plpgsql;

CREATE TRIGGER check_date_comment
  BEFORE INSERT ON comment
  FOR EACH ROW
  EXECUTE PROCEDURE check_date_comment();



