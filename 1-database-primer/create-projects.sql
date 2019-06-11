/* If you want to do a comment in MySQL
*/

DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS users;


CREATE TABLE users (
    id int(15) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    PRIMARY KEY(id)
    
    
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE projects (
    id int(15) NOT NULL AUTO_INCREMENT,
    title varchar(150) DEFAULT NULL,
    short_description varchar(250) DEFAULT NULL,
    content longtext DEFAULT NULL,
    image_url varchar(200) DEFAULT NULL,
    created_at timestamp NOT NULL DEFAULT now(),
    modified_at timestamp NOT NULL DEFAULT now() ON UPDATE now(),
    users_id int(15) NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE = InnoDB DEFAULT CHARSET = utf8;


INSERT INTO users(name) VALUES ('Dory');
INSERT INTO projects (title, short_description, users_id) VALUES ('First project', 'this is the first project', 1);