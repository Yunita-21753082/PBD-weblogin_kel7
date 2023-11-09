    CREATE DATABASE php_login_management;

    CREATE DATABASE php_login_management_test;

    create table users(
        id varchar(255) primary key,
        name varchar(255) not null,
        password varchar(255) not null
    ) ENGINE InnoDB;


    create table sessions
    (
        id varchar(255) primary key,
        user_id varchar(255) not null
    ) ENGINE InnoDB;

    ALTER TABLE sessions
    ADD CONSTRAINT  fk_sessions_user FOREIGN KEY (user_id)
    REFERENCES users(id);



