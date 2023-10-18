Related to the livestream https://www.youtube.com/watch?v=MteeGtWaK54&t=11s

To intall PHP dotenv and be able to access .env files

```
$ composer require vlucas/phpdotenv
```

You'll need the following values:

```text
V3_API_KEY = ""
```

Add the above values to a new `.env` file:

```bash
$ touch .env # Then add your env variables
```

To run the PHP Web Server

```
$ php -S 127.0.0.1:8000
```

And call:

```
http://localhost:8000/SendEmail_V3.php
```

To run the script

```
php ReadInbox.php
```
