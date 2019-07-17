USE RENTIT_DATABASE;


select * from information_schema.columns
where table_schema = 'RENTIT_DATABASE'
order by table_name,ordinal_position;

