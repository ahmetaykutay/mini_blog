-- create articles table
CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  user_name varchar(90) NOT NULL,
  email varchar(90) NOT NULL,
  password varchar(90) NOT NULL,
  PRIMARY KEY (id)
);

-- create articles table
CREATE TABLE articles (
  id int NOT NULL AUTO_INCREMENT,
  title varchar(90) NOT NULL,
  body varchar(90) NOT NULL,
  author int NOT NULL,
  created_at DATETIME,

  PRIMARY KEY (id),
  FOREIGN KEY (author) REFERENCES users(id)
);