-- @block
INSERT INTO Posts (title)
VALUES
('first blog post'),
('second blog post')
;

-- @block
SELECT id AS user_id, title FROM Posts WHERE id = 1;