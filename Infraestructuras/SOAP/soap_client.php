<?php
try {
    // Configurar el cliente SOAP con la URL del servicio y desactivar la verificación SSL
    $client = new SoapClient("http://localhost:8080/soap_service.php?wsdl", [
        'stream_context' => stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ]
        ])
    ]);

    // Llamar al método sayHello en el servicio SOAP
    $result = $client->sayHello();
    
    // Mostrar el resultado
    echo $result;

} catch (SoapFault $e) {
    echo "Error: " . $e->getMessage();
}
?>

