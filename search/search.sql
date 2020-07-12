SELECT *
FROM 
(SELECT * 
FROM statistic
WHERE views BETWEEN $view_lower AND $view_upper AND
      likes BETWEEN $like_lower AND $like_upper AND
      dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, 
(SELECT * 
FROM basic as b, detail as d 
WHERE b.video_id = d.video_id AND 
      (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%') AND
	  d.category_id = $category) as b 
WHERE b.video_id = s.video_id 
LIMIT 50

SELECT * 
FROM 
(SELECT * 
FROM statistic 
WHERE views BETWEEN $view_lower AND $view_upper AND 
      likes BETWEEN $like_lower AND $like_upper AND 
	  dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, 
(SELECT * 
FROM basic as b, detail as d 
WHERE b.video_id = d.video_id AND 
      (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%' OR d.tags LIKE '%$keyword%') AND
	  d.category_id = $category) as b 
WHERE b.video_id = s.video_id
LIMIT 50