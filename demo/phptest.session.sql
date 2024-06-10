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
DROP TABLE Notes;

--@block
CREATE TABLE Notes (
    id INT AUTO_INCREMENT,
    body TEXT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) 
    REFERENCES Users(id)
    ON DELETE CASCADE
);

-- @block
CREATE TABLE Users (
    id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (email)
);

-- @block
INSERT INTO Users (name, email)
VALUES
('Vito2', 'vit2o@gmail.com');


-- @block
SELECT * FROM Users;

-- @block
INSERT INTO Notes (body, user_id)
VALUES
("PHP issss the best!!!", 3),
("PHPddd", 3),
("is thessq best!!!", 3);

-- @block
SELECT * FROM Notes;

-- @block 
SELECT * FROM Notes WHERE user_id = 1;

-- @block
INSERT INTO Notes (body, user_id)
VALUES

("test!!!", 2);
