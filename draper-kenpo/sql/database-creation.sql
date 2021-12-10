CREATE DATABASE IF NOT EXISTS draper_kenpo;
CREATE TABLE IF NOT EXISTS techniques(id INT AUTO_INCREMENT PRIMARY KEY, belt VARCHAR(10), catagory VARCHAR(30), name VARCHAR(30), description TEXT);
/*
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Stance', 'Front Horse');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Stance', 'Right Neutral Bow');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Stance', 'Left Neutral Bow');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Stance', 'Forward Bow');

INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Block', 'Outward Block');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Block', 'Inward Block');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Block', 'Rising Block');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Block', 'Down and Outward');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Block', 'Down and Inward');

INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Kick', 'Front Snap');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Kick', 'Wheel');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Kick', 'Hook');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Kick', 'Side Thrust');
INSERT INTO techniques(belt, catagory, name) VALUES('Orange', 'Kick', 'Round House');
*/

CREATE TABLE IF NOT EXISTS instructors(id INT AUTO_INCREMENT PRIMARY KEY, name VAR_CHAR(30), image_path VAR_CHAR(30), biography TEXT); /*Issue with VAR_CHAR(30)?*/
