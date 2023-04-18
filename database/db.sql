PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS DEPARTMENT;
DROP TABLE IF EXISTS TICKET;
DROP TABLE IF EXISTS TICKET_ANSWER;
DROP TABLE IF EXISTS TICKET_HASHTAG;
DROP TABLE IF EXISTS FAQ;

CREATE TABLE USER (
    user_id INT NOT NULL,
    department_id INT,
    name VARCHAR(255) NOT NULL,
    username VARCHAR(8) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    type VARCHAR(255) NOT NULL CHECK (type = 'agent' OR type = 'admin' OR type = 'client'),
    gender VARCHAR(255) DEFAULT 'None' CHECK(gender = 'Male' or gender = 'Female' or gender = 'Other' or gender = 'None'),
    FOREIGN KEY(department_id) REFERENCES DEPARTMENT(department_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (user_id)
);

CREATE TABLE DEPARTMENT (
    department_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (department_id)
);

CREATE TABLE TICKET (
    ticket_id INT NOT NULL,
    user_id INT NOT NULL,
    assigned_agent INT CHECK (assigned_agent <> user_id),
    title VARCHAR(255) NOT NULL,
    description VARCHAR(600) NOT NULL,
    status VARCHAR(255) NOT NULL,
    priority VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    FOREIGN KEY(user_id) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(assigned_agent) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (ticket_id)
);

CREATE TABLE TICKET_ANSWER (
    ticket_answer_id INT NOT NULL,
    ticket_id INT NOT NULL,
    answer VARCHAR(1000) NOT NULL,
    date DATE NOT NULL,
    answer_id INT NOT NULL,
    FOREIGN KEY(ticket_id) REFERENCES TICKET(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY(answer_id) REFERENCES USER(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (ticket_answer_id)
);

CREATE TABLE TICKET_HASHTAG (
    hashtag_id INT NOT NULL,
    ticket_id INT NOT NULL,
    hashtag VARCHAR(255) NOT NULL,
    FOREIGN KEY(ticket_id) REFERENCES TICKET(ticket_id) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (hashtag)
);

CREATE TABLE FAQ (
    faq_id INT NOT NULL,
    question VARCHAR(255) NOT NULL,
    answer VARCHAR(1000) NOT NULL,
    PRIMARY KEY (faq_id)
);
