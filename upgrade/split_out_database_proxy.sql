BEGIN;

-- Insert nids that need to be proxied into a temporary table
CREATE TABLE dbs_to_proxy (nid BIGINT);
INSERT INTO dbs_to_proxy (nid)
  SELECT nid FROM content_type_library_database
  WHERE field_database_url_url ~ 'http://librweb.laurentian.ca'
    OR field_database_url_url ~ 'https://librweb.laurentian.ca'
;

-- Then strip the proxy from the URLs - both https and http
UPDATE content_type_library_database
  SET field_database_url_url = replace(
    field_database_url_url,
    'http://librweb.laurentian.ca/login?url=',
    ''
  ),
  field_database_description_value = replace(
    field_database_description_value,
    'http://librweb.laurentian.ca/login?url=',
    ''
  )
;
UPDATE content_type_library_database
  SET field_database_url_url = replace(
    field_database_url_url,
    'https://librweb.laurentian.ca/login?url=',
    ''
  ),
  field_database_description_value = replace(
    field_database_description_value,
    'https://librweb.laurentian.ca/login?url=',
    ''
  )

;

-- Then insert or update public.field_data_field_proxied for each nid (pointing at revision_id, naturally)
CREATE VIEW proxy_me AS
SELECT dbp.nid AS nid, MAX(nr.vid) AS vid
    FROM dbs_to_proxy dbp
        INNER JOIN node_revision nr ON dbp.nid = nr.nid
    GROUP BY dbp.nid;

DELETE FROM field_data_field_proxied;
INSERT INTO field_data_field_proxied (entity_type, bundle, deleted, entity_id, revision_id, language, delta, field_proxied_value)
    SELECT 'node', 'library_database', 0, nid, vid, 'und', 0, 1
    FROM proxy_me;

DELETE FROM field_revision_field_proxied;
INSERT INTO field_revision_field_proxied (entity_type, bundle, deleted, entity_id, revision_id, language, delta, field_proxied_value)
    SELECT 'node', 'library_database', 0, nid, vid, 'und', 0, 1
    FROM proxy_me;

UPDATE field_data_field_database_url
  SET field_database_url_url = replace(
    field_database_url_url,
    'http://librweb.laurentian.ca/login?url=',
    ''),
  field_database_url_title = replace(
    field_database_url_title,
    'http://librweb.laurentian.ca/login?url=',
    '')
;

UPDATE field_data_field_database_url
  SET field_database_url_url = replace(
    field_database_url_url,
    'https://librweb.laurentian.ca/login?url=',
    ''),
  field_database_url_title = replace(
    field_database_url_title,
    'https://librweb.laurentian.ca/login?url=',
    '')
;

UPDATE field_revision_field_database_url
  SET field_database_url_url = replace(
    field_database_url_url,
    'http://librweb.laurentian.ca/login?url=',
    ''
  ), bundle = 'library_database',
  field_database_url_title = replace(
    field_database_url_title,
    'http://librweb.laurentian.ca/login?url=',
    '')
;

UPDATE field_revision_field_database_url
  SET field_database_url_url = replace(
    field_database_url_url,
    'https://librweb.laurentian.ca/login?url=',
    ''),
  field_database_url_title = replace(
    field_database_url_title,
    'https://librweb.laurentian.ca/login?url=',
    '')
;

DROP VIEW proxy_me;
DROP TABLE dbs_to_proxy;

COMMIT;
