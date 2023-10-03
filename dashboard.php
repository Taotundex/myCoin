<?php
    session_start();
    include "connect.php";
    
    $email = $_SESSION['email'];
    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }

    
    $select_signup = mysqli_query($conn, "SELECT * FROM signup WHERE `email`='$email'");
    $signup = mysqli_fetch_assoc($select_signup);
    
    $conn->close();
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | MEGAPROFITSTRADE</title>
    <link rel="stylesheet" href="styling.css">
    <!-- <script src="https://kit.fontawesome.com/be0461b2be.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="megaprofits">
            <?php
                include "sidebar/heading.php";
            ?>
                        <div class="content p-3">
                            <div class="head">
                                <h2>Dashboard</h2>
                            </div>
                            <div class="history py-3">
                                <div class="row g-4">
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="balance shadow">
                                            <i class="bi bi-cash-stack"></i>
                                            <div class="names">
                                                <p>Account Balance</p>
                                                <h3>
                                                    <?php
                                                        if($signup['currency'] == "usd"){
                                                            echo "$";
                                                        }
                                                        elseif($signup['currency'] == "eur"){
                                                            echo "€";
                                                        }
                                                        elseif($signup['currency'] == "gbp"){
                                                            echo "₤";
                                                        }
                                                        else {
                                                            echo "R";
                                                        }
                                                    ?>
                                                     <?php echo $signup['accountBalance'];?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="balance shadow">
                                            <i class="bi bi-cash-coin"></i>
                                            <div class="names">
                                                <p>Total Deposit</p>
                                                <h3>
                                                    <?php
                                                        if($signup['currency'] == "usd"){
                                                            echo "$";
                                                        }
                                                        elseif($signup['currency'] == "eur"){
                                                            echo "€";
                                                        }
                                                        elseif($signup['currency'] == "gbp"){
                                                            echo "₤";
                                                        }
                                                        else {
                                                            echo "R";
                                                        }
                                                    ?>
                                                     <?php echo $signup['depositBalance'];?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4 col-md-6 col-12">
                                        <div class="balance shadow">
                                            <i class="bi bi-credit-card-fill"></i>
                                            <div class="names">
                                                <p>Total Withdrawal</p>
                                                <h3>
                                                    <?php
                                                        if($signup['currency'] == "usd"){
                                                            echo "$";
                                                        }
                                                        elseif($signup['currency'] == "eur"){
                                                            echo "€";
                                                        }
                                                        elseif($signup['currency'] == "gbp"){
                                                            echo "₤";
                                                        }
                                                        else {
                                                            echo "R";
                                                        }
                                                    ?> <?php echo $signup['withdrawBalance'];?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget my-3">
                                <div class="tradingview-widget-container">
                                    <div id="tradingview_e4315" style="height: 400px"><div id="tradingview_06d10-wrapper" style="position: relative; box-sizing: content-box; font-family: -apple-system, BlinkMacSystemFont, &quot;Trebuchet MS&quot;, Roboto, Ubuntu, sans-serif; margin: 0px auto !important; padding: 0px !important; width: 100%; height: 100%;"><iframe title="advanced chart TradingView widget" lang="en" id="tradingview_06d10" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen="true" src="https://s.tradingview.com/widgetembed/?hideideas=1&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en#%7B%22symbol%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22frameElementId%22%3A%22tradingview_06d10%22%2C%22interval%22%3A%22D%22%2C%22symboledit%22%3A%221%22%2C%22saveimage%22%3A%221%22%2C%22studies%22%3A%22%5B%5D%22%2C%22theme%22%3A%22dark%22%2C%22style%22%3A%221%22%2C%22timezone%22%3A%22Etc%2FUTC%22%2C%22studies_overrides%22%3A%22%7B%7D%22%2C%22utm_source%22%3A%22megaprotrade.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22chart%22%2C%22utm_term%22%3A%22BITSTAMP%3ABTCUSD%22%2C%22page-uri%22%3A%22megaprotrade.com%2Fdashboard%2Findex%22%7D" style="width: 100%; height: 100%; margin: 0px !important; padding: 0px !important;"></iframe></div></div>
                                    <div class="tradingview-widget-copyright" style="width: 100%;"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP&amp;utm_source=megaprotrade.com&amp;utm_medium=widget_new&amp;utm_campaign=chart&amp;utm_term=BITSTAMP%3ABTCUSD" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                    <script type="text/javascript">
                                        new TradingView.widget({
                                            "autosize": true,
                                            "symbol": "BITSTAMP:BTCUSD",
                                            "interval": "D",
                                            "timezone": "Etc/UTC",
                                            "theme": "dark",
                                            "style": "1",
                                            "locale": "en",
                                            "toolbar_bg": "#f1f3f6",
                                            "enable_publishing": false,
                                            "allow_symbol_change": true,
                                            "container_id": "tradingview_e4315"
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="widget2 my-5">
                                <section class="tile bg-slategray" fullscreen="isFullscreen02">
                                    <div class="tile-body p-0 row g-4">
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22FX%3AEURUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22FX%3AGBPUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22FX%3AEURCAD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22COINBASE%3ABTCUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22COINBASE%3AETHUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tradingview-widget-container shadow" style="width: 100%; height: 100%;">
                                                <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/mini-symbol-overview/?locale=en#%7B%22symbol%22%3A%22COINBASE%3ALTCUSD%22%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22dateRange%22%3A%221d%22%2C%22colorTheme%22%3A%22dark%22%2C%22trendLineColor%22%3A%22rgba(111%2C%20168%2C%20220%2C%200.9)%22%2C%22underLineColor%22%3A%22rgba(201%2C%20218%2C%20248%2C%200.22)%22%2C%22isTransparent%22%3Atrue%2C%22autosize%22%3Atrue%2C%22largeChartUrl%22%3A%22%22%2C%22utm_source%22%3A%22bestcryptoshares.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22mini-symbol-overview%22%7D" style="height: 100%; width: 100%;"></iframe>
                                            </div>
                                        </div>        
                                    </div>
                                </section>
                            </div>
                            <div class="widget">
                                <div class="white-box" style="height: 500px;">
                                    <div style="width: 100%; height: 100%;">
                                        <iframe scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/forex-cross-rates/?locale=en#%7B%22currencies%22%3A%5B%22EUR%22%2C%22USD%22%2C%22JPY%22%2C%22BTC%22%2C%22ETH%22%2C%22LTC%22%2C%22GBP%22%2C%22CHF%22%2C%22AUD%22%2C%22CAD%22%2C%22NZD%22%2C%22CNY%22%5D%2C%22width%22%3A%22100%25%22%2C%22height%22%3A%22100%25%22%2C%22utm_source%22%3A%22account.cryptooption24.com%22%2C%22utm_medium%22%3A%22widget%22%2C%22utm_campaign%22%3A%22forex-cross-rates%22%7D" style="box-sizing: border-box; height: calc(100% - 32px); width: 100%;"></iframe>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>