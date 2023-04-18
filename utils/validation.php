<?php
function validateRequiredFields($data) {
    // Validate required fields
    if (!isset($data['firstName']) || !isset($data['lastName'])) {
        return false;
    }
    return true;
}
