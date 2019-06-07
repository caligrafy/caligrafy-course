DROP TABLE IF EXISTS projects;

CREATE TABLE projects (
    id int(15) NOT NULL AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    category varchar(150) NOT NULL,
    content longtext DEFAULT NULL,
    short_description mediumtext DEFAULT NULL,
    url mediumtext DEFAULT NULL,
    image_url longtext DEFAULT NULL,
    created_at datetime NOT NULL DEFAULT now(),
    modified_at datetime NOT NULL DEFAULT now() ON UPDATE now(),
    PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;