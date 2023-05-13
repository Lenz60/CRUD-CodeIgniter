# CodeIgniter 4 CRUD 

## What is this?

This is a simple functional login page with Json Web Token and CRUD system.
this is also built in smtp gmail too.

## What are the features ? Whats in it ?
### The UI/UX
1. The login page built with [Tailwindcss](https://tailwindcss.com/), it uses [laravel-mix](https://laravel-mix.com/) for the integration 
2. The dashboard is built with [SBadmin2](https://startbootstrap.com/theme/sb-admin-2) 
### The Backend
1. It built in with JWT or Json Web Token for the login and Cookie
2. It built with Gmail SMTP to send account activation confrimation and forgot password **make sure to check the spam folder in your mail** because gmail treat the SMTP as dangerous email even though it's their SMTP
3. Salted Passwords! the password is salted before it get encoded, the salt is declared in `.env` file
4. Upload avatar or profile pictures when registering new account
5. A little bit using a vue and Jquery and Ajax
6. All basic CRUD method is fully functionable

## Installation

1. Rename the `env` file to `.env`
2. Update the composer packages by running `composer update` in the console inside of directory of the project
3. Update the npm library by running `npm update` in the console inside of directory of the project
4. Run `npx mix` to ensure tailwindcss do its work!
5. Run the development server via `php spark serve`
6. To migrate the databases, run `php spark migrate` or `php spark migrate:refresh`
7. To seed the existing data, run `php spark db:seed TbMClient` first, then `php spark db:seed TbMProject`
8. If you want to use premade account, make sure to seed the user first by using `php spark db:seed Users`

## Usage
To login with premade account, after seeding the db using `Users` seed,
use this Email and Password : 
| Email        | Password        
| ------------- |:-------------:|
| test@email.com| test123 |

If not, you can make a new account 
1. Click `Sign up` text in the /login
2. Register normally, and upload avatar image max 1000x1000 px
3. If register is successfull, go check your email inbox and click the link embeded in to active the account
4. If you don't found the email, you can check the spam folder or use a premade account
5. If your account successfully activated, you can login normally by go to `/login` or the 'base url'

Thats all, Thankyou
