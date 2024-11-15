<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="resourses/css/style.css"
</head>
<body>
<div class="currency-section text-center pt-5 bg-dark-subtle">
    <h1>Currency Converter</h1>
    <p>Need to make an international business payment? Take a look at our live foreign exchange rates.</p>
    <div class="currency-card">
        <h3>Make fast and affordable international business payments</h3>
        <p>Send secure international business payments in XX currencies, all at competitive rates with no hidden
            fees.</p>
        <form method="POST">
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    <label for="amount" class="form-label visually-hidden">Amount</label>
                    <input type="number" name="amount" class="form-control" placeholder="Amount" value="10000">
                </div>
                <div class="col-md-3 text-center">
                    <select class="form-select" name="from">
                        
                        <?php
                        global $currencies;

                        foreach ($currencies as $key => $rate) {
                            echo '<option value="' . $key . '">' . $key . '</option>';
                        }
                        ?>
                        <option value="UZS">UZS</option>
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <span>⇆</span>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="to">
                        <option value="UZS">UZS</option>
                    <?php
                        foreach ($currencies as $key => $rate){
                                echo '<option value="' . $key . '">' . $key . '</option>';
                        }
                    ?>
                    </select>
                </div>
            </div>
                <p class="rate-info mt-2">
                <?php
                    global $currency;
                    if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['amount'])) {
                        $fromCurrency = $_POST['from'];
                        $toCurrency = $_POST['to'];
                        $amount = $_POST['amount'];
                        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT);
                        $currency->exchange($fromCurrency, $toCurrency, $amount);
                    } else {
                        echo "1.00 USD = 12,862.73 UZS <i class='bi bi-info-circle'></i>";
                    }
                    ?>
                </p>
            <button type="submit" class="btn btn-primary btn-primary-custom mt-3">Convert</button>
        </form>
    </div>
</div>
    <div class="info-section bg-light">
        <h4 class="fw-bold">Let’s save you some time</h4>
        <p class="text-muted">If you’ve got a target exchange rate in mind but haven’t got time to keep tabs on market
            movement, then a firm order could be perfect for you. When your chosen rate is reached, we’ll act immediately,
            leaving you free to concentrate on your business.</p>
        <a href="./weather.php" class="btn btn-outline-danger">Ob havo ma'lumotlari</a>
    </div>
</body>
</html>