# StormPHP Framework 2.0

StormPHP is a lightweight custom MVC framework for PHP developers who want a simple yet powerful structure for building web applications.

## 🚀 Installation

To create a new StormPHP project, run the following command:

```sh
composer create-project josiahdev/stormphp project-name
```

Or, if you have installed the StormPHP Installer globally:

```sh
stormphp new project-name
```


## 🔥 Running the Development Server

To start the built-in PHP server, navigate to your project folder and run:

```sh
php storm serve
```

Then, open `http://127.0.0.1:8000` in your browser.

## 📌 Commands

StormPHP includes a simple CLI tool:

```sh
stormphp new project-name   # Create a new StormPHP project
php storm serve             # Start the development server
php storm make:controller Name  # Generate a new controller
php storm make:model Name       # Generate a new model
php storm make:view Name        # Generate a new view
php storm make:middleware Name   # Generate a new middleware
```

## 🛠 Features

- Lightweight MVC structure
- PSR-4 autoloading
- Built-in routing system
- Simple and intuitive syntax

## 📜 License

StormPHP is open-source software licensed under the **MIT License**.

---

Happy coding with StormPHP! 🚀

