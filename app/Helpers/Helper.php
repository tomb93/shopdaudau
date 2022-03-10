<?php
namespace App\Helpers;

class Helper{
    public static function menu($menus, $parent_id=0,$char=''){
        $html='';
        foreach( $menus as $key=>$item){
            if($item->parent_id==$parent_id){
                $html.='<tr>';
                $html.='<td>'.$item->id.'</td>';
                $html.='<td>'.$char.$item->name.'</td>';
                $html.='<td>'.$item->active.'</td>';
                $html.='<td>'.$item->updated_at.'</td>';
                $html.='<td><a href="/admin/menu/edit/'.$item->id.'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a><a href="#" onclick="removeRow('.$item->id.',\'/admin/menu/destroy\')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td></tr>';
                unset($menus[$key]);
                $html.=self::menu($menus,$item->id,$char."|--");
            }
        }
        return $html;
    }
}