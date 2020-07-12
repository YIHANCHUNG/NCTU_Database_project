create table basic(

    video_id char(11) NOT NULL,

    title text NOT NULL,

    channel_title text NOT NULL,

    publish_time text NOT NULL,

    primary key (video_id)

);


create table detail(

    video_id char(11) NOT NULL,

    category_id int,

    tags text,

    thumbnail_link text,

    description text,

    foreign key (video_id) references basic(video_id)

);



create table statistic(

    video_id char(11) NOT NULL,

    trending_date char(8) NOT NULL,

    views int NOT NULL,

    likes int NOT NULL,

    dislikes int NOT NULL,

    comment_count int NOT NULL,

    primary key (video_id,trending_date),

    foreign key (video_id) references basic(video_id)

);



create table property(

    video_id char(11) NOT NULL,

    comments_disabled boolean,

    ratings_disabled boolean,

    video_error_or_removed boolean,

    foreign key (video_id) references basic(video_id)

);





/* basic; */

insert into basic (video_id,title,channel_title,publish_time)

select DISTINCT db.video_id,db.title,db.channel_title,db.publish_time

from (select video_id,MAX(views) as max_views

    from db

    group by video_id) as sel, db

where db.video_id = sel.video_id AND db.views = sel.max_views;



/* detail; */

insert into detail (video_id,category_id,tags,thumbnail_link,description)

select DISTINCT db.video_id, db.category_id, db.tags, db.thumbnail_link, db.description

from (select video_id,MAX(views) as max_views

    from db

    group by video_id) as sel, db

where db.video_id = sel.video_id AND db.views = sel.max_views;



/* property; */

insert into property(video_id,comments_disabled,ratings_disabled,video_error_or_removed)

select DISTINCT db.video_id,db.comments_disabled,db.ratings_disabled,db.video_error_or_removed

from (select video_id,MAX(views) as max_views

    from db

    group by video_id) as sel, db

where db.video_id = sel.video_id AND db.views = sel.max_views;



/* statistic */

insert into statistic (video_id,trending_date,views,likes,dislikes,comment_count)

select video_id, trending_date,

    MAX(views) as vies, MAX(likes) as likes,

    MAX(dislikes) as dislikes, MAX(comment_count) as comment_count

from db

group by video_id,trending_date;

