### To run the project Apache and MySQL servers are needed.

#### Deployed version: https://phpstack-1156493-4027505.cloudwaysapps.com/

### Database creation:

##### Connect to mysql and run queries :

####

###### Create the 'cgrd' database:

####

```
CREATE DATABASE cgrd;
```

###### Switch to the 'cgrd' database:

####

```
USE cgrd;
```

###### Create the 'users' table:

####

```
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```

###### Create the 'news' table:

####

```
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);
```

###### Insert admin user:

####

```
INSERT INTO users (username, password) VALUES ('admin', 'test');
```
