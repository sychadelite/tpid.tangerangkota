<?php

function getMonthName($index)
{
  $monthNames = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
  );
  return $monthNames[$index];
}

function get_human_readable_time_diff($datetime)
{
  $datetime = new DateTime($datetime);
  $currentDatetime = new DateTime();

  $interval = $currentDatetime->diff($datetime);
  $formatString = '';

  if ($interval->y > 0) {
    $formatString = '%y tahun yang lalu';
  } elseif ($interval->m > 0) {
    $formatString = '%m bulan yang lalu';
  } elseif ($interval->d > 0) {
    $formatString = '%d hari yang lalu';
  } elseif ($interval->h > 0) {
    $formatString = '%h jam yang lalu';
  } elseif ($interval->i > 0) {
    $formatString = '%i menit yang lalu';
  } else {
    return 'Baru saja';
  }

  return $interval->format($formatString);
}
