# Use an official PHP CLI image as a parent image
FROM php:7.4-cli

# Set the working directory inside the container
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . .

# Run the PHP script when the container launches
CMD [ "php", "./num_to_eng.php" ]