# Currency Converter

This project provides a simple currency converter using PHP and the Central Bank of Uzbekistan's currency exchange rate API.

## Requirements

- PHP 7.0 or higher
- cURL extension enabled

## Installation

1. Create a new folder for the project.
2. Save the `index.html` and `converter.php` files in the project folder.
3. Make sure the form's `action` attribute in `index.html` points to `converter.php`.

## Usage

1. Open `index.html` in a web browser.
2. Enter the amount you want to convert.
3. Select the currencies you want to convert from and to.
4. Click the "Convert" button.

The converted amount will be displayed below the form.

## API

The project uses the Central Bank of Uzbekistan's API to retrieve the current exchange rates:

- **API Endpoint:** `https://cbu.uz/uz/arkhiv-kursov-valyut/json/`

## Notes

- The `$currencies` array is populated by fetching the exchange rates from the API.
- The exchange rate is used to convert the amount from the "from" currency to the "to" currency.
- The `exchange()` function performs the conversion and formats the output.

## Disclaimer

This project is for educational purposes only. The accuracy of the exchange rates is dependent on the Central Bank of Uzbekistan's API
