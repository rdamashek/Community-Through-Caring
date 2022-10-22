# Offers-and-Needs
An Open Source Web Mobile App for supporting ongoing live meetings (either in-person or online) in small communities where offers and needs are shared and matched. This app is not meant to be a stand-alone app for sharing offers and needs. It is meant to be used by communities who are meeting and exchanging offers and needs. It is simply a place to store the offers and needs that are shared. 

## Installation

Install my-project with command line

```bash
  git clone https://github.com/rdamashek/Offers-and-Needs.git
  cd Offers-and-Needs
```
    
## Color Reference

| Color             | Hex                                                                |
| ----------------- | ------------------------------------------------------------------ |
| Primary Color | ![#268171](https://via.placeholder.com/10/268171?text=+) #268171 |
| Secondary Color | ![#2a8a7259](https://via.placeholder.com/10/2a8a7259?text=+) #2a8a7259 |
| Chat Color | ![#72b8ff](https://via.placeholder.com/10/72b8ff?text=+) #72b8ff |



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file. These all variables will help you app to run locally. This includes the database configurations and basic setup of the app.

`CI_ENV` Can be set to 'Production', 'Development' or Test region.

`DB_HOSTNAME` Your database hostname

`DB_USERNAME` Your database username

`DB_PASSWORD` Your database password

`DB_DATABASE` Your database name

Once we get the database setup, we can do some additional configurations for the SMTP/ Mail setup as listed in the .env file.
## License

[MIT](https://choosealicense.com/licenses/mit/)

