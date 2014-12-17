<?php
namespace classes;

class mentions{
     
    public static function show_mentions($string){
        $table = '<table class="table">
                    <thead>
                        <tr>
                            <th data-halign="center" data-align="center">Username</th>
                            <th data-halign="center" data-align="center">Tweet</th>
                        </tr>
                    </thead>';
                    
        // print_r($string);
        foreach($string as $users){
            foreach($users as $item){
                if(is_object($item)){
                    if($item->user->screen_name == !NULL){
                        $table .= "<tr>";
                        $table .="<td>" . $item->user->screen_name . "</td>";
                        $table .="<td>" . $item->text . "</td>";
                        $table .= "</tr>"; 
                    }
                }
            }
        }
        $table .= "</table>";
        echo $table;
    }
}
?>
