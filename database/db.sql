PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS DEPARTMENT;
DROP TABLE IF EXISTS TICKET;
DROP TABLE IF EXISTS TICKET_CHANGES;
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
    type VARCHAR(10) NOT NULL DEFAULT 'Client' CHECK (type = 'Agent' OR type = 'Admin' OR type = 'Client'),
    gender VARCHAR(10) DEFAULT 'None' CHECK(gender = 'Male' or gender = 'Female' or gender = 'Other' or gender = 'None'),
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
    status VARCHAR(10) NOT NULL DEFAULT 'Open' CHECK (status = 'Open' OR status = 'Assigned' OR status = 'Closed'),
    priority VARCHAR(10) NOT NULL DEFAULT 'Low' CHECK (priority = 'Low' OR priority = 'Medium' OR priority = 'High'),
    date DATE NOT NULL,
    hashtag VARCHAR(255),
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

CREATE TABLE TICKET_CHANGES(
    ticket_changes_id INTEGER PRIMARY KEY AUTOINCREMENT,
    ticket_id INT NOT NULL,
    user_id INT NOT NULL,
    date DATE NOT NULL,
    type VARCHAR(255) NOT NULL,
    FOREIGN KEY(ticket_id) REFERENCES TICKET(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(user_id) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE
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

INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'Jane Doe', 'janedoe1', 'janedoe@gmail.com', '12', 'Agent', 'Female');
INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'John Smith', 'johnsmith1', 'johnsmith@gmail.com', '13', 'Agent', 'Male');
INSERT INTO USER (department_id, name, username, email, password, type, gender) VALUES (1, 'Joe Bloggs', 'joebloggs1', 'joebloggs@gmail.com', '14', 'Agent', 'Male');

INSERT INTO TICKET(user_id, assigned_agent, department_id, title, description, status, priority, date) VALUES (1, 2, 6, 'Broken PC', 'Hi! My PC is broken and I do not know what to do. Could anyone help me?', 'Assigned', 'Low', '2023-04-23');
INSERT INTO TICKET(user_id, department_id, title, description, status, priority, date) VALUES (2, 1, 'Data does not match', 'Good morning, I was looking through the sheets the company gave me and the numbers on those does not match the actual income.', 'Open', 'High', '2023-04-23');