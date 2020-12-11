<?php

function getAlert($mensaje, $tipoDeAlert) {
    return '<div class="alert alert-' . $tipoDeAlert . '" role="alert">' . $mensaje . '</div>';
}
