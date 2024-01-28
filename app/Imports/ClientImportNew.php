<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithValidation;

class ClientImportNew implements
    ToModel,
    SkipsOnFailure,
    WithValidation,
    WithChunkReading,
    ShouldQueue,
    WithHeadingRow
{
    use Importable, SkipsFailures;

    public function getNumberOrder()
    {
        $last = DB::table('clients')->latest('id')->first();

        if ($last) {
            $code = $last->code + 1;
        } else {
            $code = 1;
        }
        return $code;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user_auth = auth()->user();
        $user = User::create([
            'username'  => strtolower(str_replace(" ", "", $row['nama'])),
            'email'     => $row['email'],
            'avatar'    => 'no_avatar.png',
            'password'  => Hash::make("password"),
            'role_users_id'   => 3,
            'status'    => 1,
            'is_all_warehouses'    => 1,
            'created_at' => Carbon::now()
        ]);

        return new Client([
            'user_id' => $user->id ?? $user_auth,
            'code' => $this->getNumberOrder(),
            'username' => $row['nama'],
            'email' => $row['email'],
            'phone' => $row['telepon'],
            'city' => $row['kota'],
            'postal_code' => $row['kode_pos'],
            'address' => $row['alamat'],
            'office_name' => $row['nama_kantor'],
            'office_phone' => $row['telepon_kantor'],
            'office_address' => $row['alamat_kantor'],
            'office_postal_code' => $row['kode_pos_kantor'],
            'status' => 1,
            'photo' => 'no_avatar.png'
        ]);
    }

    public function rules(): array
    {
        return [
            '*.nama' => ['required'],
            '*.email' => 'required|email:rfc,dns|unique:clients,email',
            '*.telepon' => ['nullable', 'numeric'],
            '*.kode_pos' => ['nullable', 'numeric'],
            '*.telepon_kantor' => ['nullable', 'numeric'],
            '*.kode_pos_kantor' => ['nullable', 'numeric'],
        ];
    }

    // public function customValidationMessages()
    // {
    //     return [
    //         '*.nama.required' => 'Nama tidak boleh kosong',
    //         '*.email' => [
    //             'required' => 'We need to know your email address!',
    //             'unique' => 'Email sudah terdaftar',
    //         ],
    //         '*.telepon.integer' => 'Telepon harus berisi angka',
    //         '*.kode_pos.integer' => 'Kode POS harus berisi angka',
    //         '*.telepon_kantor.integer' => 'Telepon kantor harus berisi angka',
    //         '*.kode_pos_kantor.integer' => 'Kode POS Kantor harus berisi angka',
    //     ];
    // }

    public function chunkSize(): int
    {
        return 100;
    }
}
