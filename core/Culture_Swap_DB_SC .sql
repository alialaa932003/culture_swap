CREATE DATABASE Culture_Swap ;


Create table Service (
Id integer primary key auto_increment ,
Service_name  varchar(30) 
) ;


Create table media_types (
Code integer primary key auto_increment ,
media_name  varchar(10) 
) ;

Create table interaction(
code integer primary key auto_increment ,
action_type varchar(50) 
) ;

Create table notification (
Id integer primary key auto_increment ,
Sender_id integer ,
reciever_id integer ,
content varchar(100) ,
action integer, FOREIGN KEY (action) REFERENCES interaction(code) 
) ;


Create table user_type(
code integer primary key auto_increment ,
usertype varchar(20) 
) ;


Create table user_info (
Id integer primary key auto_increment ,
first_name varchar (20) not null ,
last_name varchar (20) not null,
email varchar (50) not null unique ,
type integer , FOREIGN KEY (type) REFERENCES user_type (code) ,
phone_num varchar(20) not null unique ,
profile_picture blob not null ,
country varchar (15) not null 
) ;

Create table user_login_info (
User_id integer , FOREIGN KEY (User_id) REFERENCES user_info (id) ,
username varchar(50) not null unique  ,
password varchar(20) not null
) ;



Create table host_profile (
Id integer primary key auto_increment ,
User_id integer not null , FOREIGN KEY (user_id) REFERENCES user_info (id) ,
Status varchar (15) not null,
descripition varchar (500) not null ,
popular_rate integer not null , 
num_of_travellers  integer not null ,
host_location varchar (100) not null 
) ;

Create table host_needs (
Host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
Need_id integer not null , FOREIGN KEY (Need_id) REFERENCES service  (id) 
);

Create table traveller_profile (
Id integer primary key auto_increment ,
User_id integer not null , FOREIGN KEY (user_id) REFERENCES user_info (id) 
);

Create table traveller_service (
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
service_id integer not null , FOREIGN KEY (service_id) REFERENCES service  (id) 
);

Create table host_traveller (
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) 
);


Create table traveller_friend (
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
friend_id integer not null , FOREIGN KEY (friend_id) REFERENCES traveller_profile  (id)
);

Create table reservation (
Id integer primary key auto_increment ,
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
Status varchar (15) not null,
Start_date DATETIME not null ,
end_date  DATETIME not null 
);

Create table event_info (
Id integer primary key auto_increment ,
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
event_name varchar (25) not null,
event_location varchar (100) not null ,
Start_date DATETIME not null ,
end_date  DATETIME not null 
);


Create table traveller_event (
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
event_id integer not null , FOREIGN KEY (event_id) REFERENCES event_info(id) 
);

Create table host_profile_media (
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
media_code integer, FOREIGN KEY (media_code) REFERENCES media_types (code) ,
media longblob not null 
);


Create table traveller_profile_media (
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
media_code integer, FOREIGN KEY (media_code) REFERENCES media_types (code) ,
media longblob not null 
);

Create table event_media (
event_id integer not null , FOREIGN KEY (event_id) REFERENCES event_info (id) ,
media_code integer, FOREIGN KEY (media_code) REFERENCES media_types (code) ,
media longblob not null 
);

Create table host_review (
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
reviewer_id integer not null , FOREIGN KEY (reviewer_id) REFERENCES traveller_profile  (id) ,
review varchar (500) not null
);


Create table traveller_fav_hosts(
traveller_id integer not null , FOREIGN KEY (traveller_id) REFERENCES traveller_profile  (id) ,
fav_host_id integer not null 
);

Create table post_info(
Id integer primary key auto_increment ,
host_id integer not null , FOREIGN KEY (host_id) REFERENCES host_profile  (id) ,
content varchar (1000) not null ,
engagement integer not null
);

Create table post_media(
post_id integer not null , FOREIGN KEY (post_id) REFERENCES post_info (id) ,
media_code integer, FOREIGN KEY (media_code) REFERENCES media_types (code) ,
media longblob not null 
);


Create table comment (
Id integer primary key auto_increment ,
post_id integer not null , FOREIGN KEY (post_id) REFERENCES post_info (id) ,
user_id integer not null , FOREIGN KEY (user_id) REFERENCES user_info (id) ,
content varchar (500) not null ,
engagement integer not null
);


 Create table raply (
Id integer primary key auto_increment ,
comment_id integer not null , FOREIGN KEY (comment_id) REFERENCES comment(id) ,
user_id integer not null , FOREIGN KEY (user_id) REFERENCES user_info (id) ,
content varchar (500) not null ,
engagement integer not null
);
