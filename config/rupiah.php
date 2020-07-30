<?php
function rupiah($nilai, $pecahan = 0)
{
    return number_format($nilai, $pecahan, ',', '.');
}