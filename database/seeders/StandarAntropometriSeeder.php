<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StandarAntropometri;

class StandarAntropometriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '0',
            'indeks' => 'BB/U',
            'median' => 3.3,
            'sd_negatif_1' => 2.9,
            'sd_negatif_2' => 2.5,
            'sd_negatif_3' => 2.1,
            'sd_positif_1' => 3.9,
            'sd_positif_2' => 4.4,
            'sd_positif_3' => 5.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '1',
            'indeks' => 'BB/U',
            'median' => 4.5,
            'sd_negatif_1' => 3.9,
            'sd_negatif_2' => 3.4,
            'sd_negatif_3' => 2.9,
            'sd_positif_1' => 5.1,
            'sd_positif_2' => 5.8,
            'sd_positif_3' => 6.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '2',
            'indeks' => 'BB/U',
            'median' => 5.6,
            'sd_negatif_1' => 4.9,
            'sd_negatif_2' => 4.3,
            'sd_negatif_3' => 3.8,
            'sd_positif_1' => 6.3,
            'sd_positif_2' => 7.1,
            'sd_positif_3' => 8.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '3',
            'indeks' => 'BB/U',
            'median' => 6.4,
            'sd_negatif_1' => 5.7,
            'sd_negatif_2' => 5.0,
            'sd_negatif_3' => 4.4,
            'sd_positif_1' => 7.2,
            'sd_positif_2' => 8.0,
            'sd_positif_3' => 9.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '4',
            'indeks' => 'BB/U',
            'median' => 7.0,
            'sd_negatif_1' => 6.2,
            'sd_negatif_2' => 5.6,
            'sd_negatif_3' => 4.9,
            'sd_positif_1' => 7.8,
            'sd_positif_2' => 8.7,
            'sd_positif_3' => 9.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '5',
            'indeks' => 'BB/U',
            'median' => 7.5,
            'sd_negatif_1' => 6.7,
            'sd_negatif_2' => 6.0,
            'sd_negatif_3' => 5.3,
            'sd_positif_1' => 8.4,
            'sd_positif_2' => 9.3,
            'sd_positif_3' => 10.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '6',
            'indeks' => 'BB/U',
            'median' => 7.9,
            'sd_negatif_1' => 7.1,
            'sd_negatif_2' => 6.4,
            'sd_negatif_3' => 5.7,
            'sd_positif_1' => 8.8,
            'sd_positif_2' => 9.8,
            'sd_positif_3' => 10.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '7',
            'indeks' => 'BB/U',
            'median' => 8.3,
            'sd_negatif_1' => 7.4,
            'sd_negatif_2' => 6.7,
            'sd_negatif_3' => 5.9,
            'sd_positif_1' => 9.2,
            'sd_positif_2' => 10.3,
            'sd_positif_3' => 11.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '8',
            'indeks' => 'BB/U',
            'median' => 8.6,
            'sd_negatif_1' => 7.7,
            'sd_negatif_2' => 6.9,
            'sd_negatif_3' => 6.2,
            'sd_positif_1' => 9.6,
            'sd_positif_2' => 10.7,
            'sd_positif_3' => 11.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '9',
            'indeks' => 'BB/U',
            'median' => 8.9,
            'sd_negatif_1' => 8.0,
            'sd_negatif_2' => 7.1,
            'sd_negatif_3' => 6.4,
            'sd_positif_1' => 9.9,
            'sd_positif_2' => 11.0,
            'sd_positif_3' => 12.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '10',
            'indeks' => 'BB/U',
            'median' => 9.2,
            'sd_negatif_1' => 8.2,
            'sd_negatif_2' => 7.4,
            'sd_negatif_3' => 6.6,
            'sd_positif_1' => 10.2,
            'sd_positif_2' => 11.4,
            'sd_positif_3' => 12.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '11',
            'indeks' => 'BB/U',
            'median' => 9.4,
            'sd_negatif_1' => 8.4,
            'sd_negatif_2' => 7.6,
            'sd_negatif_3' => 6.8,
            'sd_positif_1' => 10.5,
            'sd_positif_2' => 11.7,
            'sd_positif_3' => 13.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '12',
            'indeks' => 'BB/U',
            'median' => 9.6,
            'sd_negatif_1' => 8.6,
            'sd_negatif_2' => 7.7,
            'sd_negatif_3' => 6.9,
            'sd_positif_1' => 10.8,
            'sd_positif_2' => 12.0,
            'sd_positif_3' => 13.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '13',
            'indeks' => 'BB/U',
            'median' => 9.9,
            'sd_negatif_1' => 8.8,
            'sd_negatif_2' => 7.9,
            'sd_negatif_3' => 7.1,
            'sd_positif_1' => 11.0,
            'sd_positif_2' => 12.3,
            'sd_positif_3' => 13.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '14',
            'indeks' => 'BB/U',
            'median' => 10.1,
            'sd_negatif_1' => 9.0,
            'sd_negatif_2' => 8.1,
            'sd_negatif_3' => 7.2,
            'sd_positif_1' => 11.3,
            'sd_positif_2' => 12.6,
            'sd_positif_3' => 14.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '15',
            'indeks' => 'BB/U',
            'median' => 10.3,
            'sd_negatif_1' => 9.2,
            'sd_negatif_2' => 8.3,
            'sd_negatif_3' => 7.4,
            'sd_positif_1' => 11.5,
            'sd_positif_2' => 12.8,
            'sd_positif_3' => 14.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '16',
            'indeks' => 'BB/U',
            'median' => 10.5,
            'sd_negatif_1' => 9.4,
            'sd_negatif_2' => 8.4,
            'sd_negatif_3' => 7.5,
            'sd_positif_1' => 11.7,
            'sd_positif_2' => 13.1,
            'sd_positif_3' => 14.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '17',
            'indeks' => 'BB/U',
            'median' => 10.7,
            'sd_negatif_1' => 9.6,
            'sd_negatif_2' => 8.6,
            'sd_negatif_3' => 7.7,
            'sd_positif_1' => 12.0,
            'sd_positif_2' => 13.4,
            'sd_positif_3' => 14.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '18',
            'indeks' => 'BB/U',
            'median' => 10.9,
            'sd_negatif_1' => 9.8,
            'sd_negatif_2' => 8.8,
            'sd_negatif_3' => 7.8,
            'sd_positif_1' => 12.2,
            'sd_positif_2' => 13.7,
            'sd_positif_3' => 15.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '19',
            'indeks' => 'BB/U',
            'median' => 11.1,
            'sd_negatif_1' => 10.0,
            'sd_negatif_2' => 8.9,
            'sd_negatif_3' => 8.0,
            'sd_positif_1' => 12.5,
            'sd_positif_2' => 13.9,
            'sd_positif_3' => 15.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '20',
            'indeks' => 'BB/U',
            'median' => 11.3,
            'sd_negatif_1' => 10.1,
            'sd_negatif_2' => 9.1,
            'sd_negatif_3' => 8.1,
            'sd_positif_1' => 12.7,
            'sd_positif_2' => 14.2,
            'sd_positif_3' => 15.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '21',
            'indeks' => 'BB/U',
            'median' => 11.5,
            'sd_negatif_1' => 10.3,
            'sd_negatif_2' => 9.2,
            'sd_negatif_3' => 8.2,
            'sd_positif_1' => 12.9,
            'sd_positif_2' => 14.5,
            'sd_positif_3' => 16.2
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '22',
            'indeks' => 'BB/U',
            'median' => 11.8,
            'sd_negatif_1' => 10.5,
            'sd_negatif_2' => 9.4,
            'sd_negatif_3' => 8.4,
            'sd_positif_1' => 13.2,
            'sd_positif_2' => 14.7,
            'sd_positif_3' => 16.5
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '23',
            'indeks' => 'BB/U',
            'median' => 12.0,
            'sd_negatif_1' => 10.7,
            'sd_negatif_2' => 9.5,
            'sd_negatif_3' => 8.5,
            'sd_positif_1' => 13.4,
            'sd_positif_2' => 15.0,
            'sd_positif_3' => 16.8
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '24',
            'indeks' => 'BB/U',
            'median' => 12.2,
            'sd_negatif_1' => 10.8,
            'sd_negatif_2' => 9.7,
            'sd_negatif_3' => 8.6,
            'sd_positif_1' => 13.6,
            'sd_positif_2' => 15.3,
            'sd_positif_3' => 17.1
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '25',
            'indeks' => 'BB/U',
            'median' => 12.4,
            'sd_negatif_1' => 11.0,
            'sd_negatif_2' => 9.8,
            'sd_negatif_3' => 8.8,
            'sd_positif_1' => 13.9,
            'sd_positif_2' => 15.5,
            'sd_positif_3' => 17.5
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '26',
            'indeks' => 'BB/U',
            'median' => 12.5,
            'sd_negatif_1' => 11.2,
            'sd_negatif_2' => 10.0,
            'sd_negatif_3' => 8.9,
            'sd_positif_1' => 14.1,
            'sd_positif_2' => 15.8,
            'sd_positif_3' => 17.8
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '27',
            'indeks' => 'BB/U',
            'median' => 12.7,
            'sd_negatif_1' => 11.3,
            'sd_negatif_2' => 10.1,
            'sd_negatif_3' => 9.0,
            'sd_positif_1' => 14.3,
            'sd_positif_2' => 16.1,
            'sd_positif_3' => 18.1
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '28',
            'indeks' => 'BB/U',
            'median' => 12.9,
            'sd_negatif_1' => 11.5,
            'sd_negatif_2' => 10.2,
            'sd_negatif_3' => 9.1,
            'sd_positif_1' => 14.5,
            'sd_positif_2' => 16.3,
            'sd_positif_3' => 18.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '29',
            'indeks' => 'BB/U',
            'median' => 13.1,
            'sd_negatif_1' => 11.7,
            'sd_negatif_2' => 10.4,
            'sd_negatif_3' => 9.2,
            'sd_positif_1' => 14.8,
            'sd_positif_2' => 16.6,
            'sd_positif_3' => 18.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '30',
            'indeks' => 'BB/U',
            'median' => 13.3,
            'sd_negatif_1' => 11.8,
            'sd_negatif_2' => 10.5,
            'sd_negatif_3' => 9.4,
            'sd_positif_1' => 15.0,
            'sd_positif_2' => 16.9,
            'sd_positif_3' => 19.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '31',
            'indeks' => 'BB/U',
            'median' => 13.5,
            'sd_negatif_1' => 12.0,
            'sd_negatif_2' => 10.7,
            'sd_negatif_3' => 9.5,
            'sd_positif_1' => 15.2,
            'sd_positif_2' => 17.1,
            'sd_positif_3' => 19.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '32',
            'indeks' => 'BB/U',
            'median' => 13.7,
            'sd_negatif_1' => 12.1,
            'sd_negatif_2' => 10.8,
            'sd_negatif_3' => 9.6,
            'sd_positif_1' => 15.4,
            'sd_positif_2' => 17.4,
            'sd_positif_3' => 19.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '33',
            'indeks' => 'BB/U',
            'median' => 13.8,
            'sd_negatif_1' => 12.3,
            'sd_negatif_2' => 10.9,
            'sd_negatif_3' => 9.7,
            'sd_positif_1' => 15.6,
            'sd_positif_2' => 17.6,
            'sd_positif_3' => 19.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '34',
            'indeks' => 'BB/U',
            'median' => 14.0,
            'sd_negatif_1' => 12.4,
            'sd_negatif_2' => 11.0,
            'sd_negatif_3' => 9.8,
            'sd_positif_1' => 15.8,
            'sd_positif_2' => 17.8,
            'sd_positif_3' => 20.2
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '35',
            'indeks' => 'BB/U',
            'median' => 14.2,
            'sd_negatif_1' => 12.6,
            'sd_negatif_2' => 11.2,
            'sd_negatif_3' => 9.9,
            'sd_positif_1' => 16.0,
            'sd_positif_2' => 18.1,
            'sd_positif_3' => 20.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '36',
            'indeks' => 'BB/U',
            'median' => 14.3,
            'sd_negatif_1' => 12.7,
            'sd_negatif_2' => 11.3,
            'sd_negatif_3' => 10.0,
            'sd_positif_1' => 16.2,
            'sd_positif_2' => 18.3,
            'sd_positif_3' => 20.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '37',
            'indeks' => 'BB/U',
            'median' => 14.5,
            'sd_negatif_1' => 12.9,
            'sd_negatif_2' => 11.4,
            'sd_negatif_3' => 10.1,
            'sd_positif_1' => 16.4,
            'sd_positif_2' => 18.6,
            'sd_positif_3' => 21.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '38',
            'indeks' => 'BB/U',
            'median' => 14.7,
            'sd_negatif_1' => 13.0,
            'sd_negatif_2' => 11.5,
            'sd_negatif_3' => 10.2,
            'sd_positif_1' => 16.6,
            'sd_positif_2' => 18.8,
            'sd_positif_3' => 21.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '39',
            'indeks' => 'BB/U',
            'median' => 14.8,
            'sd_negatif_1' => 13.1,
            'sd_negatif_2' => 11.6,
            'sd_negatif_3' => 10.3,
            'sd_positif_1' => 16.8,
            'sd_positif_2' => 19.0,
            'sd_positif_3' => 21.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '40',
            'indeks' => 'BB/U',
            'median' => 15.0,
            'sd_negatif_1' => 13.3,
            'sd_negatif_2' => 11.8,
            'sd_negatif_3' => 10.4,
            'sd_positif_1' => 17.0,
            'sd_positif_2' => 19.3,
            'sd_positif_3' => 21.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '41',
            'indeks' => 'BB/U',
            'median' => 15.2,
            'sd_negatif_1' => 13.4,
            'sd_negatif_2' => 11.9,
            'sd_negatif_3' => 10.5,
            'sd_positif_1' => 17.2,
            'sd_positif_2' => 19.5,
            'sd_positif_3' => 22.1
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '42',
            'indeks' => 'BB/U',
            'median' => 15.3,
            'sd_negatif_1' => 13.6,
            'sd_negatif_2' => 12.0,
            'sd_negatif_3' => 10.6,
            'sd_positif_1' => 17.4,
            'sd_positif_2' => 19.7,
            'sd_positif_3' => 22.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '43',
            'indeks' => 'BB/U',
            'median' => 15.5,
            'sd_negatif_1' => 13.7,
            'sd_negatif_2' => 12.1,
            'sd_negatif_3' => 10.7,
            'sd_positif_1' => 17.6,
            'sd_positif_2' => 20.0,
            'sd_positif_3' => 22.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '44',
            'indeks' => 'BB/U',
            'median' => 15.7,
            'sd_negatif_1' => 13.8,
            'sd_negatif_2' => 12.2,
            'sd_negatif_3' => 6.9,
            'sd_positif_1' => 10.8,
            'sd_positif_2' => 12.0,
            'sd_positif_3' => 13.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '45',
            'indeks' => 'BB/U',
            'median' => 15.8,
            'sd_negatif_1' => 14.0,
            'sd_negatif_2' => 12.4,
            'sd_negatif_3' => 10.9,
            'sd_positif_1' => 18.0,
            'sd_positif_2' => 20.5,
            'sd_positif_3' => 23.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '46',
            'indeks' => 'BB/U',
            'median' => 16.0,
            'sd_negatif_1' => 14.1 ,
            'sd_negatif_2' => 12.5,
            'sd_negatif_3' => 11.0,
            'sd_positif_1' => 18.2,
            'sd_positif_2' => 20.7,
            'sd_positif_3' => 23.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '47',
            'indeks' => 'BB/U',
            'median' => 16.2 ,
            'sd_negatif_1' => 14.3,
            'sd_negatif_2' => 12.6,
            'sd_negatif_3' => 11.1,
            'sd_positif_1' => 18.4,
            'sd_positif_2' => 20.9,
            'sd_positif_3' => 23.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '48',
            'indeks' => 'BB/U',
            'median' => 16.3,
            'sd_negatif_1' => 14.4,
            'sd_negatif_2' => 12.7,
            'sd_negatif_3' => 11.2,
            'sd_positif_1' => 18.6,
            'sd_positif_2' => 21.2,
            'sd_positif_3' => 24.2
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '49',
            'indeks' => 'BB/U',
            'median' => 16.5,
            'sd_negatif_1' => 14.5,
            'sd_negatif_2' => 12.8,
            'sd_negatif_3' => 11.3,
            'sd_positif_1' => 18.8,
            'sd_positif_2' => 21.4,
            'sd_positif_3' => 24.5
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '50',
            'indeks' => 'BB/U',
            'median' => 16.7,
            'sd_negatif_1' => 14.7,
            'sd_negatif_2' => 12.9,
            'sd_negatif_3' => 11.4,
            'sd_positif_1' => 19.0,
            'sd_positif_2' => 21.7 ,
            'sd_positif_3' => 24.8
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '51',
            'indeks' => 'BB/U',
            'median' => 16.8,
            'sd_negatif_1' => 14.8,
            'sd_negatif_2' => 13.1,
            'sd_negatif_3' => 11.5,
            'sd_positif_1' => 19.2,
            'sd_positif_2' => 21.9,
            'sd_positif_3' => 25.1
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '52',
            'indeks' => 'BB/U',
            'median' => 17.0,
            'sd_negatif_1' => 15.0,
            'sd_negatif_2' => 13.2,
            'sd_negatif_3' => 11.6,
            'sd_positif_1' => 19.4,
            'sd_positif_2' => 22.2,
            'sd_positif_3' => 25.4
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '53',
            'indeks' => 'BB/U',
            'median' => 17.2,
            'sd_negatif_1' => 15.1,
            'sd_negatif_2' => 13.3,
            'sd_negatif_3' => 11.7,
            'sd_positif_1' => 19.6,
            'sd_positif_2' => 22.4,
            'sd_positif_3' => 25.7
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '54',
            'indeks' => 'BB/U',
            'median' => 17.3,
            'sd_negatif_1' => 15.2,
            'sd_negatif_2' => 13.4,
            'sd_negatif_3' => 11.8,
            'sd_positif_1' => 19.8,
            'sd_positif_2' => 22.7,
            'sd_positif_3' => 26.0
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '55',
            'indeks' => 'BB/U',
            'median' => 17.5,
            'sd_negatif_1' => 15.4,
            'sd_negatif_2' => 13.5,
            'sd_negatif_3' => 11.9,
            'sd_positif_1' => 20.0,
            'sd_positif_2' => 22.9 ,
            'sd_positif_3' => 26.3
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '56',
            'indeks' => 'BB/U',
            'median' => 17.7,
            'sd_negatif_1' => 15.5,
            'sd_negatif_2' => 13.6,
            'sd_negatif_3' => 12.0,
            'sd_positif_1' => 20.2,
            'sd_positif_2' => 23.2,
            'sd_positif_3' => 26.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '57',
            'indeks' => 'BB/U',
            'median' => 17.8,
            'sd_negatif_1' => 15.6,
            'sd_negatif_2' => 13.7,
            'sd_negatif_3' => 12.1,
            'sd_positif_1' => 20.4,
            'sd_positif_2' => 23.4,
            'sd_positif_3' => 26.9
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '58',
            'indeks' => 'BB/U',
            'median' => 18.0,
            'sd_negatif_1' => 15.8,
            'sd_negatif_2' => 13.8,
            'sd_negatif_3' => 12.2,
            'sd_positif_1' => 20.6,
            'sd_positif_2' => 23.7,
            'sd_positif_3' => 27.2
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '59',
            'indeks' => 'BB/U',
            'median' => 18.2,
            'sd_negatif_1' => 15.9,
            'sd_negatif_2' => 14.0,
            'sd_negatif_3' => 12.3,
            'sd_positif_1' => 20.8,
            'sd_positif_2' => 23.9,
            'sd_positif_3' => 27.6
        ]);
        StandarAntropometri::create([
            'jenis_kelamin' => 'L',
            'umur_bulan' => '60',
            'indeks' => 'BB/U',
            'median' => 18.3,
            'sd_negatif_1' => 16.0,
            'sd_negatif_2' => 14.1,
            'sd_negatif_3' => 12.4,
            'sd_positif_1' => 21.0,
            'sd_positif_2' => 24.2,
            'sd_positif_3' => 27.9
        ]);
    }
}
