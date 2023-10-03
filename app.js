const cryptoSelect = document.getElementById('cryptoSelect');
const cryptoAmountInput = document.getElementById('cryptoAmount');
const usdAmountInput = document.getElementById('usdAmount');

cryptoSelect.addEventListener('change', convertCryptoToUSD);
cryptoAmountInput.addEventListener('input', convertCryptoToUSD);

function convertCryptoToUSD() {
    const cryptoSymbol = cryptoSelect.value;
    const cryptoAmount = parseFloat(cryptoAmountInput.value);

    axios.get('https://api.coingecko.com/api/v3/simple/price', {
        params: {
            ids: cryptoSymbol,
            vs_currencies: 'usd'
        }
    })
    .then(response => {
        const cryptoToUsdRate = response.data[cryptoSymbol].usd;
        const convertedAmount = cryptoAmount * cryptoToUsdRate;
        usdAmountInput.value = convertedAmount.toFixed(2) + " USD";
    })
    .catch(error => {
        console.error('Error fetching exchange rate:', error);
    });
}


    // // Get the initial QR code text
    // var qrCodeText = document.getElementById("qrCodeText").value;

    // // Get a reference to the div where you want to display the QR code
    // var qrcodeContainer = document.getElementById("qrcode");

    // // Create a QRCode object with the initial value
    // var qrcode = new QRCode(qrcodeContainer, {
    //     text: qrCodeText,
    //     width: 175,
    //     height: 175
    // });


  // Function to generate QR code
  function generateQRCode(inputId, qrCodeId) {
    var inputValue = document.getElementById(inputId).value;
    var container = document.getElementById(qrCodeId);

    // Clear previous QR code (if any)
    container.innerHTML = '';

    var qrcode = new QRCode(container, {
        text: inputValue,
        width: 175,
        height: 175
    });
}

// Function to copy text to clipboard
function copyTextToClipboard(inputId) {
    var inputField = document.getElementById(inputId);
    inputField.select();
    document.execCommand("copy");
}

// Trigger QR code generation and copy functionality for Bitcoin modal
$('#bitcoinModal').on('shown.bs.modal', function () {
    generateQRCode('inputBitcoin', 'qrcodeBitcoin');
    $('#copyButtonBitcoin').click(function() {
        copyTextToClipboard('inputBitcoin');
        alert(inputBitcoin.value)
    });
});

// Trigger QR code generation and copy functionality for Ethereum modal
$('#ethereumModal').on('shown.bs.modal', function () {
    generateQRCode('inputEthereum', 'qrcodeEthereum');
    $('#copyButtonEthereum').click(function() {
        copyTextToClipboard('inputEthereum');
        alert(inputEthereum.value)
    });
});

// Trigger QR code generation and copy functionality for Usdt modal
$('#usdtModal').on('shown.bs.modal', function () {
    generateQRCode('inputUsdt', 'qrcodeUsdt');
    $('#copyButtonUsdt').click(function() {
        copyTextToClipboard('inputUsdt');
        alert(inputUsdt.value)
    });
});

// Trigger QR code generation and copy functionality for Trx modal
$('#trxModal').on('shown.bs.modal', function () {
    generateQRCode('inputTrx', 'qrcodeTrx');
    $('#copyButtonTrx').click(function() {
        copyTextToClipboard('inputTrx');
        alert(inputTrx.value)
    });
});

// Trigger QR code generation and copy functionality for Usdc modal
$('#usdcModal').on('shown.bs.modal', function () {
    generateQRCode('inputUsdc', 'qrcodeUsdc');
    $('#copyButtonUsdc').click(function() {
        copyTextToClipboard('inputUsdc');
        alert(inputUsdc.value)
    });
});


