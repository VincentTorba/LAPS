DROP DATABASE IF EXISTS db_laps;
CREATE DATABASE db_laps;
USE db_laps;
CREATE TABLE tbl_users(
	uname varchar(255),
	pwd varchar(1024),
	qid INT
);


CREATE TABLE tbl_scores(
	uname varchar(255),
	qid INT,
	score INT
);

INSERT INTO tbl_users (uname, pwd, qid) VALUES ('rocco', 'hello', '1');
INSERT INTO tbl_users (uname, pwd, qid) VALUES ('vinny', 'hello2', '2');
INSERT INTO tbl_scores (uname, qid, score) VALUES ('rocco', '1', '100');
