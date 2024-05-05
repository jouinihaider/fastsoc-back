<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Ce :attribute doit être accepté.',
    'active_url' => 'Ce :attribute n\'est pas une URL valide.',
    'after' => 'Ce :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'Ce :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Ce :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'Ce :attribute ne doit contenir que des lettres, des chiffres, des tirets ou des underscores.',
    'alpha_num' => 'Ce :attribute ne doit contenir que des lettres ou des chiffres.',
    'array' => 'Ce :attribute doit être un tableau.',
    'before' => 'Ce :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Ce :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Ce :attribute doit être entre :min et :max.',
        'file' => 'Ce :attribute doit être entre :min and :max kilobytes.',
        'string' => 'Ce :attribute doit être entre :min and :max caractères.',
        'array' => 'Ce :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Ce champ :attribute doit être vrai ou faux.',
    'confirmed' => 'La confirmation :attribute  ne correspond pas.',
    'date' => 'Ce :attribute n\'est pas une date valide.',
    'date_equals' => 'Ce :attribute doit être une date égale à :date.',
    'date_format' => 'Ce :attribute ne correspond pas au format :format.',
    'different' => ':attribute et :other doivent être différents.',
    'digits' => 'Ce :attribute doit avoir :digits chiffres.',
    'digits_between' => ':attribute doit avoir entre :min et :max chiffres.',
    'dimensions' => 'Le :attribute a des dimensions d\'image invalide.',
    'distinct' => 'Le champ :attribute a une valeur en double.',
    'email' => 'Le :attribute doit être une adresse email valide.',
    'ends_with' => 'Le :attribute doit se terminer avec un des caractères suivants: :values.',
    'exists' => 'Le :attribute sélectionné est invalide.',
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute doit être renseigné.',
    'gt' => [
        'numeric' => ':attribute doit être supérieur à :value.',
        'file' => ':attribute doit être supérieur ou égal à :value kilobytes.',
        'string' => ':attribute doit avoir plus de :value caractères.',
        'array' => ':attribute doit contenir plus de :value éléments.',
    ],
    'gte' => [
        'numeric' => ':attribute doit être supérieur à :value.',
        'file' => ':attribute doit être supérieur ou égal à :value kilobytes.',
        'string' => ':attribute doit avoir au moins :value caractères.',
        'array' => ':attribute doit avoir au moins :value éléments.',
    ],
    'image' => ':attribute doit être une image.',
    'in' => 'Le :attribute sélectionné est invalide.',
    'in_array' => 'Le champ  :attribute n\'existe pas dans :other.',
    'integer' => ':attribute doit être un entier.',
    'ip' => ':attribute doit être une adresse IP valide.',
    'ipv4' => 'doit être une adresse IPv4 valide.',
    'ipv6' => 'doit être une adresse IPv6 valide.',
    'json' => ':attribute doit être un chaîne JSON valide.',
    'lt' => [
        'numeric' => ':attribute doit être plus petit que :value.',
        'file' => ':attribute doit être plus petit que :value kilobytes.',
        'string' => ':attribute doit avoir moins de :value caractères.',
        'array' => ':attribute doit avoir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => ':attribute doit être plus petit ou égal à :value.',
        'file' => ':attribute oit être plus petit ou égal à :value kilobytes.',
        'string' => ':attribute doit avoir moins de :value caractères.',
        'array' => ':attribute ne doit pas avoir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => ':attribute ne doit pas être plus grand que :max.',
        'file' => ':attribute ne doit pas être plus grand que :max kilobytes.',
        'string' => ':attribute ne doit pas avoir plus de :max caractères.',
        'array' => ':attribute ne doit pas avoir plus de :max éléments.',
    ],
    'mimes' => ' :attribute doit être un fichier de type :values.',
    'mimetypes' => ':attribute doit être un fichier de type :values.',
    'min' => [
        'numeric' => ':attribute doit être au moins :min.',
        'file' => ':attribute doit être au moins de :min kilobytes.',
        'string' => ':attribute doit avoir au moins :min caractères.',
        'array' => ':attribute doit avoir au moins :min éléments.',
    ],
    'not_in' => 'Le :attribute sélectionné est invalide.',
    'not_regex' => 'Le format de :attribute est invalide.',
    'numeric' => ':attribute doit être un nombre.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le champ :attribute doit être renseigné.',
    'regex' => 'Le format de :attribute est invalide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'required_if' => 'Le champ :attribute est obligatoire quand :other est :value.',
    'required_unless' => 'Le champ :attribute est obligatoire sauf si  :other est dans :values.',
    'required_with' => 'Le champ :attribute est obligatoire quand :values est renseigné.',
    'required_with_all' => 'Le champ :attribute est obligatoire quand :values sont renseignés.',
    'required_without' => 'Le champ :attribute est obligatoire quand :values n\'est pas renseigné.',
    'required_without_all' => 'Le champ :attribute est obligatoire quand aucun de :values n\'est renseigné.',
    'same' => ':attribute  et :other doivent correspondre.',
    'size' => [
        'numeric' => ':attribute doit être :size.',
        'file' => ':attribute doit être  :size kilobytes.',
        'string' => ':attribute doit être :size caractères.',
        'array' => ':attribute doit contenir :size éléments.',
    ],
    'starts_with' => ':attribute doit commencer par une des valeurs suivantes: :values.',
    'string' => ':attribute doit être une chaîne de caractères.',
    'timezone' => ':attribute doit être une zone valide.',
    'unique' => ' :attribute n\'est pas disponible.',
    'uploaded' => 'Le chargement de :attribute a échoué.',
    'url' => 'Le format de :attribute est invalide.',
   ];
