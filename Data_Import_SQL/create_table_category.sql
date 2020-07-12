USE youtube_db;

CREATE TABLE category(
    category_id int NOT NULL,
    category_name char(20) NOT NULL,
    primary key (category_id)
);

load data INFILE 'US_category_id_def.csv'
into table category
CHARACTER SET latin1
fields terminated by ','
enclosed by '"'
lines terminated by '\n';

ALTER TABLE detail
ADD FOREIGN KEY (category_id) REFERENCES category(category_id);
