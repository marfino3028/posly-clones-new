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

    'accepted' => 'Kolom :attribute harus di checklist.',
    'active_url' => 'Kolom :attribute bukan URL valid.',
    'after' => 'Kolom :attribute harus tanggal setelah :date.',
    'after_or_equal' => 'Kolom :attribute tanggal setelah atau sama dengan :date.',
    'alpha' => 'Kolom :attribute hanya boleh berupa huruf.',
    'alpha_dash' => 'Kolom :attribute hanya boleh huruf, angka, strip (-) dan underscores (_).',
    'alpha_num' => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array' => 'Kolom :attribute harus berupa data array.',
    'before' => 'Kolom :attribute berisi tanggal sebelum :date.',
    'before_or_equal' => 'Kolom :attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => 'Kolom :attribute harus berada di antara :min dan :max.',
        'file' => 'Kolom :attribute harus antara :min dan :max kilobyte.',
        'string' => 'Kolom :attribute harus berada di antara karakter :min dan :max.',
        'array' => 'Kolom :attribute harus berada di antara item :min dan :max.',
    ],
    'boolean' => 'Kolom :attribute harus benar atau salah.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => 'Kolom :attribute bukan tanggal yang valid.',
    'date_equals' => 'Kolom :attribute harus berupa tanggal yang sama dengan :date.',
    'date_format' => 'Kolom :attribute tidak cocok dengan format :format.',
    'different' => 'Kolom :attribute dan :other harus berbeda.',
    'digits' => 'Kolom :attribute harus berupa :digits digit.',
    'digits_between' => 'Kolom :attribute harus berada di antara angka :min dan :max.',
    'dimensions' => 'Kolom :attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => 'Kolom :attribute mempunyai nilai duplikat.',
    'email' => 'Kolom :attribute harus berupa alamat email yang valid.',
    'ends_with' => 'Kolom :attribute harus diakhiri dengan salah satu dari yang berikut: :values.',
    'exists' => 'Kolom :attribute yang dipilih tidak valid.',
    'file' => 'Kolom :attribute harus berupa file.',
    'filled' => 'Kolom :attribute harus mempunyai nilai.',
    'gt' => [
        'numeric' => 'Kolom :attribute harus lebih besar dari :value.',
        'file' => 'Kolom :attribute harus lebih besar dari :value kilobyte.',
        'string' => 'Karakter :attribute harus lebih besar dari :value.',
        'array' => 'Item :attribute harus lebih dari :value.',
    ],
    'gte' => [
        'numeric' => 'Kolom :attribute harus lebih besar dari :value.',
        'file' => 'Kolom :attribute harus lebih besar dari :value kilobyte.',
        'string' => 'Karakter :attribute harus lebih besar dari :value.',
        'array' => 'Item :attribute harus lebih dari :value.',
    ],
    'image' => 'Kolom :attribute harus berupa gambar.',
    'in' => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array' => 'Kolom :attribute tidak ada di :other.',
    'integer' => 'Isi :attribute harus berupa integer.',
    'ip' => 'Kolom :attribute harus berupa alamat IP yang valid.',
    'ipv4' => 'Kolom :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6' => 'Kolom :attribute harus berupa alamat IPv6 yang valid.',
    'json' => 'Kolom :attribute harus berupa string JSON yang valid.',
    'lt' => [
        'numeric' => 'Kolom :attribute harus lebih kecil dari :value.',
        'file' => 'Kolom :attribute harus kurang dari :value kilobyte.',
        'string' => 'Karakter :attribute harus kurang dari :value.',
        'array' => 'Item :attribute harus kurang dari :value.',
    ],
    'lte' => [
        'numeric' => 'Kolom :attribute harus lebih kecil dari :value.',
        'file' => 'Kolom :attribute harus kurang dari :value kilobyte.',
        'string' => 'Karakter :attribute harus kurang dari :value.',
        'array' => 'Item :attribute harus kurang dari :value.',
    ],
    'max' => [
        'numeric' => ' :attribute tidak boleh lebih besar dari :max.',
        'file' => ' :attribute tidak boleh lebih besar dari :max kilobyte.',
        'string' => ' :attribute tidak boleh lebih besar dari :max karakter.',
        'array' => 'Item :attribute tidak boleh lebih dari :max.',
    ],
    'mimes' => ' :attribute harus berupa file dengan tipe: :values.',
    'mimetypes' => ' :attribute harus berupa file dengan tipe: :values.',
    'min' => [
        'numeric' => ':attribute minimal harus :min.',
        'file' => ' :attribute minimal harus :min kilobyte.',
        'string' => ' :attribute minimal harus terdiri dari :min karakter.',
        'array' => ' :attribute harus memiliki setidaknya :min item.',
    ],
    'not_in' => 'Atribut yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => 'Isi :attribute harus berupa angka.',
    'password' => 'Kata sandi salah.',
    'present' => 'Kolom :attribute harus ada.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Kolom :attribute wajib diisi.',
    'required_if' => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_unless' => 'Kolom :attribute wajib diisi kecuali :other ada di :values.',
    'required_with' => 'Kolom :attribute wajib diisi bila :values ​​ada.',
    'required_with_all' => 'Bidang :attribute diperlukan jika :values ​​ada.',
    'required_without' => 'Bidang :attribute diperlukan bila :values ​​tidak ada.',
    'required_without_all' => 'Kolom :attribute wajib diisi jika :values ​​tidak ada.',
    'same' => ' :attribute dan :other harus cocok.',
    'size' => [
        'numeric' => ' :attribute harus :size.',
        'file' => ' :attribute harus :ukuran kilobyte.',
        'string' => ' :attribute harus berupa karakter :size.',
        'array' => ' :attribute harus berisi item :size.',
    ],
    'starts_with' => ' :attribute harus diawali dengan salah satu dari berikut ini: :values.',
    'string' => ':attribute harus berupa string.',
    'timezone' => ' :attribute harus berupa zona yang valid.',
    'unique' => ' :attribute sudah dipakai.',
    'uploaded' => ' :attribute gagal diunggah.',
    'url' => 'Format :attribute tidak valid.',
    'uuid' => ' :attribute harus berupa UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
