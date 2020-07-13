select b.video_id, b.title, b.channel_title, d.thumbnail_link
from basic as b, detail as d
where b.video_id = d.video_id /* and d.category_id = x or d.category_id = y , (optional)*/
order by rand()
limit 1;