PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS DEPARTMENT;
DROP TABLE IF EXISTS TICKET;
DROP TABLE IF EXISTS TICKET_ANSWER;
DROP TABLE IF EXISTS TICKET_HASHTAG;
DROP TABLE IF EXISTS FAQ;

CREATE TABLE USER (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    department_id INT,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(8) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(10) NOT NULL DEFAULT 'client' CHECK (type = 'agent' OR type = 'admin' OR type = 'client'),
    gender VARCHAR(10) DEFAULT 'none' CHECK(gender = 'male' or gender = 'female' or gender = 'other' or gender = 'none'),
    FOREIGN KEY(department_id) REFERENCES DEPARTMENT(department_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE DEPARTMENT (
    department_id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE TICKET (
    ticket_id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INT NOT NULL,
    assigned_agent INT CHECK (assigned_agent <> user_id),
    department_id INT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    status VARCHAR(10) NOT NULL DEFAULT 'open' CHECK (status = 'open' OR status = 'assigned' OR status = 'closed'),
    priority VARCHAR(10) NOT NULL DEFAULT 'low' CHECK (priority = 'low' OR priority = 'medium' OR priority = 'high'),
    date DATE NOT NULL,
    FOREIGN KEY(user_id) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(department_id) REFERENCES DEPARTMENT(department_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(assigned_agent) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE TICKET_ANSWER (
    ticket_answer_id INTEGER PRIMARY KEY AUTOINCREMENT,
    ticket_id INT NOT NULL,
    answer VARCHAR(1000) NOT NULL,
    date DATE NOT NULL,
    answer_id INT NOT NULL,
    FOREIGN KEY(ticket_id) REFERENCES TICKET(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(answer_id) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE TICKET_HASHTAG (
    hashtag_id INTEGER PRIMARY KEY AUTOINCREMENT,
    ticket_id INT NOT NULL,
    hashtag VARCHAR(255) NOT NULL,
    FOREIGN KEY(ticket_id) REFERENCES TICKET(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE FAQ (
    faq_id INTEGER PRIMARY KEY AUTOINCREMENT,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(1000) NOT NULL
);

INSERT INTO DEPARTMENT (name) VALUES ('Accounting');
INSERT INTO DEPARTMENT (name) VALUES ('Human Resources');
INSERT INTO DEPARTMENT (name) VALUES ('Management');
INSERT INTO DEPARTMENT (name) VALUES ('Sales');
INSERT INTO DEPARTMENT (name) VALUES ('Marketing');
INSERT INTO DEPARTMENT (name) VALUES ('IT Support');

INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'Jane Doe', 'janedoe1', 'janedoe@gmail.com', '12', 'agent', 'female');
INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'John Smith', 'johnsmith1', 'johnsmith@gmail.com', '13', 'agent', 'male');
INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'Joe Bloggs', 'joebloggs1', 'joebloggs@gmail.com', '14', 'agent', 'male');

INSERT INTO TICKET(user_id, assigned_agent, department_id, title, description, status, priority, date) VALUES (1, 2, 6, 'Broken PC', 'Hi! My PC is broken and I do not know what to do. Could anyone help me?', 'assigned', 'low', '2023-04-23');
INSERT INTO TICKET(user_id, department_id, title, description, status, priority, date) VALUES (2, 1, 'Data does not match', 'Good morning, I was looking through the sheets the company gave me and the numbers on those does not match the actual income.', 'open', 'high', '2023-04-23');