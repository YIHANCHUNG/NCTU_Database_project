/*put USvideos.csv to C:\xampp\mysql\data\youtube_db*/
CREATE DATABASE youtube_db;

USE youtube_db;

create table db(

    video_id char(11) NOT NULL,

    trending_date char(8) NOT NULL,

    title text NOT NULL,

    channel_title text NOT NULL,

    category_id int NOT NULL,

    publish_time text NOT NULL,

    tags text,

    views int NOT NULL,

    likes int NOT NULL,

    dislikes int NOT NULL,

    comment_count int NOT NULL,

    thumbnail_link text,

    comments_disabled boolean NOT NULL,

    ratings_disabled boolean NOT NULL,

    video_error_or_removed boolean NOT NULL,

    description text

);



load data INFILE 'USvideos.csv'

into table db

CHARACTER SET latin1

fields terminated by ','

enclosed by '"'

lines terminated by '\n'

ignore 1 lines;
