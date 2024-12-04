<?php
// Definir el servicio SOAP
class SoapService {
    public function sayHello() {
        return "HOLA MUNDO";
    }
}

// Configurar el servidor SOAP
$options = [
    'uri' => 'http://localhost:8080/',
    'location' => 'http://localhost:8080/soap_service.php',
];

// Comprobar si el parámetro 'wsdl' está presente en la URL
if (isset($_GET['wsdl'])) {
    // Generar el WSDL automáticamente
    $server = new SoapServer(null, $options);
    $server->setClass('SoapService');
    $server->handle(); // Esto devolverá el WSDL cuando se acceda a 'soap_service.php?wsdl'
} else {
    // Aquí se maneja la llamada normal a un servicio SOAP
    $server = new SoapServer(null, $options);
    $server->setClass('SoapService');
    $server->handle(); // Esto manejará la llamada normal al servicio
}
?>
