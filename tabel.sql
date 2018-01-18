CREATE TABLE userlog(
user_id int(5) NOT NULL AUTO_INCREMENT,
fname varchar(30) NOT NULL,
lname varchar(30) NOT NULL,
username varchar(50) NOT NULL,
email varchar(50) NOT NULL,
password varchar(30) NOT NULL,
pdate date NOT NULL,
gender varchar(30) NOT NULL,
service varchar(30) NOT NULL,
marriage varchar(30) NOT NULL,
PRIMARY KEY(user_id)
);

CREATE TABLE income(
user_id int(5) NOT NULL AUTO_INCREMENT,
month varchar(30) NOT NULL,
amount varchar(30) NOT NULL,
username varchar(40) NOT NULL,
bonous varchar(30) ,
health varchar(30) ,
transport varchar(30) ,
other varchar(30) ,
PRIMARY KEY(user_id)
);


CREATE TABLE expence(
user_id int(5) NOT NULL AUTO_INCREMENT,
month varchar(30) NOT NULL,
houserent varchar(30),
bazar varchar(40) ,
education varchar(30),
health varchar(30),
other1 varchar(30),
PRIMARY KEY(user_id)
);
