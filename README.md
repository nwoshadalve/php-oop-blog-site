# Project Name - A Blog Site With Admin Panel Using PHP OOP Concept.

# Introduction

This is a blog website that includes an admin panel for managing the blog content. This blog website built using **PHP OOP Concepts, MySQL, and Bootstrap, with an admin panel for managing posts and users.**

## Features

- User registration, login and forgot password features through user email
- Account settings
- Admin panel for managing blog content
- Create, edit, and delete blog posts
- Create, edit, and delete blog categories
- Create, edit, and delete blog tags
- View/delete user comments
- Reply to the user comments.
- Check inbox to read messages from users.
- Search functionality in admin panel
- Pagination
- Responsive design

## Installation

1. Clone the repository to your local machine: git clone https://github.com/your-username/blog-website.git
2. Import the `db_palki.sql` file into your MySQL database: mysql -u username -p database_name < db_palki.sql 
3. Update the database configuration in `config.php` with your MySQL credentials:
    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DB', 'db_palki');
4. Upload the project files to your web server.

### Admin Panel

To access the admin panel, navigate to `/admin` and login with your admin credentials.

In the admin panel, you can:

- Create an admit account (for test purpose)
- Create a new blog post
- Create a new category
- Create a new tag
- Edit an existing blog post
- Delete a blog post
- Manage blog categories
- Manage blog tags
- Can read and delete user comments
- Can read and delete messeges from user.

### Frontend

The blog homepage displays the latest blog posts with blog summary. To view the full post click on the post tittle. Post date, comments and post by whom, will show in the post card. User can comment to a post by submitting user name and comment. Only admin will reply to the post. User can message to the admin from contact us page. To login or create a new account, click the "Login" button in the navigation bar. Once you've registered, you can login.

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Author

[MD Nwoshad Alam Chowdhury](https://facebook.com/nowshedalve)
