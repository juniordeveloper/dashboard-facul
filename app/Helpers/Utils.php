<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Utils
{
    /**
     * @param $collection
     * @param $value
     * @param $label
     * @return mixed
     */
    public static function options($collection, $value, $label)
    {
        return $collection->map(function ($item) use ($value, $label) {
            $option['value'] = $item[$value];
            $option['label'] = $item[$label];
            return $option;
        })->toArray();
    }

    /**
     * @param $date
     * @param $formatIn
     * @param $formatOut
     * @return mixed
     */
    public static function formatDate($date, $formatIn = 'd/m/Y', $formatOut = 'Y-m-d')
    {
        if (empty($date)) {
            return '';
        }

        if (!self::isValidDate($date, $formatIn)) {
            return '';
        }

        try {
            $date = \Carbon\Carbon::createFromFormat($formatIn, $date);
            return $date->format($formatOut);
        } catch (\Throwable $th) {

        }
        return '';
    }

    /**
     * @param $date
     * @param $formatIn
     * @param $formatOut
     * @return mixed
     */
    public static function formatDateInverse($date, $formatIn = 'd/m/Y', $formatOut = 'd-m-Y')
    {
        if (empty($date)) {
            return '';
        }

        if (!self::isValidDate($date, $formatIn)) {
            return '';
        }

        try {
            $date = \Carbon\Carbon::createFromFormat($formatIn, $date);
            return $date->format($formatOut);
        } catch (\Throwable $th) {

        }
        return '';
    }

    /**
     * @param $date
     * @param $formatIn
     * @return mixed
     */
    public static function isValidDate($date, $formatIn = 'd/m/Y')
    {
        if (empty($date)) {
            return null;
        }
        try {
            $d = \Carbon\Carbon::createFromFormat($formatIn, $date);
            return $d && $d->format($formatIn) === $date;
        } catch (\Throwable $th) {

        }

        return false;
    }

    public static function estados()
    {
        return [
            ['value' => 'AC', 'label' => 'Acre'],
            ['value' => 'AL', 'label' => 'Alagoas'],
            ['value' => 'AP', 'label' => 'Amapá'],
            ['value' => 'AM', 'label' => 'Amazonas'],
            ['value' => 'BA', 'label' => 'Bahia'],
            ['value' => 'CE', 'label' => 'Ceará'],
            ['value' => 'DF', 'label' => 'Distrito Federal'],
            ['value' => 'ES', 'label' => 'Espírito Santo'],
            ['value' => 'GO', 'label' => 'Goiás'],
            ['value' => 'MA', 'label' => 'Maranhão'],
            ['value' => 'MT', 'label' => 'Mato Grosso'],
            ['value' => 'MS', 'label' => 'Mato Grosso do Sul'],
            ['value' => 'MG', 'label' => 'Minas Gerais'],
            ['value' => 'PA', 'label' => 'Pará'],
            ['value' => 'PB', 'label' => 'Paraíba'],
            ['value' => 'PR', 'label' => 'Paraná'],
            ['value' => 'PE', 'label' => 'Pernambuco'],
            ['value' => 'PI', 'label' => 'Piauí'],
            ['value' => 'RJ', 'label' => 'Rio de Janeiro'],
            ['value' => 'RN', 'label' => 'Rio Grande do Norte'],
            ['value' => 'RS', 'label' => 'Rio Grande do Sul'],
            ['value' => 'RO', 'label' => 'Rondônia'],
            ['value' => 'RR', 'label' => 'Roraima'],
            ['value' => 'SC', 'label' => 'Santa Catarina'],
            ['value' => 'SP', 'label' => 'São Paulo'],
            ['value' => 'SE', 'label' => 'Sergipe'],
            ['value' => 'TO', 'label' => 'Tocantins'],
        ];
    }

    /**
     * @param $val
     * @param $mask
     * @return mixed
     */
    public static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } elseif ($mask[$i] == '*') {
                if (isset($mask[$i])) {
                    $maskared .= '*';
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }

    /**
     * @param $url_photo
     * @return mixed
     */
    public static function getFaceByPhoto($url_photo)
    {
        // if (env('APP_ENV') != 'production') {
        //     return '';
        // }
        try {

            $response = Http::asForm()->withOptions([
                'verify' => false,
            ])
                ->post("http://control.sagris.com.br:3001/my_face", [
                    'url_photo' => $url_photo,
                ]);

            $fotoOk = $response->json();
            if (isset($fotoOk['rosto']) && !$fotoOk['rosto']) {
                return '';
            }
            return $fotoOk['url'] ?? '';
        } catch (\Throwable $th) {
            //throw $th;
        }
        return '';
    }

    /**
     * @param $value
     */
    public static function somenteNumeros($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    /**
     * @param $topic
     * @param $message
     */
    public static function mqtt($topic, $message)
    {
        $post = [
            'topic' => $topic,
            'message' => $message,
        ];

        Http::asForm()->post("http://controlxpress.com:13000/mqtt", $post);
    }

    /**
     * @param $value
     * @param $inicio
     * @param $qtd
     */
    public static function ofuscaValor($value, $inicio, $qtd)
    {
        $asc = str_repeat('*', $qtd);
        return substr_replace($value, $asc, $inicio, $qtd);
    }

    /**
     * @param $json
     * @return mixed
     */
    public static function prettyPrint($json)
    {
        $result = '';
        $level = 0;
        $in_quotes = false;
        $in_escape = false;
        $ends_line_level = null;
        $json_length = strlen($json);

        for ($i = 0; $i < $json_length; ++$i) {
            $char = $json[$i];
            $new_line_level = null;
            $post = "";
            if ($ends_line_level !== null) {
                $new_line_level = $ends_line_level;
                $ends_line_level = null;
            }
            if ($in_escape) {
                $in_escape = false;
            } else if ($char === '"') {
                $in_quotes = !$in_quotes;
            } else if (!$in_quotes) {
                switch ($char) {
                    case '}':case ']':
                        $level--;
                        $ends_line_level = null;
                        $new_line_level = $level;
                        break;

                    case '{':case '[':
                        $level++;
                    case ',':
                        $ends_line_level = $level;
                        break;

                    case ':':
                        $post = " ";
                        break;

                    case " ":case "\t":case "\n":case "\r":
                        $char = "";
                        $ends_line_level = $new_line_level;
                        $new_line_level = null;
                        break;
                }
            } else if ($char === '\\') {
                $in_escape = true;
            }
            if ($new_line_level !== null) {
                $result .= "\n" . str_repeat("\t", $new_line_level);
            }
            $result .= $char . $post;
        }

        return $result;
    }

    /**
     * @param $url
     */
    public static function url($url = null)
    {
        if (env('APP_ENV') == 'production') {
            return url($url);
        }
        return "//control.sagris.com.br/{$url}";
    }

    /**
     * @param $arr
     */
    public static function toObject($arr)
    {
        if (is_array($arr)) {
            return (object) array_map(function ($item) {
                $item = self::toObject($item);
            }, $arr);
        }
        return false;
    }

    /**
     * @param $startTime
     * @param $endTime
     * @param $step
     * @param $isMajorNow
     */
    public static function selectTimesofDay($startTime = '00:00', $endTime = '23:59', $step = 600, $isMajorNow = false)
    {
        $open_time = strtotime(date("Y-m-d {$startTime}:00"));
        $close_time = strtotime(date("Y-m-d {$endTime}:59"));
        $now = time();
        $output = [];
        for ($i = $open_time; $i < $close_time; $i += $step) {
            if ($isMajorNow && $i < $now) {
                continue;
            }

            $output[] = date("H:i", $i);
        }
        return $output;
    }

    /**
     * @param $str
     */
    public static function is_base64($str)
    {
        if (base64_encode(base64_decode($str, true)) === $str) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $dateIni
     * @param $dateEnd
     * @param $returnTime
     * @return mixed
     */
    public static function diffInSeconds($dateIni, $dateEnd, $returnTime = true)
    {
        $ini = \Carbon\Carbon::parse($dateIni);
        $end = \Carbon\Carbon::parse($dateEnd);
        $seconds = $ini->diffInSeconds($end);
        return $returnTime ? self::secToHR($seconds) : $seconds;
    }

    /**
     * @param $seconds
     */
    public static function secToHR($seconds)
    {
        $hours = str_pad(floor($seconds / 3600), 2, 0, STR_PAD_LEFT);
        $minutes = str_pad(floor(($seconds / 60) % 60), 2, 0, STR_PAD_LEFT);
        $seconds = str_pad(($seconds % 60), 2, 0, STR_PAD_LEFT);
        return "{$hours}:{$minutes}:{$seconds}";
    }

    /**
     * @param $dataAgendamento
     * @return mixed
     */
    public static function clienteOrigemError($dataAgendamento)
    {
        $otherDate = \Carbon\Carbon::parse($dataAgendamento);
        $nowDate = \Carbon\Carbon::parse('2022-05-20 10:50:00');
        return $otherDate->gte($nowDate);
    }

    /**
     * @param $config
     * @param $valueCompare
     */
    public static function calcMediaColor($config, $valueCompare)
    {
        $valueCompare = (float) $valueCompare;
        $media = (int) $config->tempo_medio;
        $percent = (int) str_replace(['%'], [''], $config->meta);

        if ($valueCompare <= $config->tempo_medio) {
            return '';
        }
        $mediaUltrapassar = $media + ($media * ($percent / 100));

        if ($valueCompare >= $media && $valueCompare <= $mediaUltrapassar) {
            return 'yellow';
        }

        return 'red';
    }

    /**
     * @param $time
     * @param $timeCompare
     */
    public static function calcTimeColor($time, $timeCompare)
    {
        if (stripos($timeCompare, ':') === false) {
            return '';
        }
        $otherDate = \Carbon\Carbon::parse(date("Y-m-d {$time}:00"));
        $nowDate = \Carbon\Carbon::parse(date("Y-m-d {$timeCompare}:00"));
        if ($otherDate->diffInSeconds($nowDate, false) > 0) {
            return 'red';
        }
        return '';
    }

    /**
     * @param $times
     * @param $dateTimeCompare
     */
    public static function calcTimesColor($times, $dateTimeCompare)
    {
        if (stripos($dateTimeCompare, ':') === false) {
            return '';
        }
        $date = explode(" ", $dateTimeCompare)[0];
        $dateIni = \Carbon\Carbon::parse("{$date} {$times->data_ini}:00");
        $dateFim = \Carbon\Carbon::parse("{$date} {$times->data_fim}:00");
        if ($dateIni->diffInSeconds($dateFim, false) < 0) {
            $dateIni->subDay();
        }

        if (!\Carbon\Carbon::parse($dateTimeCompare)->between($dateIni, $dateFim)) {
            return 'red';
        }

        return '';
    }

    /**
     * @param $time
     */
    public static function timeToMinutes($time)
    {
        $time = explode(':', $time);
        return ($time[0] * 60) + ($time[1]) + (($time[2] ?? 0) / 60);
    }

    /**
     * @param $n
     * @param $tolerance
     */
    public static function float2rat($n, $tolerance = 1.e-6)
    {
        $h1 = 1;
        $h2 = 0;
        $k1 = 0;
        $k2 = 1;
        $b = 1 / $n;

        do {
            $b = 1 / $b;
            $a = floor($b);
            $aux = $h1;
            $h1 = $a * $h1 + $h2;
            $h2 = $aux;
            $aux = $k1;
            $k1 = $a * $k1 + $k2;
            $k2 = $aux;
            $b = $b - $a;
        } while (abs($n - $h1 / $k1) > $n * $tolerance);

        return "$h1/$k1";
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function boxplotData($data)
    {
        sort($data);
        $min = $data[0];
        $max = $data[count($data) - 1];
        $median = self::median($data);
        $q1 = self::quartile($data, 1);
        $q3 = self::quartile($data, 3);
        $boxplot_data = [$min, $q1, $median, $q3, $max];
        $boxplot_data = array_map(function ($item) {
            return (int) ($item);
        }, $boxplot_data);
        return $boxplot_data;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function boxplotDataWithOutliers($data)
    {
        sort($data);
        $min = $data[0];
        $max = $data[count($data) - 1];
        $median = self::median($data);
        $q1 = self::quartile($data, 1);
        $q3 = self::quartile($data, 3);
        $iqr = $q3 - $q1;
        $lower_fence = $q1 - 1.5 * $iqr;
        $upper_fence = $q3 + 1.5 * $iqr;
        $outliers = [];
        foreach ($data as $value) {
            if ($value < $lower_fence || $value > $upper_fence) {
                $outliers[] = $value;
            }
        }
        $boxplot_data = [$min, $q1, $median, $q3, $max, $outliers];
        $boxplot_data = array_map(function ($item) {
            return (int) ($item);
        }, $boxplot_data);
        return $boxplot_data;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function boxplotDataWithFilteredOutliers($data)
    {
        sort($data);
        $min = $data[0];
        $max = $data[count($data) - 1];
        $median = self::median($data);
        $q1 = self::quartile($data, 1);
        $q3 = self::quartile($data, 3);
        $iqr = $q3 - $q1;
        $lower_fence = $q1 - 1.5 * $iqr;
        $upper_fence = $q3 + 1.5 * $iqr;
        $outliers = [];
        foreach ($data as $value) {
            if ($value < $q1 || $value > $q3) {
                $outliers[] = $value;
            }
        }
        $outliers = array_filter($outliers, function ($value) use ($q1, $q3) {
            return ($value < $q1 * 0.75 || $value > $q3 * 1.25);
        });
        $boxplot_data = [$min, $q1, $median, $q3, $max, $outliers];
        return $boxplot_data;
    }

    /**
     * @param $lista
     * @return mixed
     */
    public static function calcularEstatisticas($lista)
    {
        // Média
        $media = array_sum($lista) / count($lista);

        // Mediana
        sort($lista);
        $tamanho = count($lista);
        $mediana = ($tamanho % 2 == 0) ? ($lista[$tamanho / 2 - 1] + $lista[$tamanho / 2]) / 2 : $lista[$tamanho / 2];

        // Moda
        $frequencias = array_count_values($lista);
        $moda = array_keys($frequencias, max($frequencias));

        // Mínimo e máximo
        $minimo = min($lista);
        $maximo = max($lista);

        // array com as estatísticas calculadas
        $listaEstatistica = [
            'media' => number_format($media, 0),
            'mediana' => number_format($mediana, 0),
            'moda' => array_map(fn($item) => number_format($item, 0), $moda),
            'minimo' => number_format($minimo, 0),
            'maximo' => number_format($maximo, 0),
        ];
        return $listaEstatistica;
    }

    /**
     * @param $data
     * @return mixed
     */
    public static function median($data)
    {
        $n = count($data);
        $mid = floor($n / 2);
        if ($n % 2 == 0) {
            return ($data[$mid - 1] + $data[$mid]) / 2;
        } else {
            return $data[$mid];
        }
    }

    /**
     * @param $data
     * @param $q
     * @return mixed
     */
    public static function quartile($data, $q)
    {
        $n = count($data);
        $pos = $q * ($n + 1) / 4;
        if (floor($pos) == $pos) {
            return $data[$pos - 1];
        } else {
            $lower = $data[floor($pos) - 1];
            $upper = $data[ceil($pos) - 1];
            return ($lower + $upper) / 2;
        }
    }
}
