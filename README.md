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

- Open your local database server, like `localhost/phpmyadmin` and create a new database named `community_caring`
- Once the database is created, uplaod the database file. You can find the database file in `/Database/community_caring.sql` directory of your project.



## Environment Variables

Environment variables are used to configure the application. They include essential information such as database configurations and basic app setup.

The project uses the env plugin to add the ability of configurations all at one place. Once you do the above steps, now its time for setting up the environment variables and your app is ready to go.

You will need to add the following environment variables to your `/.env` file . These all variables will help you app to run locally. This includes the database configurations and basic setup of the app.

- `CI_ENV` defines the running environment Can be set to `production` OR `development`.

- `DB_HOSTNAME` Your database hostname. In most cases its `localhost`

- `DB_USERNAME` Your database username.

- `DB_PASSWORD` Your database password.

- `DB_DATABASE` Your database name. In this case its `community_caring`

Once we get the database setup, we can do some optional configurations for the SMTP/ Mail server as listed in the .env file.


## Starting the Service for /admin URL

In order to access the `/admin` URL and test the application, you'll need to start the corresponding service. Follow these steps:

1. **Start the PHP and MySQL Service:**

    - For Windows, you can use [XAMPP](https://www.apachefriends.org/download.html).
    - For iOS, you can use [WAMP](https://www.mamp.info/en/downloads/).

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




## Color Reference

| Color             | Hex                                                                |
| ----------------- | ------------------------------------------------------------------ |
| Primary Color | ![#268171](https://via.placeholder.com/10/268171?text=+) #268171 |
| Secondary Color | ![#2a8a7259](https://via.placeholder.com/10/2a8a7259?text=+) #2a8a7259 |
| Chat Color | ![#72b8ff](https://via.placeholder.com/10/72b8ff?text=+) #72b8ff |

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

