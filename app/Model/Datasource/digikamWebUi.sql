-- SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `users_available_tags`;
DROP TABLE IF EXISTS `users_available_albums`;
DROP TABLE IF EXISTS `users_forbidden_tags`;
DROP TABLE IF EXISTS `users_forbidden_albums`;


DROP TABLE IF EXISTS `users`;
-- SET FOREIGN_KEY_CHECKS = 1;

-- sqlite

-- alter table users add rating boolean DEFAULT false, tagging boolean DEFAULT false,

create table if not exists users (
  `id` integer PRIMARY KEY ,
  username varchar(255) not null,
  password varchar(255) ,
  rating boolean DEFAULT false,
  tagging boolean DEFAULT false,
  `created` datetime DEFAULT NULL
);

create table if not exists users_available_tags (
  `id` integer PRIMARY KEY ,
  `user_id` integer NOT NULL ,
  `tag_id` integer NOT NULL ,
  `created` datetime DEFAULT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

create table if not exists users_available_albums (
  `id` integer PRIMARY KEY ,
  `user_id` integer NOT NULL ,
  `album_id` integer NOT NULL ,
  `created` datetime DEFAULT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

create table if not exists users_forbidden_tags (
  `id` integer PRIMARY KEY ,
  `user_id` integer NOT NULL ,
  `tag_id` integer NOT NULL ,
  `created` datetime DEFAULT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
);

create table if not exists users_forbidden_albums (
  `id` integer PRIMARY KEY ,
  `user_id` integer NOT NULL ,
  `album_id` integer NOT NULL ,
  `created` datetime DEFAULT NULL,
  FOREIGN KEY(user_id) REFERENCES users(id)
  );