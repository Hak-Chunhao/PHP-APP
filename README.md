How to run the `num_to_eng.php` script using Docker or with your command line

# Number to English Phrases Converter

This script converts a given integer into English phrases. For example, it converts `1234` to `"one thousand, two hundreds and thirty-four"`.

## How to Run

To run the `num_to_eng.php` script, you have two options: running it directly on your local machine or running it within a Docker container.

### Running Locally

1. **Install PHP**: Make sure you have PHP installed on your local machine. You can download and install PHP from the [official PHP website](https://www.php.net/downloads) [recommend version php 7.4 or if you want strict the code type, go php version 8 up ]. Make sure the php is already installed in your os environment. check with php -v in your command line

2. **Clone the Repository**: Clone this repository to your local machine using Git: git clone <repository_url>

3. **Navigate to the Directory**: Navigate to the directory containing the `num_to_eng.php` script. 

4. **Run the Script**: Execute the script by running the following command in your terminal: php num_to_eng.php [number]

Replace `[number]` with the integer you want to convert to English phrases.

### Running with Docker

1. **Install Docker**: Make sure you have Docker installed on your local machine. You can download and install Docker Desktop from the [official Docker website](https://www.docker.com/products/docker-desktop).

2. **Clone the Repository**: Clone this repository to your local machine using Git: git clone <repository_url>

3. **Navigate to the Directory**: Navigate to the directory containing the `num_to_eng.php` script.

4. **Build the Docker Image**: Run the following command to build the Docker image: docker build -t php-app-covert-number .

5. **Run the Docker Container**: Execute the script within a Docker container by running the following command: docker run php-app-covert-number php num_to_eng.php [number]

Replace `[number]` with the integer you want to convert to English phrases.

#### Running Docker php-app-covert-number with compose file after you build the image
- For compose file, it is easy to write the docker command and run in just one command from compose file 

1. Run the following command to build the Docker image: docker-compose run app php ./num_to_eng.php [number]

You can see docker-command.txt for this php-app-covert-number docker used command

The programmed is executed. 


