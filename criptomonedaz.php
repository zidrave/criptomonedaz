<?php


function obtenerTipoCambioGoogleFinance($url) {
    $html = @file_get_contents($url);

    if ($html === false) {
        return null;
    }

    // Expresión regular para extraer el valor del atributo data-last-price
    preg_match('/data-last-price="([^"]*)"/', $html, $matches);

    if (isset($matches[1])) { // Usamos $matches[1] porque ahí está el valor capturado
        $tipoCambioStr = $matches[1];

        // Convertir a float
        if (is_numeric($tipoCambioStr)) {
            $tipoCambio = floatval($tipoCambioStr);

            // Redondear a dos decimales
            $tipoCambioRedondeado = round($tipoCambio, 2);

            return $tipoCambioRedondeado;
        } else {
            return null;
        }
    } else {
        return null;
    }
}

$urlsoles = 'https://www.google.com/finance/quote/USD-PEN';
$tipoCambio = obtenerTipoCambioGoogleFinance($urlsoles);





// URL de la API de CoinGecko para obtener el precio de las criptomonedas
$url = "https://api.coingecko.com/api/v3/simple/price?ids=worldcoin-wld,bitcoin,ethereum&vs_currencies=usd";
// Tipo de cambio del dólar a soles
$tipo_cambio = $tipoCambio; // actualizado por google 
// Inicializar cURL
$ch = curl_init();

// Configurar cURL
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Ejecutar cURL y almacenar el resultado
$response = curl_exec($ch);

// Verificar si hubo algún error
if ($response === false) {
    echo "Error en la solicitud: " . curl_error($ch);
    exit;
}

// Cerrar cURL
curl_close($ch);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Verificar si la respuesta contiene los datos esperados
if (isset($data['worldcoin-wld'], $data['bitcoin'], $data['ethereum'])) {
    // Colores para el texto
    $colors = [
        'worldcoin-wld' => 'color: #4CAF50;',  // Verde para Worldcoin
        'bitcoin' => 'color: orange;',        // Naranja para Bitcoin
        'ethereum' => 'color: #3c3c3d;'       // Gris oscuro para Ethereum
    ];
} else {
    echo "No se pudieron obtener los datos de la API.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios de Criptomonedas</title>
    <!-- Agregar Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ1QKkudIu7th0EXO1HTt5Vdo7tM2h5u6AzgdzLPXt5F4K2ErhOncMi2Xl9k" crossorigin="anonymous">
    <style>
        /* Estilos adicionales */
        body {
            background-color: #007bff; /* Fondo azul */
            color: white;
            font-family: Arial, sans-serif;
            padding-top: 50px;
        }
        .container {
            background-color: white; /* Fondo blanco para la sección de valores */
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: white;
            font-size: 36px;
            text-align: center;
        }
        p {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container text-center">
    <h1 style="color: #007bff;">Precios de Criptomonedas en Dólares y Soles</h1>
    <p style="<?php echo $colors['worldcoin-wld']; ?>">
        Worldcoin (WLD): $<?php echo $data['worldcoin-wld']['usd']; ?> 
        (S/.<?php echo number_format($data['worldcoin-wld']['usd'] * $tipo_cambio, 2); ?>)
    </p>
    <p style="<?php echo $colors['bitcoin']; ?>">
        Bitcoin (BTC): $<?php echo $data['bitcoin']['usd']; ?> 
        (S/.<?php echo number_format($data['bitcoin']['usd'] * $tipo_cambio, 2); ?>)
    </p>
    <p style="<?php echo $colors['ethereum']; ?>">
        Ethereum (ETH): $<?php echo $data['ethereum']['usd']; ?> 
        (S/.<?php echo number_format($data['ethereum']['usd'] * $tipo_cambio, 2); ?>)
    </p>
    <center>
    <hr> 
<?php    
if ($tipoCambio !== null) {
    echo "<h3 style='color: #007bff;'> Tipo de cambio actual USD/PEN: " . $tipoCambio ."</h3>";
} else {
    echo "<h3 style='color: #007bff;'> No se pudo obtener el tipo de cambio. </h3> ";
}
?>
    </center>
    
</div>

<center>code by zidrave</center>

    <!-- Agregar Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0P4vxdC7mjqjcivzFxOgAmzLkmWZTtdD45fg8r0pKUM3wEfj" crossorigin="anonymous"></script>
</body>
</html>