<?php
//LIMPIAR CARACTERES ESPECIALES PARA PREVENIR INYECCION SQL
function strClean($cadena)
{
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $cadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace('<script>', '', $string);
    $string = str_ireplace('</script>', '', $string);
    $string = str_ireplace('<script type=>', '', $string);
    $string = str_ireplace('<script src>', '', $string);
    $string = str_ireplace('SELECT * FROM', '', $string);
    $string = str_ireplace('DELETE FROM', '', $string);
    $string = str_ireplace('INSERT INTO', '', $string);
    $string = str_ireplace('SELECT COUNT(*) FROM', '', $string);
    $string = str_ireplace('DROP TABLE', '', $string);
    $string = str_ireplace("OR '1'='1", '', $string);
    $string = str_ireplace('OR ´1´=´1', '', $string);
    $string = str_ireplace('IS NULL', '', $string);
    $string = str_ireplace('LIKE "', '', $string);
    $string = str_ireplace("LIKE '", '', $string);
    $string = str_ireplace('LIKE ´', '', $string);
    $string = str_ireplace('OR "a"="a', '', $string);
    $string = str_ireplace("OR 'a'='a", '', $string);
    $string = str_ireplace('OR ´a´=´a', '', $string);
    $string = str_ireplace('--', '', $string);
    $string = str_ireplace('^', '', $string);
    $string = str_ireplace('[', '', $string);
    $string = str_ireplace(']', '', $string);
    $string = str_ireplace('==', '', $string);
    return $string;
}

//CREAR SLUG (un SLUG es una pequeña parte de un enlace que permite identificar un contenido especifico en una web)
function slugify($text, string $divider = '-')
{
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

//LIMITAR CADENA (limitamos la cantidad de caracteres que necesitamos mostrar)
function limitar_cadena($cadena, $limite, $sufijo)
{
    // Si la longitud es mayor que el límite...
    if (strlen($cadena) > $limite) {
        // Entonces corta la cadena y ponle el sufijo
        return substr($cadena, 0, $limite) . $sufijo;
    }

    // Si no, entonces devuelve la cadena normal
    return $cadena;
}

//PERSONALIZAR FECHA
function fechaPerzo($fecha)
{
    $datos = explode('-', $fecha);
    $anio = $datos[0];
    $me = ltrim($datos[1], "0");
    $dia = $datos[2];
    $mes = array(
        "",
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre"
    );
    return $dia . " de " . $mes[$me] . " de " . $anio;
}

//VALIDAR CAMPOS REQUERIDOS
function validarCampos($campos)
{
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            return false;
        }
    }
    return true;
}

//AGREGAR PRODUCTOS AL CARRITO(crea un array de sesiones para el modulo de ventas)
function addToCart($carrito, $id, $nombre, $precio, $token, $cant = 1)
{
    if (!isset($_SESSION[$carrito])) {
        $_SESSION[$carrito] = [];
    }

    $cart = $_SESSION[$carrito];

    $product = [
        'id' => $id,
        'name' => $nombre,
        'price' => $precio,
        'token' => $token,
        'quantity' => $cant
    ];

    // Verificar si el producto ya está en el carrito y actualizar la cantidad si es necesario
    $found = false;
    foreach ($cart as &$item) {
        if ($item['id'] === $id && $item['token'] === $token) {
            $item['quantity']++;
            $found = true;
            break;
        }
    }

    // Si no se encontró el producto en el carrito, agrégalo
    if (!$found) {
        $cart[] = $product;
    }

    $_SESSION[$carrito] = $cart;

    // Preparar una respuesta JSON
    $response = [
        'status' => 'success',
        'message' => 'Producto agregado.'
    ];

    return $response;
}
