-- @block

CREATE TABLE Users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    bio TEXT,
    country VARCHAR(2)
);

-- @block
INSERT INTO Users (email, bio, country)
VALUES 
('hi@world.com', 'i love strangers!', 'BR'),
('hey@world.com', 'i love strangers!', 'US'),
('yes@world.com', 'i love strangers!', 'CA');


-- @block
SELECT * FROM Users;

-- @block
CREATE INDEX email_index ON Users(email);

-- @block
CREATE TABLE Rooms(
    id INT AUTO_INCREMENT,
    street VARCHAR(255),
    owner_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (owner_id) REFERENCES Users(id)
);

-- @block
INSERT INTO Rooms (owner_id, street)
VALUES
(1, 'san diego sailboat'),
(1, 'nantucket cottage'),
(1, 'vail cabin'),
(1, 'sf cardboard box');

-- @block
SELECT 
    Users.id AS user_id,
    Rooms.id AS rooms_id,
    email,
    street
FROM Users
LEFT JOIN Rooms
ON Rooms.owner_id = Users.id;