<?php

use App\Models\Contact;
use App\Models\Number;

function footer(){
    return [
        'contacts' => Contact::all(),
        'numbers' => Number::all(),
    ];
}

?>

