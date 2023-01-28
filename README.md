<p align="center">
  <a href="https://www.php.net/" target="_blank" rel="noopener noreferrer">
    <img width="180" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" alt="PHP logo">
  </a>
  <a href="https://www.javascript.com/" target="_blank" rel="noopener noreferrer">
    <img width="200" src="https://www.freepnglogos.com/uploads/javascript-png/javascript-logo-transparent-logo-javascript-images-3.png" alt="Javascript logo">
  </a>
</p>

## Introduction

This test has been implemented using [PHP](https://www.php.net/) v8.1.3 for the backend and HTML, CSS and Javascript as frontend.
Given 3 inputs of type number, our goal is to calculate the average of the 3 numbers and display the result in a column-based chart.

## Requirements

- Inputs should accept decimals only (with 0 as minimum value and 100 as maximum value).
- Not using any framework for both frontend and backend (only pure PHP and javascript).
- Using the library [ApexCharts](https://apexcharts.com/) to display the results.

Optional tasks : Using OOP in the backend + using AJAX to send and receive data from a web server.

## Guide steps

- Make sure you set up a "Git" environment on your machine (or download it from [here](https://git-scm.com/downloads))
- After that, you need to have "PHP 8" installed, if not, download it from [here](https://www.php.net/downloads.php).
- After the download is complete, run the installation program and the add PHP as a system variable so you can access and run your PHP scripts from anywhere in your machine.
- As for running PHP scripts, install a PHP local server known as [WampServer](https://www.wampserver.com/), other alternatives are XAMPP, AMPPS, EasyPHP etc... (in my case for instance, i use XAMPP as a local server).
- Go to where you installed your local server and navigate to the folder ``/htdocs``. Now, clone the project from github to your local machine by running ``git clone https://github.com/Boudissa-Ihab/Web-Test.git``. Copy and pase the project folder into ``/htdocs``.
- Before we finish the steps, run the command ``php -S localhost:8000`` to start the server.
- And finally, go to a browser and type in ``localhose:8000`` (assuming the port 8000 is free, or else, change the port to something else in the command above).

## Potential improvements

- Change the CSS for a better and more responsive design.
- Finishing validation and error messages (front & backend).
- Display the graphic chart only when all the inputs are filled.
- Dynamically generate inputs using javascript instead of statically adding them.
- Add debounce to limit the number of requests (and possibly a loader after disabling the button).
