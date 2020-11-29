<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function lingkaranBulat($n, $thisNumber) {
        if ($n < 4 || $n > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 1 harus di antara bilangan 4 dan 20'
            ]);
        }

        if ($n % 2 != 0) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 1 harus merupakan bilangan genap'
            ]);
        }

        if ($thisNumber < 0 || $thisNumber > $n - 1) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 2 harus di antara 0 dan uri segmen 1 dikurangi 1'
            ]);
        }

        $sudut = 360 / $n;
        $array = [];

        for ($i=$thisNumber; $i<$n+$thisNumber; $i++) {
            if ($i < $n) {
                array_push($array, $i);
            }
            else {
                array_push($array, $i - $n);
            }
        }

        $count = count($array);

        return view('lingkaran', compact('sudut', 'array', 'count'));
    }

    public function pengendaraMalam($n)
    {
        if ($n < 0 || $n > 1440) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 1 harus di antara bilangan 0 dan 1440'
            ]);
        }

        $jam = floor($n / 60);
        $menit = $n % 60;
        $jj = '00';
        $mm = '00';

        if ($jam > 0 && $jam < 10) {
            $jj = '0' . $jam;
        }
        elseif ($jam >= 10) {
            $jj = $jam;
        }

        if ($menit > 0 && $menit < 10) {
            $mm = '0' . $menit;
        }
        elseif ($menit >= 10) {
            $mm = $menit;
        }

        $array = str_split($jj . $mm);
        $output = array_sum($array);


        return view('pengendara', compact('jj', 'mm', 'output'));
    }

    public function hartaKarun($value1, $weight1, $value2, $weight2, $maxKeranjang)
    {
        if ($value1 < 1 || $value1 > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 1 harus di antara bilangan 1 dan 20'
            ]);
        }

        if ($value2 < 1 || $value2 > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 2 harus di antara bilangan 1 dan 20'
            ]);
        }

        if ($weight1 < 1 || $weight1 > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 3 harus di antara bilangan 1 dan 20'
            ]);
        }

        if ($weight2 < 1 || $weight2 > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 4 harus di antara bilangan 1 dan 20'
            ]);
        }

        if ($maxKeranjang < 1 || $maxKeranjang > 20) {
            return response([
                'status' => 'error',
                'message' => 'uri segmen 5 harus di antara bilangan 1 dan 20'
            ]);
        }

        if ($weight1 >= $weight2) {
            if ($maxKeranjang >= $weight1 + $weight2) {
                $output = $value1 + $value2;
            }
            else {
                $output = $value1;
            }
        }
        else {
            if ($maxKeranjang >= $weight1 + $weight2) {
                $output = $value1 + $value2;
            }
            else {
                $output = $value2;
            }
        }

        return response([
            'status' => 'success',
            'message' => 'Output = ' . $output
        ]);
    }
}
