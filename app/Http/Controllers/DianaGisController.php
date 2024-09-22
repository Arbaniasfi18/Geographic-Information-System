<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DianaGisController extends Controller
{
    public static function dianaGis($tahun)
    {
        // Mengambil data COVID-19 dari database
        if ($tahun == '2020') {
            $dataCovid = DB::table('tbc_tahun_2020')->get();
        }else if ($tahun == '2021'){
            $dataCovid = DB::table('tbc_tahun_2021')->get();
        }else if ($tahun == '2022'){
            $dataCovid = DB::table('tbc_tahun_2022')->get();
        }else if ($tahun == '2023'){
            $dataCovid = DB::table('tbc_tahun_2023')->get();
        }

        // Pisahkan nama, data poin, dan koordinat
        $names = $dataCovid->pluck('nama')->toArray();
        $dataPoints = $dataCovid->map(function ($item) {
            return [
                floatval($item->konfirmasi),
                floatval($item->sembuh),
                floatval($item->meninggal),
                floatval($item->latitude),
                floatval($item->longitude)
            ];
        })->toArray();

        // Hanya gunakan data angka untuk clustering
        $clusteringDataPoints = array_map(function($point) {
            return array_slice($point, 0, 3);
        }, $dataPoints);

        // Lakukan DIANA Clustering
        $clusters = DianaGisController::dianaClusteringAlgorithm($clusteringDataPoints);

        // Format hasil clustering
        $labeledClusters = [];
        foreach ($clusters as $index => $cluster) {
            $label = "Cluster " . ($index + 1);
            $labeledClusters[$label] = $cluster;
        }

        // Debugging output
        // Log::debug('Names:', $names);
        // Log::debug('Data Points:', $dataPoints);
        // Log::debug('Clusters:', $labeledClusters);

        // return view('gis_diana', [
        //     'clusters' => $labeledClusters,
        //     'dataPoints' => $dataPoints,
        //     'names' => $names
        // ]);
        return [
            'clusters' => $labeledClusters,
            'dataPoints' => $dataPoints,
            'names' => $names
        ];
    }

    private static function euclideanDistance($point1, $point2)
    {
        $sum = 0;
        for ($i = 0; $i < 3; $i++) {
            $sum += pow($point1[$i] - $point2[$i], 2); // Hanya menggunakan konfirmasi, sembuh, dan meninggal untuk perhitungan
        }
        return sqrt($sum);
    }

    private static function dianaClusteringAlgorithm($dataPoints)
    {
        $clusters = [array_keys($dataPoints)];

        // Number of clusters to split into
        $desiredClusterCount = 4;

        while (count($clusters) < $desiredClusterCount) {
            $largestCluster = null;
            $maxDistance = 0;

            // Find the largest cluster
            foreach ($clusters as $cluster) {
                $clusterDiameter = DianaGisController::clusterDiameter($cluster, $dataPoints);
                if ($clusterDiameter > $maxDistance) {
                    $maxDistance = $clusterDiameter;
                    $largestCluster = $cluster;
                }
            }

            // Split the largest cluster
            if ($largestCluster === null) {
                break;
            }

            $splitClusters = DianaGisController::splitCluster($largestCluster, $dataPoints);
            if ($splitClusters !== null) {
                $clusters = array_filter($clusters, function ($c) use ($largestCluster) {
                    return $c !== $largestCluster;
                });
                $clusters = array_merge($clusters, $splitClusters);
            } else {
                break;
            }
        }

        return $clusters;
    }

    private static function clusterDiameter($cluster, $dataPoints)
    {
        $diameter = 0;
        for ($i = 0; $i < count($cluster); $i++) {
            for ($j = $i + 1; $j < count($cluster); $j++) {
                $distance = DianaGisController::euclideanDistance($dataPoints[$cluster[$i]], $dataPoints[$cluster[$j]]);
                if ($distance > $diameter) {
                    $diameter = $distance;
                }
            }
        }
        return $diameter;
    }

    private static function splitCluster($cluster, $dataPoints)
    {
        $maxDistance = 0;
        $splitPoint1 = null;
        $splitPoint2 = null;

        for ($i = 0; $i < count($cluster); $i++) {
            for ($j = $i + 1; $j < count($cluster); $j++) {
                $distance = DianaGisController::euclideanDistance($dataPoints[$cluster[$i]], $dataPoints[$cluster[$j]]);
                if ($distance > $maxDistance) {
                    $maxDistance = $distance;
                    $splitPoint1 = $cluster[$i];
                    $splitPoint2 = $cluster[$j];
                }
            }
        }

        if ($splitPoint1 === null || $splitPoint2 === null) {
            return null;
        }

        $newCluster1 = [$splitPoint1];
        $newCluster2 = [$splitPoint2];

        foreach ($cluster as $point) {
            if ($point != $splitPoint1 && $point != $splitPoint2) {
                $distanceToCluster1 = DianaGisController::euclideanDistance($dataPoints[$point], $dataPoints[$splitPoint1]);
                $distanceToCluster2 = DianaGisController::euclideanDistance($dataPoints[$point], $dataPoints[$splitPoint2]);

                if ($distanceToCluster1 < $distanceToCluster2) {
                    $newCluster1[] = $point;
                } else {
                    $newCluster2[] = $point;
                }
            }
        }

        return [$newCluster1, $newCluster2];
    }
}
