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

    public static function active($active = 0)
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">No</span>'
            : '<span class="btn btn-success btn-xs">YES</span>';
    }
    public static function product($products)
    {
        $html = '';
        foreach ($products as $key => $item) {
            $html .= '<tr>';
            $html .= '<td>' . $item->id . '</td>';
            $html .= '<td>' . $item->name . '</td>';
            $html .= '<td>' . $item->menu->name . '</td>';
            $html .= '<td>' . $item->price . '</td>';
            $html .= '<td>' . $item->price_sale . '</td>';
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
            $html .= '<td>' . self::active($item->active) . '</td>';
            $html .= '<td>' . $item->updated_at . '</td>';
            $html .= '<td><a href="/admin/sliders/edit/' . $item->id . '" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a href="#" onclick="removeRow(' . $item->id . ',\'/admin/sliders/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
        }
        return $html;
    }
}
