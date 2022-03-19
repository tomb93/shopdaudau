<?php

namespace App\Helpers;

class Helper
{
    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= '<tr>';
                $html .= '<td>' . $item->id . '</td>';
                $html .= '<td>' . $char . $item->name . '</td>';
                $html .= '<td>' . self::active($item->active) . '</td>';
                $html .= '<td>' . $item->updated_at . '</td>';
                $html .= '<td><a href="/admin/menu/edit/' . $item->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a><a href="#" onclick="removeRow(' . $item->id . ',\'/admin/menu/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
                unset($menus[$key]);
                $html .= self::menu($menus, $item->id, $char . "|--");
            }
        }
        return $html;
    }

    public static function active($active = 0, $arr = ['Ẩn', 'Hiện'])
    {
        $color = ['danger', 'success', 'warning', 'primary', 'secondary', 'info', 'dark'];
        $result = '<span class="btn btn-' . $color[$active] . ' btn-xs">' . $arr[$active] . '</span>';
        return $result;
    }
    public static function product($products)
    {
        $html = '';
        foreach ($products as $key => $item) {
            $html .= '<tr>';
            $html .= '<td>' . $item->id . '</td>';
            $html .= '<td>' . $item->name . '</td>';
            $html .= '<td>' . $item->menu->name . '</td>';
            $html .= '<td>' . self::FormatVND($item->price) . '</td>';
            $html .= '<td>' . self::FormatVND($item->price_sale) . '</td>';
            $html .= '<td>' . self::active($item->active) . '</td>';
            $html .= '<td>' . $item->updated_at . '</td>';
            $html .= '<td><a href="/admin/products/edit/' . $item->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" onclick="removeRow(' . $item->id . ',\'/admin/products/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
        }
        return $html;
    }

    public static function slider($sliders)
    {
        $html = '';
        foreach ($sliders as $key => $item) {
            $html .= '<tr>';
            $html .= '<td>' . $item->id . '</td>';
            $html .= '<td>' . $item->name . '</td>';
            $html .= '<td><a href="' . $item->thumb . '" target="_blank">
                    <img src="' . $item->thumb . '" height="40">
                    </a></td>';
            $html .= '<td>' . $item->url . '</td>';
            $html .= '<td>' . self::active($item->active, ['Ẩn', 'Slider', 'Banner']) . '</td>';
            $html .= '<td>' . $item->updated_at . '</td>';
            $html .= '<td><a href="/admin/sliders/edit/' . $item->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" onclick="removeRow(' . $item->id . ',\'/admin/sliders/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
        }
        return $html;
    }

    public static function orders($orders)
    {
        $html = '';
        foreach ($orders as $key => $item) {
            $html .= '<tr>';
            $html .= '<td>' . $item->id . '</td>';
            $html .= '<td>' . $item->name . '</td>';
            $html .= '<td>' . $item->phone . '</td>';
            $html .= '<td>' . $item->email . '</td>';
            $html .= '<td>' . $item->updated_at . '</td>';
            $html .= '<td>' . self::active($item->action) . '</td>';
            $html .= '<td><a href="/admin/cart/order-detail/' . $item->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" onclick="removeRow(' . $item->id . ',\'/admin/cart/order-destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
        }
        return $html;
    }



    public static function loadMenuMain($data, $parent_id = 0, $mobile = 0)
    {
        $html = '';
        foreach ($data as $key => $item) {
            if ($item->parent_id == $parent_id) {
                $html .= '
                <li>
                    <a href="/danh-muc/' . $item->id . '-' . $item->slug . '">' . $item->name . '</a>
                ';
                if (self::isChild($data, $item->id)) {
                    if ($mobile == 1) {
                        $html .= '<ul class="sub-menu-m">';
                        $html .= self::loadMenuMain($data, $item->id);
                        $html .= '</ul>';
                        $html .= '<span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>';
                    } else {
                        $html .= '<ul class="sub-menu">';
                        $html .= self::loadMenuMain($data, $item->id);
                        $html .= '</ul>';
                    }
                }
                $html .= '</li>';
            }
        }
        return $html;
    }
    public static function isChild($menu, $id)
    {
        foreach ($menu as $item) {
            if ($item->parent_id == $id) {
                return true;
            }
        }
        return false;
    }

    // giá gốc và giá giảm
    public static function price($price = 0, $price_sale = 0)
    {
        if ($price_sale != 0) return self::FormatVND($price_sale);
        if ($price != 0) return self::FormatVND($price);
        return '<a href="/lien-he">Liên Hệ</a>';
    }

    public function FormatVND(int $price): string
    {
        return sprintf('<strong>%s %s</strong>', number_format($price, 0, ',', '.'), 'VND');
    }
}
