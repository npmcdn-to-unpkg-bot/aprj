<base href="http://localhost/aprj/">

<table border="1" align="center">
    <tbody>
           <tr>
                <th>Email Address</th>
           </tr>
        <?php
        for($i=0;$i<count($subscribers);$i++) {     
            echo "<tr>";
            echo "<td align='left'>".$subscribers[$i]['email']."</td>";
            echo "</tr>";
            }
        ?>
    </tbody>
</table>