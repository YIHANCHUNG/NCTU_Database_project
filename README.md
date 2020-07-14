# NCTU_Database_project

Folder explaination
NCTU_Database_project/Data_Import_SQL/ :query that create table...
NCTU_Database_project/query : Select, Update...basic query feature. ./query : more Exception Handling
NCTU_Database_project/UI : whole final project


How to make the website work on you computer?

1.use XAMPP and activate Apache, MySQL

2.put USvideos.csv and US_category_id_def.csv to C:\xampp\mysql\data\youtube_db

3.import 1.csv_content_import.sql 2.table_split.sql 3.create_table_category.sql
  in NCTU_Database_project/Data_Import_SQL/ to PHPmyadmin

4.copy the folder 'UI'(NCTU_Database_project/UI/) to C:\xampp\htdocs

5.type 'localhost/UI' in your browser

6.done and it should be work !!! in theory.


How to use ngrok?

1.open ngrok.exe in NCTU_Database_project/UI/

2.type 'ngrok.exe http 80'

3.get URL and concatenate with /UI
