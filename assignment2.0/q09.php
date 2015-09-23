<?php include('top.php');



//now print out each record
    print '<p>Displaying Query.....<br>SELECT fldBuilding FROM tblSections WHERE fldDays LIKE ? GROUP BY fldBuilding;</p>';
    $query = 'SELECT fldBuilding FROM tblSections WHERE fldDays LIKE ? GROUP BY fldBuilding';
    $data = array("%W%");
    $info2 = $thisDatabaseReader->select($query, $data, 1, 0, 0, 0, false, false);
    $test = $thisDatabaseReader->testquery($query, $data, 1, 0, 0, 0, false, false);
    print $info2;


    $highlight = 1; // used to highlight alternate rows
    $columns = 2;
    print '<article>';
    print '<table>';
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < $columns; $i++) {
            print '<td>' . $rec[$i] . '</td>';
            print '<br>';
        }
        print '</tr>';
    }

    // all done
    print '</table>';
    print '</aside>';


print '</article>';
include "footer.php";
?>
