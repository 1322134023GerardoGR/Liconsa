
Quagga.init({
    inputStream: {
        name: "Live",
        type: "LiveStream",
        constraints: {
            width: 640,
            height: 480,
            facingMode: "environment"
        }
    },
    locator: {
        patchSize: "medium",
        halfSample: true
    },
    decoder: {
        readers: ["code_128_reader","ean_reader", "upc_reader"]
    }
}, function(err) {
    if (err) {
        console.log(err);
        return
    }
    console.log("Initialization finished. Ready to start");
    Quagga.start();
});

Quagga.onDetected(function (result) {
    let code = result.codeResult.code;
    let prinbarcode=document.getElementById('code');
    prinbarcode.value=code;
    console.log("Código de barras detectado: " + code);
});
