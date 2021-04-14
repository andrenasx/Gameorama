-----------------------------------------
-- Transactions
-----------------------------------------

BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL REPEATABLE READ

    INSERT INTO comment (body, id_member, id_post) VALUES ($body, $id_member, $id_post);
    INSERT INTO reply (id_comment, id_parent) VALUES (currval('comment_id_seq'), $id_parent);

COMMIT;
