<?php include('top.php');

//now print out each record
    print '<p>Displaying Query....<br>SELECT pmkNetId FROM tblTeachers;</p>';
    $query = 'SELECT pmkNetId FROM tblTeachers';
    $info2 = $thisDatabaseReader->select($query, "", 0, 0);

    $highlight = 1; // used to highlight alternate rows
    foreach ($info2 as $rec) {
        $highlight++;
        if ($highlight % 2 != 0) {
            $style = ' odd ';
        } else {
            $style = ' even ';
        }
        print '<tr class="' . $style . '">';
        for ($i = 0; $i < 1; $i++) {
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
