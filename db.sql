CREATE TABLE todos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    completed TINYINT(1) DEFAULT 0
);


INSERT INTO todos (task, completed) VALUES ('Buy groceries', 0);
INSERT INTO todos (task, completed) VALUES ('Finish homework', 0);
INSERT INTO todos (task, completed) VALUES ('Go for a run', 1);
