
--update
UPDATE basic, detail, statistic, property 
SET basic.title='$title', basic.channel_title='$channel_title', basic.publish_time='$publish_time', 
    detail.category_id=$category_id, detail.tags='$tags', detail.thumbnail_link='$thumbnail_link', detail.description='$description', 
	property.comments_disabled=$comments_disabled, property.ratings_disabled=$ratings_disabled, property.video_error_or_removed=$video_error_or_removed, 
	statistic.trending_date='$trending_date', statistic.views=$views, statistic.likes=$likes, statistic.dislikes=$dislikes, statistic.comment_count=$comment_count
WHERE basic.video_id = detail.video_id AND basic.video_id = statistic.video_id AND basic.video_id = property.video_id AND basic.video_id = '$video_id'

--insert
INSERT INTO basic (video_id, title, channel_title, publish_time)
VALUES ('$video_id', '$title', '$channel_title', '$publish_time')

INSERT INTO detail (video_id, category_id, tags, thumbnail_link, description)
VALUES ('$video_id', $category_id, '$tags', '$thumbnail_link', '$description')

INSERT INTO property (video_id, comments_disabled, ratings_disabled, video_error_or_removed)
VALUES ('$video_id', $comments_disabled, $ratings_disabled, $video_error_or_removed)

INSERT INTO statistic (video_id, trending_date, views, likes, dislikes, comment_count)
VALUES ('$video_id', '$trending_date', $views, $likes, $dislikes, $comment_count)

--delete
DELETE 
FROM basic
WHERE video_id = '$video_id'

DELETE 
FROM detail 
WHERE video_id = '$video_id'

DELETE 
FROM property 
WHERE video_id = '$video_id'

DELETE 
FROM statistic
WHERE video_id = '$video_id'