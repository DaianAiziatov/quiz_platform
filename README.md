## Quiz platform

Quiz platform with admin functionality where you can create new quizes, modify existing ones as well as see users' statistics.

## Instalation

- Clone project:

`git clone https://github.com/DaianAiziatov/quiz_platform.git`

- Export tables in your database from file export_db.sql

- Fill file model/database.php with your database credential

```
 $dsn = 'mysql:host=/* host name */;dbname=/* db name */';
 $username = '/* usernmae */';
 $password = '/* password */';
```

In order to use admin functionality, you should add admin credential in administartors table in database.

**Note: all passwords are storing in SHA1(email&password) encrypted format hence in order to add admin password you should encrypt password first.** 

## Demo

Give server some time to wake up.

[DEPLOYED VERSION ON HEROKU](https://quiz-platform-daian-aiziatov.herokuapp.com)

You can use this credential for testing purpose or create new user:
```
email: test@mail.com
password: test123456
```

For security reasons, I don't share admin's credentials. You can try it on your server.
