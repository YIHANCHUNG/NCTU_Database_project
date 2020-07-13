CREATE TABLE category(
    category_id int NOT NULL,
    category_name text NOT NULL,
    primary key (category_id)
);

load data INFILE 'US_category_id_def.csv'
into table category
CHARACTER SET latin1
fields terminated by ','
enclosed by '"'
lines terminated by '\n';

alter table detail
add foreign key (category_id) references category(category_id);
