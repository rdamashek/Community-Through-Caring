# Community through Caring

## About the project

An Open Source Web Mobile App for supporting ongoing live meetings (either in-person or online) in small communities where offers and needs are shared and matched. This app is not meant to be a stand-alone app for sharing offers and needs. It is meant to be used by communities who are meeting and exchanging offers and needs. It is simply a place to store the offers and needs that are shared.

## Getting Started

These instructions will give you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on deploying the project on a live system.

### Prerequisites

Requirements for the software and other tools to build, test and push. You must have these installed in your system before proceeding to the next step.

- PHP 7.4+ (Required for compatibility with the project)
- [Composer](https://getcomposer.org/download/) (Dependency management)
- [GIT](https://git-scm.com/downloads) (Version control)

### Installation

This section will guide you through setting up a local development environment for the project. Please follow the installation process carefully.

1. To clone the project in your system, run:

```
 git clone https://github.com/rdamashek/Community-Through-Caring.git
```

2. Once the directory is cloned, navigate to the directory using the command:

```
 cd Community-Through-Caring/MAIN
```

3. Run composer command to install dependencies:

```
 composer update
```

After successful attempt, you should see all dependencies being installed and now the system is ready to be configured.
NOTE that the code is in `/MAIN` directory

### Setting up the database

Follow these steps to install the necessary database for your local server.

- Open your local database server, like [http://localhost/phpmyadmin](http://localhost/phpmyadmin) and create a new database named `community_caring`. You might want to use [XAMPP](https://www.apachefriends.org/download.html) or [WAMP](https://www.mamp.info/en/downloads/).
- Once the database is created, uplaod the database file. You can find the database file in `/Database/community_caring.sql` directory of your project. 


Open the project in VS code or in whatever software you like, for vs code:
write the following command in cmd:
`code .`

note that you must be in dir: 'Community-Through-Caring/MAIN'

## Environment Variables

Environment variables are used to configure the application. They include essential information such as database configurations and basic app setup.

The project uses the env plugin to add the ability of configurations all at one place. Once you do the above steps, now it's time for setting up the environment variables and your app is ready to go. The `.env` file is located at the project root folder. You need to edit the `.env` file and make the required configurations as listed below. 




### SMTP and Database Configurations

In order to ensure seamless communication and data management within your application, it's essential to configure both SMTP (Simple Mail Transfer Protocol) for email functionality and database settings for storing and retrieving data.

#### SMTP Configurations

SMTP is crucial for sending emails from your application, whether it's for user verification, password resets, or notifications. Below are the environment variables related to SMTP that you need to configure in your `.env` file:

```dotenv
SMTP_HOST=''          # The hostname of your SMTP server, provided by your email service provider.
SMTP_DEBUG='0'        # Set debugging mode. Set to '1' for debugging, '0' for production.
SMTP_AUTH='false'     # Indicates whether SMTP authentication is required. Set to 'true' if authentication is needed.
SMTP_PORT='25'        # The port number of your SMTP server.
SMTP_USERNAME=''      # Your SMTP username (if authentication is required).
SMTP_PASSWORD=''      # Your SMTP password (if authentication is required).
SMTP_FROM_DEFAULT=''  # The default email address from which emails will be sent.
SMTP_FROM_NAME=''     # The name associated with the sender's email address.
SMTP_SECURE='false'   # Indicates whether to use a secure connection (TLS/SSL). Set to 'true' if a secure connection is required.
SMTP_AUTO_TLS='false' # Indicates whether to enable automatic TLS. Set to 'true' if automatic TLS is required.
```
Ensure you replace the empty strings ('') with the appropriate values provided by your email service provider. If you're unsure about these details, contact your email service provider for assistance.
#### Database Configurations
Database configurations are essential for storing and managing data within your application. Here are the environment variables related to your database setup:
```
CI_ENV='prod'                # Defines the running environment. Can be set to 'production' or 'development'.
DB_HOSTNAME='localhost'      # The hostname of your database server. In most cases, it's 'localhost'.
DB_USERNAME='root'           # Your database username.
DB_PASSWORD=''               # Your database password.
DB_DATABASE='community_caring'  # Your database name. In this case, it's 'community_caring'.
```

Replace the placeholder values with the actual details corresponding to your database setup. If you're using a remote database server, make sure to provide the correct hostname, username, password, and database name as provided by your hosting provider.

### Setting Up Your Environment
Once you've configured both SMTP and database settings in your .env file, your application will be ready to run locally. These configurations ensure that your application can send emails and interact with the database seamlessly.

If you encounter any issues during setup or have questions about specific configurations, feel free to reach out for assistance.



## Starting the Service for /admin URL

In order to access the `/admin` URL and test the application, you'll need to start the corresponding service (PHP and MySQL). Follow these steps:

1. **Start the PHP and MySQL Service:**

   - For Windows, you can use [XAMPP](https://www.apachefriends.org/download.html).
   - For MacOS, you can use [WAMP](https://www.mamp.info/en/downloads/).

2. **Access the Application:**

   - Once the service is up and running, open your web browser and go to either of the following URLs, depending on the software you chose for the service:
      - For XAMPP (Windows): [http://localhost/Community-Through-Caring/MAIN/admin](http://localhost/Community-Through-Caring/MAIN/admin)
      - For WAMP (iOS): [http://localhost/](http://localhost/)

3. **Login Credentials:**

   - Use the following credentials to log in:
      - Email: `admin@admin.com`
      - Password: `123456`

   For users without an existing account, they can register a new account directly from the homepage.

Please ensure that the PHP and MySQL service is running before accessing the application.

## Administrator Console

The website utilizes an admin panel `/admin` to facilitate the management of offers and needs posted by different users. The admin has the authority to control access for specific users or remove them from the system entirely. The left sidebar provides quick access to key functions, including:

- **Manage Offers**: Review, modify, or delete offers submitted by users to ensure compliance with platform guidelines.

- **Manage Needs**: Oversee and regulate the needs posted by users to maintain relevance and authenticity.

- **Manage Language**: Customize the language used on the platform to cater to diverse linguistic preferences and cultural contexts.

- **User Management**: Manage user accounts, including the ability to restrict access or remove users from the system.

- **Manage Chat Messages**: Monitor and, if necessary, remove messages from the platform's chat system to maintain a respectful and relevant community.

- **General Website Settings**: Customize global features such as layout, theme, and other settings to optimize user experience.

- **Account Settings**: Manage personal preferences, notifications, and security settings.

### Additional Notes

- Regularly reviewing and managing offers and needs ensures the quality and relevance of content on the platform.

- Language management provides a flexible way to cater to a diverse user base.

- User management is a critical aspect of maintaining a safe and secure online community.

- Monitoring chat messages helps create a positive and respectful environment for users to interact.

By utilizing the Administrator Console effectively, administrators can play a pivotal role in fostering a vibrant and user-friendly platform.



## User Panel

The User Dashboard provides users with essential tools to interact with the platform and manage their own contributions. It includes the following functions:

- **Contribute to Chat**: Engage in conversations with other users through the platform's chat feature. Users can share information, ask questions, and connect with others in the community.

- **Manage Offers**: Users can create, edit, and delete offers to provide goods, services, or assistance to the community. This function allows for seamless sharing of resources.

- **Manage Needs**: Users have the ability to post, update, and remove needs, outlining what they require from the community. This feature facilitates mutual aid and support within the platform.

- **Change Account Settings**: Users can customize their account preferences, personal information, and security options. 

### Additional Notes

- Encourage users to provide clear and accurate information when creating offers and needs for the benefit of the community.

- Remind users to review and update their account settings periodically to ensure they receive relevant notifications and maintain account security.

By utilizing these functions, users can actively participate in the platform's community and contribute to a collaborative and supportive environment.


## Color Reference

| Color           | Hex                                                                    |
| --------------- | ---------------------------------------------------------------------- |
| Primary Color   | ![#268171](https://via.placeholder.com/10/268171?text=+) #268171       |
| Secondary Color | ![#2a8a7259](https://via.placeholder.com/10/2a8a7259?text=+) #2a8a7259 |
| Chat Color      | ![#72b8ff](https://via.placeholder.com/10/72b8ff?text=+) #72b8ff       |

## Built With

The project is built using the following technologies:

- **Codeigniter V3.1.13**: A powerful PHP framework for building web applications.
- **jQuery**: A fast, small, and feature-rich JavaScript library that simplifies client-side scripting.
- **HTML5**: Used for creating web pages.
- **CSS3**: Used for styling web pages.
- **Datatables**: A jQuery plugin for enhancing the functionality of HTML tables, allowing for features like sorting, filtering, and pagination.
- **Overhang.js**: A simple, customizable jQuery plugin for creating overlay-based notifications.

These technologies form the foundation of the project, providing a robust and modern development stack.

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code
of conduct, and the process for submitting pull requests to us.

## Versioning

We use [Semantic Versioning](http://semver.org/) for versioning. For the versions
available, see the [tags on this
repository](https://github.com/rdamashek/Community-Through-Caring/tags).

## License

[MIT](https://choosealicense.com/licenses/mit/)
