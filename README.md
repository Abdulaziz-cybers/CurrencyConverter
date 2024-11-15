# Currency Converter and Weather App

This project combines a currency converter with a weather application, both built using PHP.

## Currency Converter

This section describes the currency converter feature.

### Requirements

- PHP 7.0 or higher
- cURL extension enabled

### Installation

1. Create a new folder for the project.
2. Save the `index.html` and `converter.php` files (currency converter) in the project folder.
3. Make sure the form's `action` attribute in `index.html` points to `converter.php`.

### Usage

1. Open `index.html` in a web browser.
2. Enter the amount you want to convert.
3. Select the currencies you want to convert from and to.
4. Click the "Convert" button.

The converted amount will be displayed below the form.

### API

The currency converter uses the Central Bank of Uzbekistan's API to retrieve the current exchange rates:

- **API Endpoint:** `https://cbu.uz/uz/arkhiv-kursov-valyut/json/`

### Notes

- The exchange rates are fetched from the API at runtime.
- The `exchange()` function performs the conversion and formats the output.

## Weather App

This section describes the weather app feature.

### Requirements

- PHP 7.0 or higher
- cURL extension enabled
- An OpenWeatherMap API key (obtain one from [https://openweathermap.org/](https://openweathermap.org/))

### Installation

1.  (Assuming the currency converter is already installed).
2.  Save the `weather.php` and other necessary files for the weather app in the project folder.

### Usage

1. Open `index.html` (or whichever HTML file handles the weather display).
2. Enter the name of the city you want to get weather information for.
3. Click the "Get Weather" button.

The weather information (temperature, humidity, pressure, and wind speed) for that city will be displayed.

### API

The weather application uses the OpenWeatherMap API to retrieve weather data:

- **API Endpoint:** `http://api.openweathermap.org/data/2.5/weather`

### Notes

- You'll need to obtain an OpenWeatherMap API key and set it in your `weather.php` file (store securely; do not commit it to version control).
- Error handling is included to provide feedback to the user if the city is not found or there are problems with the API request.



## Disclaimer

This project is for educational purposes only. The accuracy of the exchange rates (currency converter) and weather data (weather app) is dependent on the respective APIs
