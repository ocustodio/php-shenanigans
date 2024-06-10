-- @block
INSERT INTO Posts (title)
VALUES
('first blog post'),
('second blog post')
;



-- @block
SELECT * FROM Posts WHERE id = 1 OR id = 2;

-- @block
CREATE TABLE Users (
    id INT AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    admin TINYINT(2) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

--@block
INSERT INTO Users (username, admin)
VALUES 
('John Doe', 1),
('Jona Doe', 0),
('Jones Doe', 1);

--@block
SELECT * FROM Users;