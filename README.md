<p align='center'>
<p align='center'>
  <img src='https://raw.githubusercontent.com/goteam-ti/frontend/main/public/og.png' alt='Redesign of GoTeam App' width='1260'/>
</p>

<p align='center'>
This codebase is the api endpoint for https://jieui.com
</p>

<br>

<p align='center'>
<a href="https://jieui.com">Live Demo</a>
</p>

<br>


> **Note**: This project is for technical demonstration purposes only. It is not intended to be used as a production application.


<br>


## Features

 - Api Versioning ready (v1)
 - SOLID, Singletons, Service Patters (at least for this small project)
 - Authentication with laravel sanctum
 - Task Management CRUD
 - Dockerized (Laravel Sail Ready)
 - PGSQL 

## Development

### Code Formatting

  - I use only [Pint](https://github.com/laravel/pint/) for code formatting.

### Commits

  - I use [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) for commit messages.
  - I use Lint Staged and Simple Git Hooks to lint and format code before commiting. (An alternative to this is to use Husky and Lint Staged.

### Dev tools

- [Laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) - Laravel IDE Helper, generates correct PHPDocs for all Facade classes, to improve auto-completion.

### Installation

1. Clone the repository

```bash
  git clone https://github.com/goteam-ti/backend.git
  cd frontend
```

2. Install the dependencies

```bash
  composer install
  yarn install 
```

4. Copy the example env file and make the required configuration changes in the .env file

```bash
  cp .env.example .env
```

3. Sail up

```bash
  ./vendor/bin/sail up
```

4. php artisan migrate:fresh --seed

```bash
  ./vendor/bin/sail artisan migrate --seed
```

5. php artisan key:generate

```bash
  ./vendor/bin/sail artisan key:generate
```

6. Visit [http://localhost](http://localhost) in your browser

### 🧪 Running tests

🚧 **Note:** Tests are still in development. 🚧

