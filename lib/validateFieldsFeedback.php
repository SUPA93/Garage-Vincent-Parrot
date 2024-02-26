<?php
// vREGEX FOR FEEDBACK FORM

function validateFeedbackData($data)
{
    $errors = [];
    $escapeHTML = function ($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    };
    // validation for firstName
    if (empty($data['firstName'])) {
        $errors[] = "Merci de renseigner votre prenom ";
    } elseif (!preg_match("/^[A-Za-zàâçéèêëîïôûùüÿñæœ -]+$/", $data['firstName'])) {
        $errors[] = "Le prénom ne peut contenir que des lettres, des espaces, des tirets (-) et des caractères accentués.";
    }

    // validation for firstName
    if (empty($data['familyName'])) {
        $errors[] = "Merci de renseigner votre nom de famille ";
    } elseif (!preg_match("/^[A-Za-zàâçéèêëîïôûùüÿñæœ -]+$/", $data['familyName'])) {
        $errors[] = "Le prénom ne peut contenir que des lettres, des espaces, des tirets (-) et des caractères accentués.";
    }
    // Validation for userMessage
    if (!empty($data['userMessage'])) {
        
        $maxCommentLength = 50; 
        if (strlen($data['userMessage']) > $maxCommentLength) {
            $errors[] = "Le commentaire ne peut pas dépasser {$maxCommentLength} caractères.";
        }
        
    } else {
        $errors[] = "Merci de laisser un commentaire.";
    }
    return $errors;
}
