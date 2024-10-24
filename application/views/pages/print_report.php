<center>
    <div style="width:800px; text-align:center">
        <h2>Monthly Inventory Report</h2>
        <h4>Stock <?=$type;?><br><?=date('m/d/Y',strtotime($startdate));?> to <?=date('m/d/Y',strtotime($enddate));?></h4>        
        <table width="100%" border="1" style="border-collapse:collapse;">
            <tr>
                <td>#</td>
                <td align="center">Description</td>
                <td align="center">Qty (in grams)</td>
                <td align="center">Date / TIme</td>
            </tr>
            <?php
            if($type=="in"){
                $query=$this->Feeding_model->db->query("SELECT po.*,s.description FROM purchaseorder po INNER JOIN stocks s ON s.code=po.stock_id WHERE po.`status`='received' AND po.rrdate BETWEEN '$startdate' AND '$enddate' ORDER BY rrdate ASC");
            }else{
                $query=$this->Feeding_model->db->query("SELECT d.quantity,d.datearray as rrdate,d.timearray as rrtime,s.description FROM dispensing d INNER JOIN stocks s ON s.code=d.stock_id WHERE d.datearray BETWEEN '$startdate' AND '$enddate' ORDER BY d.datearray ASC");
            }
            if($query->num_rows() > 0){
                $result=$query->result_array();
                $x=1;
                foreach($result as $item){
                    echo "<tr>";
                        echo "<td>$x.</td>";
                        echo "<td>$item[description]</td>";
                        echo "<td align='center'>$item[quantity]</td>";
                        echo "<td align='center'>".date('m/d/Y',strtotime($item['rrdate']))." ".date('h:i A',strtotime($item['rrtime']))."</td>";
                    echo "</tr>";
                    $x++;
                }
            }
                
            ?>
        </table>
    </div>
</center>
