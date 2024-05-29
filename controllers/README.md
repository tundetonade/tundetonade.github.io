# REDDOT MVC Application

REDDOT is a comprehensive application designed for a book publishing company. Utilizing the MVC (Model-View-Controller) architecture, the application provides a robust framework for managing various aspects of book publishing, including user authentication, administrative functions, and more.

## Project Structure

- `controllers/`: Contains the main controllers (`usercontroller.php`, `maincontroller.php`, `admincontroller.php`).
- `models/`: Directory for your model files.
- `views/`: Directory for your view files.
- `public/`: Contains public assets like CSS and JS files.
- `config/`: Configuration files.
- `reddot.sql`: SQL file to set up the database.

## Setup Instructions

1. **Clone the repository:**
    ```bash
    git clone https://github.com/emmaddo/REDDOT-MVC-Application.git
    cd REDDOT-MVC-Application
    ```

2. **Set up the database:**
    - Import the `reddot.sql` file into your MySQL database.

3. **Run the application:**
    - Ensure your web server is set up to serve the `public/` directory.
    - Open your browser and navigate to the application's URL.

## Usage

- **usercontroller.php**: Manages user-related actions such as login, OTP generation, password reset, and logout.
- **maincontroller.php**: Handles general application logic.
- **admincontroller.php**: Manages administrative functions (to be extended as needed).

## Contact

For questions or support, contact [your-email@example.com].
