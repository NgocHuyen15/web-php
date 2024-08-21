<?php
/**
 * Tìm giá trị lớn nhất trong mảng
 */
function find_max($arr) {
    return max($arr);
}

/**
 * Tìm giá trị nhỏ nhất trong mảng
 */
function find_min($arr) {
    return min($arr);
}

/**
 * Tính tổng của các phần tử trong mảng
 */
function calculate_sum($arr) {
    return array_sum($arr);
}

/**
 * Kiểm tra xem một phần tử có thuộc mảng không
 */
function is_in_array($arr, $element) {
    return in_array($element, $arr);
}

/**
 * Sắp xếp mảng theo thứ tự tăng dần
 */
function sort_array($array) {
    // Sử dụng hàm usort() để sắp xếp mảng
    usort($array, function($a, $b) {
        return $a - $b;
    });

    return $array;
}

function usort_array($arr) {
    usort($arr, function($a, $b) {
        return $b - $a;
    });
    return $arr;
}

?>