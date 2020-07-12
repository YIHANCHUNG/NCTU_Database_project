CREATE TABLE category(
    category_id NOT NULL,
    category_name NOT NULL,
    primary key (category_id)
);

load data INFILE 'C:\xampp\mysql\data\youtube_db\US_category_id_def.csv'
into table category
CHARACTER SET latin1
fields terminated by ','
enclosed by '"'
lines terminated by '\n';