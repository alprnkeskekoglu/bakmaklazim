<?php

function getStatusText($status) {
    $text = null;
    if($status == 1) {
        $text = 'Active';
    } elseif($status == 2) {
        $text = 'Draft';
    } elseif($status == 3) {
        $text = 'Passive';
    }

    return $text;
}

function commentStats() {

    $month = \Dawnstar\Models\Comment::all()->groupBy(function ($date) {
        return \Carbon\Carbon::parse($date->created_at)->format('Y-m');
    });

    $day = collect();
    if (!is_null($month->get(date('Y-m')))) {
        $day = $month->get(date('Y-m'))->groupBy(function ($date) {
            return \Carbon\Carbon::parse($date->created_at)->format('j');
        });
    }

    $data = [];
    for ($i = 1; $i <= date("t"); $i++) {
        if (!is_null($day->get($i))) {
            $data[$i] = $day->get($i)->count();
        } else {
            $data[$i] = 0;
        }
    }

    return implode(',', $data);
}
