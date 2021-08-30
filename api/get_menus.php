<?php
include_once "../base.php";
            $typeBig=$Type->all(['parent'=>0]);
            $menus=[];
            $menus[]=[
                'type'=>0,
                'name'=>"全部商品",
                'qt'=>$Goods->count(['sh'=>1])
            ];
            foreach($typeBig as $tb){
                $tmp=[
                    'type'=>$tb['id'],
                    'name'=>$tb['name'],
                    'qt'=>$Goods->count(['big'=>$tb['id'],'sh'=>1]),
                ];
                $typeMid=$Type->all(['parent'=>$tb['id']]);
                if(count($typeMid)>0){
                    $subs=[];
                    foreach($typeMid as $tm){
                        $subs[]=[
                                'type'=>$tm['id'],
                                'name'=>$tm['name'],
                                'qt'=>$Goods->count(['mid'=>$tm['id'],'sh'=>1]),  
                        ];
                    }
                    $tmp['subs']=$subs;
                }


                $menus[]=$tmp;
            }

            echo json_encode($menus);
            ?>